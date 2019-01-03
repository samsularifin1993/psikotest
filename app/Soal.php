<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $fillable = [
        'id_kategori_soal', 'jenis_jawaban', 'soal', 'gambar', 'id_jawaban', 'bobot'
    ];

    protected $hidden = [
        
    ];

    public function kategoriSoal(){
        return $this->belongsTo(KategoriSoal::class);
    }

    public function jawaban(){
        return $this->hasMany('App\Jawaban','id_soal','id');
    }
}
