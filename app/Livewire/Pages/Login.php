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

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Token' => env('IDS_LOGIN_TOKEN_API')
        ])->get('http://ids.jtik.ft.unm.ac.id/hub/api?username='.$username.'&password='.$password);

        $response_json = $response->json();
        $response_json = optional($response_json)['data'];

        if(optional($response_json)['status'] == true){
            session()->put('login', (object) [
                "id" => "55",
                "oto" => "4",
                "level" => "user",
                "kode" => "200209501019",
                "nama" => "MITRA",
                "last_login" => "2024-01-16 12:07:43",
                "role" => "pengguna",
            ]);

            return redirect()->route('pengguna.dashboard');
        }

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