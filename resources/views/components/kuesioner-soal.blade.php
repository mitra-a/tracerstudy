<div 
    class="card mb-3"
    x-data="{
        open: false
    }"
    >

    <div class="card-title p-4 mb-0 d-flex align-items-center" @click="open = !open">
        <div style="padding-right: 40px" wire:sortable.handle>
            <span class="bx bx-menu" style="font-size: 25px"></span>
        </div>

        <div>
            <span class="badge bg-dark mb-2">{{ str_replace('-', ' ', $row->type) }}</span>
            <h5 class="card-title mb-0">
                {{ $pertanyaan == '' ? 'Masukan Pertanyaan' : $pertanyaan }}
            </h5>
        </div>

        <div class="ms-auto" style="padding-left: 40px">
            <span :class="open ? 'bx bx-chevron-up' : 'bx bx-chevron-down'" style="font-size: 25px"></span>
        </div>
    </div>

    <div class="card-body" x-show="open">
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

                        <div wire:sortable.opsi type="x">
                            @foreach (is_array($opsi_x) ? $opsi_x : [] as $index => $item)
                                <div class="d-flex mb-2" wire:sortable.item.opsi="{{ $item['id'] }}" wire:key="{{$item['id']}}">
                                    <div 
                                        style="cursor: move" 
                                        wire:sortable.handle.opsi 
                                        class="mx-2 d-flex align-items-center">
                                        <i class="bx bx-menu"></i>
                                    </div>

                                    <input 
                                        wire:model.blur="opsi_x.{{ $index }}.opsi"
                                        type="text" 
                                        class="form-control" 
                                        placeholder="masukan pertanyaan"
                                    >

                                    @if(count($opsi_x) > 1)
                                        <button 
                                            wire:click="hapusOpsi('x','{{ $item['id'] }}')"
                                            class="btn btn-light border d-flex align-items-center ms-2">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    @endif
                                </div>
                            @endforeach
                        </div>

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
                            <div class="form-label">Baris</div>

                            <div wire:sortable.opsi type="x">
                                @foreach (is_array($opsi_x) ? $opsi_x : [] as $index => $item)
                                    <div class="d-flex mb-2" wire:sortable.item.opsi="{{ $item['id'] }}" wire:key="{{$item['id']}}">
                                        <div 
                                            style="cursor: move" 
                                            wire:sortable.handle.opsi 
                                            class="mx-2 d-flex align-items-center">
                                            <i class="bx bx-menu"></i>
                                        </div>
    
                                        <input 
                                            wire:model.blur="opsi_x.{{ $index }}.opsi"
                                            type="text" 
                                            class="form-control" 
                                            placeholder="masukan pertanyaan"
                                        >
    
                                        @if(count($opsi_x) > 1)
                                            <button 
                                                wire:click="hapusOpsi('x','{{ $item['id'] }}')"
                                                class="btn btn-light border d-flex align-items-center ms-2">
                                                <i class="bx bx-trash"></i>
                                            </button>
                                        @endif
                                    </div>
                                @endforeach
                            </div>

                            <button 
                                wire:click="tambahOpsi('x')"
                                class="btn btn-primary mt-3 d-flex align-items-center">
                                <i class="bx bx-plus me-2"></i>
                                Tambah Opsi
                            </button>
                        </div>

                        <div class="col-lg-6 mt-5">
                            <div class="form-label">Kolom</div>
                            <div wire:sortable.opsi type="y">
                                @foreach (is_array($opsi_y) ? $opsi_y : [] as $index => $item)
                                    <div class="d-flex mb-2" wire:sortable.item.opsi="{{ $item['id'] }}" wire:key="{{$item['id']}}">
                                        <div 
                                            style="cursor: move" 
                                            wire:sortable.handle.opsi 
                                            class="mx-2 d-flex align-items-center">
                                            <i class="bx bx-menu"></i>
                                        </div>

                                        <input 
                                            wire:model.blur="opsi_y.{{ $index }}.opsi"
                                            type="text" 
                                            class="form-control" 
                                            placeholder="masukan pertanyaan"
                                        >

                                        @if(count($opsi_y) > 1)
                                            <button 
                                                wire:click="hapusOpsi('y','{{ $item['id'] }}')"
                                                class="btn btn-light border d-flex align-items-center ms-2">
                                                <i class="bx bx-trash"></i>
                                            </button>
                                        @endif
                                    </div>
                                @endforeach
                            </div>

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

        <div class="w-100 mt-3 justify-content-end align-items-center d-flex">
            <button 
                wire:click="$parent.hapusPertanyaan('{{ $row->id }}')"
                class="btn btn-light border d-flex align-items-center px-2">
                <i class="bx bx-trash"></i>
            </button>

            <div class="border mx-3" style="height: 35px"></div>

            <div class="d-flex justify-content-between">
                <div class="form-check form-switch">
                    <input
                        wire:click="required"
                        class="form-check-input" 
                        type="checkbox" 
                        role="switch" 
                        id="form-{{ $row->id }}"
                        @if($row->required) checked @endif>

                    <label class="form-check-label" for="form-{{ $row->id }}">Wajib diisi</label>
                </div>
            </div>
        </div>
    </div>
</div>