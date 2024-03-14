<?php

namespace App\Livewire\Pages\Admin\Kuesioner;

use App\Livewire\Traits\WithCachedRows;
use App\Livewire\Traits\WithPerPagePagination;
use App\Models\Kuesioner;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Index extends Component
{
    use WithCachedRows;
    use WithPerPagePagination;

    public $search = '';

    public function delete($id){
        $delete = Kuesioner::findOrFail($id);
        $delete->delete();

        session()->flash('message', [
            'color' => 'warning',
            'title' => 'Berhasil!',
            'sub-title' => 'Berhasil melakukan penghapusan data',
        ]);
    }
    
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
    
    public function render()
    {
        return view('pages.admin.kuesioner.index', [
            'rows' => $this->rows
        ]);
    }
}
