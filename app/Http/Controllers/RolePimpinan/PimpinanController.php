<?php

namespace App\Http\Controllers\RolePimpinan;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Siswa as Siswa;
use App\Guru as Guru;
use App\Kelas as Kelas;
use App\Pelajaran as Pelajaran;
use App\Absensi as Absensi;
use App\Jadwal as Jadwal;
use App\Pembayaran as Pembayaran;
use App\Nilaiakademik as Nilaiakademik;
use App\Nilainonakademik as Nilainonakademik;
use App\User as User;
use PDF, Validator,Redirect,DB,Auth;

class PimpinanController extends Controller
{
     function __construct()
	{
		$this->middleware('auth');
		$this->middleware('rule:Pimpinan');
	}

	public function index()
    {
        return view('pimpinan.dashboard.mainpimp');
    }

    public function siswa()
    {
        # Tarik semua isi tabel siswa kedalam variabel
        $siswas = Siswa::orderBy('keterangan')->paginate(10);
        // $siswas = Siswa::select(DB::raw("nis, nama_siswa, kelas.nama_kelas, jenis_kelamin, alamat, keterangan"))
        // ->leftJoin('kelas', 'siswas.siswas_id', '=', 'kelas.siswas_id')
        // ->get();
        // $kelas = array('' => 'Choose a Kelas') + Kelas::lists('nama_kelas', 'id')->all();
        // $siswas = DB::table('siswas')->get();


        $data = array('siswas' => $siswas); 
        // $kelas = array(
        //     'siswas' =>  DB::table('kelas')->get());
        # Tampilkan View
        return view('pimpinan.dashboard.siswa.index',$data);
        // return view('admin.dashboard.siswa.view', compact('siswas'));
    }

    public function detailsiswa($nama_siswa)
    {

        # Ambil data dalam berdasarkan berdasarkan nis
        $siswas = Siswa::where('nama_siswa', $nama_siswa)->first();

        $data = array('siswas' => $siswas); 
        # Tampilkan view        
        return view('pimpinan.dashboard.siswa.profile', $data);    

    }

    public function siswacetak()
    {
        $siswas = Siswa::all();
     
        $pdf = PDF::loadView('pimpinan.dashboard.siswa.pdf',compact('siswas'));

        return $pdf->download('Data Siswa Sirojul Munir.pdf');
    }

    public function guru()
    {
    	 # Tarik semua isi tabel siswa kedalam variabel
    	$gurus = Guru::all();

    	$data = array('gurus' => $gurus); 
    	# Tampilkan View
        return view('pimpinan.dashboard.guru.index',$data);
    }

    public function detailguru($nama_guru)
    {

        # Ambil data dalam berdasarkan berdasarkan nama
        $gurus = Guru::where('nama_guru', $nama_guru)->first();

        $data = array('gurus' => $gurus); 
        # Tampilkan view        
        return view('pimpinan.dashboard.guru.profile', $data);    

    }

    public function gurucetak()
    {
        $gurus = Guru::all();
     
        $pdf = PDF::loadView('pimpinan.dashboard.guru.pdf',compact('gurus'));

        return $pdf->download('Data Guru Sirojul Munir.pdf');
    }

    public function kelas()
    {
    	 # Tarik semua isi tabel siswa kedalam variabel
    	$kelass = Kelas::all();

    	$data = array('kelass' => $kelass); 
    	# Tampilkan View
        return view('pimpinan.dashboard.kelas.index',$data);
    }

    public function pelajaran()
    {
    	 # Tarik semua isi tabel siswa kedalam variabel
    	$pelajarans = Pelajaran::all();

    	$data = array('pelajarans' => $pelajarans); 
    	# Tampilkan View
        return view('pimpinan.dashboard.pelajaran.index',$data);
    }

    public function absensi()
    {
    	
        $absensis = Absensi::orderBy('kelass_id')->paginate(10);

    	$data = array('absensis' => $absensis);
    	return view('pimpinan.dashboard.absensi.index',$data);
    }

    public function absensicetak()
    {
        $absensis = Absensi::orderBy('kelass_id')->paginate(10);
     
        $pdf = PDF::loadView('pimpinan.dashboard.absensi.pdf',compact('absensis'));

        return $pdf->download('Data Absensi Akademik Siswa Sirojul Munir.pdf');
    }

    public function jadwal()
    {
    	 # Tarik semua isi tabel siswa kedalam variabel
    	$jadwals = Jadwal::orderBy('kelass_id')->paginate(10);

    	$data = array('jadwals' => $jadwals); 
    	# Tampilkan View
        return view('pimpinan.dashboard.jadwal.index',$data);
    }

    public function jadwalcetak()
    {
        $jadwals = Jadwal::orderBy('kelass_id')->paginate(10);
     
        $pdf = PDF::loadView('pimpinan.dashboard.jadwal.pdf',compact('jadwals'));

        return $pdf->download('Data Jadwal Akademik dan Ruangan Siswa Sirojul Munir.pdf');
    }

    public function pembayaran()
    {
    	
        $pembayarans = Pembayaran::orderBy('kelass_id')->paginate(10);
    	$data = array('pembayarans' => $pembayarans);
    	return view('pimpinan.dashboard.pembayaran.index',$data);
    }

    public function pembayarancetak()
    {
        $pembayarans = Pembayaran::orderBy('kelass_id')->paginate(10);
     
        $pdf = PDF::loadView('pimpinan.dashboard.pembayaran.pdf',compact('pembayarans'));

        return $pdf->download('Data Pembayaran Siswa Sirojul Munir.pdf');
    }

    public function nilaiakademik()
    {
        
        $nilaiakademiks = Nilaiakademik::orderBy('kelass_id')->paginate(10);
        $data = array('nilaiakademiks' => $nilaiakademiks);

        return view('pimpinan.dashboard.nilai.nilaiakademik.index',$data);
    }

    public function nilaiakademikcetak()
    {
        $nilaiakademiks = Nilaiakademik::orderBy('kelass_id')->paginate(10);
     
        $pdf = PDF::loadView('pimpinan.dashboard.nilai.nilaiakademik.pdf',compact('nilaiakademiks'));

        return $pdf->download('Data Nilai Akademik Siswa Sirojul Munir.pdf');
    }

    public function nilainonakademik()
    {
        
        $nilainonakademiks = Nilainonakademik::orderBy('kelass_id')->paginate(10);
        $data = array('nilainonakademiks' => $nilainonakademiks);
        return view('pimpinan.dashboard.nilai.nilainonakademik.index',$data);
    }

    public function nilainonakademikcetak()
    {
        $nilainonakademiks = Nilainonakademik::orderBy('kelass_id')->paginate(10);
     
        $pdf = PDF::loadView('pimpinan.dashboard.nilai.nilainonakademik.pdf',compact('nilainonakademiks'));

        return $pdf->download('Data Nilai Non Akademik Siswa Sirojul Munir.pdf');
    }

    protected function ubah()
    {

        return view('pimpinan.dashboard.gantipassword');
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
    return redirect('pimpinan');
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

  protected function cekIdUsername($name){
    //Jika password lama akan dicek dengan yang didalam
    //
    //$passLama = bcrypt($passwordlama);

    $cekPass = User::Select(DB::raw('id'))
      ->where('username','=',$name)
      //->where('password','=',$passLama)
      ->first();
    //echo $passLama.$mhsNim;
    //dd($cekPass);

    return $cekPass;
    }
}
