<?php

namespace App\Models;

use App\Models\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KuesionerJawaban extends Model
{
    use HasFactory, UUID;

    protected $table = 'kuesioner_jawaban';
    protected $guarded = [];

    public function jawaban_x(){
        return $this->hasMany(KuesionerJawabanX::class, 'jawaban_id', 'id')->with('jawaban_y');
    }

    public function alumni(){
        return $this->hasMany(User::class, 'id', 'alumni_id');
    }

    public function prodi_data(){
        return $this->hasOne(Prodi::class, 'kode', 'prodi');
    }
}
