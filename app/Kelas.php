<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelass';

    protected $fillable = array('nama_kelas');


    public function jadwal()
    {

    	return $this->hasMany(Jadwal::class);
    }

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

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
}
