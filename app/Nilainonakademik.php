<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilainonakademik extends Model
{
    
    protected $table = 'nilainonakademiks';
	// protected $primaryKey = 'id';
	protected $fillable = ["siswas_id", "pelajarans_id", "kelass_id", "nilai_tugas", "nilai_ulangan", "jumlah_nilai"]; // MASS ASSIGNMENT (maksudnya buatkan field-field yang diperbolehkan menerima inputan)

    protected $guarded = ['_method', '_token']; //MASS ASSIGNMENT (maksudnya buatkan field-field yang tidak diperbolehkan menerima inputan)


    public function siswa()
    {
    	 return $this->belongsTo('App\Siswa', 'siswas_id');
    }

    public function pelajaran()
    {
    	 return $this->belongsTo('App\Pelajaran', 'pelajarans_id');
    }

    public function kelas()
    {
         return $this->belongsTo('App\Kelas', 'kelass_id');
    }
}
