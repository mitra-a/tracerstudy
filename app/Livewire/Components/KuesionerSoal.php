<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Illuminate\Support\Str;

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
        $this->opsi_x = $this->row->opsi_x;
        $this->opsi_y = $this->row->opsi_y;
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

    public function updatedOpsiX(){
        $row = $this->row;
        $row->opsi_x = $this->opsi_x;
        $row->save();
    }

    public function updatedOpsiY(){
        $row = $this->row;
        $row->opsi_y = $this->opsi_y;
        $row->save();
    }

    public function tambahOpsi($type){
        $this->{'opsi_'.$type}[(string) Str::orderedUuid()] = '';
        $this->{'updatedOpsi' . strtoupper($type)}();
    }

    public function hapusOpsi($type, $index){
        unset($this->{'opsi_'.$type}[$index]);
        $this->{'updatedOpsi' . strtoupper($type)}();
    }

    public function render()
    {
        return view('components.kuesioner-soal');
    }
}
