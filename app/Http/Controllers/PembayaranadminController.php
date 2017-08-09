<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use App\Http\Requests;
use App\Http\Requests\PembayaranRequest;
use Auth;
use App\Pembayaran as Pembayaran;
use App\Siswa as Siswa;
use App\Kelas as Kelas;
use DB, PDF;
use Input, Redirect;

class PembayaranadminController extends Controller
{
    function __construct()
    {
    	$this->middleware('auth');
		$this->middleware('rule:Administrator');
    }

    public function index()
    {
    	
        $pembayarans = Pembayaran::orderBy('kelas')->paginate(10);
        $siswas = Siswa::all();

    	$data = array('pembayarans' => $pembayarans, 'siswas', $siswas);
    	return view('admin.dashboard.pembayaran.index',$data);
    }

    public function tambah()
    {
        # menghitung ID secara otomatis

        $row_count      = Pembayaran::count();
        if ($row_count == 0) {
                $id = 1;
        }
        else {
                $pembayarans = Pembayaran::orderBy('id', 'desc')->first();
                $id = $pembayarans->id+1;
        }

        # Mengambil data dari tabel Siswa dan Kelas
        $siswas             = Siswa::pluck('nama_siswa', 'id'); //Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain
        # Tampilkan View
        return view('admin.dashboard.pembayaran.create')
                    ->with(['siswas' => $siswas]);
    }

    public function autocomplete(Request $request)
    {
        
        $term=$request->term;
        $data = Siswa::where('nama_siswa', 'LIKE', '%' .$term. '%')
        ->take(10)
        ->get();
        $results = array();
        foreach ($data as $key => $v) {
            
            $results[]=['id'=>$v->id, 'value'=>$v->nama_siswa];
        }
        return response()->json($results);
    }

    public function simpantambah(Request $request)
    {
        // dd($request->all());
        # Isi kedalam database
        Pembayaran::create($request->all()); //Mengisi sesuai apa yang ada di Model
        # Kehalaman beranda dengan pesan sukses
        return Redirect('pembayaranadmin')->withPesan('Berhasil ditambahkan.');
   
    }

    public function ubah($id)
    {

        $pembayarans        = Pembayaran::find($id);

        return view('admin.dashboard.pembayaran.ubah')
                    ->with(['pembayarans' => $pembayarans]);
    }

    public function simpanubah($id)
    {
        
        // $input = Input::except('_method', '_token');    //Memasukkan ke dalam database kecuali 2 field di Model
        // Pembayaran::whereId($id)->update($input);               //Mengubah isi tabel
        $pembayarans = Pembayaran::find($id);

            $pembayarans->kelas              = Input::get('kelas');
            $pembayarans->tahun_ajaran       = Input::get('tahun_ajaran');
            $pembayarans->jenis_pembayaran   = Input::get('jenis_pembayaran');
            $pembayarans->keterangan         = Input::get('keterangan');
            $pembayarans->save();

        return Redirect('pembayaranadmin')->withPesan('Berhasil diubah.');

    }

    public function hapus($id) 
    {
        # Hapus pembayaran berdasarkan id
        Pembayaran::find($id)->delete();
        # Kembali kehalaman yang sama dengan pesan sukses
        return Redirect::to('pembayaranadmin');
    }

    public function cari(Request $request)
    {
        $cari = $request->get('cari');

        $pembayarans = Pembayaran::where('tahun_ajaran','like','%'.$cari.'%')
        ->orWhere('jenis_pembayaran','like','%'.$cari.'%')
        ->orWhere('jumlah_pembayaran','like','%'.$cari.'%')
        ->orWhere('keterangan','like','%'.$cari.'%')
        ->orWhereHas('siswa', function ($query) use ($cari) {
            $query->where('nama_siswa', 'like', '%'.$cari.'%');
        })
        ->orWhereHas('kelas', function ($query) use ($cari) {
            $query->where('nama_kelas', 'like', '%'.$cari.'%');
        })
        ->orderBy('id')
        ->paginate(20);        

        return view('admin.dashboard.pembayaran.index', compact('pembayarans'));
    }

    public function cetak()
    {
        $pembayarans = Pembayaran::orderBy('kelas')->paginate(10);
     
        $pdf = PDF::loadView('admin.dashboard.pembayaran.pdf',compact('pembayarans'));

        return $pdf->download('Data Pembayaran Siswa Sirojul Munir.pdf');
    }

    public function cetakkwitansi($id)
    {

         # Ambil data dalam berdasarkan berdasarkan id
        
        $pembayarans = Pembayaran::where('id', $id)->first();

        $data = array('pembayarans' => $pembayarans);
        $pdf = PDF::loadView('admin.dashboard.pembayaran.kwitansi',compact('pembayarans', 'data'));

        return $pdf->download('Kwitansi Pembayaran.pdf');
    }

    public function ambil_tahun_ajax(Request $request) {
        $siswas = Siswa::where('id',$request->get('siswas_id'))->first();
        return json_encode($siswas);
    }

    public function indexkelas1(PembayaranRequest $request)
    {
        # code...
        $siswas = Siswa::where('kelass_id', '=', 1)->orderBy('nis')->get();
        $data = array('siswas' => $siswas);
        // $data['siswas'] = Siswa::with('kelass')->where('kelass_id', '=', $request->get('kelass'))->orderBy('nis')->get();

        return view('admin.dashboard.pembayaran.kelas.kelas1', $siswas, $data);
    }

    public function simpanpembayarankelas(PembayaranRequest $request)
    {
        # code...
            $input = $request->except('_token', 'kelas', 'tahun_ajaran', 'jenis_pembayaran', 'jumlah_pembayaran', 'keterangan');
            $kelass = $request->get('kelas');

            foreach ($input as $key => $val) {
                $implode = explode('-', $key);
                $siswa = $implode[1];
                // $pelajaran = $implode[1];

                $pembayarans = new Pembayaran();
                $pembayarans->siswas_id = $val['siswa_id'];
                $pembayarans->kelas = $kelass;
                $pembayarans->tahun_ajaran = $val['tahun_ajaran'];
                $pembayarans->jenis_pembayaran = $val['jenis_pembayaran'];
                $pembayarans->jumlah_pembayaran = $val['jumlah_pembayaran'];
                $pembayarans->keterangan = $val['keterangan'];
                $pembayarans->save();
            }

        return redirect::to('pembayaranadmin');
    }
}
