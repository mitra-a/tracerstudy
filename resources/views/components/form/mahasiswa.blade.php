@if(!$this->mahasiswa)
<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="input-cari-mahasiswa">Mahasiswa</label>
    <div class="col-sm-10 d-flex">
        <input 
            wire:model="search"
            type="text" 
            class="form-control @error('mahasiswa') is-invalid @enderror" 
            id="input-cari-mahasiswa" 
            placeholder="Cari mahasiswa....">
        
        <button type="button" wire:click="searchData" class="btn btn-primary ms-2">Cari</button>
    </div>
</div>

@if($this->search)
    @if(count($this->data_mahasiswa))
    <div class="list-group mb-3">
        @foreach ($this->data_mahasiswa as $item)
            <div 
                type="button" 
                class="list-group-item list-group-item-action" 
                wire:click="selectMahasiswa({{$item}})"
            >
                <b>{{ $item->nama }}</b>
                <p class="mb-0">{{ $item->nim }}</p>
            </div>
        @endforeach
    </div>
    @else
        <div class="list-group mb-3">
            <div class="list-group-item text-center py-4">
                <i class="bx bx-search mb-2" style="font-size: 30px"></i>
                <p class="mb-0">Tidak Ada data <br/> Mahasiswa ditemukan</p>
            </div>
        </div>
    @endif
@endif
@else
<div class="list-group mb-3">
    <div class="list-group-item d-flex justify-content-between">
        <div>
            <b>{{ optional($this->mahasiswa)['nama'] }}</b>
            <p class="mb-0">{{ optional($this->mahasiswa)['nim'] }}</p>
        </div>

        <button 
            type="button"
            wire:click="selectMahasiswa(false)"
            class="btn border bg-white"
        ><i class="bx bx-x"></i></button>
    </div>
</div>
@endif