<?php

namespace App\Livewire\Pages\Admin;

use App\Livewire\Traits\WithCachedRows;
use App\Livewire\Traits\WithPerPagePagination;
use App\Models\Jurusan;
use App\Models\Prodi as ModelsProdi;
use Livewire\Component;

class Prodi extends Component
{
    use WithCachedRows;
    use WithPerPagePagination;

    public $search = '';

    public $jurusan = [];

    public $add_input = [
        'jurusan' => '',
        'prodi' => '',
        'kode' => '',
    ];

    public $edit_input = [
        'row_id' => '',
        'jurusan' => '',
        'prodi' => '',
        'kode' => '',
    ];

    public function mount()
    {
        $this->jurusan = Jurusan::all()->toArray();
    }

    public function delete($id)
    {
        $delete = ModelsProdi::findOrFail($id);
        $delete->delete();

        session()->flash('message', [
            'color' => 'warning',
            'title' => 'Berhasil!',
            'sub-title' => 'Berhasil melakukan penghapusan data',
        ]);
    }

    public function edit($id = null)
    {
        if ($id !== null) {
            $this->useCachedRows();
            if ($id == 'reset') {
                $this->reset(['edit_input']);

                return;
            }

            $data = $this->rows->toArray()['data'];
            $search = array_search($id, array_column($data, 'kode'));
            $this->edit_input['row_id'] = $id;

            if ($search !== false) {
                $this->edit_input['jurusan'] = $data[$search]['jurusan'];
                $this->edit_input['prodi'] = $data[$search]['nama'];
                $this->edit_input['kode'] = $data[$search]['kode'];
            }

            return;
        }

        $this->validate([
            'edit_input.prodi' => ['required'],
        ]);

        try {
            $edit = ModelsProdi::findOrFail($this->edit_input['row_id']);
            $edit->jurusan = $this->edit_input['jurusan'];
            $edit->nama = $this->edit_input['prodi'];
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

    public function searchData($value = false)
    {
        if ($value) {
            $this->search = null;
        }
    }

    public function add()
    {
        $this->validate([
            'add_input.kode' => ['required'],
            'add_input.prodi' => ['required'],
        ]);

        try {
            $add = new ModelsProdi();
            $add->kode = $this->add_input['kode'];
            $add->jurusan = '';
            $add->nama = $this->add_input['prodi'];
            $add->save();

            session()->flash('message', [
                'color' => 'success',
                'title' => 'Berhasil!',
                'sub-title' => 'Berhasil melakukan penyimpanan data',
            ]);

            $this->reset(['add_input']);
        } catch (\Exception $_) {
            dd($_);

        }
    }

    public function getRowsQueryProperty()
    {
        return ModelsProdi::when($this->search, function ($query, $value) {
            $query->where('nama', 'LIKE', '%'.$value.'%')
                ->orWhere('kode', 'LIKE', '%'.$value.'%');
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
        return view('pages.admin.prodi', [
            'rows' => $this->rows,
        ]);
    }
}
