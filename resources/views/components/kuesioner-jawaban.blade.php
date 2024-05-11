<div>
    @foreach ($halaman as $halaman)
        <div>
            <div class="card mb-3 border-primary" style="border-bottom: 4px solid #d9dee3">
                <div class="card-body">
                    <h4 class="fw-bold mb-1">{{ $halaman->nama }}</h4>
                    <h4 class="text-muted fw-light mb-0">{{ $halaman->deskripsi }}</h4>
                </div>
            </div>

            @foreach ($halaman->soal as $soal)
                <div class="card mb-3">
                    <div class="card-body my-3">
                        <h5 class="card-title text-muted">{{ $soal->pertanyaan }}</h5>

                        @if (in_array($soal->type, ['jawab-tanggal','jawab-text','jawab-angka', 'jawab-waktu']))
                            <h4 class="mb-0">{{ optional($jawaban)[$soal->id] }}</h4>
                        @endif

                        @if (in_array($soal->type, ['dropdown','pilihan-ganda']))
                            <h4 class="mb-0">{{ optional($soal->opsi_x)[optional($jawaban)[$soal->id]] }}</h4>
                        @endif

                        @if (in_array($soal->type, ['kotak-centang']))
                            <ul class="mb-0">
                                @foreach (optional($jawaban)[$soal->id] ?? [] as $item)
                                    <li>
                                        <h4 class="mb-0">{{ optional($soal->opsi_x)[$item] }}</h4>
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                        @if (in_array($soal->type,['petak-pilihan-ganda', 'petak-kotak-centang']))
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <td></td>
                                        @foreach ($soal->opsi_y as $item)
                                            <td>{{ $item }}</td>
                                        @endforeach
                                    </tr>

                                    @foreach ($soal->opsi_x as $index => $item)
                                        <tr>
                                            <td>{{ $item }}</td>
                                            @foreach ($soal->opsi_y as $index_y => $item_y)
                                                <td class="text-center">
                                                    @switch($soal->type)
                                                        @case('petak-pilihan-ganda')
                                                            @if(optional(optional($jawaban)[$soal->id])[$index] == $index_y)
                                                                <span class="bx bx-check text-primary" style="font-size: 30px"></span>
                                                            @endif
                                                            @break
                                                        @case('petak-kotak-centang')
                                                            @if(in_array($index_y, optional(optional($jawaban)[$soal->id])[$index] ?? []))
                                                                <span class="bx bx-check text-primary" style="font-size: 30px"></span>
                                                            @endif
                                                            @break
                                                    @endswitch
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach

    <div>
        @if(!$this->validasi)
            <div class="d-flex justify-content-end">
                <button 
                    wire:click="resetJawaban"
                    class="btn btn-danger">Reset Jawaban</button>
            </div>
        @endif
    </div>
</div>
