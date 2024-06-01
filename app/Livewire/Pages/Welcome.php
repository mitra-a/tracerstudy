<?php

namespace App\Livewire\Pages;

use App\Models\Pengunjung;
use Livewire\Component;

class Welcome extends Component
{
    public function mount(){
        $now = date('Y-m-d');
        $pengunjung = Pengunjung::where('tanggal', $now)->first();
        if($pengunjung){
            $pengunjung->jumlah = $pengunjung->jumlah + 1;
            $pengunjung->save();
        } else {
            $pengunjung = new Pengunjung;
            $pengunjung->tanggal = $now;
            $pengunjung->jumlah = 1;
            $pengunjung->save();
        }
    }

    public function render()
    {
        return view('pages.welcome')->layout('components.layouts.home');
    }
}
