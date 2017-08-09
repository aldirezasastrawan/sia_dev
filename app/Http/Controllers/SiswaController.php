<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;
use App\Siswa as Siswa;
use App\Kelas as Kelas;
use DB;
use PDF;
use Input, Validator;
use Response;

// use Validator;

class SiswaController extends Controller
{
    
    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('rule:Administrator');
    }
    
    public function index()
    {
        # Tarik semua isi tabel siswa kedalam variabel
        // $siswas = Siswa::all();
        $siswas = Siswa::orderBy('nis','ASC')->paginate();
    
        $data = array('siswas' => $siswas); 
        # Tampilkan View
        return view('admin.dashboard.siswa.index',$data);
        // return view('admin.dashboard.siswa.view', compact('siswas'));
    }

    public function tambah()
    {

        $row_count      = Siswa::count();
        if ($row_count == 0) {
                $id = 1;
        }
        else {
                $siswas = Siswa::orderBy('id', 'desc')->first();
                $id = $siswas->id+1;
        }
        
        $kelass = Kelas::pluck('nama_kelas', 'id');   //Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain

        return view('admin.dashboard.siswa.tambah')
                ->with(['kelass' => $kelass]);
      // return view('admin.dashboard.siswa.tambah',$data);

    }

    public function simpantambah(Request $request)
    {

        $input =$request->all();
        $pesan = array(
            'nis.required'              => ' Nis Siswa dibutuhkan.',            
            'nis.unique'                => 'Nis Siswa sudah digunakan.',
            'nama_siswa.required'       => 'Nama Siswa dibutuhkan.',
            'nama_siswa.unique'         => 'Nama Siswa sudah digunakan.',
            'jenis_kelamin.required'    => 'Jenis Kelamin Siswa dibutuhkan.',
            'tempat_lahir.required'     => 'Tempat Lahir Siswa dibutuhkan.',   
            'tanggal_lahir.required'    => 'Tanggal Lahir Siswa dibutuhkan.',             
            'alamat.required'           => 'Alamat Siswa dibutuhkan.',  
            'tlp.required'              => 'Telpon Siswa dibutuhkan.',
            'tlp.unique'                => 'Telpon Siswa sudah digunakan.',
            'tahun_ajaran.required'     => 'Tahun Ajaran Siswa dibutuhkan.',
            'nama_wali.required'        => 'Nama Wali Siswa dibutuhkan.', 
            'keterangan.required'       => 'Keterangan Siswa dibutuhkan.',   
        );

        $aturan = array(

            'nis'               => 'required|unique:siswas',
            'nama_siswa'        => 'required|unique:siswas',
            'jenis_kelamin'     => 'required',
            'tempat_lahir'      => 'required',
            'tanggal_lahir'     => 'required',
            'alamat'            => 'required',
            'tlp'               => 'required|unique:siswas',
            'tahun_ajaran'      => 'required',
            'nama_wali'      => 'required',
            'keterangan'        => 'required',
        );
        

        $validator = Validator::make($input,$aturan, $pesan);

        if($validator->fails()) {
            # Kembali kehalaman yang sama dengan pesan error
            return Redirect::back()->withErrors($validator)->withInput();

          # Bila validasi sukses
        }

        $siswas = new Siswa;
        $siswas->nis = $request['nis']; //atau bisa $input['prodiKode']
        $siswas->nik = $input['nik'];
        $siswas->nama_siswa = $input['nama_siswa'];
        $siswas->kelass_id = $input['kelass_id'];
        $siswas->jenis_kelamin = $input['jenis_kelamin'];
        $siswas->tempat_lahir = $input['tempat_lahir'];
        $siswas->tanggal_lahir = $input['tanggal_lahir'];
        $siswas->alamat = $input['alamat'];
        $siswas->tlp = $input['tlp'];
        $siswas->tahun_ajaran = $input['tahun_ajaran'];
        $siswas->nama_wali = $input['nama_wali'];
        $siswas->keterangan = $input['keterangan'];
        if (! $siswas->save())
          App::abort(500);

        return Redirect::to('siswa')
                          ->with('successMessage','Data Siswa "'.$input['nama_siswa'].'" telah berhasil dibuat.');
   

   }

    public function hapus($nis)
    {
        # Mencari ID
        $siswas = Siswa::where('nis', '=', $nis)->first();
        $siswas->delete();

        return Redirect::to('siswa');
        // ->with('successMessage', 'Siswa has been deleted');
    }

    public function ubah($id)
    {
        // # mencari ID
        // $siswas = Siswa::find($id);
        // $kelass = Kelas::orderBy('id')->get();

        // // $data = array(
        // //     'siswas' =>  DB::table('kelass')->get()
        // // );

        // $data = array('siswas' => $siswas, 'kelass'=> $kelass); 
        // return view('admin.dashboard.siswa.ubah',$data)->with('siswas', $kelass);
         #mencari ID
        $siswas = Siswa::find($id);
        $kelass = Kelas::pluck('nama_kelas', 'id');   //Eloquent Query Laravel sama dengan SQL Inner Join untuk memanggil variabel isi tabel lain


        $data = array('siswas' => $siswas, 'kelass' => $kelass); 
        return view('admin.dashboard.siswa.ubah',$data)
                ->with(['kelass' => $kelass]);
    }

    public function simpanubah($id)
    {
        
        # Tarik semua inputan dari form kedalam variabel input
        $input = Input::all();
        # Buat aturan validasi
        $aturan = array(
            'nis'               => 'required',
            'nama_siswa'        => 'required',
            'jenis_kelamin'     => 'required',
            'tempat_lahir'      => 'required',
            'tanggal_lahir'     => 'required',
            'alamat'            => 'required',
            'tlp'               => 'required',
            'tahun_ajaran'      => 'required',
            'keterangan'        => 'required',
        );
        # Buat pesan error validasi manual
        $pesan = array(
            'nis.required'              => ' Nis Siswa dibutuhkan.',            
            // 'nis.unique'                => 'Nis Siswa sudah digunakan.',
            'nama_siswa.required'       => 'Nama Siswa dibutuhkan.',
            'jenis_kelamin.required'    => 'Jenis Kelamin Siswa dibutuhkan.',
            'tempat_lahir.required'     => 'Tempat Lahir Siswa dibutuhkan.',   
            'tanggal_lahir.required'    => 'Tanggal Lahir Siswa dibutuhkan.',             
            'alamat.required'           => 'Alamat Siswa dibutuhkan.',  
            'tlp.required'              => 'Telpon Siswa dibutuhkan.',
            'tahun_ajaran.required'     => 'Tahun Ajaran Siswa dibutuhkan.', 
            'keterangan.required'       => 'Keterangan Siswa dibutuhkan.',  
        );
        # Validasi
        $validasi = Validator::make($input, $aturan, $pesan);
        # Bila validasi gagal
        if($validasi->fails()) {
            # Kembali kehalaman yang sama dengan pesan error
            return Redirect::back()->withErrors($validasi)->withInput();
        # Bila validasi sukses
        } else {
            # Ubah isi database berdasarkan id
            $siswas = Siswa::find($id);

            $siswas->nis                    = Input::get('nis');
            $siswas->nik                    = Input::get('nik');
            $siswas->nama_siswa             = Input::get('nama_siswa');
            $siswas->kelass_id              = input::get('kelass_id');
            $siswas->jenis_kelamin          = Input::get('jenis_kelamin');
            $siswas->tempat_lahir           = Input::get('tempat_lahir');
            $siswas->tanggal_lahir          = Input::get('tanggal_lahir');
            $siswas->alamat                 = Input::get('alamat');
            $siswas->tlp                    = Input::get('tlp');
            $siswas->tahun_ajaran           = Input::get('tahun_ajaran');
            $siswas->keterangan             = Input::get('keterangan');
            $siswas->save();
            
            return Redirect('siswa');
        }
    }

    public function detail($nama_siswa)
    {

        # Ambil data dalam berdasarkan berdasarkan nis
        $siswas = Siswa::where('nama_siswa', $nama_siswa)->first();

        $data = array('siswas' => $siswas); 
        # Tampilkan view        
        return view('admin.dashboard.siswa.profile', $data);    

    }

    public function cari(Request $request){
        $cari = $request->get('cari');
        $siswas = Siswa::where('nama_siswa','LIKE','%'.$cari.'%')
                        ->orWhere('nis', 'LIKE', '%'.$cari.'%')
                        ->orWhere('nik', 'LIKE', '%'.$cari.'%')
                        ->orWhere('jenis_kelamin', 'LIKE', '%'.$cari.'%')
                        ->orWhere('alamat', 'LIKE', '%'.$cari.'%')
                        ->orWhere('keterangan', 'LIKE', '%'.$cari.'%')
                        ->orWhere('tahun_ajaran', 'LIKE', '%'.$cari.'%')
                        ->orWhereHas('kelas', function ($query) use ($cari) {
                                    $query->where('nama_kelas', 'like', '%'.$cari.'%');
                                })
                        ->orderBy('id')
                        ->paginate();
        return view('admin.dashboard.siswa.index', compact('siswas'));
    }

    public function cetak()
    {
        $siswas = Siswa::all();
     
        $pdf = PDF::loadView('admin.dashboard.siswa.pdf',compact('siswas'));

        return $pdf->download('Data Siswa Sirojul Munir.pdf');
    }
}
