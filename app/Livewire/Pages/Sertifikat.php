<?php

namespace App\Livewire\Pages;

use App\Models\Kuesioner;
use App\Models\KuesionerJawaban;
use App\Models\Prodi;
use App\Models\User;
use chillerlan\QRCode\QRCode;
use Livewire\Component;

class Sertifikat extends Component
{
    public $id;
    public $akun;
    public $kuesioner;
    public $tanggal_jawab;
    public $waktu_jawab;
    public $route;
    public $prodi;

    public function mount(){
        $string = explode('.', request()->get('id'));
        if(count($string) != 2) abort(404);
        
        $id = $string[0];
        $id_alumni = $string[1];

        $this->id = $id;

        try {
            $akun = getDataProfile($id_alumni);
        } catch (\Exception $e){
            abort(300);
        }

        $this->akun = $akun;
        $this->kuesioner = Kuesioner::findOrFail($id);
        $jawaban = KuesionerJawaban::where('kuesioner_id', $id)->where('nim', $id_alumni)->where('validasi',1)->get();
        
        if(count($jawaban) < 1){
            abort(404);
        }

        $bulan = [
            'January' => 'Januari',
            'February' => 'Februari',
            'March' => 'Maret',
            'April' => 'April',
            'May' => 'Mei',
            'June' => 'Juni',
            'July' => 'Juli',
            'August' => 'Agustus',
            'September' => 'September',
            'October' => 'Oktober',
            'November' => 'November',
            'December' => 'Desember'
        ];

        $bulan_jawab = $jawaban[0]->created_at->format('F');
        $tanggal_jawab = $jawaban[0]->created_at->format('d');
        $tahun_jawab = $jawaban[0]->created_at->format('Y');

        $this->prodi = Prodi::where('kode', $this->akun?->prodi)->first()->toArray();
        $this->tanggal_jawab = $tanggal_jawab . ' ' . $bulan[$bulan_jawab] . ' ' . $tahun_jawab;
        $this->waktu_jawab = $jawaban[0]->created_at->format('H:i');
    }

    public function render()
    {
        return view('pages.sertifikat')->layout('components.layouts.blank');
    }
}
