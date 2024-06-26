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

         @media (min-width: 1200px) {
            .form-container{
                width: 400px;
            }
         }
    </style>

    <div class="row justify-content-center w-100 mx-auto" style="height: 100vh">
        <div class="col-6 d-none d-lg-block h-full bg-primary p-0">
            <img 
                style="object-fit: cover"
                src="{{ asset('img/unm.jpg') }}" 
                height="100%" 
                width="100%">
        </div>
        <div class="col-lg-6 h-full bg-white d-flex align-items-center p-0">
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
                    <p class="mb-4">Silahkan login untuk melanjutkan</p>
    
                    @if(session()->has('registrasi'))
                    <div class="alert alert-primary alert-dismissible border-3 bg-white">
                        Berhasil melakukan registrasi, silahkan masuk untuk melanjutkan.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    @if(session()->has('warning-auth'))
                    <div class="alert alert-warning alert-dismissible border-3 bg-white">
                        Username atau password yang anda masukan tidak ditemukan.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    @if(session()->has('danger-auth'))
                    <div class="alert alert-warning alert-dismissible border-3 bg-white">
                        Terjadi kesalahan ketika login, silahkan coba lagi atau beberapa saat lagi.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    
                    <form class="mb-3" wire:submit.prevent="login">
                        <div class="mb-3">
                            <label for="form-username" class="form-label">Username</label>
                            <input type="username" class="form-control @error('username') is-invalid @enderror" id="form-username" wire:model.defer="username" placeholder="masukan username" autofocus="">
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="form-password">Password</label>
                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password" id="form-password" class="form-control @error('password') is-invalid @enderror" wire:model.defer="password" placeholder="············" aria-describedby="password">
                                <span class="input-group-text cursor-pointer">
                                    <i class="bx bx-hide"></i>
                                </span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember-me">
                                <label class="form-check-label" for="remember-me"> Ingat Saya </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                        </div>

                        {{-- <p class="text-center">
                            <span>Belum memiliki akun?</span>
                            <a href="{{ route('registrasi') }}">
                              <span>Buat akun disini</span>
                            </a>
                        </p> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>