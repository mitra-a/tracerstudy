<?php

namespace App\Livewire\Pages\Admin\Kuesioner;

use App\Livewire\Traits\WithCachedRows;
use App\Livewire\Traits\WithPerPagePagination;
use App\Models\KuesionerSoal;
use Livewire\Component;

class Soal extends Component
{
    use WithCachedRows;
    use WithPerPagePagination;
    
    public $id;
    public $halaman_id;

    public function mount($id, $halaman){
        $this->id = $id;
        $this->halaman_id = $halaman;
    }

    public function tambahPertanyaan($e){
        try {
            $save = new KuesionerSoal;
            $save->kuesioner_id = $this->id;
            $save->kuesioner_halaman_id = $this->halaman_id;
            $save->pertanyaan = '';
            $save->type = $e;
            $save->opsi_x = [''];
            $save->opsi_y = [''];
            $save->save();

            $this->js("setTimeout(function(){
                window.scrollTo({top: document.body.scrollHeight, behavior: 'smooth' })
            }, 100)");
        } catch(\Exception $_){ }
    }

    public function hapusPertanyaan($id){
        $kuesioner = KuesionerSoal::find($id);
        if(!$kuesioner) return;
        $kuesioner->delete();
    }

    public function getRowsQueryProperty(){
        return KuesionerSoal::where('kuesioner_id', $this->id)
            ->where('kuesioner_halaman_id', $this->halaman_id);
    }

    public function getRowsProperty(){
        return $this->cache(function () {
            return $this->applyPagination($this->rowsQuery);
        });
    }

    public function render()
    {
        return view('pages.admin.kuesioner.soal', [
            'rows' => $this->rows
        ]);
    }
}
