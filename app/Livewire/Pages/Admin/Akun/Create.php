<?php

namespace App\Livewire\Pages\Admin\Akun;

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

    public $nama;
    public $foto;
    public $email;
    public $password;

    public function save(){
        $this->validate([
            'nama' => ['required'],
            'foto' => ['mimes:jpg,jpeg,png','max:1024','nullable'],
            'email' => ['required', 'unique:users,nim'],
            'password' => ['required'],
        ]);

        try {
            $save = new User();
            $save->nama = $this->nama;
            $save->email = $this->email;
            $save->role = 'admin';
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

            return redirect()->route('admin.akun.index');
        } catch (\Exception $_){
        }
    }

    public function render()
    {
        return view('pages.admin.akun.create');
    }
}
