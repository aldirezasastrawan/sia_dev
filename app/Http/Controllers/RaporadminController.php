<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Siswa as Siswa;
use App\Nilaiakademik as Nilaiakademik;
use PDF;

class RaporadminController extends Controller
{
    
    function __construct()
    {
    	$this->middleware('auth');
		$this->middleware('rule:Administrator');
    }

    public function index()
    {

    	$siswas = Siswa::orderBy('keterangan')->paginate(10);

		$data = array('siswas' => $siswas); 
        return view('admin.dashboard.rapor.index', $data);
    }

    // public function detail($nama_siswa)
    // {

    //     # Ambil data dalam berdasarkan berdasarkan nis
    //     // $siswas = Siswa::where('nama_siswa', $nama_siswa)->first();
    //     $siswas    = Siswa::pluck('nama_siswa', 'id'); //Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain
    //     $nilaiakademiks    = Nilaiakademik::pluck('nama_pelajaran', 'id'); //Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain
       
    //     # Tampilkan view        
    //     return view('admin.dashboard.rapor.detail')
    //     			->with(['siswas' => $siswas, 'nilaiakademiks' => $nilaiakademiks]);
    // }

    public function cetak()
    {

    	// Auth::user()->siswas_id;
    	// // dd(Auth::user()->siswas_id);
    	// $nilaiakademiks = Nilaiakademik::where('siswas_id', '=', Auth::user()->siswas_id)->orderBy('kelass_id')->get();
    	// $data = array('nilaiakademiks' => $nilaiakademiks); 

    	// $siswas = Siswa::where('nama_siswa', $nama_siswa)->first();
        $siswas = Siswa::all();
        $nilaiakademiks = Nilaiakademik::all();
        // $nilaiakademiks = Nilaiakademik::select(DB::raw("mhsNim, mhsNama, sempSemId, dsnNidn, dsnNip, dsnNama, mkkurKode, mkkurNama, mkkurJumlahSks, mkkurSemester, klsId, klsNama, krsnaNilaiTugas,krsnaNilaiUTS,krsnaNilaiUAS,krsdtBobotNilai,krsdtKodeNilai"))
     
        $pdf = PDF::loadView('admin.dashboard.rapor.pdf',compact('siswas','nilaiakademiks'));

        return $pdf->download(' Rapor Akademik Sirojul Munir.pdf');
    }

}
