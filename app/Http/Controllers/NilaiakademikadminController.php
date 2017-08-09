<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use App\Http\Requests;
use App\Http\Requests\NilaiakademikRequest;
use Auth;
use App\Nilaiakademik as Nilaiakademik;
use App\Siswa as Siswa;
use App\Pelajaran as Pelajaran;
use App\Kelas as Kelas;
use DB,PDF, Excel;
use Input, Redirect;

class NilaiakademikadminController extends Controller
{
    
    function __construct()
    {
    	$this->middleware('auth');
		$this->middleware('rule:Administrator');
    }

    public function index()
    {
    	
        $nilaiakademiks = Nilaiakademik::orderBy('kelas')->paginate(10);
        $siswas = Siswa::all();
    	$data = array('nilaiakademiks' => $nilaiakademiks, 'siswas', $siswas);
    	return view('admin.dashboard.nilai.nilaiakademik.index',$data);
    }

    public function tambah()
    {
        # menghitung ID secara otomatis

        $row_count      = Nilaiakademik::count();
        if ($row_count == 0) {
                $id = 1;
        }
        else {
                $nilaiakademiks = Nilaiakademik::orderBy('id', 'desc')->first();
                $id = $nilaiakademiks->id+1;
        }

        # Mengambil data dari tabel Siswa dan Pelajaran
        $siswas             = Siswa::pluck('nama_siswa', 'id'); //Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain
        $pelajarans         = Pelajaran::pluck('nama_pelajaran', 'id'); //Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain
        $kelass             = Kelas::pluck('nama_kelas', 'id'); //Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain
        # Tampilkan View
        return view('admin.dashboard.nilai.nilaiakademik.tambah')
                    ->with(['siswas' => $siswas, 'pelajarans' => $pelajarans, 'kelass' => $kelass]);
    }

    public function simpantambah(Request $request)
    {
        //dd($request->all());
        # Isi kedalam database
        Nilaiakademik::create($request->all()); //Mengisi sesuai apa yang ada di Model
        # Kehalaman beranda dengan pesan sukses
        return Redirect('nilaiakademikadmin')->withPesan('Berhasil ditambahkan.');
   
    }

    public function ubah($id)
    {

        $siswas             = Siswa::pluck('nama_siswa', 'id'); //Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain
        $pelajarans         = Pelajaran::pluck('nama_pelajaran', 'id'); //Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain
        $kelass             = Kelas::pluck('nama_kelas', 'id'); //Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain
        $nilaiakademiks     = Nilaiakademik::find($id);

        return view('admin.dashboard.nilai.nilaiakademik.ubah')
                    ->with(['siswas' => $siswas, 'pelajarans' => $pelajarans, 'kelass' => $kelass, 'nilaiakademiks' => $nilaiakademiks]);
    }

    public function simpanubah($id)
    {
        
        $input = Input::except('_method', '_token');    //Memasukkan ke dalam database kecuali 2 field di Model
        Nilaiakademik::whereId($id)->update($input);               //Mengubah isi tabel
        return Redirect('nilaiakademikadmin')->withPesan('Berhasil diubah.');

    }

    public function hapus($id) 
    {
        # Hapus Nilaiakademik berdasarkan id
        Nilaiakademik::find($id)->delete();
        # Kembali kehalaman yang sama dengan pesan sukses
        return Redirect::to('nilaiakademikadmin');
    }

    public function cari(Request $request)
    {
        $cari = $request->get('cari');

        $nilaiakademiks = Nilaiakademik::where('nilai_tugas','like','%'.$cari.'%')
        ->orWhere('nilai_ulangan','like','%'.$cari.'%')
        ->orWhere('jumlah_nilai','like','%'.$cari.'%')
        ->orWhereHas('pelajaran', function ($query) use ($cari) {
            $query->where('nama_pelajaran', 'like', '%'.$cari.'%');
        })
        ->orderBy('id')
        ->paginate(20);        

        return view('admin.dashboard.nilai.nilaiakademik.index', compact('nilaiakademiks'));
    }

    public function cetak()
    {
        $nilaiakademiks = Nilaiakademik::orderBy('kelass_id')->paginate(10);
     
        $pdf = PDF::loadView('admin.dashboard.nilai.nilaiakademik.pdf',compact('nilaiakademiks'));

        return $pdf->download('Data Nilai Akademik Siswa Sirojul Munir.pdf');
    }

    // public function ambil_kelas_ajax(Request $request) 
    // {
    //     $siswas = Siswa::where('id',$request->get('siswas_id'))->first();
    //     return json_encode($siswas);
    // }

    public function importnilai(Request $request)
    {
        
        $file = $request->get('file');
        //echo $file;
        Excel::load($file, function($reader){
            $results = $reader->get()->toArray();

            echo $results;
            foreach($results as $key => $value){
                $nilaiakademiks = new Nilaiakademik();
                $nilaiakademiks->siswas_id = $value['siswas_id'];
                $nilaiakademiks->kelass_id = $value['kelass_id'];
                $nilaiakademiks->pelajarans_id = $value['pelajarans_id'];
                $nilaiakademiks->nilai_tugas = $value['nilai_tugas'];
                $nilaiakademiks->nilai_ulangan = $value['nilai_ulangan'];
                $nilaiakademiks->jumlah_nilai = $value['jumlah_nilai'];

                $nilaiakademiks->save();
            }
        });

        // Excel::load(Input::file('nilaiakademiks'),function($reader){
        //     $reader->each(function($sheet){
        //         Nilaiakademik::firstOrCreate($sheet->toArray());
        //     });
        // });
        // $data = Excel::load('file/Nilai Akademik.xlsx', function($reader) {})->get();

        // if(!empty($data) && $data->count()){
        //     foreach ($data->toArray() as $key => $value) {
        //         $insert[] = ['siswas_id' => $value['siswas_id'], 'kelas' => $value['kelas'], 'pelajarans_id' => $value['pelajarans_id'], 'nilai_tugas' => $value['nilai_tugas'], 'nilai_ulangan' => $value['nilai_ulangan'], 'jumlah_nilai' => $value['jumlah_nilai']];
        //     }

        //     if(!empty($insert)){
        //         Nilaiakademik::insert($insert);
        //         return back()->with('success','Insert Record successfully.');
        //     }
        // }
    }

    public function indexkelas1()
    {
        # code...
        $siswas = Siswa::where('kelass_id', '=', 1)->orderBy('nis')->get();
        $pelajarans         = Pelajaran::pluck('nama_pelajaran', 'id'); //Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain
        $data = array('siswas' => $siswas);
        // $data['siswas'] = Siswa::with('kelass')->where('kelass_id', '=', $request->get('kelass'))->orderBy('nis')->get();

        return view('admin.dashboard.nilai.nilaiakademik.kelas.kelas1', $siswas, $data)
                ->with(['pelajarans' => $pelajarans]);
    }

    public function indexkelas2()
    {
        # code...
        $siswas = Siswa::where('kelass_id', '=', 2)->orderBy('nis')->get();
        $pelajarans         = Pelajaran::pluck('nama_pelajaran', 'id'); //Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain
        $data = array('siswas' => $siswas);
        // $data['siswas'] = Siswa::with('kelass')->where('kelass_id', '=', $request->get('kelass'))->orderBy('nis')->get();

        return view('admin.dashboard.nilai.nilaiakademik.kelas.kelas2', $siswas, $data)
                ->with(['pelajarans' => $pelajarans]);
    }

    public function indexkelas3()
    {
        # code...
        $siswas = Siswa::where('kelass_id', '=', 3)->orderBy('nis')->get();
        $pelajarans         = Pelajaran::pluck('nama_pelajaran', 'id'); //Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain
        $data = array('siswas' => $siswas);
        // $data['siswas'] = Siswa::with('kelass')->where('kelass_id', '=', $request->get('kelass'))->orderBy('nis')->get();

        return view('admin.dashboard.nilai.nilaiakademik.kelas.kelas3', $siswas, $data)
                ->with(['pelajarans' => $pelajarans]);
    }

    public function indexkelas4()
    {
        # code...
        $siswas = Siswa::where('kelass_id', '=', 4)->orderBy('nis')->get();
        $pelajarans         = Pelajaran::pluck('nama_pelajaran', 'id'); //Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain
        $data = array('siswas' => $siswas);
        // $data['siswas'] = Siswa::with('kelass')->where('kelass_id', '=', $request->get('kelass'))->orderBy('nis')->get();

        return view('admin.dashboard.nilai.nilaiakademik.kelas.kelas4', $siswas, $data)
                ->with(['pelajarans' => $pelajarans]);
    }

    public function indexkelas5()
    {
        # code...
        $siswas = Siswa::where('kelass_id', '=', 5)->orderBy('nis')->get();
        $pelajarans         = Pelajaran::pluck('nama_pelajaran', 'id'); //Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain
        $data = array('siswas' => $siswas);
        // $data['siswas'] = Siswa::with('kelass')->where('kelass_id', '=', $request->get('kelass'))->orderBy('nis')->get();

        return view('admin.dashboard.nilai.nilaiakademik.kelas.kelas5', $siswas, $data)
                ->with(['pelajarans' => $pelajarans]);
    }

    public function indexkelas6()
    {
        # code...
        $siswas = Siswa::where('kelass_id', '=', 6)->orderBy('nis')->get();
        $pelajarans         = Pelajaran::pluck('nama_pelajaran', 'id'); //Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain
        $data = array('siswas' => $siswas);
        // $data['siswas'] = Siswa::with('kelass')->where('kelass_id', '=', $request->get('kelass'))->orderBy('nis')->get();

        return view('admin.dashboard.nilai.nilaiakademik.kelas.kelas6', $siswas, $data)
                ->with(['pelajarans' => $pelajarans]);
    }

    public function simpannilaiakademikkelas(NilaiakademikRequest $request)
    {
        # code...
            $input = $request->except('_token', 'kelas', 'nilai_tugas', 'nilai_ulangan', 'jumlah_nilai');
            $kelass = $request->get('kelas');

            foreach ($input as $key => $val) {
                $implode = explode('-', $key);
                $siswa = $implode[1];
                // $pelajaran = $implode[1];

                $nilaiakademiks = new Nilaiakademik();
                $nilaiakademiks->siswas_id = $val['siswa_id'];
                $nilaiakademiks->kelas = $kelass;
                $nilaiakademiks->pelajarans_id = $val['pelajaran_id'];
                $nilaiakademiks->nilai_tugas = $val['nilai_tugas'];
                $nilaiakademiks->nilai_ulangan = $val['nilai_ulangan'];
                $nilaiakademiks->jumlah_nilai = $val['jumlah_nilai'];
                $nilaiakademiks->save();
            }

        return redirect::to('nilaiakademikadmin');
    }

}
