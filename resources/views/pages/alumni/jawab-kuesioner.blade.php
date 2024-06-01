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

            <div
                x-data="{
                    jawaban : $wire.entangle('jawaban'),
                    changeValue(key, input, type, option = null){
                        let value = input.target.value;
                        if(type == 'kotak-centang'){
                            value = [];
                            let item = document.querySelectorAll(`input[type=checkbox][name='${key}']:checked`)
                            item.forEach((x) => {
                                value.push(x.value)
                            })
                        }

                        if(type == 'petak-pilihan-ganda'){
                            let item = document.querySelector(`input[type=radio][name='${key}.${option}']:checked`);
                            if(item){
                                value = {
                                    ...this.jawaban[key],
                                    [option] : item.value
                                }
                            }
                        }

                        if(type == 'petak-kotak-centang'){
                            let val = [];
                            let item = document.querySelectorAll(`input[type=checkbox][name='${key}.${option}']:checked`);
                            item.forEach((x) => {
                                val.push(x.value)
                            })

                            value = {
                                ...this.jawaban[key],
                                [option] : val
                            }
                        }

                        this.jawaban = {
                            ...this.jawaban,
                            [key]: value
                        }
                    }
                }">

                <div>
                    <div class="card mb-3 border-primary" style="border-bottom: 4px solid #d9dee3">
                        <div class="card-body">
                            <h4 class="fw-bold mb-1">{{ $halaman->page?->nama }}</h4>
                            <h4 class="text-muted fw-light mb-0">{{ $halaman->page?->deskripsi }}</h4>
                        </div>
                    </div>
                    
                    @foreach ($halaman->page?->soal as $soal)
                        <div class="card mb-3 @if(in_array($soal->id ,$required)) border border-danger @endif">
                            <div class="card-body my-3">
                                <h5 class="card-title mb-4">
                                    {{ $soal->pertanyaan }}
                                    @if($soal->required)
                                        <span class="text-danger">*</span>
                                    @endif
                                </h5>

                                @if (in_array($soal->type,['jawab-text', 'jawab-angka', 'jawab-tanggal', 'jawab-waktu']))
                                    <input
                                        x-on:change="(e) => changeValue('{{ $soal->id }}', e, '{{ $soal->type }}')"
                                        @switch($soal->type)
                                            @case('jawab-angka')
                                                type="number"
                                                @break
                                            @case('jawab-tanggal')
                                                type="date"
                                                @break
                                            @case('jawab-waktu')
                                                type="time"
                                                @break
                                            @default
                                                type="text"
                                        @endswitch
                                        class="form-control"
                                        id="form-{{ $soal->id }}"
                                        placeholder="Masukan jawaban anda"
                                        value="{{ optional($jawaban)[$soal->id] }}"
                                    >
                                @endif

                                @if ($soal->type == 'dropdown')
                                    <select 
                                        x-on:change="(e) => changeValue('{{ $soal->id }}', e, '{{ $soal->type }}')"
                                        class="form-control"
                                        id="form-{{ $soal->id }}"
                                    >
                                        <option value="">- Pilih Jawaban -</option>
                                        @foreach ($soal->opsi_x as $index => $item)
                                            <option 
                                                {{ optional($jawaban)[$soal->id] == $item['id'] ? 'selected' : ''}}
                                                value="{{ $item['id'] }}"
                                                >{{ $item['opsi'] }}</option>
                                        @endforeach
                                    </select>
                                @endif

                                @if (in_array($soal->type,['pilihan-ganda', 'kotak-centang']))
                                    <div class="list-group">
                                        @foreach ($soal->opsi_x as $index => $item)
                                            <label class="list-group-item align-items-center d-flex">
                                                @switch($soal->type)
                                                    @case('pilihan-ganda')
                                                        <input
                                                            x-on:change="(e) => changeValue('{{ $soal->id }}', e, '{{ $soal->type }}')"
                                                            {{ optional($jawaban)[$soal->id] == $item['id'] ? 'checked' : ''}}
                                                            class="form-check-input me-1"
                                                            type="radio"
                                                            id="form-{{ $soal->id }}"
                                                            name="{{ $soal->id }}"
                                                            value="{{ $item['id'] }}">
                                                        @break
                                                    @case('kotak-centang')
                                                        <input
                                                            x-on:change="(e) => changeValue('{{ $soal->id }}', e, '{{ $soal->type }}')"
                                                            {{ in_array($item['id'], optional($jawaban)[$soal->id] ?? []) ? 'checked' : ''}}
                                                            class="form-check-input me-1"
                                                            type="checkbox"
                                                            id="form-{{ $soal->id }}"
                                                            name="{{ $soal->id }}"
                                                            value="{{ $item['id'] }}">
                                                        @break
                                                @endswitch
                                                
                                                <span class="ms-2">{{ $item['opsi'] }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                @endif

                                @if (in_array($soal->type,['petak-pilihan-ganda', 'petak-kotak-centang']))
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td></td>
                                                @foreach ($soal->opsi_y as $item)
                                                    <td>{{ $item['opsi'] }}</td>
                                                @endforeach
                                            </tr>
    
                                            @foreach ($soal->opsi_x as $item)
                                                <tr>
                                                    <td>{{ $item['opsi'] }}</td>
                                                    @foreach ($soal->opsi_y as $item_y)
                                                        <td class="text-center">
                                                            @switch($soal->type)
                                                                @case('petak-pilihan-ganda')
                                                                    <input
                                                                        x-on:change="(e) => changeValue('{{ $soal->id }}', e, '{{ $soal->type }}', '{{ $item['id'] }}')"
                                                                        {{  optional(optional($jawaban)[$soal->id])[$item['id']] == $item_y['id'] ? 'checked' : ''}}
                                                                        class="form-check-input me-1"
                                                                        type="radio"
                                                                        name="{{ $soal->id }}.{{ $item['id'] }}"
                                                                        id="form-{{ $soal->id }}-{{ $item['id'] }}"
                                                                        value="{{ $item_y['id'] }}">
                                                                    @break
                                                                @case('petak-kotak-centang')
                                                                    <input
                                                                        x-on:change="(e) => changeValue('{{ $soal->id }}', e, '{{ $soal->type }}', '{{ $item['id'] }}')"
                                                                        {{  in_array($item_y['id'], optional(optional($jawaban)[$soal->id])[$item['id']] ?? []) ? 'checked' : ''}}
                                                                        class="form-check-input me-1"
                                                                        type="checkbox"
                                                                        name="{{ $soal->id }}.{{ $item['id'] }}"
                                                                        id="form-{{ $soal->id }}-{{ $item['id'] }}"
                                                                        value="{{ $item_y['id'] }}">
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

                <div class="d-flex">
                    @if($halaman->current_page > 1)
                        <button 
                            type="button"
                            wire:click="previous"
                            class="btn btn-light border me-auto">
                            <i class="bx bx-chevron-left"></i> <span class="d-lg-inline d-none">Halaman</span> Sebelumnya
                        </button>
                    @endif
    
                    @if($halaman->page_count > $halaman->current_page)
                        <button 
                            type="button"
                            wire:click="next"
                            class="btn btn-primary ms-auto">
                            <span class="d-lg-inline d-none">Halaman</span> Selanjutnya <i class="bx bx-chevron-right"></i>
                        </button>
                    @endif
    
                    @if($halaman->current_page == $halaman->page_count)
                        <button
                            type="button"
                            wire:click="save"
                            class="btn btn-primary ms-auto">Simpan</button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
