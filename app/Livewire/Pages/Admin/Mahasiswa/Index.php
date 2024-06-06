<?php

namespace App\Livewire\Pages\Admin\Mahasiswa;

use App\Livewire\Traits\WithCachedRows;
use App\Livewire\Traits\WithPerPagePagination;
use App\Models\Pengguna;
use App\Models\Prodi as ModelsProdi;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Index extends Component
{
    use WithCachedRows;
    use WithPerPagePagination;

    public $search = '';

    public function import(){
        $prodi = ModelsProdi::all()->keyBy('kode')->toArray();
        User::where('role', 'alumni')->delete();

        // https://ids.jtik.ft.unm.ac.id/hub/api?kd_prodi=&nim=&q=
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Token' => env('IDS_MAHASISWA_TOKEN_API')
        ])->get('https://ids.jtik.ft.unm.ac.id/hub/api?kd_prodi=&nim=&q=');

        $response_json = $response->json();
        $response_json = $response_json['data'];

        foreach(array_chunk($response_json, 1000) as $arrayChunk){
            $insertData = [];

            foreach($arrayChunk as $item){
                if(!isset($prodi[$item['kd_prodi']])){
                    $new = new ModelsProdi;
                    $new->kode = $item['kd_prodi'];
                    $new->nama = $item['nm_prodi'];
                    $new->save();
                    
                    $prodi[$item['kd_prodi']] = true;
                }
    
                $insertData[] = [
                    'nim' => $item['nim'],
                    'nama' => $item['nm_mhs'],
                    'prodi' => $item['kd_prodi'],
                    'tanggal_lahir' => $item['tgl_lahir'],
                    'jenis_kelamin' => $item['jenis_kelamin'] == 'L' ? 'Laki - Laki' : 'Perempuan',
                    'nomor_hp' => $item['no_hp_mhs'],
                    'nomor_telepon' => $item['no_telp_mhs'],
                ];
            }

            Pengguna::insert($insertData);
        }

        session()->flash('message', [
            'color' => 'success',
            'title' => 'Berhasil!',
            'sub-title' => 'Berhasil melakukan import data dari IDS',
        ]);
    }

    public function getRowsQueryProperty(){
        return Pengguna::when($this->search, function($query, $value){
            $query->where('nama', 'LIKE', '%' . $value . '%')
                ->orWhere('nim', 'LIKE', '%' . $value . '%')
                ->orWhere('nomor_telepon', 'LIKE', '%' . $value . '%');
        });
    }

    public function getRowsProperty(){
        return $this->cache(function () {
            return $this->applyPagination($this->rowsQuery);
        });
    }

    public function searchData($value = false){ if($value) $this->search = null; }
    
    public function render()
    {
        return view('pages.admin.mahasiswa.index', [
            'rows' => $this->rows
        ]);
    }
}
