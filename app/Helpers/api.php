<?php

use App\Models\Pengguna;
use Illuminate\Support\Facades\Http;

function getDataLogin($username, $password){
    $response = Http::withHeaders([
        'Accept' => 'application/json',
        'Token' => env('IDS_LOGIN_TOKEN_API')
    ])->get('http://ids.jtik.ft.unm.ac.id/hub/api?username='.$username.'&password='.$password);

    $response_json = $response->json();
    $response_json = optional($response_json)['data'];

    if(optional($response_json)['status'] == true){
        $data = Pengguna::where('nim', $response_json['kode'])->first();
        if($data){
            $data = (object) $data->toArray();
        } else {
            $data = getDataProfile($response_json['kode']);
        }

        if($data){
            $data->role = "pengguna";
            $data->last_login = $response_json['last_login'];
            return $data;
        }
    }

    return null;
}

function getDataProfile($nim){
    $response = Http::withHeaders([
        'Accept' => 'application/json',
        'Token' => env('IDS_MAHASISWA_TOKEN_API')
    ])->get('https://ids.jtik.ft.unm.ac.id/hub/api?kd_prodi=&nim=' . $nim . '&q=');

    $response_json = $response->json();
    $response_json = $response_json['data'];

    if(isset($response_json[0])){
        $item = $response_json[0];

        $data = (object) [
            'nim' => $item['nim'],
            'nama' => $item['nm_mhs'],
            'prodi' => $item['kd_prodi'],
            'tanggal_lahir' => $item['tgl_lahir'],
            'jenis_kelamin' => $item['jenis_kelamin'] == 'L' ? 'Laki - Laki' : 'Perempuan',
            'nomor_hp' => $item['no_hp_mhs'],
            'nomor_telepon' => $item['no_telp_mhs'],
        ];

        return $data;
    }

    return null;
}