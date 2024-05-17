<div>
    <style>
        .form-container{
            width: 300px;
        }

        /* MD */
        @media (min-width: 768px) {
            .form-container{
                width: 350px;
            }
        }

        @media (min-width: 990px) {
            .form-container{
                width: 550px;
            }
        }

        @media (min-width: 1200px) {
            .form-container{
                width: 650px;
            }
        }
    </style>

    <div class="row justify-content-center w-100 mx-auto" style="height: 100vh">
        <div class="col-4 d-none d-lg-block h-full bg-primary p-0">
            <img 
                style="object-fit: cover"
                src="{{ asset('img/unm.jpg') }}" 
                height="100%" 
                width="100%">
        </div>
        <div class="col-lg-8 h-full bg-white d-flex align-items-center p-0">
            <div class="container my-5 p-0">
                <div class="form-container mx-auto">
                    <div class="app-brand justify-content-center mb-5">
                        <a href="/" class="app-brand-link gap-2">
                            <span class="app-brand-logo demo me-3">
								<img src="{{ asset('logo.png') }}" height="50px">
                            </span>
                            <span class="app-brand-text demo text-body fw-bolder text-center" style="text-transform:initial">Tracerstudy <br> <span class="text-primary">JTIK UNM</span></span>
                        </a>
                    </div>

                    <h4 class="mb-2">Selamat Datang 👋</h4>
                    <p class="mb-4">Silahkan registrasi akun untuk melanjutkan</p>
    
                    <form class="mb-3" wire:submit.prevent="save">
                        <div class="mb-3">
                            <label for="form-nim" class="form-label">NIM</label>
                            <input 
                                type="text" 
                                class="form-control @error('nim') is-invalid @enderror" 
                                id="form-nim" 
                                wire:model.blur="nim"
                                placeholder="masukan nim"
                                autofocus="">
                        </div>

                        @if($alumni)
                            @if($alumni->email == null || $alumni->email == '')
                                <table class="table table-striped border border-2" style="font-size: 12px">
                                    <tr>
                                        <td>NIM</td>
                                        <td class="p-0" style="width: 1px">:</td>
                                        <td class="fw-bold">{{ $alumni->nim }}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td class="p-0" style="width: 1px">:</td>
                                        <td class="fw-bold">{{ $alumni->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td style="white-space: nowrap">Program Studi</td>
                                        <td class="p-0" style="width: 1px">:</td>
                                        <td class="fw-bold">{{ $alumni->prodi_data?->nama }}</td>
                                    </tr>
                                </table>
                            @else
                                <div class="alert alert-warning alert-dismissible border-3 bg-white">
                                    Data alumni telah registrasi, silahkan <a href="{{ route('login') }}">masuk</a>.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        @endif

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="form-nama" class="form-label">Nama</label>
                                    <input 
                                        type="nama"
                                        class="form-control @error('nama') is-invalid @enderror"
                                        id="form-nama"
                                        wire:model="nama"
                                        placeholder="masukan nama">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="form-email" class="form-label">Email</label>
                                    <input 
                                        type="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        id="form-email"
                                        wire:model="email"
                                        placeholder="masukan email">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="form-nim" class="form-label">Jurusan</label>
                            <div class="d-flex align-items-center">
                                <select
                                    type="text"
                                    class="form-control @error('jurusan') is-invalid @enderror"
                                    id="form-jurusan"
                                    wire:model.blur="jurusan"
                                    placeholder="masukan jurusan">
                                    <option value="">Pilih Jurusan</option>
                                    @foreach ($choice['jurusan'] as $item)
                                        <option value="{{ $item['kode'] }}">{{ $item['nama'] }}</option>
                                    @endforeach
                                </select>

                                <div
                                    wire:loading
                                    class="spinner-border text-primary ms-3" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div> 
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="form-nim" class="form-label">Program Studi</label>
                                    <select
                                        type="text"
                                        class="form-control @error('prodi') is-invalid @enderror"
                                        id="form-prodi"
                                        wire:model="prodi"
                                        placeholder="masukan prodi">
                                        <option value="">Pilih Program Studi</option>
                                        @foreach ($choice['prodi'] as $item)
                                            <option value="{{ $item['kode'] }}">{{ $item['nama'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="form-nim" class="form-label">Periode Wisuda</label>
                                    <select
                                        type="text"
                                        class="form-control @error('periode') is-invalid @enderror"
                                        id="form-periode"
                                        wire:model="periode"
                                        placeholder="masukan periode">
                                        <option value="">Pilih Periode Wisuda</option>
                                        @foreach ($choice['periode'] as $item)
                                            <option value="{{ $item['kode'] }}">Periode {{ $item['nama'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3 form-password-toggle">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label" for="form-password">Password</label>
                                    </div>
                                    <div class="input-group input-group-merge">
                                        <input 
                                            type="password" 
                                            id="form-password" class="form-control @error('password') is-invalid @enderror"
                                            wire:model="password"
                                            placeholder="············" 
                                            aria-describedby="password">
                                        <span class="input-group-text cursor-pointer">
                                            <i class="bx bx-hide"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3 form-password-toggle">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label" for="form-password-confirm">Ulangi Password</label>
                                    </div>
                                    <div class="input-group input-group-merge">
                                        <input 
                                            type="password" 
                                            id="form-password-confirm" class="form-control @error('password_confirm') is-invalid @enderror"
                                            wire:model="password_confirm" 
                                            placeholder="············" 
                                            aria-describedby="password">
                                        <span class="input-group-text cursor-pointer">
                                            <i class="bx bx-hide"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit">Registrasi</button>
                        </div>

                        <p class="text-center">
                            <span>Sudah mempunyai akun?</span>
                            <a href="{{ route('login') }}">
                              <span>masuk disini</span>
                            </a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>