<?php

namespace App\Livewire\Pages\Admin\Alumni;

use App\Livewire\Traits\WithCachedRows;
use App\Livewire\Traits\WithPerPagePagination;
use App\Models\User;
use Livewire\Component;

class Validasi extends Component
{
    use WithCachedRows;
    use WithPerPagePagination;

    public $search = '';

    public function validasi($id, $value){
        $user = User::find($id);
        $user->aktif = $value;
        $user->save();
    }
    
    public function getRowsQueryProperty(){
        return User::where('role', 'alumni')->whereNotNull('email')->when($this->search, function($query, $value){
            $query->where('nama', 'LIKE', '%' . $value . '%')
                ->orWhere('nim', 'LIKE', '%' . $value . '%')
                ->orWhere('email', 'LIKE', '%' . $value . '%')
                ->orWhere('nomor_telepon', 'LIKE', '%' . $value . '%');
        });
    }

    public function getRowsProperty(){
        return $this->cache(function () {
            return $this->applyPagination($this->rowsQuery);
        });
    }
    
    public function render()
    {
        return view('pages.admin.alumni.validasi',[
            'rows' => $this->rows
        ]);
    }
}
