<?php

namespace App\Http\Controllers;

use App\Models\Kuesioner;
use App\Models\KuesionerJawaban;
use App\Models\KuesionerSoal;
use App\Models\KuesionerSoalOpsi;
use Illuminate\Http\Request;

class ExcelExportController extends Controller
{
    public $id;
    public $kuesioner;
    public $soal;
    public $jawaban;

    public function jawaban($id){
        $this->id = $id;
        $this->kuesioner = Kuesioner::findOrFail($id);

        $soal = KuesionerSoal::where('kuesioner_id', $id)
            ->with(['opsi_x', 'opsi_y'])
            ->get()
            ->toArray();

        $this->soal = $soal;

        $kuesionerSoalOpsi = KuesionerSoalOpsi::whereIn('soal_id', array_column($soal, 'id'))
            ->get()
            ->keyBy('id')
            ->toArray();

        $kuesionerJawaban = KuesionerJawaban::where('kuesioner_id', $id)
            ->with(['jawaban_x', 'prodi_data'])
            ->get()
            ->groupBy('nim');

        $jawabanRow = [];
        foreach($kuesionerJawaban as $index => $jawaban){
            $jawabanRow[$index] = [
                'nama' => $jawaban[0]->nama,
                'nim' => $jawaban[0]->nim,
                'prodi' => $jawaban[0]->prodi_data->nama,
            ];

            foreach($soal as $itemSoal){
                $jawabanSoalIni = $jawaban->where('soal_id', $itemSoal['id'])->first();
                $jawabanBeruntun = null;

                if($itemSoal['type'] == 'petak-kotak-centang'){
                    $jawabanBeruntun = [];

                    foreach($itemSoal['opsi_x'] as $x){
                        if($jawabanSoalIni){
                            $jawabanX = $jawabanSoalIni->jawaban_x->where('key', $x['id'])->first();
                            $jawabanY = '';
    
                            foreach($jawabanX->jawaban_y as $y){
                                if($jawabanY) $jawabanY .= ", ";
                                $jawabanY .= optional(optional($kuesionerSoalOpsi)[$y->jawaban])['opsi'];
                            }
    
                            $jawabanBeruntun[] = [
                                'opsi' => $x['opsi'],
                                'jawaban' => $jawabanY,
                            ];
                        } else {
                            $jawabanBeruntun[] = [
                                'opsi' => $x['opsi'],
                                'jawaban' => '',
                            ];
                        }
                    }
                }

                if($itemSoal['type'] == 'petak-pilihan-ganda'){
                    $jawabanBeruntun = [];

                    foreach($itemSoal['opsi_x'] as $x){
                        if($jawabanSoalIni){
                            $jawabanX = $jawabanSoalIni->jawaban_x->where('key', $x['id'])->first();
                            $jawabanBeruntun[] = [
                                'opsi' => $x['opsi'],
                                'jawaban' => optional(optional($kuesionerSoalOpsi)[$jawabanX->jawaban])['opsi'],
                            ];
                        } else {
                            $jawabanBeruntun[] = [
                                'opsi' => $x['opsi'],
                                'jawaban' => '',
                            ];
                        }
                    }
                }

                if($itemSoal['type'] == 'kotak-centang'){
                    $jawabanBeruntun = '';
                    if($jawabanSoalIni){
                        foreach($jawabanSoalIni->jawaban_x as $x){
                            if($jawabanBeruntun) $jawabanBeruntun .= ", ";
                            $jawabanBeruntun .= optional(optional($kuesionerSoalOpsi)[$x->jawaban])['opsi'];
                        }
                    }
                }

                if(in_array($itemSoal['type'], ['jawab-text', 'jawab-angka', 'jawab-tanggal', 'jawab-waktu'])){
                    $jawabanBeruntun = $jawabanSoalIni?->jawaban ?? '';
                }

                $jawabanRow[$index]['jawaban'][] = [
                    'id' => $itemSoal['id'],
                    'pertanyaan' => $itemSoal['pertanyaan'],
                    'jawaban' => $jawabanBeruntun ? $jawabanBeruntun : optional(optional($kuesionerSoalOpsi)[$jawabanSoalIni?->jawaban ?? ''])['opsi'],
                ];
            }
        }

        $this->jawaban = $jawabanRow;

        return view('pages.admin.laporan.excel', [
            'jawaban' => $this->jawaban,
            'id' => $this->id,
            'soal' => $this->soal,
        ]);
    }
}
