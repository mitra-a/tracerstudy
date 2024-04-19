<?php

namespace App\Livewire\Pages\Alumni\Laporan;

use App\Livewire\Traits\WithCachedRows;
use App\Livewire\Traits\WithPerPagePagination;
use App\Models\Kuesioner;
use App\Models\KuesionerJawaban;
use Livewire\Component;

class Index extends Component
{
    use WithCachedRows;
    use WithPerPagePagination;

    public $search = '';
    public $kuesioner;
    public $rows;
    
    public function mount(){
        $periode = auth()->user()->periode;
        $kuesionerSudahJawab = KuesionerJawaban::where('alumni_id', auth()->user()->id)->groupBy('kuesioner_id')->where('validasi', 1)->get('kuesioner_id')->toArray();
        $kuesionerSudahJawab = array_column($kuesionerSudahJawab, 'kuesioner_id');

        $this->kuesioner = Kuesioner::whereIn('id', $kuesionerSudahJawab)->get()->toArray();
        $this->rows = $this->kuesioner;
    }

    public function searchData($value = false){ if($value) $this->search = null; }
    
    public function render()
    {
        $value = $this->search;
        $result = array_filter($this->kuesioner, function ($item) use ($value) {
            if (stripos($item['nama'], $value) !== false || stripos($item['deskripsi'], $value) !== false) {
                return true;
            }
            return false;
        });
        $this->rows = $result;
        return view('pages.alumni.laporan.index');
    }
}
