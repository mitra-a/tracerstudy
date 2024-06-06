<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;

    protected $table = 'pengguna';
    protected $guarded = [];

    public function prodi_data(){
        return $this->hasOne(Prodi::class, 'kode', 'prodi');
    }
}
