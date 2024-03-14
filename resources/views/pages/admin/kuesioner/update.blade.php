<div>
    <div class="d-flex">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Kuesioner /</span> Data Kuesioner / Edit
        </h4>

        <div class="ms-auto">
            <a href="{{ route('admin.kuesioner.index') }}" class="btn btn-light border">Kembali</a>
        </div>
    </div>

    <form wire:submit.prevent="save">
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between">
                <h5>Data Kuesioner</h5>
            </div>

            <div class="card-body">
                <x-form.input 
                    name="nama"
                    title="Kuesioner"
                    wire:model="nama"
                    placeholder="masukan nama"
                />

                <x-form.input 
                    name="deskripsi"
                    title="Deskripsi"
                    wire:model="deskripsi"
                    placeholder="masukan deskripsi"
                />

                <div>
                    <label class="form-label">Periode Wisuda</label>
                    <div class="demo-inline-spacing mt-3">
                        <div class="list-group @error('periode') border border-danger @enderror">
                            @forelse ($choice['periode'] as $item)
                                <label class="list-group-item">
                                    <input 
                                        wire:model="periode"
                                        class="form-check-input me-1" 
                                        type="checkbox" 
                                        value="{{ $item['kode'] }}">
                                    Periode {{ $item['nama'] }}
                                </label>
                            @empty
                                <label for="list-group-item text-center">
                                    <h6 class="text-center">Tidak ada Periode Wisuda, tambah <a href="{{ route('admin.periode') }}">disini</a></h6>
                                </label>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer pt-0 justify-content-end d-flex">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
</div>