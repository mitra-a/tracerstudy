<div>
    <div class="d-flex">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Master Data /</span> Periode Wisuda
        </h4>
    </div>

    <x-alert />

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="d-none d-lg-block">Data Periode</h5>

            <div class="d-flex">
                <input type="text" wire:model="search" class="form-control" placeholder="Search....">
                <button class="btn btn-primary ms-2" wire:click="searchData" wire:loading.attr="disabled">Cari</button>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Periode</th>
                        <th style="width: 1px;"></th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <tr>
                        <td>
                            <input 
                                wire:model="add_input.kode"
                                type="text" 
                                class="form-control @error('add_input.kode') is-invalid @enderror" 
                                placeholder="Kode" />
                        </td>
                        <td>
                            <input 
                                wire:model="add_input.periode"
                                type="text" 
                                class="form-control @error('add_input.periode') is-invalid @enderror" 
                                placeholder="Periode" />
                        </td>
                        <td>
                            <button 
                                wire:loading.attr="disabled"
                                wire:click="add" 
                                class="btn btn-primary">Tambah</button>
                        </td>
                    </tr>

                    @if($search)
                        <tr>
                            <td colspan="10" class="p-0 table-bg-primary">
                                <div class="p-3 d-flex justify-content-between align-items-center">
                                    <span>Menampilkan data dari hasil pencarian "<b>{{ $search }}</b>"</span>
                                    <button class="btn btn-sm btn-light py-1 px-3 ms-2 border" wire:click="searchData(true)" wire:loading.attr="disabled">Hapus Pencarian</button>
                                </div>
                            </td>
                        </tr>
                    @endif

                    @forelse ($rows as $row)
                        @if($row->kode == $edit_input['row_id'])
                            <tr>
                                <td>
                                    <input 
                                        wire:model="edit_input.kode"
                                        type="text" 
                                        readonly
                                        class="form-control" 
                                        placeholder="Kode" />
                                </td>
                                <td>
                                    <input 
                                        wire:model="edit_input.periode"
                                        type="text" 
                                        class="form-control @error('edit_input.periode') is-invalid @enderror" 
                                        placeholder="Periode" />
                                </td>
                                <td>
                                    <button 
                                        wire:click="edit" 
                                        class="btn btn-primary"
                                        wire:loading.attr="disabled">Simpan</button>
                                    <i class="bx bx-x mx-1" wire:click="edit('reset')" type="button"></i>    
                                </td>
                            </tr>
                        @else
                            <tr>
                                <td>{{ $row->kode }}</td>
                                <td>Periode {{ $row->nama }}</td>
                                <td>
                                    <div x-data="{ open: false }">
                                        <div x-show="!open">
                                            <i class="bx bx-edit mx-1" type="button" wire:click="edit('{{ $row->kode }}')"></i>
                                            <i class="bx bx-trash mx-1" type="button"  x-on:click="open = !open"></i>  
                                        </div>

                                        <div x-show="open" x-cloak>
                                            <div class="d-flex gap-2">
                                                <button 
                                                    type="submit" 
                                                    x-on:click="open = !open" 
                                                    wire:click="delete('{{ $row->kode }}')" 
                                                    wire:loading.attr="disabled" 
                                                    class="btn btn-danger btn-sm shadow">Hapus</button>

                                                <button 
                                                    type="submit" 
                                                    wire:loading.attr="disabled" 
                                                    class="btn btn-secondary btn-sm shadow" 
                                                    x-on:click="open = !open">Batal</button>
                                            </div>
                                        </div>
                                    </div>

                                      
                                </td>
                            </tr>
                        @endif
                    @empty
                        <x-datatables.empty colspan="10" />
                    @endforelse
                </tbody>

                <tfoot class="table-border-bottom-0">
                    <tr>
                        <th colspan="10">
                            <div class="d-flex justify-content-end mt-3">
                                {{ $rows->links() }}
                            </div>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>