<?php

namespace App\Livewire\Pages\Alumni;

use App\Models\Periode;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;

    public $nama;
    public $prodi;
    public $periode;
    public $nomor_telepon;
    public $alamat;
    public $provinsi;
    public $kabupaten_kota;
    public $tempat_kerja;
    public $alamat_kerja;
    public $password_confirm;
    public $password;

    public $choice = [
        'prodi' => [],
        'periode' => [],
    ];

    #[Rule('mimes:jpg,jpeg,png|max:1024')]
    public $gambar;

    public function mount(){
        $this->choice['prodi'] = Prodi::all()->toArray();
        $this->choice['periode'] = Periode::all()->toArray();
        
        $this->nama = auth()->user()->nama;
        $this->prodi = auth()->user()->prodi;
        $this->periode = auth()->user()->periode;
        $this->nomor_telepon = auth()->user()->nomor_telepon;

        $this->alamat = auth()->user()->alamat;
        $this->provinsi = auth()->user()->provinsi;
        $this->kabupaten_kota = auth()->user()->kabupaten_kota;
        $this->tempat_kerja = auth()->user()->tempat_kerja;
        $this->alamat_kerja = auth()->user()->alamat_kerja;
    }

    public function save(){
        $this->validate([
            // 'nama' => ['required'],
            'gambar' => ['mimes:jpg,jpeg,png','max:1024','nullable'],
            'password' => 'nullable',
            'password_confirm' => 'nullable|same:password'
        ]);

        try {
            $save = User::findOrFail(auth()->user()->id);
            // $save->nama = $this->nama;
            // $save->nomor_telepon = $this->nomor_telepon;
            // $save->prodi = $this->prodi;
            // $save->periode = $this->periode;
            // $save->alamat = $this->alamat;
            // $save->provinsi = $this->provinsi;
            // $save->kabupaten_kota = $this->kabupaten_kota;
            // $save->tempat_kerja = $this->tempat_kerja;
            // $save->alamat_kerja = $this->alamat_kerja;

            if($this->password) $save->password = bcrypt($this->password);

            if($this->gambar){
                Storage::delete($save->foto ?? '');
                $save->foto = $this->gambar->store('/','profile');
            }

            $save->save();

            session()->flash('message', [
                'color' => 'success',
                'title' => 'Berhasil!',
                'sub-title' => 'Berhasil melakukan penyimpanan data',
            ]);

            return redirect()->route(auth()->user()->role . '.dashboard');
        } catch (\Exception $_) { }
    }
    
    public function render()
    {
        return view('pages.alumni.profile');
    }
}
