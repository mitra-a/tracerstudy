<?php

namespace App\Models;

use App\Models\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KuesionerJawabanX extends Model
{
    use HasFactory, UUID;

    protected $table = 'kuesioner_jawaban_x';

    public function jawaban_y(){
        return $this->hasMany(KuesionerJawabanY::class, 'jawaban_x_id', 'id');
    }

    public function opsi(){
        return $this->hasOne(KuesionerSoalOpsi::class, 'id', 'jawaban');
    }
}
