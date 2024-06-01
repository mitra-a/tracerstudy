<?php

namespace App\Livewire\Pages\Alumni\Laporan;

use App\Models\Kuesioner;
use App\Models\KuesionerJawaban;
use App\Models\KuesionerSoal;
use Livewire\Component;

class Detail extends Component
{
    public $id;
    public $user_id;
    public $halaman;
    
    public $kuesioner;
    public $data;

    public function mount($id){
        $this->id = $id;
        $this->kuesioner = Kuesioner::findOrFail($id);
    }

    public function render()
    {
        return view('pages.alumni.laporan.detail');
    }
}
