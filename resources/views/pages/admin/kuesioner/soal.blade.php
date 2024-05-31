<div>
    @push('script')
        <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
        <script>
            let SoalElement = document.querySelector('[wire\\:sortable]')
            var sortable = new Sortable(SoalElement, {
                handle: "[wire\\:sortable\\.handle]",
                onEnd: () => {
                    setTimeout(() => {
                        let items = []
                        SoalElement.querySelectorAll('[wire\\:sortable\\.item]').forEach((el, index) => {
                            items.push({ order: index + 1, value: el.getAttribute('wire:sortable.item')})
                        })
    
                        Livewire.dispatch(SoalElement.getAttribute('wire:sortable'), { data: items })
                    }, 1);
                }
            });

            function renderSortableOpsi(){
                let OpsiElement = document.querySelectorAll('[wire\\:sortable\\.opsi]')
                OpsiElement.forEach((newEl, index) => {
                    if(newEl.getAttribute('render-done') == 1) return;
                    newEl.setAttribute('render-done', 1);
                    var sortable = new Sortable(newEl, {
                        handle: "[wire\\:sortable\\.handle\\.opsi]",
                        onEnd: () => {
                            setTimeout(() => {
                                let items = []
                                newEl.querySelectorAll('[wire\\:sortable\\.item\\.opsi]').forEach((el, index) => {
                                    items.push({ order: index + 1, value: el.getAttribute('wire:sortable.item.opsi')})
                                })
                                
                                Livewire.dispatch('update-opsi-order', { data: items, type: newEl.getAttribute('type') })
                            }, 1);
                        }
                    });
                })
            }

            renderSortableOpsi();
        </script>
    @endpush

    <x-loading />

    <div class="d-flex">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Kuesioner /</span> Data Kuesioner / Halaman / Soal
        </h4>

        <div class="ms-auto">
            <a href="{{ route('admin.kuesioner.halaman', $id) }}" class="btn btn-light border">Kembali</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="sticky-top" style="top: 20px;">
                @foreach ([
                    [
                        'text' => 'Jawab Text',
                        'icon' => 'bx bx-paste',
                        'type' => 'jawab-text'
                    ],
                    [
                        'text' => 'Jawab Angka',
                        'icon' => 'bx bx-copy-alt',
                        'type' => 'jawab-angka'
                    ],
                    [
                        'divider' => true,
                    ],
                    [
                        'text' => 'Dropdown',
                        'icon' => 'bx bx-list-ul',
                        'type' => 'dropdown'
                    ],
                    [
                        'text' => 'Pilihan Ganda',
                        'icon' => 'bx bx-check-circle',
                        'type' => 'pilihan-ganda'
                    ],
                    [
                        'text' => 'Kotak Centang',
                        'icon' => 'bx bx-check-square',
                        'type' => 'kotak-centang'
                    ],
                    [
                        'divider' => true,
                    ],
                    [
                        'text' => 'Petak Pilihan Ganda',
                        'icon' => 'bx bx-border-all',
                        'type' => 'petak-pilihan-ganda'
                    ],
                    [
                        'text' => 'Petak Kotak Centang',
                        'icon' => 'bx bx-grid-alt',
                        'type' => 'petak-kotak-centang'
                    ],
                    [
                        'divider' => true,
                    ],
                    [
                        'text' => 'Tanggal',
                        'icon' => 'bx bx-calendar',
                        'type' => 'jawab-tanggal'
                    ],
                    [
                        'text' => 'Waktu',
                        'icon' => 'bx bx-time',
                        'type' => 'jawab-waktu'
                    ],
                ] as $item)
                    @if(isset($item['divider']))
                        <hr>
                    @else
                        <button 
                            class="btn btn-light w-100 bg-white shadow-sm mb-2 text-start d-flex align-items-center py-3"
                            wire:click="tambahPertanyaan('{{ $item['type'] }}')"
                        >
                            <i class="{{ $item['icon'] }} me-2"></i>
                            {{ $item['text'] }}
                        </button>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="col">
            <div wire:sortable="update-soal-order">
                @foreach ($rows as $row)
                    @if(true)
                    <div wire:sortable.item="{{ $row->id }}" wire:key="{{$row->id}}">
                        <livewire:components.kuesioner-soal :$row :key="$row->id" />
                    </div>
                    @endif
                @endforeach
            </div>

            @if(count($rows) < 1)
                <div class="card">
                    <div class="card-body">
                        <div class="empty text-center py-5">
                            <div class="empty-icon mb-4">
                                <i class="bx bx-package" style="font-size: 50px"></i>
                            </div>
                
                            <p class="h4">Tidak ada pertanyaan</p>
                
                            <p class="empty-subtitle text-muted">
                                Silahkan membuat soal baru <br> pilih type soal pada menu disamping.
                            </p>
                          </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <x-alert />
</div>
