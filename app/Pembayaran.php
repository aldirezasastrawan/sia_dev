<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{

	protected $table = 'pembayarans';
	// protected $primaryKey = 'id';
	protected $fillable = ["siswas_id", "kelas", "tahun_ajaran", "jenis_pembayaran", "jumlah_pembayaran", "keterangan"]; // MASS ASSIGNMENT (maksudnya buatkan field-field yang diperbolehkan menerima inputan)

    protected $guarded = ['_method', '_token']; //MASS ASSIGNMENT (maksudnya buatkan field-field yang tidak diperbolehkan menerima inputan)

    
    public function siswa()
    {
    	 return $this->belongsTo('App\Siswa', 'siswas_id');
    }

    public function kelas()
    {
    	return $this->belongsTo('App\Kelas', 'kelass_id');
    }

    // public function absensi()
    // {
    //      return $this->hasMany(Absensi::class);
    // }

}
