<div>
    @push('script')
        <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
        <script>
            let el = document.querySelector('[wire\\:sortable]')
            var sortable = new Sortable(el, {
                handle: "[wire\\:sortable\\.handle]",
                onEnd: () => {
                    let items = []
                    el.querySelectorAll('[wire\\:sortable\\.item]').forEach((el, index) => {
                        items.push({ order: index + 1, value: el.getAttribute('wire:sortable.item')})
                    })

                    Livewire.dispatch(el.getAttribute('wire:sortable'), { data: items })
                }
            });
        </script>
    @endpush

    <div class="d-flex">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Kusioner /</span> Data Kuesioner / Halaman
        </h4>

        <div class="ms-auto">
            <a href="{{ route('admin.kuesioner.index') }}" class="btn btn-light border">Kembali</a>
        </div>
    </div>

    <x-alert />

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="d-none d-lg-block">Kuesioner Halaman</h5>

            <div class="d-flex">
                <input type="text" wire:model="search" class="form-control" placeholder="Search....">
                <button class="btn btn-primary ms-2" wire:click="searchData" wire:loading.attr="disabled">Cari</button>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-striped position-relative" style="user-select: none">
                <thead>
                    <tr>
                        <td style="width: 1px;"></td>
                        <th>Halaman</th>
                        <th>Deskripsi</th>
                        <th>Soal</th>
                        <th style="width: 1px;"></th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    <tr>
                        <td>

                        </td>
                        <td>
                            <input 
                                wire:model="add_input.nama"
                                type="text" 
                                class="form-control @error('add_input.nama') is-invalid @enderror" 
                                placeholder="Halaman" />
                        </td>
                        <td colspan="2">
                            <input 
                                wire:model="add_input.deskripsi"
                                type="text" 
                                class="form-control @error('add_input.deskripsi') is-invalid @enderror" 
                                placeholder="Deskripsi" />
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
                </tbody>

                <tbody wire:sortable="update-halaman-order" class="position-relative">
                    @forelse ($rows as $row)
                        @if($row->id == $edit_input['row_id'])
                            <tr>
                                <td></td>
                                <td>
                                    <input 
                                        wire:model="edit_input.nama"
                                        type="text"
                                        class="form-control @error('edit_input.nama') is-invalid @enderror" 
                                        placeholder="Halaman" />
                                </td>
                                <td colspan="2">
                                    <input 
                                        wire:model="edit_input.deskripsi"
                                        type="text" 
                                        class="form-control @error('edit_input.deskripsi') is-invalid @enderror" 
                                        placeholder="Deskripsi" />
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
                            <tr wire:sortable.item="{{ $row->id }}" class="w-100">
                                <td style="cursor: move" wire:sortable.handle>
                                    <i class="bx bx-menu"></i>
                                </td>
                                <td>{{ $row->nama }}</td>
                                <td>{{ $row->deskripsi }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('admin.kuesioner.soal', [
                                            'halaman' => $row->id,
                                            'id' => $id
                                        ]) }}" class="btn btn-sm btn-dark d-flex align-items-center">
                                            <i class="bx bx-copy-alt me-2" style="font-size: 15px"></i>
                                            Soal Kuesioner
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div x-data="{ open: false }">
                                        <div x-show="!open">
                                            <i class="bx bx-edit mx-1" type="button" wire:click="edit('{{ $row->id }}')"></i>
                                            <i class="bx bx-trash mx-1" type="button"  x-on:click="open = !open"></i>  
                                        </div>

                                        <div x-show="open" x-cloak>
                                            <div class="d-flex gap-2">
                                                <button 
                                                    type="submit" 
                                                    x-on:click="open = !open" 
                                                    wire:click="delete('{{ $row->id }}')" 
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