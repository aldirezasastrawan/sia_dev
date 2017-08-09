<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Nilaiakademik as Nilaiakademik;
use App\Siswa as Siswa;
use Auth,DB,PDF;

class NilaiakademiksiswaController extends Controller
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
    	// dd(Auth::user()->siswas_id);
    	$nilaiakademiks = Nilaiakademik::where('siswas_id', '=', Auth::user()->siswas_id)->orderBy('kelass_id')->get();
    	$data = array('nilaiakademiks' => $nilaiakademiks); 
    	# Tampilkan View
        return view('wali.dashboard.nilai.nilaiakademik.index',$data);
    }

    public function cari(Request $request)
    {
    	Auth::user()->siswas_id;
        $cari = $request->get('cari');

        $nilaiakademiks = Nilaiakademik::where('nilai_tugas','like','%'.$cari.'%')
        ->orWhere('nilai_ulangan','like','%'.$cari.'%')
        ->orWhere('jumlah_nilai','like','%'.$cari.'%')
        ->orWhereHas('pelajaran', function ($query) use ($cari) {
            $query->where('nama_pelajaran', 'like', '%'.$cari.'%');
        })
        ->orderBy('id')
        ->paginate(20);        

        return view('wali.dashboard.nilai.nilaiakademik.index', compact('nilaiakademiks'));
    }

    public function cetak()
    {

        Auth::user()->siswas_id;
        $siswas = Siswa::where('id', '=', Auth::user()->siswas_id)->orderBy('id')->get();
        $nilaiakademiks = Nilaiakademik::where('siswas_id', '=', Auth::user()->siswas_id)->orderBy('kelass_id')->get();
        // $nilaiakademiks = Nilaiakademik::select(DB::raw("mhsNim, mhsNama, sempSemId, dsnNidn, dsnNip, dsnNama, mkkurKode, mkkurNama, mkkurJumlahSks, mkkurSemester, klsId, klsNama, krsnaNilaiTugas,krsnaNilaiUTS,krsnaNilaiUAS,krsdtBobotNilai,krsdtKodeNilai"))
        
        $data = array('siswas' => $siswas); 
        $pdf = PDF::loadView('wali.dashboard.nilai.nilaiakademik.pdf',compact('siswas','nilaiakademiks'));

        return $pdf->download('Nilai Akademik Sirojul Munir '.$siswas[0]['nis'].'( '.$siswas[0]['nama_siswa'].')..pdf');
    }
}
