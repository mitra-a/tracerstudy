<?php

namespace App\Livewire\Pages\Alumni;

use App\Models\Kuesioner;
use App\Models\KuesionerJawaban;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Dashboard extends Component
{
    public $kuesioner;
    public $rows;
    public $login;
    public $search;
    public $belum_lengkap;

    public function mount(){
        if(Hash::check(auth()->user()->nim, auth()->user()->password)) 
        $this->belum_lengkap = true;

        $periode = auth()->user()->periode;
        $this->kuesioner = Kuesioner::where('periode', 'LIKE', '%'. $periode .'%')->get()->toArray();

        foreach($this->kuesioner as $index => $item){
            $check = KuesionerJawaban::where('alumni_id', auth()->user()->id)->where('kuesioner_id', $item['id'])->first();

            $this->kuesioner[$index]['selesai'] = $check ? true : false;
            $this->kuesioner[$index]['validasi'] = $check ? ($check->validasi ? true : false) : false;
        }

        $this->rows = $this->kuesioner;

        $this->login = User::whereNotNull('last_login_at')
            ->where('role', 'alumni')
            ->orderBy('last_login_at', 'DESC')
            ->limit(9)
            ->get();
    }

    public function validasi($id){
        $data = [];

        KuesionerJawaban::where('alumni_id', auth()->user()->id)
            ->where('kuesioner_id', $id)->update([
                'validasi' => 1,
            ]);
        
        foreach($this->kuesioner as $index => $item){
            if($item['id'] == $id) $item['validasi'] = 1;
            $data[] = $item;
        }

        $this->kuesioner = $data;
        $this->rows = $data;
    }

    public function searchData($value = false){ if($value) $this->search = null; }

    public function render()
    {
        $value = $this->search;
        $result = array_filter($this->kuesioner, function ($item) use ($value) {
            if (stripos($item['nama'], $value) !== false || stripos($item['deskripsi'], $value) !== false) {
                return true;
            }
            return false;
        });
        $this->rows = $result;
        return view('pages.alumni.dashboard');
    }
}
