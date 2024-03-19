<div>
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Alumni /</span> Dashboard
    </h4>

    <div class="col-lg-6">
        @foreach ($kuesioner as $row)
            <div class="card mb-3">
                <div class="card-body my-2">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <h5 class="card-title mb-1">{{ $row->nama }}</h5>
                            <p class="card-text">{{ $row->deskripsi }}</p>
                        </div>

                        <div>
                            <a href="{{ route('alumni.jawab-kuesioner', $row->id) }}" class="btn btn-primary">Jawab Kuesioner</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
