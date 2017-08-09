<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\User;
use App\Siswa as Siswa;
use App\Role as Role;
use App\Guru as Guru;
use DB;
use Redirect, Validator;
class RegisterController extends Controller
{
    
	public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('rule:Administrator');
    }

    public function index()
    {
        
        $users = User::orderBy('id')->paginate(10);
        $data = array('users' => $users);
        return view('admin.dashboard.pengguna.index',$data);
    }
    
    public function getRegister()
    {
        $roles = array(
            'rolelist' =>  DB::table('roles')->get()
        );

        $gurus = array(
                'gurus' => DB::table('gurus')->get()
                );
    	return view('auth.register', $roles, $gurus);
    }

    public function daftar()
    {


        // $roles = Role::all();

        // $gurus = Guru::all();

        // $siswas = Siswa::all();

        // $data = array('roles' => $roles, 'gurus' => $gurus, 'siswas' => $siswas);
        // return view('admin.dashboard.pengguna.tambah', $data);
        $roles = Role::pluck('namaRule', 'id');   //Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain
       
        $gurus = Guru::pluck('nama_guru', 'id');   //Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain
        $gurus->prepend('---  Kosongkan Jika Tidak Perlu ---');
        $siswas = Siswa::pluck('nama_siswa', 'id');   //Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain
        $siswas->prepend('---  Kosongkan Jika Tidak Perlu ---');

        return view('admin.dashboard.pengguna.tambah')
                ->with(['roles' => $roles, 'gurus' => $gurus, 'siswas' => $siswas]);
    }

    public function daftarsiswa()
    {


        // $roles = Role::all();

        // $gurus = Guru::all();

        // $siswas = Siswa::all();

        // $data = array('roles' => $roles, 'gurus' => $gurus, 'siswas' => $siswas);
        // return view('admin.dashboard.pengguna.tambah', $data);
         $siswas = Siswa::pluck('nama_siswa', 'id');   //Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain
        $siswas->prepend('---  Pilih ---');

        return view('admin.dashboard.pengguna.tambahsiswa2')
                ->with([ 'siswas' => $siswas]);
    }


    public function postRegistersiswa(Request $request)
    {
        $input =$request->all();
        $pesan = array(
            'username.required'         => ' Username Siswa dibutuhkan.',            
            'username.unique'           => 'Username Siswa sudah digunakan.',
            'password.required'         => 'Password Siswa dibutuhkan',
        );

        $aturan = array(

            'username'               => 'required|unique:users',
            'password'               => 'required'
        );
        

        $validator = Validator::make($input,$aturan, $pesan);

        if($validator->fails()) {
            # Kembali kehalaman yang sama dengan pesan error
            return Redirect::back()->withErrors($validator)->withInput();

          # Bila validasi sukses
        }

        $user = new User();
        $user->username = Input::get('username');
        $user->password = bcrypt(Input::get('password'));
        $user->siswas_id = Input::get('siswas_id');
        $user->name = Input::get('nama_wali');
        $user->roles_id            = 4;
        $user->save();
        // return view('auth.login');
        //dd($user);
        // dd($request->all());
        // User::create($request->all()); //Mengisi sesuai apa yang ada di Model
        # Kehalaman beranda dengan pesan sukses
        return Redirect('register');
    }

    public function daftarguru()
    {


        // $roles = Role::all();

        // $gurus = Guru::all();

        // $siswas = Siswa::all();

        // $data = array('roles' => $roles, 'gurus' => $gurus, 'siswas' => $siswas);
        // return view('admin.dashboard.pengguna.tambah', $data);
         $gurus = Guru::pluck('nama_guru', 'id');   //Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain
        $gurus->prepend('---  Pilih ---');

        return view('admin.dashboard.pengguna.tambahguru')
                ->with([ 'gurus' => $gurus]);
    }

    public function postRegisterguru(Request $request)
    {

        $input =$request->all();
        $pesan = array(
            'username.required'         => ' Username Guru dibutuhkan.',            
            'username.unique'           => 'Username Guru sudah digunakan.',
            'password.required'         => 'Password Guru dibutuhkan',
        );

        $aturan = array(

            'username'               => 'required|unique:users',
            'password'               => 'required'
        );
        

        $validator = Validator::make($input,$aturan, $pesan);

        if($validator->fails()) {
            # Kembali kehalaman yang sama dengan pesan error
            return Redirect::back()->withErrors($validator)->withInput();

          # Bila validasi sukses
        }

        $user = new User();
        $user->username = Input::get('username');
        $user->password = bcrypt(Input::get('password'));
        $user->gurus_id = Input::get('gurus_id');
        $user->name = Input::get('gurus_id');
        $user->roles_id            = 3;
        $user->save();
        // return view('auth.login');
        //dd($user);
        // dd($request->all());
        // User::create($request->all()); //Mengisi sesuai apa yang ada di Model
        # Kehalaman beranda dengan pesan sukses
        return Redirect('register');
    }
    

    public function postRegister(Request $request)
    {
    	$user = new User();
    	$user->username = Input::get('username');
    	$user->name = Input::get('name');
    	$user->password = bcrypt(Input::get('password'));
    	// $user->roles_id = DB::table('roles')->select('id')->where('namaRule','user')->first();
        $user->gurus_id = Input::get('gurus_id');
        $user->siswas_id = Input::get('siswas_id');
        $user->roles_id = Input::get('roles_id');
    	$user->save();
    	// return view('auth.login');
    	//dd($user);
        // dd($request->all());
        // User::create($request->all()); //Mengisi sesuai apa yang ada di Model
        # Kehalaman beranda dengan pesan sukses
        return Redirect('register');
    }

    public function hapus($id)
    {
        # Mencari ID
        $users = User::where('id', '=', $id)->first();
        $users->delete();

        return Redirect::to('register');
        // ->with('successMessage', 'Siswa has been deleted');
    }

    public function ubah($id)
    {

        $roles = Role::pluck('namaRule', 'id');   //Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain
       
        $gurus = Guru::pluck('nama_guru', 'id');   //Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain
        $gurus->prepend('---  Kosongkan Jika Tidak Perlu ---');
        $siswas = Siswa::pluck('nama_siswa', 'id');   //Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain
        $siswas->prepend('---  Kosongkan Jika Tidak Perlu ---');
        $users            = User::find($id);
        //return View::make('mobil.ubah', compact('jenis_mobil', 'mobil'));
        return view('admin.dashboard.pengguna.ubah')
                    ->with(['roles' => $roles, 'gurus' => $gurus, 'siswas' => $siswas, 'users' => $users]);
    }

    public function simpanubah($id)
    {

        $users = User::find($id);

            if(count($users) > 0){

            $users->name      = Input::get('name');
            $users->password      = bcrypt(Input::get('password'));
            $users->save();

            return Redirect::to('register')->with('successMessage', '('.$users->name.') has been created');
        } 
    }

    public function ambil_nis_ajax(Request $request) 
    {
    
        $siswas = Siswa::where('id',$request->get('siswas_id'))->first();
        return json_encode($siswas);
    }

    public function ambil_nip_ajax(Request $request) 
    {
    
        $gurus = Guru::where('id',$request->get('gurus_id'))->first();
        return json_encode($gurus);
    }

    public function cari(Request $request)
    {
        $cari = $request->get('cari');

        $users = User::where('username','like','%'.$cari.'%')
        ->orWhereHas('role', function ($query) use ($cari) {
            $query->where('namaRule', 'like', '%'.$cari.'%');
        })
        ->orderBy('id')
        ->paginate(20);        

        return view('admin.dashboard.pengguna.index', compact('users'));
    }
}
