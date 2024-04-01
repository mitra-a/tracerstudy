<?php

namespace App\Livewire\Pages\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;

    public $nama;
    public $password_confirm;

    #[Rule('mimes:jpg,jpeg,png|max:1024')]
    public $gambar;
    public $password;

    public function mount(){
        $this->nama = auth()->user()->nama;
    }

    public function save(){
        $this->validate([
            'nama' => ['required'],
            'gambar' => ['mimes:jpg,jpeg,png','max:1024','nullable'],
            'password' => 'nullable',
            'password_confirm' => 'nullable|same:password'
        ]);

        try {
            $save = User::findOrFail(auth()->user()->id);
            $save->nama = $this->nama;
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
        } catch (\Exception $_) {}
    }
    
    public function render()
    {
        return view('pages.admin.profile');
    }
}
