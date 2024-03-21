<?php

namespace App\Livewire\Pages\Admin\LihatJawaban;

use App\Livewire\Traits\WithCachedRows;
use App\Livewire\Traits\WithPerPagePagination;
use App\Models\Kuesioner;
use App\Models\KuesionerJawaban;
use Livewire\Component;

class Detail extends Component
{
    use WithCachedRows;
    use WithPerPagePagination;

    public $id;
    public $search = '';

    public function mount($id){
        $this->id = $id;
        Kuesioner::findOrFail($id);
    }
    
    public function getRowsQueryProperty(){
        return KuesionerJawaban::where('kuesioner_id', $this->id)
        ->select('users.*')
        ->leftJoin('users', 'users.id', 'kuesioner_jawaban.alumni_id')
        ->groupBy('alumni_id')
        ->when($this->search, function($query, $value){
            $query->where('nama', 'LIKE', '%' . $value . '%')
                ->orWhere('email', 'LIKE', '%' . $value . '%')
                ->orWhere('nim', 'LIKE', '%' . $value . '%')
                ->orWhere('nomor_telepon', 'LIKE', '%' . $value . '%');
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
