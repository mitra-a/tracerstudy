<?php

namespace App\Models;

use App\Models\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KuesionerHalaman extends Model
{
    use HasFactory, UUID;

    protected $table = 'kuesioner_halaman';
}
