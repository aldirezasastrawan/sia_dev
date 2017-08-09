<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Jadwal as Jadwal;
use App\Guru as Guru;
use Auth,DB, PDF;

class JadwalguruController extends Controller
{
    
    function __construct()
    {
    	$this->middleware('auth');
		$this->middleware('rule:Guru');
    }

    public function index()
    {
    	 # menampilkan data sesuai yg login
    	Auth::user()->gurus_id;
    	// dd(Auth::user()->gurus_id);
    	$jadwals = Jadwal::where('gurus_id', '=', Auth::user()->gurus_id)->orderBy('tahun_ajaran', 'kelass_id')->get();
    	$data = array('jadwals' => $jadwals); 
    	# Tampilkan View
        return view('guru.dashboard.jadwal.index',$data);
    }

    public function cari(Request $request)
    {
        Auth::user()->gurus_id;
        $cari = $request->get('cari');
        // $jadwals = Jadwal::where('kelas->nama_kelas','LIKE','%'.$cari.'%')
        //                 ->orWhere('pelajarans_id', 'LIKE', '%'.$cari.'%')
        //                 ->orWhere('gurus_id', 'LIKE', '%'.$cari.'%')->paginate(10);
        // return view('admin.dashboard.jadwal.index', compact('jadwals'));
        
        // $jadwals = Jadwal::whereHas('kelas', function($query) use($cari) {
        // $query->where('nama_kelas','like', '%'.$cari.'%');})
        //         ->orWhere('hari','like', '%'.$cari.'%')->get();

        $jadwals = Jadwal::where('hari','like','%'.$cari.'%')
        ->orWhere('jam','like','%'.$cari.'%')
        ->orWhere('gedung','like','%'.$cari.'%')
        ->orWhere('ruangan','like','%'.$cari.'%')
        ->orWhereHas('pelajaran', function ($query) use ($cari) {
            $query->where('nama_pelajaran', 'like', '%'.$cari.'%');
        })
        ->orderBy('id')
        ->paginate(20);        

        return view('guru.dashboard.jadwal.index', compact('jadwals'));
    }

    public function cetak()
    {

        Auth::user()->gurus_id;
        $gurus = Guru::where('id', '=', Auth::user()->gurus_id)->orderBy('id')->get();
        $jadwals = Jadwal::where('gurus_id', '=', Auth::user()->gurus_id)->orderBy('tahun_ajaran', 'kelass_id')->get();
        // $nilaiakademiks = Nilaiakademik::select(DB::raw("mhsNim, mhsNama, sempSemId, dsnNidn, dsnNip, dsnNama, mkkurKode, mkkurNama, mkkurJumlahSks, mkkurSemester, klsId, klsNama, krsnaNilaiTugas,krsnaNilaiUTS,krsnaNilaiUAS,krsdtBobotNilai,krsdtKodeNilai"))
        
        $data = array('gurus' => $gurus);
        $pdf = PDF::loadView('guru.dashboard.jadwal.pdf',compact('jadwals'));

        return $pdf->download('Jadwal Mengajar' .$gurus[0]['nip'].'( '.$gurus[0]['nama_guru'].'). Guru Sirojul Munir .pdf');
    }
}
