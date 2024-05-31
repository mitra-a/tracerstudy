<?php

namespace App\Livewire\Pages\Admin\Kuesioner;

use App\Livewire\Traits\WithCachedRows;
use App\Livewire\Traits\WithPerPagePagination;
use App\Models\KuesionerSoal;
use App\Models\KuesionerSoalOpsi;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\On;

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

    #[On('update-soal-order')]
    public function updateHalamanOrder($data){
        $usecase = '';
        $wherein = '';

        foreach($data as $index => $d){
            $wherein .= "'".$d['value']."'";
            if($index + 1 < count($data)) $wherein .= ",";
            $usecase .= 'WHEN "' . $d['value'] . '" THEN "' . $d['order'] . '" ';
        }

        KuesionerSoal::whereIn('id',array_column($data, 'value'))->update([
            'order' => DB::raw('CASE id ' . $usecase . ' END')
        ]);
    }

    public function tambahPertanyaan($e){
        try {
            $lastOrder = KuesionerSoal::where('kuesioner_halaman_id', $this->halaman_id)->orderBy('order','DESC')->first();

            $save = new KuesionerSoal;
            $save->kuesioner_id = $this->id;
            $save->kuesioner_halaman_id = $this->halaman_id;
            $save->pertanyaan = '';
            $save->type = $e;
            $save->order = $lastOrder ? $lastOrder->order + 1 : 1;
            $save->save();

            KuesionerSoalOpsi::create([
                'soal_id' => $save->id,
                'type' => 'x',
                'opsi' => '',
                'order' => 1,
            ]);

            KuesionerSoalOpsi::create([
                'soal_id' => $save->id,
                'type' => 'y',
                'opsi' => '',
                'order' => 1,
            ]);

            $this->js("setTimeout(function(){
                window.scrollTo({top: document.body.scrollHeight, behavior: 'smooth' });
                renderSortableOpsi();
            }, 100)");
        } catch(\Exception $_){ dd($_); }
    }

    public function hapusPertanyaan($id){
        $kuesioner = KuesionerSoal::find($id);
        if(!$kuesioner) return;
        KuesionerSoalOpsi::where('soal_id', $id)->delete();
        $kuesioner->delete();
    }

    public function getRowsQueryProperty(){
        return KuesionerSoal::where('kuesioner_id', $this->id)
            ->where('kuesioner_halaman_id', $this->halaman_id)
            ->orderBy('order');
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
