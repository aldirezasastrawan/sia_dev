<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use Auth;
use App\Pelajaran as Pelajaran;
use DB;
use Input;

class PelajaranController extends Controller
{
    function __construct()
    {
    	$this->middleware('auth');
		$this->middleware('rule:Administrator');
    }

    public function index()
    {
    	 # Tarik semua isi tabel siswa kedalam variabel
    	$pelajarans = Pelajaran::all();

    	$data = array('pelajarans' => $pelajarans); 
    	# Tampilkan View
        return view('admin.dashboard.pelajaran.index',$data);
    }

    public function tambah()
    {
    	# menghitung ID secara otomatis

    	$row_count      = Pelajaran::count();
        if ($row_count == 0) {
                $id = 1;
        }
        else {
                $pelajarans = Pelajaran::orderBy('id', 'desc')->first();
                $id = $pelajarans->id+1;
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

      	return view('admin.dashboard.pelajaran.tambah');
    }

    public function simpantambah()
    {
    	
    	$pelajarans = new Pelajaran;
    	$pelajarans->nama_pelajaran = Input::get('nama_pelajaran');
        $pelajarans->durasi = Input::get('durasi');
    	$pelajarans->keterangan = Input::get('keterangan');

    	if ($pelajarans->save()) {
                return Redirect::to('pelajaran')->with('successMessage', '('.$pelajarans->nama_pelajaran.') has been created');
        }
        else {
                return Redirect::to('pelajaran')->with('errorMessage', '('.$pelajarans->nama_pelajaran.') Failed to be assign');
        }
    }

    public function ubah($id)
    {
    	# mencari ID
    	$pelajarans = Pelajaran::find($id);

    	$data = array('pelajarans' => $pelajarans); 
    	return view('admin.dashboard.pelajaran.ubah',$data);
    }

    public function simpanubah($id)
    {
    	# mencari ID
    	$pelajarans = Pelajaran::find($id);
    	$pelajarans->nama_pelajaran = Input::get('nama_pelajaran');
        $pelajarans->durasi = Input::get('durasi');
    	$pelajarans->keterangan = Input::get('keterangan');

    	if ($pelajarans->save()) {
                return Redirect::to('pelajaran')->with('successMessage', '('.$pelajarans->nama_pelajaran.') has been created');
        }
        else {
                return Redirect::to('pelajaran')->with('errorMessage', '('.$pelajarans->nama_pelajaran.') Failed to be assign');
        }
    }

    public function detailkelas($value='')
    {
    	# code...
    }

    public function hapus($id)
    {
    	# Mencari ID
    	$pelajarans = Pelajaran::where('id', '=', $id)->first();
    	$pelajarans->delete();

    	return Redirect::to('pelajaran');
    	// ->with('successMessage', 'Kelas has been deleted');
    }

    public function cari(Request $request)
    {
        $cari = $request->get('cari');
        $pelajarans = Pelajaran::where('nama_pelajaran','LIKE','%'.$cari.'%')
                        ->orWhere('keterangan', 'LIKE', '%'.$cari.'%')->paginate(10);
        return view('admin.dashboard.pelajaran.index', compact('pelajarans'));
    }
}
