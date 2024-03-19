<?php

namespace App\Livewire\Pages\Alumni;

use App\Models\Kuesioner;
use Livewire\Component;

class Dashboard extends Component
{
    public $kuesioner;

    public function mount(){
        $periode = auth()->user()->periode;
        $this->kuesioner = Kuesioner::where('periode', 'LIKE', '%'. $periode .'%')->get();
    }

    public function render()
    {
        return view('pages.alumni.dashboard');
    }
}
