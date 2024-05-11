<div>
    <style>
        @media print {
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

    @push('script')
        <script src="{{ asset('vendor/libs/apex-charts/apexcharts.js') }}"></script>
        <script>
            let chartDOM = document.querySelectorAll('.chart-data');
            
            function getOptions(i, type){
                if(type == 'petak-kotak-centang' || type == 'petak-pilihan-ganda'){
                    return options = {
                        series: JSON.parse(i.getAttribute('data')),
                        chart: {
                            height: 350,
                            type: 'bar',
                            zoom: {
                                enabled: false
                            }
                        },
                        dataLabels: {
                            enabled: false
                        },
                        xaxis: {
                            categories: JSON.parse(i.getAttribute('label')),
                        }
                    };
                }

                return options = {
                    series: JSON.parse(i.getAttribute('data')),
                    labels: JSON.parse(i.getAttribute('label')),
                    chart: {
                        height: 350,
                        type: 'pie',
                        zoom: {
                            enabled: false
                        }
                    },
                };
            }
            chartDOM.forEach((i) => {
                let type = i.getAttribute('type');
                var chart = new ApexCharts(i, getOptions(i, type));
                chart.render();
            })
        </script>
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
                    <a href="{{ route('alumni.hasil-survey.index', $id) }}" class="btn btn-light border">Kembali</a>
                </div>
            </div>

            <div class="alert bg-white border-primary border" role="alert">
                <div class="d-flex">
                  <div>
                    <h5 class="mb-2 text-primary">Data Hasil Survey</h5>
                    <p class="mb-0">Data Hasil Survey yang ditampilkan merupakan data hasil survey dari program studi <b>{{ auth()->user()->prodi_data->nama }}</b> </p>
                  </div>
                </div>
            </div>

            <livewire:components.kuesioner-chart :$id :prodi="auth()->user()->prodi"/>
        </div>
    </div>
</div>
