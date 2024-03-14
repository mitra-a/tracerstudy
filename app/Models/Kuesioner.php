<?php

namespace App\Models;

use App\Models\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuesioner extends Model
{
    use HasFactory, UUID;

    protected $table = 'kuesioner';

    protected $casts = [
        'periode' => 'array',
    ];

    public function getPeriodeDataAttribute()
    {
        $result = [];
        $periode = Periode::whereIn('kode', $this->periode)->get();

        foreach($periode as $q){
            $result[$q->kode] = [
                'nama' => $q->nama,
                'kode' => $q->kode,
            ];
        }
        
        return $result;
    }
}
