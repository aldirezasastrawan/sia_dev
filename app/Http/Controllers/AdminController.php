<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use Auth;
use DB;
use Input;
// use Validator;

class AdminController extends Controller
{
	
	function __construct()
	{
		$this->middleware('auth');
		$this->middleware('rule:Administrator');
	}

	public function dashboard()
    {

        return view('admin.dashboard.index.mainadmin');
    
    }


    // public function index()
    // {
    //     # Tarik semua isi tabel siswa kedalam variabel
    //     $siswas = Siswa::all();
    //     // $siswas = Siswa::select(DB::raw("nis, nama_siswa, kelas.nama_kelas, jenis_kelamin, alamat, keterangan"))
    //     // ->leftJoin('kelas', 'siswas.siswas_id', '=', 'kelas.siswas_id')
    //     // ->get();
    //     // $kelas = array('' => 'Choose a Kelas') + Kelas::lists('nama_kelas', 'id')->all();
    //     // $siswas = DB::table('siswas')->get();


    //     $data = array('siswas' => $siswas); 
    //     // $kelas = array(
    //     //     'siswas' =>  DB::table('kelas')->get());
    //     # Tampilkan View
    //     return view('admin.dashboard.siswa.view',$data);
    //     // return view('admin.dashboard.siswa.view', compact('siswas'));
    // }

    // public function tambah()
    // {

    //     $row_count      = Siswa::count();
    //     if ($row_count == 0) {
    //             $id = 1;
    //     }
    //     else {
    //             $siswas = Siswa::orderBy('id', 'desc')->first();
    //             $id = $siswas->id+1;
    //     }
    //     // // $siswas = new Siswa();
    //     // $siswas->nis                = $data['nis'];
    //     // $siswas->nik                = $data['nik'];
    //     // $siswas->nama_siswa         = $data['nama_siswa'];
    //     // $siswas->jenis_kelamin      = $data['jenis_kelamin'];
    //     // $siswas->tempat_lahir       = $data['tempat_lahir'];
    //     // $data = array('siswas' => $siswas);
    //     $data = array(
    //         'siswas' =>  DB::table('kelass')->get()
    //     );

    //     // //melakukan save, jika gagal (return value false) lakukan harakiri
    //     // //error kode 500 - internel server error
    //     // if (! $siswas->save() )
    //     //   App::abort(500);

    //   return view('admin.dashboard.siswa.tambah',$data);

    // }

    // public function simpantambah()
    // {

    //     // $input =$request->all();
    //     // $pesan = array(
    //     //     'nis.required'              => 'NIS dibutuhkan.',            
    //     //     'nis.unique'                => 'NIS sudah digunakan.',
    //     //     'nama_siswa.required'       => 'Nama Siswa dibutuhkan.',
    //     //     'jenis_kelamin.required'    => 'Jenis Siswa dibutuhkan.',            
    //     //     'tempat_lahir.required'     => 'Tempat Lahir Siswa dibutuhkan.',
    //     //     'tanggal_lahir.required'    => 'Tanggal Lahir Siswa dibutuhkan.',
    //     //     'alamat.required'           => 'Alamat Siswa dibutuhkan.',
    //     //     'tlp.required'              => 'Telpon Siswa dibutuhkan.',
    //     //     'kelas_id.required'         => 'Kelas Siswa dibutuhkan.',
    //     //     'keterangan.required'       => ' Keterangan dibutuhkan.',
    //     // );

    //     // $aturan = array(

    //     //     'nis'                       => 'required|unique:siswas',
    //     //     'nama_siswa'                => 'required|max:60',
    //     //     'jenis_kelamin'             => 'required',
    //     //     'tempat_lahir'              => 'required|max:20',
    //     //     'tanggal_lahir'             => 'required',
    //     //     'alamat'                    => 'required|max:100',
    //     //     'tlp'                       => 'required|max:20',
    //     //     'kelas_id'                  => 'required',
    //     //     'keterangan'                    => 'required',

    //     // );
        

    //     // $validator = Validator::make($input,$aturan, $pesan);

    //     // if($validator->fails()) {
    //     //     # Kembali kehalaman yang sama dengan pesan error
    //     //     return Redirect::back()->withErrors($validator)->withInput();

    //     //   # Bila validasi sukses
    //     // }

    //     $siswas = new Siswa;
    //     // $siswas->nis = ['nis']; //atau bisa ['prodiKode']
    //     // $siswas->nik = ['nik'];
    //     // $siswas->nama_siswa = ['nama_siswa'];
    //     // $siswas->jenis_kelamin = ['jenis_kelamin'];
    //     // $siswas->tempat_lahir = ['tempat_lahir'];
    //     // $siswas->tanggal_lahir = ['tanggal_lahir'];
    //     // $siswas->alamat = ['alamat'];
    //     // $siswas->tlp = ['tlp'];
    //     // $siswas->kelas_id = ['kelas_id'];
    //     // $siswas->keterangan = ['keterangan'];

    //     // if (! $siswas->save())
    //     //   App::abort(500);

    //     // return Redirect::action('siswa\AdminController@index')
    //     //                   ->with('successMessage','Data Siswa "'.['nama_siswa'].'" telah berhasil ditambahkan.'); 
    //     $siswas->nis = Input::get('nis');
    //     $siswas->nik = Input::get('nik');
    //     $siswas->nama_siswa = Input::get('nama_siswa');
    //     $siswas->jenis_kelamin = Input::get('jenis_kelamin');
    //     $siswas->tempat_lahir = Input::get('tempat_lahir');
    //     $siswas->tanggal_lahir = Input::get('tanggal_lahir');
    //     $siswas->alamat = Input::get('alamat');
    //     $siswas->tlp = Input::get('tlp');
    //     $siswas->kelass_id = Input::get('kelass_id');
    //     $siswas->tahun_ajaran = Input::get('tahun_ajaran');
    //     $siswas->keterangan = Input::get('keterangan');

    //     if ($siswas->save()) {
    //             return view('admin.dashboard.siswa.view')->with('successMessage', '('.$siswas->nis.' - '.$siswas->nama_siswa.') has been assigned');
    //     }
    //     else {
    //             return view('admin.dashboard.siswa.view')->with('errorMessage', '('.$siswas->nis.' - '.$siswas->nama_siswa.') Failed to be assign');
    //     }


    // }

    // public function hapus($nis)
    // {
    // 	# Mencari ID
    //     $siswas = Siswa::where('nis', '=', $nis)->first();
    //     $siswas->delete();

    //     return Redirect::to('siswa');
    //     // ->with('successMessage', 'Siswa has been deleted');
    // }

    // public function ubah($nis)
    // {
    // 	# mencari ID
    //     $siswas = Siswa::find($nis);
    //     $kelass = Kelas::orderBy('id')->get();

    //     // $data = array(
    //     //     'siswas' =>  DB::table('kelass')->get()
    //     // );

    //     $data = array('siswas' => $siswas, 'kelass'=> $kelass); 
    //     return view('admin.dashboard.siswa.ubah',$data)->with('siswas', $kelass);
    // }
}
