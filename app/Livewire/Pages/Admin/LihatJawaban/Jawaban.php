<?php

namespace App\Livewire\Pages\Admin\LihatJawaban;

use App\Models\Kuesioner;
use App\Models\KuesionerHalaman;
use App\Models\KuesionerJawaban;
use App\Models\User;
use Livewire\Component;

class Jawaban extends Component
{
    public $id;
    public $user_id;
    
    public $kuesioner;
    public $user;
    public $jawaban = [];

    public function mount($id, $user){
        $this->id = $id;
        $this->user_id = $user;

        $this->kuesioner = Kuesioner::findOrFail($id);
        $this->user = User::findOrFail($user);
    }
    
    public function render()
    {
        return view('pages.admin.lihat-jawaban.jawaban');
    }
}
