<?php

namespace App\Livewire\Pages\Admin\LihatJawaban;

use App\Livewire\Traits\WithCachedRows;
use App\Livewire\Traits\WithPerPagePagination;
use App\Models\Kuesioner;
use App\Models\KuesionerJawaban;
use App\Models\Prodi;
use Livewire\Component;

class Detail extends Component
{
    use WithCachedRows;
    use WithPerPagePagination;

    public $id;
    public $search = '';
    public $prodi;

    public function mount($id){
        $this->id = $id;
        Kuesioner::findOrFail($id);
        $this->prodi = Prodi::all()->keyBy('kode')->toArray();
    }
    
    public function getRowsQueryProperty(){
        return KuesionerJawaban::where('kuesioner_id', $this->id)
        ->where('validasi', 1)
        ->groupBy('nim')
        ->when($this->search, function($query, $value){
            $query->where('nama', 'LIKE', '%' . $value . '%')
                ->orWhere('nim', 'LIKE', '%' . $value . '%');
        });
    }

    public function getRowsProperty(){
        return $this->cache(function () {
            return $this->applyPagination($this->rowsQuery);
        });
    }

    public function searchData($value = false){ if($value) $this->search = null; }

    public function render()
    {
        return view('pages.admin.lihat-jawaban.detail', [
            'rows' => $this->rows
        ]);
    }
}
