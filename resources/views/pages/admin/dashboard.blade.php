<div>
    @push('style')
        <link rel="stylesheet" href="{{ asset('vendor/libs/apex-charts/apex-charts.css') }}" />
    @endpush

    @push('script')
        <script src="{{ asset('vendor/libs/apex-charts/apexcharts.js') }}"></script>
        <script>
            let chartDOM = document.querySelector('#chart-data');
            
            function getOptions(){
                return options = {
                    series: [{
                        name: "Jumlah Pengujung",
                        data: JSON.parse(chartDOM.getAttribute('data-chart'))
                    }],
                    chart: {
                        height: 350,
                        type: 'area',
                        zoom: {
                            enabled: false
                        }
                    },
                    labels:  JSON.parse(chartDOM.getAttribute('label-chart'))
                };
            }

            var chart = new ApexCharts(chartDOM, getOptions());
            chart.render();
        </script>
    @endpush

    <div class="row">
        <div class="col-lg-3 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <h1 class="text-primary font-weight-bold">{{ $arrayData['alumni'] }}</h1>
                    </div>
                    <h5 class="h3 font-weight-bolder mb-3">Alumni</h5><span class="d-block text-sm text-muted">Jumlah Alumni Terdaftar <br> dalam Database</span>
                    </div>
            </div>
        </div>
        <div class="col-lg-3 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <h1 class="text-primary font-weight-bold">{{ $arrayData['prodi'] }}</h1>
                    </div>
                    <h5 class="h3 font-weight-bolder mb-3">Kuesioner</h5><span class="d-block text-sm text-muted">Jumlah Kuesioner <br> dalam Database</span>
                    </div>
            </div>
        </div>
        <div class="col-lg-3 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <h1 class="text-primary font-weight-bold">{{ $arrayData['periode'] }}</h1>
                    </div>
                    <h5 class="h3 font-weight-bolder mb-3">Periode Wisuda</h5><span class="d-block text-sm text-muted">Jumlah Periode Wisuda <br> dalam Database</span>
                    </div>
            </div>
        </div>
        <div class="col-lg-3 mb-4">
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <h1 class="text-primary font-weight-bold">{{ $arrayData['pengunjung'] }}</h1>
                    </div>
                    <h5 class="h3 font-weight-bolder mb-3">Pengunjung</h5><span class="d-block text-sm text-muted">Jumlah Pengunjung <br> Tracer Study</span>
                    </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title m-0 me-2">Pengunjung 10 hari terakhir</h5>
                </div>

                <div class="card-body">
                    <div 
                        data-chart="{{ json_encode($arrayData['pekan']['data']) }}"
                        label-chart="{{ json_encode($arrayData['pekan']['tanggal']) }}"
                        id="chart-data"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title m-0 me-2">Login Terbaru</h5>
                </div>
                <div class="card-body">
                    <ul class="p-0 m-0">
                        @foreach ($arrayData['login'] as $item)
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
