<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use App\Http\Requests;
use App\Http\Requests\NilainonakademikRequest;
use Auth;
use App\Nilainonakademik as Nilainonakademik;
use App\Siswa as Siswa;
use App\Pelajaran as Pelajaran;
use App\Kelas as Kelas;
use DB,PDF;
use Input, Redirect;

class NilainonakademikadminController extends Controller
{
    
    function __construct()
    {
    	$this->middleware('auth');
		$this->middleware('rule:Administrator');
    }

    public function index()
    {
    	
        $nilainonakademiks = Nilainonakademik::orderBy('kelas')->paginate(10);
        $siswas = Siswa::all();
    	$data = array('nilainonakademiks' => $nilainonakademiks, 'siswas', $siswas);
    	return view('admin.dashboard.nilai.nilainonakademik.index',$data);
    }

    public function tambah()
    {
        # menghitung ID secara otomatis

        $row_count      = Nilainonakademik::count();
        if ($row_count == 0) {
                $id = 1;
        }
        else {
                $nilainonakademiks = Nilainonakademik::orderBy('id', 'desc')->first();
                $id = $nilainonakademiks->id+1;
        }

        # Mengambil data dari tabel Siswa dan Pelajaran
        $siswas             = Siswa::pluck('nama_siswa', 'id'); //Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain
        $pelajarans         = Pelajaran::pluck('nama_pelajaran', 'id'); //Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain
        $kelass             = Kelas::pluck('nama_kelas', 'id'); //Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain
        # Tampilkan View
        return view('admin.dashboard.nilai.nilainonakademik.tambah')
                    ->with(['siswas' => $siswas, 'pelajarans' => $pelajarans, 'kelass' => $kelass]);
    }

    public function simpantambah(Request $request)
    {
        //dd($request->all());
        # Isi kedalam database
        Nilainonakademik::create($request->all()); //Mengisi sesuai apa yang ada di Model
        # Kehalaman beranda dengan pesan sukses
        return Redirect('nilainonakademikadmin')->withPesan('Berhasil ditambahkan.');
   
    }

    public function ubah($id)
    {

        $siswas             = Siswa::pluck('nama_siswa', 'id'); //Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain
        $pelajarans         = Pelajaran::pluck('nama_pelajaran', 'id'); //Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain
        $kelass             = Kelas::pluck('nama_kelas', 'id'); //Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain
        $nilainonakademiks  = Nilainonakademik::find($id);

        return view('admin.dashboard.nilai.nilainonakademik.ubah')
                    ->with(['siswas' => $siswas, 'pelajarans' => $pelajarans, 'kelass' => $kelass, 'nilainonakademiks' => $nilainonakademiks]);
    }

    public function simpanubah($id)
    {
        
        $input = Input::except('_method', '_token');    //Memasukkan ke dalam database kecuali 2 field di Model
        Nilainonakademik::whereId($id)->update($input);               //Mengubah isi tabel
        return Redirect('nilainonakademikadmin')->withPesan('Berhasil diubah.');

    }

    public function hapus($id) 
    {
        # Hapus Nilainonakademik berdasarkan id
        Nilainonakademik::find($id)->delete();
        # Kembali kehalaman yang sama dengan pesan sukses
        return Redirect::to('nilainonakademikadmin');
    }

    public function cari(Request $request)
    {
        
        $cari = $request->get('cari');

        $nilainonakademiks = Nilainonakademik::where('nilai_tugas','like','%'.$cari.'%')
        ->orWhere('nilai_ulangan','like','%'.$cari.'%')
        ->orWhere('jumlah_nilai','like','%'.$cari.'%')
        ->orWhereHas('pelajaran', function ($query) use ($cari) {
            $query->where('nama_pelajaran', 'like', '%'.$cari.'%');
        })
        ->orderBy('id')
        ->paginate(20);        

        return view('admin.dashboard.nilai.nilainonakademik.index', compact('nilainonakademiks'));
    }

    public function cetak()
    {
        $nilainonakademiks = Nilainonakademik::all();
     
        $pdf = PDF::loadView('admin.dashboard.nilai.nilainonakademik.pdf',compact('nilainonakademiks'));

        return $pdf->download('Data Nilai Non Akademik Siswa Sirojul Munir.pdf');
    }

    public function indexkelas1()
    {
        # code...
        
        $siswas = Siswa::where('kelass_id', 1)->where('keterangan', 'Santri')->orderBy('nis')->get();
        
        $pelajarans = Pelajaran::pluck('nama_pelajaran', 'id'); //Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain
        $data = array('siswas' => $siswas);
        // $data['siswas'] = Siswa::with('kelass')->where('kelass_id', '=', $request->get('kelass'))->orderBy('nis')->get();

        return view('admin.dashboard.nilai.nilainonakademik.kelas.kelas1', $siswas, $data)
                ->with(['pelajarans' => $pelajarans]);
    }

    public function indexkelas2()
    {
        # code...
        $siswas = Siswa::where('kelass_id', '=', 2)->where('keterangan', 'Santri')->orderBy('nis')->get();
        $pelajarans         = Pelajaran::pluck('nama_pelajaran', 'id'); //Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain
        $data = array('siswas' => $siswas);
        // $data['siswas'] = Siswa::with('kelass')->where('kelass_id', '=', $request->get('kelass'))->orderBy('nis')->get();

        return view('admin.dashboard.nilai.nilainonakademik.kelas.kelas2', $siswas, $data)
                ->with(['pelajarans' => $pelajarans]);
    }

    public function indexkelas3()
    {
        # code...
        $siswas = Siswa::where('kelass_id', '=', 3)->where('keterangan', 'Santri')->orderBy('nis')->get();
        $pelajarans         = Pelajaran::pluck('nama_pelajaran', 'id'); //Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain
        $data = array('siswas' => $siswas);
        // $data['siswas'] = Siswa::with('kelass')->where('kelass_id', '=', $request->get('kelass'))->orderBy('nis')->get();

        return view('admin.dashboard.nilai.nilainonakademik.kelas.kelas3', $siswas, $data)
                ->with(['pelajarans' => $pelajarans]);
    }

    public function indexkelas4()
    {
        # code...
        $siswas = Siswa::where('kelass_id', '=', 4)->where('keterangan', 'Santri')->orderBy('nis')->get();
        $pelajarans         = Pelajaran::pluck('nama_pelajaran', 'id'); //Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain
        $data = array('siswas' => $siswas);
        // $data['siswas'] = Siswa::with('kelass')->where('kelass_id', '=', $request->get('kelass'))->orderBy('nis')->get();

        return view('admin.dashboard.nilai.nilainonakademik.kelas.kelas4', $siswas, $data)
                ->with(['pelajarans' => $pelajarans]);
    }

    public function indexkelas5()
    {
        # code...
        $siswas = Siswa::where('kelass_id', '=', 5)->where('keterangan', 'Santri')->orderBy('nis')->get();
        $pelajarans         = Pelajaran::pluck('nama_pelajaran', 'id'); //Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain
        $data = array('siswas' => $siswas);
        // $data['siswas'] = Siswa::with('kelass')->where('kelass_id', '=', $request->get('kelass'))->orderBy('nis')->get();

        return view('admin.dashboard.nilai.nilainonakademik.kelas.kelas5', $siswas, $data)
                ->with(['pelajarans' => $pelajarans]);
    }

    public function indexkelas6()
    {
        # code...
        $siswas = Siswa::where('kelass_id', '=', 6)->where('keterangan', 'Santri')->orderBy('nis')->get();
        $pelajarans         = Pelajaran::pluck('nama_pelajaran', 'id'); //Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain
        $data = array('siswas' => $siswas);
        // $data['siswas'] = Siswa::with('kelass')->where('kelass_id', '=', $request->get('kelass'))->orderBy('nis')->get();

        return view('admin.dashboard.nilai.nilainonakademik.kelas.kelas6', $siswas, $data)
                ->with(['pelajarans' => $pelajarans]);
    }

    public function simpannilainonakademikkelas(NilainonakademikRequest $request)
    {
        # code...
            $input = $request->except('_token', 'kelas', 'nilai_tugas', 'nilai_ulangan', 'jumlah_nilai');
            $kelass = $request->get('kelas');

            foreach ($input as $key => $val) {
                $implode = explode('-', $key);
                $siswa = $implode[1];
                // $pelajaran = $implode[1];

                $nilainonakademiks = new Nilainonakademik();
                $nilainonakademiks->siswas_id = $val['siswa_id'];
                $nilainonakademiks->kelas = $kelass;
                $nilainonakademiks->pelajarans_id = $val['pelajaran_id'];
                $nilainonakademiks->nilai_tugas = $val['nilai_tugas'];
                $nilainonakademiks->nilai_ulangan = $val['nilai_ulangan'];
                $nilainonakademiks->jumlah_nilai = $val['jumlah_nilai'];
                $nilainonakademiks->save();
            }

        return redirect::to('nilainonakademikadmin');
    }
}
