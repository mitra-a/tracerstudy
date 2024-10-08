<?php

namespace App\Livewire\Pages\Alumni;

use App\Models\Kuesioner;
use App\Models\KuesionerHalaman;
use App\Models\KuesionerJawaban;
use Livewire\Component;

class LihatJawabanKuesioner extends Component
{
    public $id;
    public $kuesioner;
    public $jawaban = [];

    public function mount($id){
        $this->id = $id;
        $this->kuesioner = Kuesioner::findOrFail($id);
    }

    public function render()
    {
        return view('pages.alumni.lihat-jawaban-kuesioner');
    }
}
