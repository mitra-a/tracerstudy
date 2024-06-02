<div>
    <div class="d-flex">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Master Data /</span> Akun Admin
        </h4>

        <div class="ms-auto">
            <a href="{{ route('admin.akun.create') }}" class="btn btn-primary">Tambah</a>
        </div>
    </div>

    <x-alert />

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="d-none d-lg-block">Data Akun Admin</h5>

            <div class="d-flex">
                <input type="text" wire:model="search" class="form-control" placeholder="Search....">
                <button class="btn btn-primary ms-2" wire:click="searchData" wire:loading.attr="disabled">Cari</button>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Username</th>
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
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->username }}</td>
                            <td>
                                <div x-data="{ open: false }">
                                    <div x-show="!open">
                                        <a class="bx bx-edit mx-1 text-secondary" href="{{ route('admin.akun.update', $row->id) }}"></a>
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