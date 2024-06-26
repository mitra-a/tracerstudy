<div>
    <style>
        .not-printable{
            display: block;
        }
        
        @media print {
            .not-printable{
                display: none;
            }

            body { 
                -webkit-print-color-adjust: exact; 
            }

            h5, h4, .text-muted, p {
                color: black !important;
            }

            .card {
                break-inside: avoid;
            }

            .text-muted.fw-light{
                display: none;
            }

            .layout-navbar {
                display: none;
            }

            .btn{
                display: none;
            }

            .card {
                box-shadow : none;
            }

            .card-body{
                padding: 0;
            }

            .apexcharts-toolbar{
                display: none;
            }

            .kop-surat{
                display: flex !important;
            }
        }
    </style>

    @push('style')
        <link rel="stylesheet" href="{{ asset('vendor/libs/apex-charts/apex-charts.css') }}" />
    @endpush

    <div class="kop-surat d-none">
        <div class="width: 120px">
            <img src="{{ asset('logo.png') }}" height="100px">
        </div>
        <div class="text-center w-100">
            <h4 style="font-size: 20px" class="mb-0">KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET DAN TEKNOLOGI</h4>
            <h4 style="font-size: 20px" class="mb-0">UNIVERSITAS NEGERI MAKASSAR (UNM)</h4>
            <h4 style="font-size: 20px" class="mb-0 fw-bold">FAKULTAS TEKNIK</h4>
            <h4 style="font-size: 20px" class="mb-0 fw-bold">JURUSAN TEKNIK INFORMATIKA DAN KOMPUTER</h4>
            <p class="mb-0">Alamat: Jalan Daeng Tata Raya Parangtambung Makassar</p>
            <p>Telp (0411) 865677 – Fax. (0411) 861377</p>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="d-flex">
                <h4 class="fw-bold py-3 mb-4">
                    <span class="text-muted fw-light">Kuesioner /</span> {{ $kuesioner->nama }}
                </h4>
        
                <div class="ms-auto">
                    <a
                        href="{{ route('admin.laporan.excel', $id) }}"
                        class="btn btn-success me-2 shadow-none">
                        <i class="bx bx-table me-2"></i> Excel
                    </a>
                    <button 
                        onclick="window.print()"
                        class="btn btn-primary me-2 shadow-none">
                        <i class="bx bx-printer me-2"></i> Cetak
                    </button>
                    <a href="{{ route('admin.laporan.index', $id) }}" class="btn btn-light border">Kembali</a>
                </div>
            </div>

            <livewire:components.kuesioner-chart :$id/>
        </div>
    </div>
</div>
