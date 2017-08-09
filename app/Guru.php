<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{

    protected $table = 'gurus';
    
    protected $fillable = array('nip', 'nuptk', 'nama_guru', 'jenis_kelamin', 'keterangan');


    public function jadwal()
    {

    	return $this->hasMany(Jadwal::class);
    }

    public function user() 
    {

		return $this->hasOne('Guru', 'gurus_id');
	}
}
