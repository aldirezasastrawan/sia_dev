<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Pembayaran as Pembayaran;
use App\Siswa as Siswa;
use App\Kelas as Kelas;
use Auth,DB, PDF;

class PembayaransiswaController extends Controller
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
    	$pembayarans = Pembayaran::where('siswas_id', '=', Auth::user()->siswas_id)->orderBy('kelass_id')->get();
    	$data = array('pembayarans' => $pembayarans); 
    	# Tampilkan View
        return view('wali.dashboard.pembayaran.index',$data);
    }

    public function cari(Request $request)
    {
    	Auth::user()->siswas_id;
        $cari = $request->get('cari');

        $pembayarans = Pembayaran::where('tahun_ajaran','like','%'.$cari.'%')
        ->orWhere('jenis_pembayaran','like','%'.$cari.'%')
        ->orWhere('jumlah_pembayaran','like','%'.$cari.'%')
        ->orWhere('keterangan','like','%'.$cari.'%')
        ->orWhereHas('kelas', function ($query) use ($cari) {
            $query->where('nama_kelas', 'like', '%'.$cari.'%');
        })
        ->orderBy('id')
        ->paginate(20);        

        return view('wali.dashboard.pembayaran.index', compact('pembayarans'));
    }

    public function cetak()
    {

        Auth::user()->siswas_id;
        $siswas = Siswa::where('id', '=', Auth::user()->siswas_id)->orderBy('id')->get();
        $pembayarans = Pembayaran::where('siswas_id', '=', Auth::user()->siswas_id)->orderBy('kelass_id')->get();
        // $nilaiakademiks = Nilaiakademik::select(DB::raw("mhsNim, mhsNama, sempSemId, dsnNidn, dsnNip, dsnNama, mkkurKode, mkkurNama, mkkurJumlahSks, mkkurSemester, klsId, klsNama, krsnaNilaiTugas,krsnaNilaiUTS,krsnaNilaiUAS,krsdtBobotNilai,krsdtKodeNilai"))
        
        $data = array('siswas' => $siswas); 
        $pdf = PDF::loadView('wali.dashboard.pembayaran.pdf',compact('siswas','pembayarans'));

        return $pdf->download('Pembayaran Akademik Sirojul Munir '.$siswas[0]['nis'].'( '.$siswas[0]['nama_siswa'].')..pdf');
    }
}
