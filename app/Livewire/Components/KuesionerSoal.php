<?php

namespace App\Livewire\Components;

use App\Models\KuesionerSoalOpsi;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

class KuesionerSoal extends Component
{
    public $row;

    public $pertanyaan;
    public $type;
    public $opsi_x;
    public $opsi_y;

    public function mount($row){
        $this->row = $row;
        $this->pertanyaan = $this->row->pertanyaan;
        $this->type = $this->row->type;
        $this->opsi_x = $this->row->opsi_x->keyBy('id')->toArray();
        $this->opsi_y = $this->row->opsi_y->keyBy('id')->toArray();
    }

    public function required(){
        $row = $this->row;
        $row->required = $row->required == 1 ? 0 : 1;
        $row->save();
    }

    public function updatedPertanyaan(){
        $row = $this->row;
        $row->pertanyaan = $this->pertanyaan;
        $row->save();
    }

    #[On('update-opsi-order')]
    public function updateHalamanOrder($data, $type){
        $usecase = '';
        $wherein = '';

        foreach($data as $index => $d){
            $wherein .= "'".$d['value']."'";
            if($index + 1 < count($data)) $wherein .= ",";
            $usecase .= 'WHEN "' . $d['value'] . '" THEN "' . $d['order'] . '" ';
        }

        KuesionerSoalOpsi::whereIn('id', array_column($data, 'value'))->update([
            'order' => DB::raw('CASE id ' . $usecase . ' END')
        ]);

        $this->{"opsi_".$type} = $this->row->{"opsi_".$type}->keyBy('id')->toArray();
    }

    public function updatedOpsiX($value, $id){
        $index = str_replace(".opsi", "", $id);
        KuesionerSoalOpsi::where('id', optional($this->opsi_x[$index])['id'])->update([
            'opsi' => $value,
        ]);

        $this->opsi_x = $this->row->opsi_x->keyBy('id')->toArray();
    }

    public function updatedOpsiY($value, $id){
        $index = str_replace(".opsi", "", $id);
        KuesionerSoalOpsi::where('id', optional($this->opsi_y[$index])['id'])->update([
            'opsi' => $value,
        ]);

        $this->opsi_y = $this->row->opsi_y->keyBy('id')->toArray();
    }

    public function tambahOpsi($type){
        $lastOrder = KuesionerSoalOpsi::where('soal_id', $this->row->id)
            ->where('type', $type)
            ->orderBy('order','DESC')
            ->first();

        KuesionerSoalOpsi::create(
            [
                'soal_id' => $this->row->id,
                'type' => $type,
                'opsi' => '',
                'order' => $lastOrder ? $lastOrder->order + 1 : 1,
            ]
        );

        $this->{"opsi_".$type} = $this->row->{"opsi_".$type}->keyBy('id')->toArray();
    }

    public function hapusOpsi($type, $id){
        KuesionerSoalOpsi::where('id', $id)->delete();
        $this->{"opsi_".$type} = $this->row->{"opsi_".$type}->keyBy('id')->toArray();
    }

    public function render()
    {
        return view('components.kuesioner-soal');
    }
}
