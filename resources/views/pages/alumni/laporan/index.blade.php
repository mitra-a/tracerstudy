<div>
    <div class="d-flex">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Kuesioner /</span> Laporan
        </h4>
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
        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Kuesioner</th>
                        <th>Deskripsi</th>
                        <th style="width: 1px;">Laporan</th>
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
                            <td>{{ $row['nama'] }}</td>
                            <td>{{ $row['deskripsi'] }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('alumni.hasil-survey.detail', $row['id']) }}" class="btn btn-sm btn-primary d-flex align-items-center">
                                        <i class="bx bx-clipboard me-2" style="font-size: 15px"></i>
                                        Hasil Survey
                                    </a>
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
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>