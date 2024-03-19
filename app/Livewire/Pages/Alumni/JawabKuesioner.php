<?php

namespace App\Livewire\Pages\Alumni;

use App\Models\Kuesioner;
use App\Models\KuesionerHalaman;
use App\Models\KuesionerJawaban;
use App\Models\KuesionerJawabanX;
use App\Models\KuesionerJawabanY;
use Livewire\Component;

class JawabKuesioner extends Component
{
    public $id;
    public $halaman;
    
    public $kuesioner;
    public $jawaban = [];

    public function mount($id){
        $this->id = $id;
        $this->kuesioner = Kuesioner::findOrFail($id);
        $semua_halaman = $this->semua_halaman;
        
        $halaman = [
            'page_count' => count($semua_halaman),
            'current_page' => 1,
        ];

        if($semua_halaman) $halaman['page'] = $semua_halaman[0];

        $this->halaman = (object) $halaman;
    }

    public function getSemuaHalamanProperty(){
        return KuesionerHalaman::where('kuesioner_id', $this->id)
            ->with('soal')
            ->orderBy('created_at', 'ASC')
            ->get();
    }

    public function save(){
        $halaman = $this->semua_halaman[$this->halaman->current_page - 1];

        try{
            KuesionerJawaban::query()
                ->where('alumni_id', auth()->user()->id)
                ->where('kuesioner_id', $this->id)
                ->delete();

            $jawaban = $this->jawaban;
            foreach($halaman->soal as $key => $item){
                if(!optional($jawaban)[$item->id]){
                    continue;
                }

                $new = new KuesionerJawaban();
                $new->kuesioner_id = $this->id;
                $new->alumni_id = auth()->user()->id;
                $new->soal_id = $item->id;
                $new->type = $item->type;

                //simpan jawaban pilihan-ganda || dropdown || jawaban-text
                if(in_array($item->type, ['pilihan-ganda','dropdown','jawab-text'])){
                    $new->jawaban = $jawaban[$item->id];
                    $new->save();
                }

                //simpan kotak-centang
                if($item->type == 'kotak-centang'){
                    $new->jawaban = '';
                    $new->save();

                    foreach($jawaban[$item->id] as $keyX => $itemX){
                        $x = new KuesionerJawabanX();
                        $x->jawaban_id = $new->id;
                        $x->jawaban = $itemX;
                        $x->key = '';
                        $x->save();
                    }
                }
                
                //simpan jawaban petak-kotak-centang
                if($item->type == 'petak-kotak-centang'){
                    $new->jawaban = '';
                    $new->save();

                    foreach($jawaban[$item->id] as $keyX => $itemX){
                        $x = new KuesionerJawabanX();
                        $x->jawaban_id = $new->id;
                        $x->jawaban = '';
                        $x->key = $keyX;
                        $x->save();
                        
                        foreach($itemX as $itemY){
                            $y = new KuesionerJawabanY();
                            $y->jawaban_x_id = $x->id;
                            $y->jawaban = $itemY;
                            $y->save();
                        }
                    }
                }
                
                //simpan jawaban petak-pilihan-ganda
                if($item->type == 'petak-pilihan-ganda'){
                    $new->jawaban = '';
                    $new->save();

                    foreach($jawaban[$item->id] as $keyX => $itemX){
                        $x = new KuesionerJawabanX();
                        $x->jawaban_id = $new->id;
                        $x->key = $keyX;
                        $x->jawaban = $itemX;
                        $x->save();
                    }
                }
            }

            return redirect()->route('alumni.dashboard');
        } catch(\Exception $error){
            dd($error);
        }
    }

    public function next(){
        $semua_halaman = $this->semua_halaman;
        $halaman = $this->halaman;
        $halaman->current_page++;

        $halaman->page = $semua_halaman[$halaman->current_page - 1];
        $this->halaman = $halaman;
    }

    public function previous(){
        $semua_halaman = $this->semua_halaman;
        $halaman = $this->halaman;
        $halaman->current_page--;

        $halaman->page = $semua_halaman[$halaman->current_page - 1];
        $this->halaman = $halaman;
    }

    public function render()
    {
        return view('pages.alumni.jawab-kuesioner');
    }
}
