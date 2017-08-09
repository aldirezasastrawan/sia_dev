<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwals'; // Penamaan tabel yang digunakan

    protected $fillable = ["kelass_id", "hari", "jam", "pelajarans_id", "gurus_id", "siswas_id", "gedung", "ruangan", "tahun_ajaran", "status_mapel"]; // MASS ASSIGNMENT (maksudnya buatkan field-field yang diperbolehkan menerima inputan)

    protected $guarded = ['_method', '_token']; //MASS ASSIGNMENT (maksudnya buatkan field-field yang tidak diperbolehkan menerima inputan)

    public function kelas()
    {
    	 return $this->belongsTo(Kelas::class,'kelass_id'); // relasi ke tabel mobil One to Many
    }

    public function pelajaran()
    {
    	 return $this->belongsTo(Pelajaran::class,'pelajarans_id'); // relasi ke tabel customer One to Many
    }

    public function guru()
    {
    	 return $this->belongsTo(Guru::class,'gurus_id'); // relasi ke tabel customer One to Many
    }

    public function siswa()
    {
         return $this->belongsTo(Siswa::class,'siswas_id'); // relasi ke tabel customer One to Many
    }
}
