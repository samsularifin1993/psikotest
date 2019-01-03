<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriSoal extends Model
{
    protected $fillable = [
        'kategori', 'durasi', 'waktu_mulai', 'waktu_selesai'
    ];

    protected $hidden = [
        
    ];

    public function soal(){
        return $this->hasMany('App\Soal','id_kategori_soal','id');
    }
}
