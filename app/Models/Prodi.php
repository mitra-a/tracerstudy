<?php

namespace App\Models;

use App\Models\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $primaryKey = 'kode';
    protected $table = 'prodi';

    public function jurusan_data(){
        return $this->hasOne(Jurusan::class, 'kode', 'jurusan');
    }
}
