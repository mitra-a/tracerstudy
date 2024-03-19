<?php

namespace App\Livewire\Pages\Alumni;

use App\Models\Kuesioner;
use App\Models\KuesionerJawaban;
use Livewire\Component;

class Dashboard extends Component
{
    public $kuesioner;

    public function mount(){
        $periode = auth()->user()->periode;
        $this->kuesioner = Kuesioner::where('periode', 'LIKE', '%'. $periode .'%')->get();

        foreach($this->kuesioner as $item){
            $check = KuesionerJawaban::where('alumni_id', auth()->user()->id)->where('kuesioner_id', $item->id)->first();
            $item->selesai = $check ? true : false;
        }
    }

    public function render()
    {
        return view('pages.alumni.dashboard');
    }
}
