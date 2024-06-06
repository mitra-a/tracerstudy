<?php

namespace App\Livewire\Pages;

use App\Models\LoginHistory;
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

        $error = false;
        $username = $this->username;
        $password = $this->password;

        try{
            $dataLogin = getDataLogin($username, $password);
            if($dataLogin){
                session()->put('login', (object) $dataLogin);

                LoginHistory::updateOrCreate([
                    'kode' => $dataLogin->nim,
                ],[
                    'nama' => $dataLogin->nama,
                    'role' => 'pengguna',
                    'prodi' => $dataLogin->prodi,
                    'last_login_at' => Carbon::now()->toDateTimeString(),
                    'last_login_ip' => request()->getClientIp(),
                ]);

                return redirect()->route('pengguna.dashboard');
            }
        } catch(\Exception $e) {
            $error = true;
        }
        

        if(Auth::attempt([
            'nim' => $this->username,
            'password' => $this->password,
        ])){
            $data = auth()->user();

            LoginHistory::updateOrCreate([
                'kode' => $data->id,
            ],[
                'nama' => $data->nama,
                'role' => 'admin',
                'prodi' => null,
                'last_login_at' => Carbon::now()->toDateTimeString(),
                'last_login_ip' => request()->getClientIp(),
            ]);

            $data = $data->toArray();
            session()->put('login', (object) $data);

            return redirect()->route('admin.dashboard');
        } else {
            if($error){
                session()->flash('danger-auth', true);
            } else {
                session()->flash('warning-auth', true);
            }
        }
    }

    public function render()
    {
        return view('pages.login')->layout('components.layouts.blank');
    }
}