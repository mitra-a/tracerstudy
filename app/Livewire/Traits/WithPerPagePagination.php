<?php

namespace App\Livewire\Traits;

use Livewire\WithPagination;

trait WithPerPagePagination
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $perPage = 30;

    public function mountWithPerPagePagination()
    {
        $this->perPage = session()->get('perPage', $this->perPage);
    }

    public function updatedPerPage($value)
    {
        session()->put('perPage', $value);
    }

    public function applyPagination($query)
    {
        return $query->paginate($this->perPage);
    }
}