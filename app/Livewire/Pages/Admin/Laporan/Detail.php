<?php

namespace App\Livewire\Pages\Admin\Laporan;

use App\Models\Kuesioner;
use App\Models\KuesionerJawaban;
use App\Models\KuesionerSoal;
use Livewire\Component;

class Detail extends Component
{
    public $id;
    public $user_id;
    public $halaman;
    
    public $kuesioner;
    public $data;

    public function mount($id){
        $this->id = $id;
        $this->kuesioner = Kuesioner::findOrFail($id);
        
        $soal = KuesionerSoal::where('kuesioner_id', $id)
            // ->with('detail')
            ->get()
            ->toArray();

        $jawaban = KuesionerJawaban::query()
            ->whereIn('soal_id', array_column($soal, "id"))
            // ->with([ 'x', 'alumni' => function($e) use ($request){
            //         $e->where('periode_wisuda', $request->periode)
            //             ->where('program_studi', $request->prodi);
            // }])
            ->with('jawaban_x')
            ->get()
            ->toArray();

        $jumlahAlumni = KuesionerJawaban::query()
            ->whereIn('soal_id', array_column($soal, "id"))
            // ->with([ 'x', 'alumni' => function($e) use ($request){
            //         $e->where('periode_wisuda', $request->periode)
            //             ->where('program_studi', $request->prodi);
            // }])
            ->with('jawaban_x')
            ->groupBy("alumni_id")
            ->get();

        $jumlahAlumni = count($jumlahAlumni);
        $hasil = [];

        foreach($soal as $s){
            if($s['type'] == 'jawab-text') continue;
            $data = [
                'id' => $s['id'],
                'pertanyaan' => $s['pertanyaan'],
                'type' => $s['type'],
                'label' => null,
                'data' => null,
            ];

            // Pertama mengecek apakah typenya samadengan dropdown atau pilihan-ganda.
            // Kemudian detail dari pertanyaan akan di foreach karena akan digunakan untuk menghitung jumlah jawaban
            // Setelah itu pada jawaban dicek apakah dia termasuk jawaban bertype dropdown atau pilihan-ganda
            // jika tidak maka return 0, jika iya maka cek apakah soal detail sesuai dengan jawaban yang diberikan
            // jika sesuai maka akan mereturn 1 jika tidak maka 0
            // Terakhir hasilnya akan di hitung total yang menjawab

            if($data['type'] == 'dropdown' || $data['type'] == 'pilihan-ganda'){
                foreach($s["opsi_x"] as $detail){
                    $count = 0;
                    foreach($jawaban as $item){
                        if($item["type"] != 'dropdown' && $item["type"] != 'pilihan-ganda') continue;
                        $count += $item["jawaban"] == $detail ? 1 : 0;
                    }
                    
                    $data["label"][] = $detail;
                    $data["data"][] = $count;
                }
            }

            if($data['type'] == 'kotak-centang'){
                foreach($s["opsi_x"] as $detail){
                    $count = 0;
                    foreach($jawaban as $item){
                        if($item["type"] != 'kotak-centang') continue;
                        foreach($item["jawaban_x"] as $x){
                            $count += $x["jawaban"] == $detail ? 1 : 0;
                        }
                    } 
                    
                    $data["label"][] = $detail;
                    $data["data"][] = $count;
                }
            }

            if($data['type'] == 'petak-pilihan-ganda'){
                $labelY = [];
                $labelX = [];

                $labelY = $s["opsi_y"];
                $labelX = $s["opsi_x"];

                foreach($labelX as $indexX => $x){
                    foreach($labelY as $indexY => $y){
                        $count = 0;
                        foreach($jawaban as $item){
                            if($item["type"] != 'petak-pilihan-ganda') continue;
                            foreach($item["jawaban_x"] as $itemX){
                                if($itemX["key"] == $x && $itemX["jawaban"] == $y){
                                    $count += 1;
                                }
                            }
                        }
                        
                        $data["data"][$indexY]["name"] = $y;
                        $data["data"][$indexY]["data"][] = $count;
                    }
                }

                $data["label"] = $labelX;
            }

            if($data['type'] == 'petak-kotak-centang'){
                $labelY = [];
                $labelX = [];

                $labelY = $s["opsi_y"];
                $labelX = $s["opsi_x"];
                
                foreach($labelX as $indexX => $x){
                    foreach($labelY as $indexY => $y){
                        $count = 0;
                        foreach($jawaban as $item){
                            if($item["type"] != 'petak-kotak-centang') continue;
                            foreach($item["jawaban_x"] as $itemX){
                                foreach($itemX["jawaban_y"] as $itemY){
                                    if($itemX["key"] == $x && $itemY["jawaban"] == $y){
                                        $count += 1;
                                    }
                                }
                            }
                        }

                        $data["data"][$indexY]["name"] = $y;
                        $data["data"][$indexY]["data"][] = $count;
                    }
                }

                $data["label"] = $labelX;
            }
            
            $hasil[] = $data;
        }

        $this->data = $hasil;
    }

    public function render()
    {
        return view('pages.admin.laporan.detail');
    }
}
