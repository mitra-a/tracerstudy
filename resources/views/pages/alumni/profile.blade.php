<div>
    <div class="d-flex">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Selamat Datang /</span> Profile
        </h4>
    </div>
    
    <x-alert />

    <style>
        .form-label, .col-form-label{
            font-size: 0.7rem;
        }
    </style>
    
    <form wire:submit.prevent="save">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between">
                        <h5>Profile</h5>
                    </div>
            
                    <div class="card-body d-flex flex-column align-items-center">
                        <img src="{{ auth()->user()->foto ? asset('berkas/profile/' . auth()->user()->foto) : asset('img/avatar.jpg') }}" class="rounded mb-3" style="height: 150px; width: 150px; object-fit:cover">
            
                        <table class="table table-striped">
                            <tr>
                                <td width="1px" style="text-wrap: nowrap">
                                    Nama
                                    <div class="fw-bold">{{ auth()->user()->nama ?? '-' }}</div>
                                </td>
                                
                            </tr>
                            <tr>
                                <td width="1px" style="text-wrap: nowrap">
                                    Email
                                    <div class="fw-bold">{{ auth()->user()->email ?? '-' }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td width="1px" style="text-wrap: nowrap">
                                    Nomor Telepon
                                    <div class="fw-bold">{{ auth()->user()->nomor_telepon ?? '-' }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td width="1px" style="text-wrap: nowrap">
                                    Email
                                    <div class="fw-bold">{{ auth()->user()->email ?? '-' }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td width="1px" style="text-wrap: nowrap">
                                    Program Studi
                                    <div class="fw-bold">{{ auth()->user()->prodi_data->nama ?? '-' }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td width="1px" style="text-wrap: nowrap">
                                    Periode
                                    <div class="fw-bold">Periode {{ auth()->user()->periode_data->nama ?? '-' }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td width="1px" style="text-wrap: nowrap">
                                    Alamat
                                    <div class="fw-bold">{{ auth()->user()->alamat ?? '-' }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td width="1px" style="text-wrap: nowrap">
                                    Provinsi
                                    <div class="fw-bold">{{ auth()->user()->provinsi ?? '-' }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td width="1px" style="text-wrap: nowrap">
                                    Kabupaten/Kota
                                    <div class="fw-bold">{{ auth()->user()->kabupaten_kota ?? '-' }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td width="1px" style="text-wrap: nowrap">
                                    Tempat Kerja
                                    <div class="fw-bold">{{ auth()->user()->tempat_kerja ?? '-' }}</div>
                                </td>
                            </tr>
                            <tr>
                                <td width="1px" style="text-wrap: nowrap">
                                    Alamat Kerja
                                    <div class="fw-bold">{{ auth()->user()->alamat_kerja ?? '-' }}</div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div 
                    class="card mb-3"
                    x-data="{ uploading: false, progress: 0 }"
                    x-on:livewire-upload-start="uploading = true"
                    x-on:livewire-upload-finish="uploading = false"
                    x-on:livewire-upload-error="uploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress"
                >
                    <div class="card-header d-flex justify-content-between">
                        <h5>Edit Profile</h5>
                    </div>
            
                    <div class="card-body">
                        <x-form.input 
                            name="nama"
                            title="Nama"
                            wire:model="nama"
                            placeholder="masukan nama"
                        />

                        <x-form.input 
                            name="nomor_telepon"
                            title="Nomor Telepon"
                            wire:model="nomor_telepon"
                            placeholder="masukan nomor telepon"
                        />
                        
                        <x-form.select 
                            name="prodi"
                            title="Program Studi"
                            wire:model="prodi"
                        >
                            <option value="">- Pilih Program Studi -</option>
                            @foreach ($choice['prodi'] as $item)
                                <option value="{{ $item['kode'] }}">{{ $item['nama'] }}</option>
                            @endforeach
                        </x-form.select>
                        
                        <x-form.select 
                            name="periode"
                            title="Periode Wisuda"
                            wire:model="periode"
                        >
                            <option value="">- Pilih Periode Wisuda -</option>
                            @foreach ($choice['periode'] as $item)
                                <option value="{{ $item['kode'] }}">Periode {{ $item['nama'] }}</option>
                            @endforeach
                        </x-form.select>

                        <x-form.input 
                            name="gambar"
                            title="Gambar"
                            wire:model="gambar"
                            type="file"
                            placeholder="masukan nim"
                        />
                        
                        <div x-show="uploading" class="w-100">
                            <progress max="100" x-bind:value="progress" class="w-100"></progress>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between">
                        <h5>Alamat</h5>
                    </div>
        
                    <div class="card-body">
                        <x-form.input 
                            name="alamat"
                            title="Alamat"
                            wire:model="alamat"
                            placeholder="masukan alamat"
                        />
                        
                        <x-form.input 
                            name="provinsi"
                            title="Provinsi"
                            wire:model="provinsi"
                            placeholder="masukan provinsi"
                        />
                        
                        <x-form.input 
                            name="kabupaten_kota"
                            title="Kabupaten/Kota"
                            wire:model="kabupaten_kota"
                            placeholder="masukan kabupaten/kota"
                        />
                    </div>
                </div>
        
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between">
                        <h5>Tempat Kerja</h5>
                    </div>
        
                    <div class="card-body">
                        <x-form.input 
                            name="tempat_kerja"
                            title="Tempat Kerja"
                            wire:model="tempat_kerja"
                            placeholder="masukan tempat kerja"
                        />
                        
                        <x-form.input 
                            name="alamat_kerja"
                            title="Alamat Kerja"
                            wire:model="alamat_kerja"
                            placeholder="masukan alamat kerja"
                        />
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between">
                        <h5>Akun Profile</h5>
                    </div>
            
                    <div class="card-body">
                        <x-form.input 
                            name="email"
                            title="Email"
                            type="email"
                            value="{{ auth()->user()->email }}"
                            placeholder="masukan email"
                            readonly
                        />

                        <x-form.input 
                            name="password"
                            title="Password"
                            wire:model="password"
                            type="password"
                            placeholder="masukan password"
                        />

                        <x-form.input 
                            name="password_confirm"
                            title="Password Ulang"
                            wire:model="password_confirm"
                            type="password"
                            placeholder="masukan password ulang"
                        />
                    </div>
                    
                    <div class="card-footer pt-0 justify-content-end d-flex">
                        <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>