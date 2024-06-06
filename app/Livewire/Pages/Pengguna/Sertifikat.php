<?php

namespace App\Livewire\Pages\Pengguna;

use App\Models\Kuesioner;
use App\Models\KuesionerJawaban;
use chillerlan\QRCode\QRCode;
use Livewire\Component;

class Sertifikat extends Component
{
    public $id;
    public $kuesioner;
    public $tanggal_jawab;
    public $route;

    public function mount($id){
        $this->id = $id;
        $this->kuesioner = Kuesioner::findOrFail($id);
        $jawaban = KuesionerJawaban::where('kuesioner_id', $id)->where('alumni_id', auth()->user()->id)->where('validasi',1)->get();
        
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

        $this->tanggal_jawab = $tanggal_jawab . ' ' . $bulan[$bulan_jawab] . ' ' . $tahun_jawab;
        
        $route = route('sertifikat', $id . '@' . auth()->user()->id);
        $this->route = (new QRCode())->render($route);
    }

    public function render()
    {
        return view('pages.pengguna.sertifikat')->layout('components.layouts.print');
    }
}
