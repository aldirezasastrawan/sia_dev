<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User as User;
use Validator,Redirect,DB,Auth;

class WaliController extends Controller
{
     function __construct()
	{
		$this->middleware('auth');
		$this->middleware('rule:Wali');
	}

	public function index()
    {
        return view('wali.dashboard.mainwali');
    }

    protected function ubah()
    {

        return view('wali.dashboard.gantipassword');
    }

    protected function simpanubah(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
          //dd($validator);
          return Redirect::back()->withErrors($validator)->withInput();
    }else{

      $cekIdUsername = $this->cekIdUsername(Auth::user()->username);

      if($cekIdUsername->count() > 0){
        //dd($cekPassLama->id);
        //Update data yang dimasukkan
        if(DB::table('users')
          ->where('username',Auth::user()->username)
          ->where('id', $cekIdUsername->id)
          ->update(['password' => bcrypt($request->password)]))
        {
          $messages = "Sukses! Perubahan password berhasil dilakukan.";
          session()->flash('success',isset($messages) ? $messages : '');
        }else{
          $messages = "Gagal! Perubahan password tidak berhasil dilakukan.";
          session()->flash('error',isset($messages) ? $messages : '');
        }
      }else{
        $message = array("Validasi username tidak sesuai dengan yang ada dalam database!");
        return Redirect::back()->withErrors($message)->withInput(); 
      }
    }
    return redirect('wali');
  }

  	protected function validator(array $data)
  	{
	      $messages = [
	          'passwordlama.required' => 'Password Lama dibutuhkan.',          
	          'password.required'     => 'Password dibutuhkan.',
	          'password.confirmed'    => 'Password dan Konfirmasi password tidak sama.',
	          'password.min'          => 'Panjang password minimal 6 karakter',
	          'passwordlama.cek_passwordlama' => 'Password lama yang dimasukkan tidak sesuai dalam database'
	          
	      ];
	      return Validator::make($data, [
	          'passwordlama'  => 'required|cek_passwordlama:' . \Auth::user()->password,
	          'password'      => 'required|confirmed|min:6',          
	      ], $messages);
  	}

  protected function cekIdUsername($nama_siswa){
    //Jika password lama akan dicek dengan yang didalam
    //
    //$passLama = bcrypt($passwordlama);

    $cekPass = User::Select(DB::raw('id'))
      ->where('username','=',$nama_siswa)
      //->where('password','=',$passLama)
      ->first();
    //echo $passLama.$mhsNim;
    //dd($cekPass);

    return $cekPass;
    }
}
