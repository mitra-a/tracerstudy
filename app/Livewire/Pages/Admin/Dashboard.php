<?php

namespace App\Livewire\Pages\Admin;

use App\Models\Kuesioner;
use App\Models\LoginHistory;
use App\Models\Pengguna;
use App\Models\Pengunjung;
use App\Models\Periode;
use App\Models\Prodi;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class Dashboard extends Component
{
    public $arrayData = [];

    public function mount(){
        $this->arrayData['mahasiswa'] = Pengguna::count();
        $this->arrayData['kuesioner'] = Kuesioner::count();
        $this->arrayData['prodi'] = Prodi::count();
        
        $pengunjung = Pengunjung::selectRaw('sum(jumlah) as jumlah')->get();
        $this->arrayData['pengunjung'] = $pengunjung[0]->jumlah;

        $this->arrayData['login'] = LoginHistory::orderBy('last_login_at', 'DESC')
        ->limit(9)
        ->get();

        $week = Carbon::now();
        $this->arrayData['pekan'] = [];
        foreach([1,2,3,4,5,6,7,8,9,10] as $item){
            $this->arrayData['pekan']['tanggal'][] = $week->format("d-M"); 
            $pengunjung = Pengunjung::whereDate('created_at', $week)->first();
            $this->arrayData['pekan']['data'][] = $pengunjung->jumlah ?? 0;
            $week = $week->subDay()->copy();
        }
    }

    public function render()
    {
        return view('pages.admin.dashboard');
    }
}
