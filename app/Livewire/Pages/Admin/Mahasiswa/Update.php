<?php

namespace App\Livewire\Pages\Admin\Mahasiswa;

use App\Models\Periode;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $id;

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

    public function mount($id)
    {
        $this->choice['prodi'] = Prodi::all()->toArray();
        $this->choice['periode'] = Periode::all()->toArray();

        $this->id = $id;
        $data = User::findOrFail($id);

        $this->nim = $data->nim;
        $this->nama = $data->nama;
        $this->nomor_telepon = $data->nomor_telepon;
        $this->prodi = $data->prodi;
        $this->periode = $data->periode;
        $this->alamat = $data->alamat;
        $this->provinsi = $data->provinsi;
        $this->kabupaten_kota = $data->kabupaten_kota;
        $this->tempat_kerja = $data->tempat_kerja;
        $this->alamat_kerja = $data->alamat_kerja;
        $this->email = $data->email;
    }

    public function save()
    {
        $this->validate([
            'nim' => ['required', 'unique:users,nim,'.$this->id],
            'nama' => ['required'],
            // 'nomor_telepon' => ['required'],
            'prodi' => ['required'],
            // 'periode' => ['required'],
            'foto' => ['mimes:jpg,jpeg,png', 'max:1024', 'nullable'],
            'alamat' => ['nullable'],
            'provinsi' => ['nullable'],
            'kabupaten_kota' => ['nullable'],
            'tempat_kerja' => ['nullable'],
            'alamat_kerja' => ['nullable'],
            // 'email' => ['required', 'unique:users,email,' . $this->id],
            // 'password' => ['nullable'],
        ]);

        try {
            $save = User::findOrFail($this->id);
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
            $save->email = $this->email ?? null;
            $save->role = 'alumni';

            if ($this->password) {
                $save->password = Hash::make($this->password);
            }

            if ($this->foto) {
                Storage::delete($save->foto ?? '');
                $save->foto = $this->foto->store('/', 'profile');
            }

            $save->save();

            session()->flash('message', [
                'color' => 'success',
                'title' => 'Berhasil!',
                'sub-title' => 'Berhasil melakukan penyimpanan data',
            ]);

            return redirect()->route('admin.mahasiswa.index');
        } catch (\Exception $_) {
        }
    }

    public function render()
    {
        return view('pages.admin.mahasiswa.update');
    }
}
