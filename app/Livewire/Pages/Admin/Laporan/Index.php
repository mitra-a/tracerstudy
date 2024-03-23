<?php

namespace App\Livewire\Pages\Admin\Laporan;

use App\Livewire\Traits\WithCachedRows;
use App\Livewire\Traits\WithPerPagePagination;
use App\Models\Kuesioner;
use Livewire\Component;

class Index extends Component
{
    use WithCachedRows;
    use WithPerPagePagination;

    public $search = '';
    
    public function getRowsQueryProperty(){
        return Kuesioner::when($this->search, function($query, $value){
            $query->where('nama', 'LIKE', '%' . $value . '%')
                ->orWhere('deskripsi', 'LIKE', '%' . $value . '%');
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
        return view('pages.admin.laporan.index', [
            'rows' => $this->rows
        ]);
    }
}
