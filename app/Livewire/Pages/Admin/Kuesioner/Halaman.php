<?php

namespace App\Livewire\Pages\Admin\Kuesioner;

use App\Livewire\Traits\WithCachedRows;
use App\Livewire\Traits\WithPerPagePagination;
use App\Models\KuesionerHalaman;
use Livewire\Component;

class Halaman extends Component
{
    use WithCachedRows;
    use WithPerPagePagination;

    public $id;
    public $search = '';

    public $add_input = [
        'nama' => '',
        'deskripsi' => ''
    ];

    public $edit_input = [
        'row_id' => '',
        'nama' => '',
        'deskripsi' => ''
    ];

    public function mount($id){
        $this->id = $id;
    }

    public function delete($id){
        $delete = KuesionerHalaman::findOrFail($id);
        $delete->delete();

        session()->flash('message', [
            'color' => 'warning',
            'title' => 'Berhasil!',
            'sub-title' => 'Berhasil melakukan penghapusan data',
        ]);
    }

    public function edit($id = null){
        if($id !== null){
            $this->useCachedRows();
            if($id == 'reset') {
                $this->reset(['edit_input']);
                return;
            }
            
            $data = $this->rows->toArray()['data'];
            $search = array_search($id, array_column($data, 'id'));
            $this->edit_input['row_id'] = $id;
            
            if($search !== false){
                $this->edit_input['nama'] = $data[$search]['nama'];
                $this->edit_input['deskripsi'] = $data[$search]['deskripsi'];
            }

            return;
        }

        $this->validate([
            'edit_input.nama' => ['required'],
            'edit_input.deskripsi' => ['required'],
        ]);

        try {
            $edit = KuesionerHalaman::findOrFail($this->edit_input['row_id']);
            $edit->nama = $this->edit_input['nama'];
            $edit->deskripsi = $this->edit_input['deskripsi'];
            $edit->save();

            session()->flash('message', [
                'color' => 'success',
                'title' => 'Berhasil!',
                'sub-title' => 'Berhasil melakukan penyimpanan data',
            ]);

            $this->reset(['edit_input']);
        } catch (\Exception $_) { 
        }
    }

    public function searchData($value = false){ if($value) $this->search = null; }

    public function add(){
        $this->validate([
            'add_input.nama' => ['required'],
            'add_input.deskripsi' => ['required'],
        ]);

        try {
            $add = new KuesionerHalaman();
            $add->kuesioner_id = $this->id;
            $add->nama = $this->add_input['nama'];
            $add->deskripsi = $this->add_input['deskripsi'];
            $add->save();

            session()->flash('message', [
                'color' => 'success',
                'title' => 'Berhasil!',
                'sub-title' => 'Berhasil melakukan penyimpanan data',
            ]);

            $this->reset(['add_input']);
        } catch (\Exception $_) { }
    }
    
    public function getRowsQueryProperty(){
        return KuesionerHalaman::where('kuesioner_id', $this->id)->when($this->search, function($query, $value){
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
        return view('pages.admin.kuesioner.halaman', [
            'rows' => $this->rows
        ]);
    }
}
