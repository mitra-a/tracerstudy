<?php

namespace App\Livewire\Pages;

use App\Models\LoginHistory;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $username;

    public $password;

    public $tahun = 'semua';

    public function login()
    {
        $this->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        $error = false;

        try {
            if (Auth::attempt([
                'email' => $this->username,
                'password' => $this->password,
            ])) {
                $data = auth()->user();

                LoginHistory::updateOrCreate([
                    'kode' => $data->id,
                ], [
                    'nama' => $data->nama,
                    'role' => $data->role == 'alumni' ? 'pengguna' : 'admin',
                    'prodi' => null,
                    'last_login_at' => Carbon::now()->toDateTimeString(),
                    'last_login_ip' => request()->getClientIp(),
                ]);

                $data->role = $data->role == 'alumni' ? 'pengguna' : 'admin';
                session()->put('login', (object) $data);

                if ($data->role == 'pengguna') {
                    return redirect()->route('pengguna.dashboard');
                } else {
                    return redirect()->route('admin.dashboard');
                }
            } else {
                if ($error) {
                    session()->flash('danger-auth', true);
                } else {
                    session()->flash('warning-auth', true);
                }
            }
        } catch (\Exception $error) {
        }
    }

    public function render()
    {
        return view('pages.login')->layout('components.layouts.blank');
    }
}
