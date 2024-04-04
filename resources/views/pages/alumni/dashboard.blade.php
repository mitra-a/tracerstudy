<div>
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Alumni /</span> Dashboard
    </h4>

    <div class="col-lg-6">
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
        @endforelse
    </div>
</div>
