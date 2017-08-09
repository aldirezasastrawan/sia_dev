<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
	protected $table = 'siswas';
	// protected $primaryKey = 'id';
	protected $fillable = ["nis", "nik", "nama_siswa", "kelass_id", "jenis_kelamin", "tempat_lahir", "tanggal_lahir", "alamat", "tlp", "tahun_ajaran", "keterangan"]; // MASS ASSIGNMENT (maksudnya buatkan field-field yang diperbolehkan menerima inputan)

    // protected $guarded = ['_method', '_token']; //MASS ASSIGNMENT (maksudnya buatkan field-field yang tidak diperbolehkan menerima inputan)
    // protected $fillable = array('nama_siswa');


    public function pembayaran()
    {
    	 return $this->hasMany(Pembayaran::class);
    }

    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }

    public function nilaiakademik()
    {

        return $this->hasMany(Nilaiakademik::class);
    }

    public function nilainonakademik()
    {

        return $this->hasMany(Nilainonakademik::class);
    }

    public function jadwal()
    {

        return $this->hasMany(Jadwal::class);
    }

    public function user() 
    {

        return $this->hasOne('Siswa', 'siswas_id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class,'kelass_id'); // relasi ke tabel customer One to Many
    }
}
