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
            <div class="col-lg-5">
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between">
                        <h5>Profile</h5>
                    </div>
            
                    <div class="card-body d-flex flex-column align-items-center p-0">
                        <img src="{{ auth()->user()->foto ? asset('berkas/profile/' . auth()->user()->foto) : asset('img/avatar.jpg') }}" class="rounded mb-3" style="height: 150px; width: 150px; object-fit:cover">
                        
                        <div class="table-responsive w-100">
                            <table class="table table-striped">
                                <tr>
                                    <td width="1px">
                                        Nama
                                        <div class="fw-bold">{{ auth()->user()->nama ?? '-' }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="1px">
                                        Nomor Telepon
                                        <div class="fw-bold">{{ auth()->user()->nomor_telepon ?? '-' }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="1px">
                                        Program Studi
                                        <div class="fw-bold">{{ auth()->user()->prodi_data->nama ?? '-' }}</div>
                                    </td>
                                </tr>
                                @if(auth()->user()->periode_data)
                                <tr>
                                    <td width="1px">
                                        Periode
                                        <div class="fw-bold">Periode {{ auth()->user()->periode_data->nama ?? '-' }}</div>
                                    </td>
                                </tr>
                                @endif
                                <tr>
                                    <td width="1px">
                                        Alamat
                                        <div class="fw-bold">{{ auth()->user()->alamat ?? '-' }}</div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
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
                        {{-- <x-form.select 
                            name="periode"
                            title="Periode Wisuda"
                            wire:model="periode"
                        >
                            <option value="">- Pilih Periode Wisuda -</option>
                            @foreach ($choice['periode'] as $item)
                                <option value="{{ $item['kode'] }}">Periode {{ $item['nama'] }}</option>
                            @endforeach
                        </x-form.select> --}}

                        <x-form.input 
                            name="gambar"
                            title="Gambar"
                            wire:model="gambar"
                            type="file"
                            note="File Anda harus berekstensi <text class='text-danger'>.jpg .png .jpeg</text> dan dibawah 1mb"
                            placeholder="masukan nim"
                        />
                        
                        <div x-show="uploading" class="w-100">
                            <progress max="100" x-bind:value="progress" class="w-100"></progress>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between">
                        <h5>Akun Profile</h5>
                    </div>
            
                    <div class="card-body">
                        @if(\Hash::check(auth()->user()->nim, auth()->user()->password))
                        <div class="alert alert-danger">
                            Password anda masih menggunakan password default, ubah password sekarang
                        </div>
                        @endif

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