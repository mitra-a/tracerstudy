<?php

namespace App\Livewire\Pages\Pengguna;

use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Profile extends Component
{
    public $data;

    public function mount(){
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Token' => env('IDS_MAHASISWA_TOKEN_API')
        ])->get('https://ids.jtik.ft.unm.ac.id/hub/api?kd_prodi=&nim=' . session('login')->kode . '&q=');

        $response_json = $response->json();
        $response_json = $response_json['data'];

        if(isset($response_json[0])){
            $item = $response_json[0];

            $this->data = (object) [
                'nim' => $item['nim'],
                'nama' => $item['nm_mhs'],
                'prodi' => $item['kd_prodi'],
                'tanggal_lahir' => $item['tgl_lahir'],
                'jenis_kelamin' => $item['jenis_kelamin'] == 'L' ? 'Laki - Laki' : 'Perempuan',
                'nomor_hp' => $item['no_hp_mhs'],
                'nomor_telepon' => $item['no_telp_mhs'],
            ];
        }
    }
    
    public function render()
    {
        return view('pages.pengguna.profile');
    }
}
