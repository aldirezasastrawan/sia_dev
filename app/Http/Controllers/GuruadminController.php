<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Auth;
use App\Guru as Guru;
use App\User as User;
use DB,PDF,Validator;
use Input;
// use Validator;

class GuruadminController extends Controller
{
    function __construct()
    {
    	$this->middleware('auth');
		$this->middleware('rule:Administrator');
    }

    public function index()
    {
    	 # Tarik semua isi tabel siswa kedalam variabel
    	$gurus = Guru::all();

    	$data = array('gurus' => $gurus); 
    	# Tampilkan View
        return view('admin.dashboard.guru.index',$data);
    }

    public function tambah()
    {
    	
    	# menghitung ID secara otomatis

    	$row_count      = Guru::count();
        if ($row_count == 0) {
                $id = 1;
        }
        else {
                $gurus = Guru::orderBy('id', 'desc')->first();
                $id = $gurus->id+1;
        }
        // // $siswas = new Siswa();
        // $siswas->nis                = $data['nis'];
        // $siswas->nik                = $data['nik'];
        // $siswas->nama_siswa         = $data['nama_siswa'];
        // $siswas->jenis_kelamin      = $data['jenis_kelamin'];
        // $siswas->tempat_lahir       = $data['tempat_lahir'];
        // $data = array('siswas' => $siswas);
        

        // //melakukan save, jika gagal (return value false) lakukan harakiri
        // //error kode 500 - internel server error
        // if (! $siswas->save() )
        //   App::abort(500);

      	return view('admin.dashboard.guru.tambah');
    }

    public function simpantambah()
    {
    	
    	$gurus = new Guru;
    	$gurus->nip = Input::get('nip');
        $gurus->nuptk = Input::get('nuptk');
    	$gurus->nama_guru = Input::get('nama_guru');
    	$gurus->jenis_kelamin = Input::get('jenis_kelamin');
    	$gurus->keterangan = Input::get('keterangan');

    	if ($gurus->save()) {
                return Redirect::to('guruadmin')->with('successMessage', '('.$gurus->nama_guru.') has been created');
        }
        else {
                return Redirect::to('guruadmin')->with('errorMessage', '('.$gurus->nama_guru.') Failed to be assign');
        }
    }

    public function ubah($id)
    {
    	# mencari ID
    	$gurus = Guru::find($id);

    	$data = array('gurus' => $gurus); 
    	return view('admin.dashboard.guru.ubah',$data);
    }

    public function simpanubah($id)
    {
    	# mencari ID
    	$gurus = Guru::find($id);
    	$gurus->nama_guru = Input::get('nama_guru');
    	$gurus->jenis_kelamin = Input::get('jenis_kelamin');
    	$gurus->keterangan = Input::get('keterangan');

    	if ($gurus->save()) {
                return Redirect::to('guruadmin')->with('successMessage', '('.$gurus->nama_guru.') has been created');
        }
        else {
                return Redirect::to('guruadmin')->with('errorMessage', '('.$gurus->nama_guru.') Failed to be assign');
        }
    }

    public function hapus($nip)
    {
    	# Mencari ID
    	$gurus = Guru::where('nip', '=', $nip)->first();
    	$gurus->delete();

    	return Redirect::to('guruadmin');
    	// ->with('successMessage', 'Kelas has been deleted');
    }

    public function detail($nama_guru)
    {

        # Ambil data dalam berdasarkan berdasarkan nama
        $gurus = Guru::where('nama_guru', $nama_guru)->first();

        $data = array('gurus' => $gurus); 
        # Tampilkan view        
        return view('admin.dashboard.guru.profile', $data);    

    }

    public function cari(Request $request){
        $cari = $request->get('cari');
        $gurus = Guru::where('nama_guru','LIKE','%'.$cari.'%')
                        ->orWhere('nip', 'LIKE', '%'.$cari.'%')
                        ->orWhere('nuptk', 'LIKE', '%'.$cari.'%')
                        ->orWhere('jenis_kelamin', 'LIKE', '%'.$cari.'%')
                        ->orWhere('keterangan', 'LIKE', '%'.$cari.'%')->paginate(10);
        return view('admin.dashboard.guru.index', compact('gurus'));
    }

    public function cetak()
    {
        $gurus = Guru::all();
     
        $pdf = PDF::loadView('admin.dashboard.guru.pdf',compact('gurus'));

        return $pdf->download('Data Guru Sirojul Munir.pdf');
    }


    // protected function simpanganti(id $id)
    // {

    //       # mencari ID
    //     $users = User::find($id);
    //     $user->username = Input::get('username');
    //     $user->name = Input::get('name');
    //     $user->password = bcrypt(Input::get('password'));
    //     // $user->roles_id = DB::table('roles')->select('id')->where('namaRule','user')->first();
    //     $user->gurus_id = Input::get('gurus_id');
    //     $user->siswas_id = Input::get('siswas_id');
    //     $user->roles_id = Input::get('roles_id');
    //     $user->save();

    //     if ($gurus->save()) {
    //             return Redirect::to('guruadmin')->with('successMessage', '('.$gurus->nama_guru.') has been created');
    //     }
    //     else {
    //             return Redirect::to('guruadmin')->with('errorMessage', '('.$gurus->nama_guru.') Failed to be assign');
    //     }
    // }    
}
