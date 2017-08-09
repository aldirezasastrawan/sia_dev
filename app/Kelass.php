<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelass extends Model
{
    # Penamaan tabel yang digunakan
	protected $table = 'kelass';
	# MASS ASSIGNMENT (maksudnya buatkan field-field yang diperbolehkan menerima inputan)
	protected $fillable = array('nama_kelas');

	public function siswas()
    {

    	return $this->hasMany(Siswas::class);
    }
}
