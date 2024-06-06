<?php

namespace App\Livewire\Pages;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Login extends Component
{
    public $username, $password, $tahun = 'semua';

    public function login(){
        $this->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        $username = $this->username;
        $password = $this->password;

        try{
            $dataLogin = getDataLogin($username, $password);
            if($dataLogin){
                session()->put('login', (object) $dataLogin);
                return redirect()->route('pengguna.dashboard');
            }
        } catch(\Exception $e) {}
        

        if(Auth::attempt([
            'nim' => $this->username,
            'password' => $this->password,
            'aktif' => 1,
        ])){
            $data = auth()->user();
            $data->last_login_at = Carbon::now()->toDateTimeString();
            $data->last_login_ip = request()->getClientIp();
            $data->save();

            $data = $data->toArray();
            session()->put('login', (object) $data);

            return redirect()->route('admin.dashboard');
        } else {
            session()->flash('warning-auth', true);
        }
    }

    public function render()
    {
        return view('pages.login')->layout('components.layouts.blank');
    }
}