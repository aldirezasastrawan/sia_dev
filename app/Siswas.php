<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswas extends Model
{
    protected $table = 'siswas'; // Penamaan tabel yang digunakan

    protected $fillable = ["nis", "nik", "nama_siswa", "jenis_kelamin", "tempat_lahir", "tanggal_lahir", "alamat", "tlp", "kelass_id", "tahun_ajaran", "keterangan"]; // MASS ASSIGNMENT (maksudnya buatkan field-field yang diperbolehkan menerima inputan)

    protected $guarded = ['_method', '_token']; //MASS ASSIGNMENT (maksudnya buatkan field-field yang tidak diperbolehkan menerima inputan)

    public function kelass()
    {
    	 return $this->belongsTo(Kelass::class,'kelass_id'); // relasi ke tabel mobil One to Many
    }
}
