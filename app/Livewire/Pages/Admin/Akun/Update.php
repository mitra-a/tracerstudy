<?php

namespace App\Livewire\Pages\Admin\Akun;

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
        'prodi' => [],
        'periode' => [],
    ];

    public $nama;
    public $foto;
    public $email;
    public $password;

    public function mount($id){
        $this->id = $id;
        $data = User::findOrFail($id);

        $this->nama = $data->nama;
        $this->email = $data->email;
    }

    public function save(){
        $this->validate([
            'nama' => ['required'],
            'foto' => ['mimes:jpg,jpeg,png','max:1024','nullable'],
            'email' => ['required', 'unique:users,email,' . $this->id],
            'password' => ['nullable'],
        ]);

        try {
            $save = User::findOrFail($this->id);
            $save->nama = $this->nama;
            $save->email = $this->email;
            
            if($this->password){
                $save->password = Hash::make($this->password);
            }

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
        } catch (\Exception $_){ }
    }

    public function render()
    {
        return view('pages.admin.akun.update');
    }
}
