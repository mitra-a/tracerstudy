<?php

namespace App\Models;

use App\Models\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KuesionerSoal extends Model
{
    use HasFactory, UUID;

    protected $table = 'kuesioner_soal';

    protected $casts = [
        'opsi_x' => 'array',
        'opsi_y' => 'array',
    ];
}
