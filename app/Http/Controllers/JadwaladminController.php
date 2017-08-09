<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Jadwal as Jadwal;
use App\Kelas as Kelas;
use App\Guru as Guru;
use App\Pelajaran as Pelajaran;
use App\Siswa as Siswa;
use Input, Redirect,PDF;

class JadwaladminController extends Controller
{
    function __construct()
    {
    	$this->middleware('auth');
		$this->middleware('rule:Administrator');
    }

    public function index()
    {
    	 # Tarik semua isi tabel siswa kedalam variabel
    	$jadwals = Jadwal::orderBy('kelass_id')->paginate(10);

    	$data = array('jadwals' => $jadwals); 
    	# Tampilkan View
        return view('admin.dashboard.jadwal.index',$data);
    }

    public function tambah()
    {
    	# menghitung ID secara otomatis

    	$row_count      = Jadwal::count();
        if ($row_count == 0) {
                $id = 1;
        }
        else {
                $jadwals = Jadwal::orderBy('id', 'desc')->first();
                $id = $jadwals->id+1;
        }

        # Mengambil data dari tabel Kelas, Pelajaran dan Guru
		$kelass 			= Kelas::pluck('nama_kelas', 'id');	//Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain
		$pelajarans 		= Pelajaran::pluck('nama_pelajaran', 'id');	//Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain
        $siswas              = Siswa::pluck('nama_siswa', 'id');   //Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain
		$gurus 				= Guru::pluck('nama_guru', 'id');	//Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain
		# Tampilkan View
		return view('admin.dashboard.jadwal.tambah')
					->with(['kelass' => $kelass, 'pelajarans' => $pelajarans, 'siswas' => $siswas, 'gurus' => $gurus]);
    }

    public function simpantambah(Request $request)
    {
    	//dd($request->all());
		# Isi kedalam database
		Jadwal::create($request->all()); //Mengisi sesuai apa yang ada di Model
		# Kehalaman beranda dengan pesan sukses
		return Redirect('jadwaladmin')->withPesan('Transaksi Sewa baru berhasil ditambahkan.');
	// }
    }

    public function ubah($id)
    {

    	$kelass 			= Kelas::pluck('nama_kelas', 'id');	//Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain
		$pelajarans 		= Pelajaran::pluck('nama_pelajaran', 'id');	//Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain
		$gurus 				= Guru::pluck('nama_guru', 'id');	//Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain
        $siswas              = Siswa::pluck('nama_siswa', 'id');   //Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain
		$jadwals 			= Jadwal::find($id);
		//return View::make('mobil.ubah', compact('jenis_mobil', 'mobil'));
		return view('admin.dashboard.jadwal.ubah')
					->with(['kelass' => $kelass, 'pelajarans' => $pelajarans, 'siswas' => $siswas, 'gurus' => $gurus, 'jadwals' => $jadwals]);
    }

    public function simpanubah($id)
    {
    	
    	$input = Input::except('_method', '_token');	//Memasukkan ke dalam database kecuali 2 field di Model
		Jadwal::whereId($id)->update($input);				//Mengubah isi tabel
		return Redirect('jadwaladmin')->withPesan('Berhasil diubah.');

    }

    public function hapus($id) 
    {
		# Hapus jadwal berdasarkan id
		Jadwal::find($id)->delete();
		# Kembali kehalaman yang sama dengan pesan sukses
		return Redirect::to('jadwaladmin');
	}

    public function cari(Request $request)
    {
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

        return view('admin.dashboard.jadwal.index', compact('jadwals'));
    }

    public function cetak()
    {
        $jadwals = Jadwal::orderBy('kelass_id')->paginate(10);
     
        $pdf = PDF::loadView('admin.dashboard.jadwal.pdf',compact('jadwals'));

        return $pdf->download('Data Jadwal Akademik dan Ruangan Siswa Sirojul Munir.pdf');
    }
}
