<?php

namespace App\Models;

use App\Models\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KuesionerSoal extends Model
{
    use HasFactory, UUID;

    protected $table = 'kuesioner_soal';

    public function opsi_x(){
        return $this->hasMany(KuesionerSoalOpsi::class, 'soal_id', 'id')
            ->where('type', 'x')
            ->orderBy('order');
    }

    public function opsi_y(){
        return $this->hasMany(KuesionerSoalOpsi::class, 'soal_id', 'id')
            ->where('type', 'y')
            ->orderBy('order');
    }

    public function opsi(){
        return $this->hasMany(KuesionerSoalOpsi::class, 'soal_id', 'id')
            ->orderBy('order');
    }
}
