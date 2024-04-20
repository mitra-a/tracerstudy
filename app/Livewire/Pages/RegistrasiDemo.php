<?php

namespace App\Livewire\Pages;

use App\Models\Periode;
use App\Models\Prodi;
use App\Models\User;
use Livewire\Component;

class RegistrasiDemo extends Component
{
    public $choice = [
        'periode' => [],
    ];

    public $nim;
    public $nama;
    public $alumni;
    public $email;
    public $password;
    public $password_confirm;
    public $periode;
    public $prodi;

    public function mount(){
        $this->choice['periode'] = Periode::all()->toArray();
        $this->choice['prodi'] = Prodi::all()->toArray();
    }

    public function updatedNim($value){
        $alumni = User::where('nim', $value)->first();
        if($alumni) {
            $this->alumni = $alumni;
            return;
        }
        
        $this->alumni = null;
    }

    public function save(){
        $this->validate([
            'nim' => ['required'],
            'nama' => ['required'],
            'prodi' => ['required'],
            'email' => ['required', 'unique:users,email'],
            'password' => ['required'],
            'password_confirm' => ['required', 'same:password'],
            'periode' => ['required'],
        ]);

        try{
            $alumni = $this->alumni;
            if($alumni){
                if($alumni->email == '' || $alumni->email == null){
                    $alumni->periode = $this->periode;
                    $alumni->email = $this->email;
                    $alumni->password = bcrypt($this->password);
                    $alumni->save();

                    return redirect()->route('login')->with('registrasi', true);
                }
            } else {
                $new = new User;
                $new->nim = $this->nim;
                $new->nama = $this->nama;
                $new->prodi = $this->prodi;
                $new->periode = $this->periode;
                $new->email = $this->email;
                $new->password = bcrypt($this->password);
                $new->role = 'alumni';
                $new->save();

                return redirect()->route('login')->with('registrasi', true);
            }

            return;
        } catch (\Exception $_){ }
    }

    public function render()
    {
        return view('pages.registrasi-demo')->layout('components.layouts.blank');
    }
}
