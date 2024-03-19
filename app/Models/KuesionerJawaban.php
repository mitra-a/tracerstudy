<?php

namespace App\Models;

use App\Models\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KuesionerJawaban extends Model
{
    use HasFactory, UUID;

    protected $table = 'kuesioner_jawaban';

    public function jawaban_x(){
        return $this->hasMany(KuesionerJawabanX::class, 'jawaban_id', 'id')->with('jawaban_y');
    }
}
