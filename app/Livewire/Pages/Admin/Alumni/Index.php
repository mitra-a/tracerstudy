<?php

namespace App\Livewire\Pages\Admin\Alumni;

use App\Livewire\Pages\Admin\Prodi;
use App\Livewire\Traits\WithCachedRows;
use App\Livewire\Traits\WithPerPagePagination;
use App\Models\Prodi as ModelsProdi;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Index extends Component
{
    use WithCachedRows;
    use WithPerPagePagination;

    public $search = '';

    public function import(){
        ini_set('max_execution_time', '300000');
        set_time_limit(0);

        $prodi = ModelsProdi::all()->keyBy('kode')->toArray();
        User::where('role', 'alumni')->delete();

        // https://ids.jtik.ft.unm.ac.id/hub/api?kd_prodi=&nim=&q=
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Token' => env('IDS_TOKEN_API')
        ])->get('https://ids.jtik.ft.unm.ac.id/hub/api?kd_prodi=&nim=&q=');

        $response_json = $response->json();
        $response_json = $response_json['data'];

        foreach($response_json as $item){
            if(!isset($prodi[$item['kd_prodi']])){
                $new = new ModelsProdi;
                $new->kode = $item['kd_prodi'];
                $new->nama = $item['nm_prodi'];
                $new->save();

                $prodi[$item['kd_prodi']] = true;
            }

            $data = [
                'nim' => $item['nim'],
                'prodi' => $item['kd_prodi'],
                'nama' => $item['nm_mhs'],
                'jenis_kelamin' => $item['jenis_kelamin'] == 'L' ? 'Laki - Laki' : 'Perempuan',
                'tanggal_lahir' => $item['tgl_lahir'],
                'alamat' => $item['alamat_asal_mhs'],
                'nomor_telepon' => $item['no_hp_mhs'],
                'role' => 'alumni',
                'password' => bcrypt($item['nim']),
            ];

            User::create($data);
        }

        session()->flash('message', [
            'color' => 'success',
            'title' => 'Berhasil!',
            'sub-title' => 'Berhasil melakukan import data dari IDS',
        ]);
    }

    public function delete($id){
        $delete = User::findOrFail($id);
        Storage::delete($delete->foto ?? '');
        $delete->delete();

        session()->flash('message', [
            'color' => 'warning',
            'title' => 'Berhasil!',
            'sub-title' => 'Berhasil melakukan penghapusan data',
        ]);
    }
    
    public function getRowsQueryProperty(){
        return User::where('role', 'alumni')->when($this->search, function($query, $value){
            $query->where('nama', 'LIKE', '%' . $value . '%')
                ->orWhere('nim', 'LIKE', '%' . $value . '%')
                ->orWhere('email', 'LIKE', '%' . $value . '%')
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
        return view('pages.admin.alumni.index', [
            'rows' => $this->rows
        ]);
    }
}
