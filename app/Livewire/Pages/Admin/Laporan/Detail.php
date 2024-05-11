<?php

namespace App\Livewire\Pages\Admin\Laporan;

use App\Models\Kuesioner;
use App\Models\KuesionerJawaban;
use App\Models\KuesionerSoal;
use Livewire\Component;

class Detail extends Component
{
    public $id;
    public $kuesioner;

    public function mount($id){
        $this->id = $id;
        $this->kuesioner = Kuesioner::findOrFail($id);
    }

    public function render()
    {
        return view('pages.admin.laporan.detail');
    }
}
