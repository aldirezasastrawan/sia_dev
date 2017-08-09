<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Siswa as Siswa;
use App\Nilaiakademik as Nilaiakademik;
use App\Nilainonakademik as Nilainonakademik;
use PDF,Auth;

class RaporsiswaController extends Controller
{
    
    function __construct()
    {
    	$this->middleware('auth');
		$this->middleware('rule:Wali');
    }

    public function index()
    {

    	# menampilkan data sesuai yg login
    	Auth::user()->siswas_id;
    	$siswas = Siswa::where('id', '=', Auth::user()->siswas_id)->orderBy('id')->get();

		$data = array('siswas' => $siswas); 
        return view('wali.dashboard.rapor.index', $data);
    }

    public function cetak()
    {

    	Auth::user()->siswas_id;
        $siswas = Siswa::where('id', '=', Auth::user()->siswas_id)->orderBy('id')->get();
        $nilaiakademiks = Nilaiakademik::where('siswas_id', '=', Auth::user()->siswas_id)->orderBy('kelass_id')->get();
        // $nilaiakademiks = Nilaiakademik::select(DB::raw("mhsNim, mhsNama, sempSemId, dsnNidn, dsnNip, dsnNama, mkkurKode, mkkurNama, mkkurJumlahSks, mkkurSemester, klsId, klsNama, krsnaNilaiTugas,krsnaNilaiUTS,krsnaNilaiUAS,krsdtBobotNilai,krsdtKodeNilai"))
     	
     	$data = array('siswas' => $siswas); 
        $pdf = PDF::loadView('wali.dashboard.rapor.pdf',compact('siswas','nilaiakademiks'));

        return $pdf->download('Raport Akademik Sirojul Munir '.$siswas[0]['nis'].'( '.$siswas[0]['nama_siswa'].')..pdf');
    }

    public function cetak1()
    {

    	Auth::user()->siswas_id;
        $siswas = Siswa::where('id', '=', Auth::user()->siswas_id)->orderBy('id')->get();
        $nilainonakademiks = Nilainonakademik::where('siswas_id', '=', Auth::user()->siswas_id)->orderBy('kelass_id')->get();
        // $nilainonakademiks = Nilaiakademik::select(DB::raw("mhsNim, mhsNama, sempSemId, dsnNidn, dsnNip, dsnNama, mkkurKode, mkkurNama, mkkurJumlahSks, mkkurSemester, klsId, klsNama, krsnaNilaiTugas,krsnaNilaiUTS,krsnaNilaiUAS,krsdtBobotNilai,krsdtKodeNilai"))
     	
     	$data = array('siswas' => $siswas); 
        $pdf = PDF::loadView('wali.dashboard.rapor.pdfnon',compact('siswas','nilainonakademiks'));

        return $pdf->download('Raport Akademik Sirojul Munir '.$siswas[0]['nis'].'( '.$siswas[0]['nama_siswa'].')..pdf');
    }
}
