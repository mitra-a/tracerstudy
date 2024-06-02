<?php

namespace App\Livewire\Pages;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $username, $password, $tahun = 'semua';

    public function login(){
        $this->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if(Auth::attempt([
            'nim' => $this->username,
            'password' => $this->password,
            'aktif' => 1,
        ])){
            
            $data = auth()->user();
            $data->last_login_at = Carbon::now()->toDateTimeString();
            $data->last_login_ip = request()->getClientIp();
            $data->save();

            switch ($data->role) {
                case 'admin':
                    return redirect()->route('admin.dashboard');
                    break;
                case 'alumni':
                    return redirect()->route('alumni.dashboard');
                    break;
            }
        } else {
            session()->flash('warning-auth', true);
        }
    }

    public function render()
    {
        return view('pages.login')->layout('components.layouts.blank');
    }
}