<div>
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

    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="d-flex">
                <h4 class="fw-bold py-3 mb-4">
                    <span class="text-muted fw-light">Kuesioner /</span> {{ $kuesioner->nama }}
                </h4>
        
                <div class="ms-auto">
                    <a href="{{ route('admin.laporan.index', $id) }}" class="btn btn-light border">Kembali</a>
                </div>
            </div>

            <div>
                @foreach ($data as $soal)
                    <div>
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title text-muted">{{ $soal['pertanyaan'] }}</h5>
                                <div
                                    class="chart-data"
                                    id="soal-{{ $soal['id'] }}"
                                    label="{{ json_encode($soal['label']) }}"
                                    data="{{ json_encode($soal['data']) }}"
                                    type="{{ $soal['type'] }}"
                                >
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
