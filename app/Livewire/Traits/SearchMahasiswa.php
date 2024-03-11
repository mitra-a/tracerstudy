<?php

namespace App\Livewire\Traits;

use App\Models\User;

trait SearchMahasiswa
{
    public $search;
    public $data_mahasiswa;
    public $mahasiswa;

    public function searchData(){
        $this->data_mahasiswa = User::where('role', 'mahasiswa')
            ->whereNotNull('prodi_id')
            ->whereNotNull('nim')
            ->where('nama', 'LIKE', '%' . $this->search . '%')
            ->orWhere('nim', 'LIKE', '%' . $this->search . '%')
            ->limit(50)
            ->get();
    }

    public function selectMahasiswa($data){
        if($data == false){
            $this->mahasiswa = null;
        }
        $this->mahasiswa = $data;
    }
}