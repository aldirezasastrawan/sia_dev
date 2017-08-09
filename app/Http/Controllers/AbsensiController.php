<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AbsensiRequest;
use Illuminate\Support\Facades;
use App\Http\Requests;
use Auth;
use App\Absensi as Absensi;
use App\Siswa as Siswa;
use App\Kelas as Kelas;
use DB,PDF, Validator;
use Input, Redirect;

class AbsensiController extends Controller
{
    
    function __construct()
    {
    	$this->middleware('auth');
		$this->middleware('rule:Administrator');
    }

    public function index()
    {
    	
        $absensis = Absensi::orderBy('kelas')->paginate(10);
        $siswas = Siswa::all();
    	$data = array('absensis' => $absensis, 'siswas', $siswas);
    	return view('admin.dashboard.absensi.index',$data);
    }

    public function tambah()
    {
        # menghitung ID secara otomatis

        $row_count      = Absensi::count();
        if ($row_count == 0) {
                $id = 1;
        }
        else {
                $absensis = Absensi::orderBy('id', 'desc')->first();
                $id = $absensis->id+1;
        }

        # Mengambil data dari tabel Siswa dan Kelas
        $siswas             = Siswa::pluck('nama_siswa', 'id'); //Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain
        $kelass             = Kelas::pluck('nama_kelas', 'id'); //Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain
        # Tampilkan View
        return view('admin.dashboard.absensi.tambah')
                    ->with(['siswas' => $siswas, 'kelass' => $kelass]);
    }

    public function simpantambah(Request $request)
    {
        // dd($request->all());
        # Isi kedalam database
        // Absensi::create($request->all()); //Mengisi sesuai apa yang ada di Model
        // # Kehalaman beranda dengan pesan sukses
        // return Redirect('absensi')->withPesan('Berhasil ditambahkan.');
        $input =$request->all();
        $pesan = array(
            'tanggal.required'                      => ' Tanggal dibutuhkan.',
            'tanggal.date.after:d M Y'              => ' harus berupa tanggal setelah atau sama dengan tanggal :Hari ini.',
        );

        $aturan = array(

            'tanggal' => 'required|date|after:d M Y',
        );
        

        $validator = Validator::make($input,$aturan, $pesan);

        if($validator->fails()) {
            # Kembali kehalaman yang sama dengan pesan error
            return Redirect::back()->withErrors($validator)->withInput();

          # Bila validasi sukses
        }

        $absensis = new Absensi;
        $absensis->kelass_id = $input['kelass_id']; //atau bisa $input['prodiKode']
        $absensis->tanggal = $input['tanggal'];
        $absensis->siswas_id = $input['siswas_id'];
        $absensis->thn_ajaran = $input['thn_ajaran'];
        $absensis->keterangan = $input['keterangan'];
        if (! $absensis->save())
          App::abort(500);

        return Redirect::to('absensi')
                          ->with('successMessage','Data Absensi "'.$input['kelass_id'].'" telah berhasil dibuat.');
   
    }


    public function ubah($id)
    {

        $siswas             = Siswa::pluck('nama_siswa', 'id'); //Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain
        $kelass             = Kelas::pluck('nama_kelas', 'id'); //Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain
        $absensis        	= Absensi::find($id);

        return view('admin.dashboard.absensi.ubah')
                    ->with(['siswas' => $siswas, 'kelass' => $kelass, 'absensis' => $absensis]);
    }

    public function simpanubah($id)
    {
        
        $input = Input::except('_method', '_token');    //Memasukkan ke dalam database kecuali 2 field di Model
        Absensi::whereId($id)->update($input);               //Mengubah isi tabel
        return Redirect('absensi')->withPesan('Berhasil diubah.');

    }

    public function hapus($id) 
    {
        # Hapus Absensi berdasarkan id
        Absensi::find($id)->delete();
        # Kembali kehalaman yang sama dengan pesan sukses
        return Redirect::to('absensi');
    }

    public function cari(Request $request)
    {
        $cari = $request->get('cari');

        $absensis = Absensi::where('tanggal','like','%'.$cari.'%')
        ->orWhere('thn_ajaran','like','%'.$cari.'%')
        ->orWhere('keterangan','like','%'.$cari.'%')
        ->orWhereHas('siswa', function ($query) use ($cari) {
            $query->where('nama_siswa', 'like', '%'.$cari.'%');
        })
        ->orderBy('id')
        ->paginate(20);        

        return view('admin.dashboard.absensi.index', compact('absensis'));
    }

    public function cetak()
    {
        $absensis = Absensi::all();
     
        $pdf = PDF::loadView('admin.dashboard.absensi.pdf',compact('absensis'));

        return $pdf->download('Data Absensi Akademik Siswa Sirojul Munir.pdf');
    }

    public function indexkelas1(AbsensiRequest $request)
    {
        # code...
        $siswas = Siswa::where('kelass_id', '=', 1)->orderBy('nis')->get();
        $data = array('siswas' => $siswas);
        // $data['siswas'] = Siswa::with('kelass')->where('kelass_id', '=', $request->get('kelass'))->orderBy('nis')->get();

        return view('admin.dashboard.absensi.kelas.kelas1', $siswas, $data);
    }

    public function simpanabsensikelas(AbsensiRequest $request)
    {
        # code...
            $input = $request->except('_token', 'kelas', 'tanggal', 'tahun_ajaran');
            $kelass = $request->get('kelas');

            foreach ($input as $key => $val) {
            $implode = explode('-', $key);
            $siswa = $implode[1];

            $absensis = new Absensi();
            $absensis->siswas_id = $siswa;
            $absensis->kelas = $kelass;
            $absensis->tanggal = $request->get("tanggal");
            $absensis->thn_ajaran = $request->get('tahun_ajaran');
            $absensis->keterangan = $input[$key]['keterangan'];
            $absensis->save();
        }

        return redirect::to('absensi');
    }

    public function indexkelas2()
    {
        # code...
        $siswas = Siswa::where('kelass_id', '=', 2)->orderBy('nis')->get();
        $data = array('siswas' => $siswas);
        // $data['siswas'] = Siswa::with('kelass')->where('kelass_id', '=', $request->get('kelass'))->orderBy('nis')->get();

        return view('admin.dashboard.absensi.kelas.kelas2', $siswas, $data);
    }

    public function indexkelas3()
    {
        # code...
        $siswas = Siswa::where('kelass_id', '=', 3)->orderBy('nis')->get();
        $data = array('siswas' => $siswas);
        // $data['siswas'] = Siswa::with('kelass')->where('kelass_id', '=', $request->get('kelass'))->orderBy('nis')->get();

        return view('admin.dashboard.absensi.kelas.kelas3', $siswas, $data);
    }

    public function indexkelas4()
    {
        # code...
        $siswas = Siswa::where('kelass_id', '=', 4)->orderBy('nis')->get();
        $data = array('siswas' => $siswas);
        // $data['siswas'] = Siswa::with('kelass')->where('kelass_id', '=', $request->get('kelass'))->orderBy('nis')->get();

        return view('admin.dashboard.absensi.kelas.kelas4', $siswas, $data);
    }

    public function indexkelas5()
    {
        # code...
        $siswas = Siswa::where('kelass_id', '=', 5)->orderBy('nis')->get();
        $data = array('siswas' => $siswas);
        // $data['siswas'] = Siswa::with('kelass')->where('kelass_id', '=', $request->get('kelass'))->orderBy('nis')->get();

        return view('admin.dashboard.absensi.kelas.kelas5', $siswas, $data);
    }

    public function indexkelas6()
    {
        # code...
        $siswas = Siswa::where('kelass_id', '=', 6)->orderBy('nis')->get();
        $data = array('siswas' => $siswas);
        // $data['siswas'] = Siswa::with('kelass')->where('kelass_id', '=', $request->get('kelass'))->orderBy('nis')->get();

        return view('admin.dashboard.absensi.kelas.kelas6', $siswas, $data);
    }
}
