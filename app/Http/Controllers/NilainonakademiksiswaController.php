<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Nilainonakademik as Nilainonakademik;
use App\Siswa as Siswa;
use Auth,DB, PDF;

class NilainonakademiksiswaController extends Controller
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
    	$nilainonakademiks = Nilainonakademik::where('siswas_id', '=', Auth::user()->siswas_id)->orderBy('kelass_id')->get();
    	$data = array('nilainonakademiks' => $nilainonakademiks); 
    	# Tampilkan View
        return view('wali.dashboard.nilai.nilainonakademik.index',$data);
    }

    public function cari(Request $request)
    {
    	Auth::user()->siswas_id;
        $cari = $request->get('cari');

        $nilainonakademiks = Nilainonakademik::where('nilai_tugas','like','%'.$cari.'%')
        ->orWhere('nilai_ulangan','like','%'.$cari.'%')
        ->orWhere('jumlah_nilai','like','%'.$cari.'%')
        ->orWhereHas('pelajaran', function ($query) use ($cari) {
            $query->where('nama_pelajaran', 'like', '%'.$cari.'%');
        })
        ->orderBy('id')
        ->paginate(20);        

        return view('wali.dashboard.nilai.nilaiakademik.index', compact('nilainonakademiks'));
    }

    public function cetak()
    {
        Auth::user()->siswas_id;
        $siswas = Siswa::where('id', '=', Auth::user()->siswas_id)->orderBy('id')->get();
        $nilainonakademiks = Nilainonakademik::where('siswas_id', '=', Auth::user()->siswas_id)->orderBy('kelass_id')->get();

        $data = array('siswas' => $siswas); 
        $pdf = PDF::loadView('wali.dashboard.nilai.nilainonakademik.pdf',compact('nilainonakademiks'));

        return $pdf->download('Nilai Non Akademik Sirojul Munir '.$siswas[0]['nis'].'( '.$siswas[0]['nama_siswa'].')..pdf');
    }

}
