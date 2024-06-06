<?php

namespace App\Livewire\Pages\Admin\Mahasiswa;

use App\Models\Pengguna;
use Livewire\Component;
use Livewire\WithFileUploads;

class Detail extends Component
{
    use WithFileUploads;
    public $id;
    public $data;

    public function mount($id){
        $this->id = $id;
        $data = Pengguna::findOrFail($id);
        $this->data = $data;
    }

    public function render()
    {
        return view('pages.admin.mahasiswa.detail');
    }
}
