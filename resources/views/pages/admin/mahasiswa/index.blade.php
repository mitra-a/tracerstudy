<div>
    @teleport('#loading-layout')
    <div
        wire:loading.block
        wire:target="import"
    >
        <div
            class="position-fixed w-100 h-100 d-flex align-items-center justify-content-center"
            style="z-index: 2024; background-color: #43597185"
        >
            <div class="spinner-border spinner-border-lg text-white me-3" role="status">
                <span class="visually-hidden">Loading...</span>
            </div> 
        </div>
    </div>
    @endteleport

    <div class="d-flex">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Master Data /</span> Mahasiswa
        </h4>
    </div>

    

    <div class="px-4 alert bg-white border border-primary d-flex justify-content-between align-items-center">
        <div>
            <h6 class="mb-2 text-primary fw-bold">Menampilkan data Mahasiswa 😊</h6>
            <p class="mb-0">data yang ditampilkan merupakan data yang tersimpan pada <b>database</b> lakukan import data <br> dari Integrated Data System (IDS) JTIK untuk menampilkan data yang lebih baru</p>
        </div>

        <div>
            <button 
                class="btn btn-primary" 
                wire:confirm="Anda akan melakukan import data dari IDS, proses akan memerlukan waktu apakah anda ingin melanjutkan?"
                wire:click="import"
                type="button">
                    <span class="bx bx-file me-2 mb-1"></span>
                    Import Data IDS
                </button>
        </div>
    </div>

    <x-alert />

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="d-none d-lg-block">Data Alumni</h5>

            <div class="d-flex">
                <input type="text" wire:model="search" class="form-control" placeholder="Search....">
                <button class="btn btn-primary ms-2" wire:click="searchData" wire:loading.attr="disabled">Cari</button>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Nomor Telepon</th>
                        <th>Program Studi</th>
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
                            <td>{{ $row->nim }}</td>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->nomor_telepon == '' ? '-' : $row->nomor_telepon  }}</td>
                            <td>{{ $row->prodi_data?->nama }}</td>
                            <td>
                                <div>
                                    <a class="bx bx-file mx-1 text-secondary" href="{{ route('admin.mahasiswa.detail', $row->id) }}"></a>
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