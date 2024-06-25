<?php

namespace App\Livewire\Pages\Pengguna;

use App\Models\Pengguna;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Profile extends Component
{
    public $data;

    public function mount(){
        // $this->data = getDataProfile(session('login')->nim);
        $this->data = Pengguna::where('nim', session('login')->nim)->first();
    }
    
    public function render()
    {
        return view('pages.pengguna.profile');
    }
}
