<div>

    @push('script')
        <script src="{{ asset('vendor/libs/apex-charts/apexcharts.js') }}"></script>
        <script>
            let chartSoalDOM = document.querySelectorAll('.chart-data');
            
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
            chartSoalDOM.forEach((i) => {
                let type = i.getAttribute('type');
                var chart = new ApexCharts(i, getOptions(i, type));
                chart.render();
            })
        </script>
    @endpush
    
    @foreach ($data as $soal)
        <div>
            @if(in_array($soal['type'], ['jawab-text', 'jawab-angka', 'jawab-tanggal', 'jawab-waktu']))
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title text-muted">{{ $soal['pertanyaan'] }}</h5>

                        <div style="max-height: 300px; min-height: 300px; overflow-y: scroll;" class="d-flex flex-column">
                            <div class="list-group">
                                @foreach ($soal['data'] as $item)
                                    <a 
                                        href="{{  route('admin.lihat-jawaban.jawaban', [
                                            'user' => $item['nim'],
                                            'id' => $id,
                                        ]) }}"
                                        style="white-space: nowrap;
                                        overflow: hidden;
                                        text-overflow: ellipsis;"
                                        class="list-group-item list-group-item-action">{{ $item['jawaban'] }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @else
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
            @endif
        </div>
    @endforeach
</div>