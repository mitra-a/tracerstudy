<?php

namespace App\Livewire\Components;

use App\Models\KuesionerJawaban;
use App\Models\KuesionerSoal;
use Livewire\Component;

class KuesionerChart extends Component
{
    public $id;
    public $data;

    public function mount($id, $prodi = null){
        $this->id = $id;

        $soal = KuesionerSoal::where('kuesioner_id', $id)
            // ->with('detail')
            ->get()
            ->toArray();

        $jawaban = KuesionerJawaban::query()
            ->where('validasi', 1)
            ->whereIn('soal_id', array_column($soal, "id"))
            ->when($prodi, function($query, $value){
                $query->with(['alumni' => function($e) use ($value) {
                    $e->where('prodi', $value);
                }]);
            })
            ->with('jawaban_x')
            ->get()
            ->toArray();

        $jumlahAlumni = KuesionerJawaban::query()
            ->whereIn('soal_id', array_column($soal, "id"))
            ->when($prodi, function($query, $value){
                $query->with(['alumni' => function($e) use ($value) {
                    $e->where('prodi', $value);
                }]);
            })
            ->with('jawaban_x')
            ->groupBy("alumni_id")
            ->get();

        $jumlahAlumni = count($jumlahAlumni);
        $hasil = [];

        foreach($soal as $s){
            if(in_array($s['type'], ['jawab-text', 'jawab-angka', 'jawab-tanggal', 'jawab-waktu'])) continue;
            $data = [
                'id' => $s['id'],
                'pertanyaan' => $s['pertanyaan'],
                'type' => $s['type'],
                'label' => null,
                'data' => null,
            ];

            if($data['type'] == 'dropdown' || $data['type'] == 'pilihan-ganda'){
                foreach($s["opsi_x"] as $index => $detail){
                    $count = 0;
                    foreach($jawaban as $item){
                        if($item["type"] != 'dropdown' && $item["type"] != 'pilihan-ganda') continue;
                        $count += $item["jawaban"] == $index ? 1 : 0;
                    }
                    
                    $data["label"][] = $detail;
                    $data["data"][] = $count;
                }
            }

            if($data['type'] == 'kotak-centang'){
                foreach($s["opsi_x"] as $index => $detail){
                    $count = 0;
                    foreach($jawaban as $item){
                        if($item["type"] != 'kotak-centang') continue;
                        foreach($item["jawaban_x"] as $x){
                            $count += $x["jawaban"] == $index ? 1 : 0;
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
                    $index = 0;
                    foreach($labelY as $indexY => $y){
                        $count = 0;
                        foreach($jawaban as $item){
                            if($item["type"] != 'petak-pilihan-ganda') continue;
                            foreach($item["jawaban_x"] as $itemX){
                                if($itemX["key"] == $indexX && $itemX["jawaban"] == $indexY){
                                    $count += 1;
                                }
                            }
                        }
                        
                        $data["data"][$index]["name"] = $y;
                        $data["data"][$index]["data"][] = $count;
                        $index++;
                    }
                }

                $data["label"] = array_values($labelX);
            }

            if($data['type'] == 'petak-kotak-centang'){
                $labelY = [];
                $labelX = [];

                $labelY = $s["opsi_y"];
                $labelX = $s["opsi_x"];
                
                foreach($labelX as $indexX => $x){
                    $index = 0;
                    foreach($labelY as $indexY => $y){
                        $count = 0;
                        foreach($jawaban as $item){
                            if($item["type"] != 'petak-kotak-centang') continue;
                            foreach($item["jawaban_x"] as $itemX){
                                foreach($itemX["jawaban_y"] as $itemY){
                                    if($itemX["key"] == $indexX && $itemY["jawaban"] == $indexY){
                                        $count += 1;
                                    }
                                }
                            }
                        }

                        $data["data"][$index]["name"] = $y;
                        $data["data"][$index]["data"][] = $count;
                        $index++;
                    }
                }

                $data["label"] = array_values($labelX);
            }
            
            $hasil[] = $data;
        }

        $this->data = $hasil;
    }

    public function render()
    {
        return view('components.kuesioner-chart');
    }
}
