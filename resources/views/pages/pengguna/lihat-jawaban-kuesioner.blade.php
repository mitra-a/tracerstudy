<div>
    <div class="row justify-content-center">

        <style>
            .form-check-input {
                width: 1.8em !important;
                height: 1.8em !important;
            }
        </style>

        <div class="col-lg-8">
            <div class="d-flex">
                <h4 class="fw-bold py-3 mb-4">
                    <span class="text-muted fw-light">Kuesioner /</span> {{ $kuesioner->nama }}
                </h4>
        
                <div class="ms-auto">
                    <a href="{{ route('pengguna.dashboard') }}" class="btn btn-light border">Kembali</a>
                </div>
            </div>

            <livewire:components.kuesioner-jawaban :$id :user_id="session('login')?->nim" />
        </div>
    </div>
</div>
