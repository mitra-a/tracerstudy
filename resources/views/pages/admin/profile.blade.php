<div>
    <div class="d-flex">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Selamat Datang /</span> Profile
        </h4>
    </div>
    
    <x-alert />
    
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
                                <td width="1px" style="text-wrap: nowrap">Nama</td>
                                <td width="1px" class="px-1">:</td>
                                <td>{{ auth()->user()->nama }}</td>
                            </tr>
                            <tr>
                                <td width="1px" style="text-wrap: nowrap">Email</td>
                                <td class="px-1">:</td>
                                <td>{{ auth()->user()->email }}</td>
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