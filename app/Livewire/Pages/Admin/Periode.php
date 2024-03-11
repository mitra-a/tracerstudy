<?php

namespace App\Livewire\Pages\Admin;

use App\Livewire\Traits\WithCachedRows;
use App\Livewire\Traits\WithPerPagePagination;
use App\Models\Periode as ModelsPeriode;
use Livewire\Component;

class Periode extends Component
{
    use WithCachedRows;
    use WithPerPagePagination;

    public $search = '';

    public $add_input = [
        'periode' => '',
        'kode' => ''
    ];

    public $edit_input = [
        'row_id' => '',
        'periode' => '',
        'kode' => ''
    ];

    public function delete($id){
        $delete = ModelsPeriode::findOrFail($id);
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
            $search = array_search($id, array_column($data, 'kode'));
            $this->edit_input['row_id'] = $id;

            if($search !== false){
                $this->edit_input['periode'] = $data[$search]['nama'];
                $this->edit_input['kode'] = $data[$search]['kode'];
            }

            return;
        }

        $this->validate([
            'edit_input.periode' => ['required'],
        ]);

        try {
            $edit = ModelsPeriode::findOrFail($this->edit_input['row_id']);
            $edit->nama = $this->edit_input['periode'];
            $edit->save();

            session()->flash('message', [
                'color' => 'success',
                'title' => 'Berhasil!',
                'sub-title' => 'Berhasil melakukan penyimpanan data',
            ]);

            $this->reset(['edit_input']);
        } catch (\Exception $_) { }
    }

    public function searchData($value = false){ if($value) $this->search = null; }

    public function add(){
        $this->validate([
            'add_input.kode' => ['required'],
            'add_input.periode' => ['required'],
        ]);

        try {
            $add = new ModelsPeriode();
            $add->kode = $this->add_input['kode'];
            $add->nama = $this->add_input['periode'];
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
        return ModelsPeriode::when($this->search, function($query, $value){
            $query->where('nama', 'LIKE', '%' . $value . '%')
                ->orWhere('kode', 'LIKE', '%' . $value . '%');
        });
    }

    public function getRowsProperty(){
        return $this->cache(function () {
            return $this->applyPagination($this->rowsQuery);
        });
    }

    public function render()
    {
        return view('pages.admin.periode', [
            'rows' => $this->rows
        ]);
    }
}
