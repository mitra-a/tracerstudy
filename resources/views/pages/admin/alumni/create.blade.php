<div>
    <div class="d-flex">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Mater Data /</span> Alumni / Tambah
        </h4>

        <div class="ms-auto">
            <a href="{{ route('admin.alumni.index') }}" class="btn btn-light border">Kembali</a>
        </div>
    </div>

    <form wire:submit.prevent="save">
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between">
                <h5>Alumni</h5>
            </div>

            <div class="card-body">
                <x-form.input 
                    name="nim"
                    title="NIM"
                    wire:model="nim"
                    placeholder="masukan nim"
                />
                
                <x-form.input 
                    name="nama"
                    title="Nama Alumni"
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
                    name="foto"
                    title="Foto Profile"
                    wire:model="foto"
                    note="File Anda harus berekstensi <text class='text-danger'>.jpg .png .jpeg</text> dan dibawah 1mb"
                    type="file"
                />
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
                <h5>Akun</h5>
            </div>

            <div class="card-body">
                <x-form.input 
                    name="email"
                    title="Email"
                    wire:model="email"
                    placeholder="masukan email"
                />
                
                <x-form.input 
                    name="password"
                    title="Password"
                    wire:model="password"
                    placeholder="masukan password"
                    type="password"
                />

                <div class="card-footer pt-0 justify-content-end d-flex">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </form>
</div>