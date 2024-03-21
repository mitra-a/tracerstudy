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
    public $halaman;
    
    public $kuesioner;
    public $user;
    public $jawaban = [];

    public function mount($id, $user){
        $this->id = $id;
        $this->user_id = $user;

        $this->kuesioner = Kuesioner::findOrFail($id);
        $this->user = User::findOrFail($user);
        $this->halaman = KuesionerHalaman::where('kuesioner_id', $id)->with('soal')->get();

        $jawaban_value = [];
        $jawaban = KuesionerJawaban::where('kuesioner_id', $id)
            ->where('alumni_id', $this->user_id)
            ->with('jawaban_x')
            ->get();

        foreach($jawaban as $item){
            $value = $item->jawaban;
            if($item->type == 'kotak-centang'){
                $value = array_column($item->jawaban_x->toArray(), 'jawaban');
            }

            if($item->type == 'petak-pilihan-ganda'){
                $value = [];
                foreach($item->jawaban_x as $x){
                    $value[$x->key] = $x->jawaban;
                }
            }

            if($item->type == 'petak-kotak-centang'){
                $value = [];
                foreach($item->jawaban_x as $x){
                    $value[$x->key] = array_column($x->jawaban_y->toArray(), 'jawaban');
                }
            }

            $jawaban_value[$item->soal_id] = $value;
        }

        $this->jawaban = $jawaban_value;
    }
    
    public function render()
    {
        return view('pages.admin.lihat-jawaban.jawaban');
    }
}
