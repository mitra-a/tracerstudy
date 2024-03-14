<?php

namespace App\Livewire\Pages\Admin\Kuesioner;

use App\Models\Kuesioner;
use App\Models\Periode;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $choice = [
        'periode' => [],
    ];

    public $nama;
    public $deskripsi;
    public $periode = [];

    public function mount(){
        $this->choice['periode'] = Periode::all()->toArray();
    }

    public function save(){
        $this->validate([
            'nama' => ['required'],
            'deskripsi' => ['required'],
            'periode' => ['required'],
        ]);

        try {
            $save = new Kuesioner();
            $save->nama = $this->nama;
            $save->deskripsi = $this->deskripsi;
            $save->periode = $this->periode;
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
        return view('pages.admin.kuesioner.create');
    }
}
