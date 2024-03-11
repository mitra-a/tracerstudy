<?php

namespace App\Livewire\Pages\Admin\Akun;

use App\Livewire\Traits\WithCachedRows;
use App\Livewire\Traits\WithPerPagePagination;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Index extends Component
{
    use WithCachedRows;
    use WithPerPagePagination;

    public $search = '';

    public function delete($id){
        $delete = User::findOrFail($id);
        Storage::delete($delete->foto ?? '');
        $delete->delete();

        session()->flash('message', [
            'color' => 'warning',
            'title' => 'Berhasil!',
            'sub-title' => 'Berhasil melakukan penghapusan data',
        ]);
    }
    
    public function getRowsQueryProperty(){
        return User::where('role', 'admin')->when($this->search, function($query, $value){
            $query->where('nama', 'LIKE', '%' . $value . '%')
                ->orWhere('email', 'LIKE', '%' . $value . '%');
        });
    }

    public function getRowsProperty(){
        return $this->cache(function () {
            return $this->applyPagination($this->rowsQuery);
        });
    }
    
    public function render()
    {
        return view('pages.admin.akun.index', [
            'rows' => $this->rows
        ]);
    }
}
