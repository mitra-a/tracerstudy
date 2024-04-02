<?php

namespace App\Livewire\Pages\Admin\Alumni;

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
        'prodi' => [],
        'periode' => [],
    ];

    public $nim;
    public $nama;
    public $nomor_telepon;
    public $prodi;
    public $periode;
    public $foto;
    public $alamat;
    public $provinsi;
    public $kabupaten_kota;
    public $tempat_kerja;
    public $alamat_kerja;
    public $email;
    public $password;

    public function mount(){
        $this->choice['prodi'] = Prodi::all()->toArray();
        $this->choice['periode'] = Periode::all()->toArray();
    }

    public function save(){
        $this->validate([
            'nim' => ['required', 'unique:users,nim'],
            'nama' => ['required'],
            // 'nomor_telepon' => ['required'],
            'prodi' => ['required'],
            'periode' => ['required'],
            'foto' => ['mimes:jpg,jpeg,png','max:1024','nullable'],
            'alamat' => ['nullable'],
            'provinsi' => ['nullable'],
            'kabupaten_kota' => ['nullable'],
            'tempat_kerja' => ['nullable'],
            'alamat_kerja' => ['nullable'],
            // 'email' => ['required', 'unique:users,nim'],
            // 'password' => ['required'],
        ]);

        try {
            $save = new User();
            $save->nim = $this->nim;
            $save->nama = $this->nama;
            $save->nomor_telepon = $this->nomor_telepon;
            $save->prodi = $this->prodi;
            $save->periode = $this->periode;
            $save->alamat = $this->alamat;
            $save->provinsi = $this->provinsi;
            $save->kabupaten_kota = $this->kabupaten_kota;
            $save->tempat_kerja = $this->tempat_kerja;
            $save->alamat_kerja = $this->alamat_kerja;
            $save->role = 'alumni';
            $save->email = $this->email ?? null;
            $save->password = Hash::make($this->password);

            if($this->foto){
                $save->foto = $this->foto->store('/','profile');
            }

            $save->save();

            session()->flash('message', [
                'color' => 'success',
                'title' => 'Berhasil!',
                'sub-title' => 'Berhasil melakukan penyimpanan data',
            ]);

            return redirect()->route('admin.alumni.index');
        } catch (\Exception $_){ dd($_); }
    }

    public function render()
    {
        return view('pages.admin.alumni.create');
    }
}
