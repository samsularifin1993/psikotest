<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $fillable = [
        'id_soal', 'jawaban'
    ];
    
    protected $hidden = [
        
    ];

    public function soal(){
        return $this->belongsTo(Soal::class);
    }
}
