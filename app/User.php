<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = ["roles_id", "gurus_id", "siswas_id", "username", "name", "password"];
    

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $guarded = ['_method', '_token']; //MASS ASSIGNMENT (maksudnya buatkan field-field yang tidak diperbolehkan menerima inputan)

    public function role()
    {
        return $this->belongsTo(Role::class,'roles_id');
    }

    public function guru() 
    {
        return $this->belongsTo(Guru::class,'gurus_id');
    }

    public function siswa() 
    {
        return $this->belongsTo(Siswa::class,'siswas_id');
    }

    public function punyaRule($namaRule)
    {
        // dd($this->role->namaRule == $namaRule);

        if ($this->role->namaRule == $namaRule) {
            
            return true;

        } else {
            
            return false;
        }
        
    }
}
