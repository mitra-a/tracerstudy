<div>
    <div class="d-flex">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Kuesioner /</span> Lihat Jawaban / Responden
        </h4>

        <div class="ms-auto">
            <a href="{{ route('admin.lihat-jawaban.index') }}" class="btn btn-light border">Kembali</a>
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
        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Program Studi</th>
                        <th style="width: 1px;">Jawaban</th>
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
                            <td>{{ optional($prodi[$row->prodi])['nama'] }}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="{{ route('admin.lihat-jawaban.jawaban', [
                                        'user' => $row->nim,
                                        'id' => $id,
                                    ]) }}" class="btn btn-sm btn-dark d-flex align-items-center">
                                        <i class="bx bx-clipboard me-2" style="font-size: 15px"></i>
                                        Lihat Jawaban
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