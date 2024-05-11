<?php

namespace App\Livewire\Components;

use App\Models\KuesionerHalaman;
use App\Models\KuesionerJawaban as ModelsKuesionerJawaban;
use Livewire\Component;

class KuesionerJawaban extends Component
{
    public $user_id;
    public $halaman;
    public $validasi;
    
    public $reset_answer;
    public $auth_back;
    public $kuesioner;
    public $jawaban = [];

    public function mount(
        $id, 
        $user_id, 
        $auth_back = 'alumni.dashboard',
        $reset_answer = null
    ){
        $this->reset_answer = $reset_answer;
        $this->auth_back = $auth_back;
        $this->user_id = $user_id;
        $this->kuesioner = $id;
        $this->halaman = KuesionerHalaman::where('kuesioner_id', $id)->with('soal')->get();

        $jawaban_value = [];
        $jawaban = ModelsKuesionerJawaban::where('kuesioner_id', $id)
            ->where('alumni_id', $user_id)
            ->with('jawaban_x')
            ->get();

        foreach($jawaban as $item){
            $this->validasi = $item->validasi;
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

        if($this->reset_answer === false){
            $this->validasi = true;
        } else if ($this->reset_answer === true){
            $this->validasi = false;
        }

        $this->jawaban = $jawaban_value;
    }

    public function resetJawaban(){
        if(!$this->validasi){
            ModelsKuesionerJawaban::where('kuesioner_id', $this->kuesioner)->where('alumni_id', $this->user_id)->delete();
        }
        return redirect()->route($this->auth_back);
    }

    public function render()
    {
        return view('components.kuesioner-jawaban');
    }
}
