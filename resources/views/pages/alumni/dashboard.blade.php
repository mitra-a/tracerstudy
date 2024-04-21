<div>
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Alumni /</span> Dashboard
    </h4>

    @if($belum_lengkap)
    <div class="alert bg-white border-2 border-warning">
        <div>
            <h6 class="mb-0 text-warning fw-bold">Lengkapi Data 😊</h6>
            <p class="mb-0">Kami membutuhkan informasi lengkap dari Anda. Mohon lengkapi data pada <a href="{{ route('alumni.profile') }}">menu profile</a></p>
          </div>
    </div>
    @endif
    
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-3 mb-lg-0">
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
                                    <td>
                                        <b>{{ $row['nama'] }}</b> <br />
                                        {{ $row['deskripsi'] }}
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-end">
                                            @if($row['validasi'])
                                                <div class="d-flex flex-column">
                                                    <a 
                                                        href="{{ route('alumni.dashboard.lihat-jawaban-kuesioner', $row['id']) }}" 
                                                        class="btn btn-primary d-flex align-items-center mb-1 text-nowrap btn-sm">
                                                            <i class="bx bx-copy-alt me-3" style="font-size: 18px"></i>
                                                            Lihat Jawaban
                                                    </a>

                                                    <a href="{{ route('alumni.hasil-survey.detail', $row['id']) }}" class="btn btn-sm btn-dark d-flex align-items-center text-nowrap">
                                                        <i class="bx bx-pie-chart-alt-2 me-2" style="font-size: 15px"></i>
                                                        Hasil Survey
                                                    </a>
                                                </div>
                                            @elseif($row['selesai'])
                                                <div class="d-flex flex-column">
                                                    <button
                                                        wire:click="validasi('{{ $row['id'] }}')"
                                                        onclick="return confirm('Apakah anda yakin ingin menyimpan jawaban anda? \nJawaban yang tersimpan tidak bisa diubah');"
                                                        class="btn btn-sm btn-primary d-flex align-items-center mb-1 text-nowrap">
                                                            <i class="bx bx-check me-2" style="font-size: 15px"></i>
                                                            Validasi Jawaban
                                                    </button>
    
                                                    <a href="{{ route('alumni.dashboard.lihat-jawaban-kuesioner', $row['id']) }}" class="btn btn-sm btn-dark d-flex align-items-center text-nowrap">
                                                        <i class="bx bx-copy-alt me-2" style="font-size: 15px"></i>
                                                        Lihat Jawaban
                                                    </a>
                                                </div>
                                            @else
                                                <a 
                                                    href="{{ route('alumni.dashboard.jawab-kuesioner', $row['id']) }}" 
                                                    class="btn btn-primary text-nowrap btn-sm">Jawab Kuesioner</a>
                                            @endif
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
            {{-- 
            @forelse ($kuesioner as $row)
                <div class="card mb-3">
                    <div class="card-body my-2">
                        <div class="d-flex align-items-center">
                            @if($row->selesai)
                                <div class="me-3 rounded bg-success d-flex align-items-center justify-content-center" style="width: 50px; height: 50px">
                                    <span class="bx bx-check text-white" style="font-size: 25px"></span>
                                </div>
                            @endif
    
                            <div class="me-auto">
                                <h5 class="card-title mb-1">{{ $row->nama }}</h5>
                                <p class="card-text">{{ $row->deskripsi }}</p>
                            </div>
    
                            <div>
                                @if($row->selesai)
                                    <a href="{{ route('alumni.dashboard.lihat-jawaban-kuesioner', $row->id) }}" class="btn btn-success">Lihat Jawaban</a>
                                @else
                                    <a href="{{ route('alumni.dashboard.jawab-kuesioner', $row->id) }}" class="btn btn-primary">Jawab Kuesioner</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
            <div class="card">
                <div class="card-body">
                    <div class="empty text-center py-5">
                        <div class="empty-icon mb-4">
                            <i class="bx bx-package" style="font-size: 50px"></i>
                        </div>
            
                        <p class="h4">Tidak ada kuesioner</p>
                      </div>
                </div>
            </div>
            @endforelse --}}
        </div>

        <div class="col-lg-4 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title m-0 me-2">Login Terbaru</h5>
                </div>
                <div class="card-body">
                    <ul class="p-0 m-0">
                        @foreach ($login as $item)
                            <li class="d-flex @if(!$loop->last) mb-4 pb-1 @endif">
                                <div class="avatar flex-shrink-0 me-3">
                                    <img src="{{ $item->foto ? asset('berkas/profile/' . $item->foto) : asset('img/avatar.jpg') }}" alt class="w-px-40 rounded-circle" style="object-fit: cover" />
                                </div>

                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-1">{{ $item->nama }}</h6>
                                        <small class="text-muted d-block mb-1">{{ $item->last_login_at->diffForHumans() }}</small>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-1">
                                        <span class="badge bg-primary">{{ $item->role }}</span>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
