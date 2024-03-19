<?php

namespace App\Livewire\Pages\Alumni;

use App\Models\Kuesioner;
use App\Models\KuesionerHalaman;
use App\Models\KuesionerJawaban;
use Livewire\Component;

class LihatJawabanKuesioner extends Component
{
    public $id;
    public $halaman;
    
    public $kuesioner;
    public $jawaban = [];

    public function mount($id){
        $this->id = $id;
        $this->kuesioner = Kuesioner::findOrFail($id);
        $this->halaman = KuesionerHalaman::where('kuesioner_id', $id)->with('soal')->get();

        $jawaban_value = [];
        $jawaban = KuesionerJawaban::where('kuesioner_id', $id)
            ->where('alumni_id', auth()->user()->id)
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

    public function resetJawaban(){
        KuesionerJawaban::where('kuesioner_id', $this->id)->where('alumni_id', auth()->user()->id)->delete();
        return redirect()->route('alumni.dashboard');
    }

    public function render()
    {
        return view('pages.alumni.lihat-jawaban-kuesioner');
    }
}
