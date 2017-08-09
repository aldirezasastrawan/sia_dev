<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensis';
	// protected $primaryKey = 'id';
	protected $fillable = ["kelass_id", "tanggal", "siswas_id", "thn_ajaran", "keterangan"]; // MASS ASSIGNMENT (maksudnya buatkan field-field yang diperbolehkan menerima inputan)

    protected $guarded = ['_method', '_token']; //MASS ASSIGNMENT (maksudnya buatkan field-field yang tidak diperbolehkan menerima inputan)

    
    public function siswa()
    {
    	 return $this->belongsTo('App\Siswa', 'siswas_id');
    }

    public function kelas()
    {
    	return $this->belongsTo('App\Kelas', 'kelass_id');
    }

    // public function pembayaran()
    // {
        
    //     return $this->belongsTo('App\Pembayaran', 'pembayarans_id');
    // }
}
