<div>
    <div class="d-flex">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Mater Data /</span> Akun Admin / Edit
        </h4>

        <div class="ms-auto">
            <a href="{{ route('admin.akun.index') }}" class="btn btn-light border">Kembali</a>
        </div>
    </div>

    <form wire:submit.prevent="save">
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between">
                <h5>Akun Admin</h5>
            </div>

            <div class="card-body">
                <x-form.input 
                    name="nama"
                    title="Nama"
                    wire:model="nama"
                    placeholder="masukan nama"
                />
                
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