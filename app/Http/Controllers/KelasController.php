<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use Auth;
use App\Kelas as Kelas;
use App\Jadwal as Jadwal;
use DB;
use Input;

class KelasController extends Controller
{
	function __construct()
	{
		$this->middleware('auth');
		$this->middleware('rule:Administrator');
	}

    public function index()
    {
    	 # Tarik semua isi tabel siswa kedalam variabel
    	$kelass = Kelas::all();

    	$data = array('kelass' => $kelass); 
    	# Tampilkan View
        return view('admin.dashboard.kelas.index',$data);
    }

    public function tambah()
    {
    	# menghitung ID secara otomatis

    	$row_count      = Kelas::count();
        if ($row_count == 0) {
                $id = 1;
        }
        else {
                $kelass = Kelas::orderBy('id', 'desc')->first();
                $id = $kelass->id+1;
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

      	return view('admin.dashboard.kelas.tambah');
    }

    public function simpantambah()
    {
    	
    	$kelass = new Kelas;
    	$kelass->nama_kelas = Input::get('nama_kelas');

        $kelass->save();
        Session::flash('sukses', 'Kelas Baru Telah Ditambahkan');

        return Redirect::to('kelas');
    	// if ($kelass->save()) {
                
     //            return Redirect::to('kelas');
     //    }
     //    else {
     //            return Redirect::to('kelas')->with('errorMessage', '('.$kelass->nama_kelas.') Failed to be assign');
     //    }
    }

    public function ubah($id)
    {
    	# mencari ID
        $kelass = Kelas::find($id);

        $data = array('kelass' => $kelass); 
        return view('admin.dashboard.kelas.ubah',$data);
    }

    public function simpanubah($id)
    {
    	# mencari ID
        $kelass = Kelas::find($id);
        $kelass->nama_kelas = Input::get('nama_kelas');

        if ($kelass->save()) {
                return Redirect::to('kelas')->with('successMessage', '('.$kelass->nama_kelas.') has been created');
        }
        else {
                return Redirect::to('kelas')->with('errorMessage', '('.$kelass->nama_kelas.') Failed to be assign');
        }
    }


    public function hapus($id)
    {
    	# Mencari ID
    	$kelass = Kelas::where('id', '=', $id)->first();
    	$kelass->delete();

    	return Redirect::to('kelas');
    	// ->with('successMessage', 'Kelas has been deleted');
    }

    public function cari(Request $request)
    {
        $cari = $request->get('cari');
        $kelass = Kelas::where('nama_kelas','LIKE','%'.$cari.'%')
                        ->orWhere('id', 'LIKE', '%'.$cari.'%')->paginate(10);
        return view('admin.dashboard.kelas.index', compact('kelass'));
    }
}
