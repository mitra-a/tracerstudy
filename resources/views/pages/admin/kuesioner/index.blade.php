<div>
    <div class="d-flex">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Kuesioner /</span> Data Kuesioner
        </h4>

        <div class="ms-auto">
            <a href="{{ route('admin.kuesioner.create') }}" class="btn btn-primary">Tambah</a>
        </div>
    </div>

    <x-alert />

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="d-none d-lg-block">Data Kuesioner</h5>

            <div class="d-flex">
                <input type="text" wire:model="search" class="form-control" placeholder="Search....">
                <button class="btn btn-primary ms-2" wire:click="searchData" wire:loading.attr="disabled">Cari</button>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Kuesioner</th>
                        <th>Deskripsi</th>
                        <th>Periode</th>
                        <th>Halaman</th>
                        <th style="width: 1px;"></th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
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
                        <tr>
                            <td class="text-nowrap">{{ $row->nama }}</td>
                            <td>{{ $row->deskripsi }}</td>
                            <td>
                                @foreach ($row->periode_data as $item)
                                    <span class="badge bg-primary">Periode {{ $item['nama'] }}</span>
                                @endforeach
                            </td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('admin.kuesioner.halaman', $row->id) }}" class="btn btn-sm btn-dark d-flex align-items-center">
                                        <i class="bx bx-copy-alt me-2" style="font-size: 15px"></i>
                                        Halaman
                                    </a>
                                </div>
                            </td>
                            <td>
                                <div x-data="{ open: false }">
                                    <div x-show="!open">
                                        <a class="bx bx-edit mx-1 text-secondary" href="{{ route('admin.kuesioner.update', $row->id) }}"></a>
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