<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelajaran extends Model
{
    protected $table = 'pelajarans';
    
    protected $fillable = array('nama_pelajaran', 'keterangan');


    public function jadwal()
    {

    	return $this->hasMany(Jadwal::class);
    }

    public function nilaiakademik()
    {

    	return $this->hasMany(Nilaiakademik::class);
    }

    public function nilainonakademik()
    {

        return $this->hasMany(Nilainonakademik::class);
    }
}
