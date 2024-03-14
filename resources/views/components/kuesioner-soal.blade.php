<div class="card mb-3">
    <div class="card-body">
        <span class="badge bg-dark mb-3">{{ str_replace('-', ' ', $row->type) }}</span>
        <h5 class="card-title mb-4">
            {{ $pertanyaan == '' ? 'Masukan Pertanyaan' : $pertanyaan }}
        </h5>

        <div>
            <div class="form-group">
                <input 
                    wire:model.blur="pertanyaan"
                    type="text" 
                    class="form-control" 
                    placeholder="masukan pertanyaan">
            </div>

            {{-- DROPDOWN, PILIHAN GANDA, KOTAK CENTANG --}}
            @if(in_array($row->type, array('dropdown', 'pilihan-ganda', 'kotak-centang')))
                <div>
                    <div class="col-lg-7 mt-5">
                        <div class="form-label">Opsi Pertanyaan</div>

                        @foreach ($opsi_x as $index => $item)
                            <div class="d-flex mb-2">
                                <input 
                                    wire:model.blur="opsi_x.{{ $index }}"
                                    type="text" 
                                    class="form-control" 
                                    placeholder="masukan pertanyaan"
                                >

                                @if(count($opsi_x) > 1)
                                <button 
                                    wire:click="hapusOpsi('x','{{ $index }}')"
                                    class="btn btn-light border d-flex align-items-center ms-2">
                                    <i class="bx bx-trash"></i>
                                </button>
                                @endif
                            </div>
                        @endforeach

                        <button 
                            wire:click="tambahOpsi('x')"
                            class="btn btn-primary mt-3 d-flex align-items-center">
                            <i class="bx bx-plus me-2"></i>
                            Tambah Opsi
                        </button>
                    </div>
                </div>
            @endif

            {{-- PETAK PILIHAN GANDA, PETAK KOTAK CENTANG --}}
            @if(in_array($row->type, array('petak-pilihan-ganda', 'petak-kotak-centang')))
                <div>
                    <div class="row">
                        <div class="col-lg-6 mt-5">
                            <div class="form-label">Opsi Pertanyaan</div>

                            @foreach ($opsi_x as $index => $item)
                                <div class="d-flex mb-2">
                                    <input 
                                        wire:model.blur="opsi_x.{{ $index }}"
                                        type="text" 
                                        class="form-control" 
                                        placeholder="masukan pertanyaan"
                                    >

                                    @if(count($opsi_x) > 1)
                                    <button 
                                        wire:click="hapusOpsi('x','{{ $index }}')"
                                        class="btn btn-light border d-flex align-items-center ms-2">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                    @endif
                                </div>
                            @endforeach

                            <button 
                                wire:click="tambahOpsi('x')"
                                class="btn btn-primary mt-3 d-flex align-items-center">
                                <i class="bx bx-plus me-2"></i>
                                Tambah Opsi
                            </button>
                        </div>

                        <div class="col-lg-6 mt-5">
                            <div class="form-label">Opsi Pertanyaan</div>
                            @foreach ($opsi_y as $index => $item)
                                <div class="d-flex mb-2">
                                    <input 
                                        wire:model.blur="opsi_y.{{ $index }}"
                                        type="text" 
                                        class="form-control" 
                                        placeholder="masukan pertanyaan"
                                    >

                                    @if(count($opsi_y) > 1)
                                    <button 
                                        wire:click="hapusOpsi('y','{{ $index }}')"
                                        class="btn btn-light border d-flex align-items-center ms-2">
                                        <i class="bx bx-trash"></i>
                                    </button>
                                    @endif
                                </div>
                            @endforeach

                            <button 
                                wire:click="tambahOpsi('y')"
                                class="btn btn-primary mt-3 d-flex align-items-center">
                                <i class="bx bx-plus me-2"></i>
                                Tambah Opsi
                            </button>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <div class="w-100 mt-3 justify-content-end d-flex">
            <button 
                wire:click="$parent.hapusPertanyaan('{{ $row->id }}')"
                class="btn btn-light border d-flex align-items-center">
                <i class="bx bx-trash me-2"></i>
                Hapus Pertanyaan
            </button>
        </div>
    </div>
</div>