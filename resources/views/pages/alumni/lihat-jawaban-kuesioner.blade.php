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
                    <a href="{{ route('alumni.dashboard') }}" class="btn btn-light border">Kembali</a>
                </div>
            </div>

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

                                    @if (in_array($soal->type, ['jawab-tanggal','jawab-text', 'dropdown','pilihan-ganda','jawab-angka', 'jawab-waktu']))
                                        <h4 class="mb-0">{{ optional($jawaban)[$soal->id] }}</h4>
                                    @endif

                                    @if (in_array($soal->type, ['kotak-centang']))
                                        <ul class="mb-0">
                                            @foreach (optional($jawaban)[$soal->id] as $item)
                                                <li>
                                                    <h4 class="mb-0">{{ $item }}</h4>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif

                                    {{-- @if (in_array($soal->type,['pilihan-ganda', 'kotak-centang']))
                                        <div class="list-group">
                                            @foreach ($soal->opsi_x as $item)
                                                <label class="list-group-item align-items-center d-flex">
                                                    @switch($soal->type)
                                                        @case('pilihan-ganda')
                                                            <input
                                                                x-on:change="(e) => changeValue('{{ $soal->id }}', e, '{{ $soal->type }}')"
                                                                {{ optional($jawaban)[$soal->id] == $item ? 'checked' : ''}}
                                                                class="form-check-input me-1"
                                                                type="radio"
                                                                name="{{ $soal->id }}"
                                                                value="{{ $item }}">
                                                            @break
                                                        @case('kotak-centang')
                                                            <input
                                                                x-on:change="(e) => changeValue('{{ $soal->id }}', e, '{{ $soal->type }}')"
                                                                {{ in_array($item, optional($jawaban)[$soal->id] ?? []) ? 'checked' : ''}}
                                                                class="form-check-input me-1"
                                                                type="checkbox"
                                                                name="{{ $soal->id }}"
                                                                value="{{ $item }}">
                                                            @break
                                                    @endswitch
                                                    
                                                    <span class="ms-2">{{ $item }}</span>
                                                </label>
                                            @endforeach
                                        </div>
                                    @endif --}}

                                    @if (in_array($soal->type,['petak-pilihan-ganda', 'petak-kotak-centang']))
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <td></td>
                                                    @foreach ($soal->opsi_y as $item)
                                                        <td>{{ $item }}</td>
                                                    @endforeach
                                                </tr>

                                                @foreach ($soal->opsi_x as $item)
                                                    <tr>
                                                        <td>{{ $item }}</td>
                                                        @foreach ($soal->opsi_y as $item_y)
                                                            <td class="text-center">
                                                                @switch($soal->type)
                                                                    @case('petak-pilihan-ganda')
                                                                        @if(optional(optional($jawaban)[$soal->id])[$item] == $item_y)
                                                                            <span class="bx bx-check text-primary" style="font-size: 30px"></span>
                                                                        @endif
                                                                        @break
                                                                    @case('petak-kotak-centang')
                                                                        @if(in_array($item_y, optional(optional($jawaban)[$soal->id])[$item] ?? []))
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

                @if(!$this->validasi)
                    <div class="d-flex justify-content-end">
                        <button 
                            wire:click="resetJawaban"
                            class="btn btn-danger">Reset Jawaban</button>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
