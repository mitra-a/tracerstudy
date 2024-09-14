<?php

namespace App\Livewire\Pages\Admin\Mahasiswa;

use App\Livewire\Traits\WithCachedRows;
use App\Livewire\Traits\WithPerPagePagination;
use App\Models\KuesionerJawaban;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Delete extends Component
{
    use WithCachedRows;
    use WithPerPagePagination;

    public $search = '';

    public function delete($id)
    {
        $user = User::find($id);
        $user->email = null;
        $user->password = '';
        Storage::delete($user->foto ?? '');
        KuesionerJawaban::where('alumni_id', $id)->delete();

        $user->save();
    }

    public function getRowsQueryProperty()
    {
        return User::where('role', 'alumni')->whereNotNull('email')->when($this->search, function ($query, $value) {
            $query->where('nama', 'LIKE', '%'.$value.'%')
                ->orWhere('nim', 'LIKE', '%'.$value.'%')
                ->orWhere('email', 'LIKE', '%'.$value.'%')
                ->orWhere('nomor_telepon', 'LIKE', '%'.$value.'%');
        });
    }

    public function getRowsProperty()
    {
        return $this->cache(function () {
            return $this->applyPagination($this->rowsQuery);
        });
    }

    public function render()
    {
        return view('pages.admin.mahasiswa.delete', [
            'rows' => $this->rows,
        ]);
    }
}
