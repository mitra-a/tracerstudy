<?php

namespace App\Livewire\Pages\Admin\Kuesioner;

use App\Models\Kuesioner;
use App\Models\Periode;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $id;

    public $choice = [
        'periode' => [],
    ];

    public $nama;
    public $deskripsi;
    public $periode = [];

    public function mount($id){
        // $this->choice['periode'] = Periode::all()->toArray();

        $this->id = $id;
        $data = Kuesioner::findOrFail($id);

        $this->nama = $data->nama;
        $this->deskripsi = $data->deskripsi;
        // $this->periode = $data->periode;

    }

    public function save(){
        $this->validate([
            'nama' => ['required'],
            'deskripsi' => ['required'],
            // 'periode' => ['required'],
        ]);

        try {
            $save = Kuesioner::findOrFail($this->id);
            $save->nama = $this->nama;
            $save->deskripsi = $this->deskripsi;
            // $save->periode = $this->periode;
            $save->save();

            session()->flash('message', [
                'color' => 'success',
                'title' => 'Berhasil!',
                'sub-title' => 'Berhasil melakukan penyimpanan data',
            ]);

            return redirect()->route('admin.kuesioner.index');
        } catch (\Exception $_){ }
    }

    public function render()
    {
        return view('pages.admin.kuesioner.update');
    }
}
