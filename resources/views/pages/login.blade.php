<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Register -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center">
                        <a href="index.html" class="app-brand-link gap-2">
                            <span class="app-brand-logo demo me-3">
								<img src="{{ asset('logo.png') }}" height="50px">
                            </span>
                            <span class="app-brand-text demo text-body fw-bolder text-center" style="text-transform:initial">Tracerstudy <br> <span class="text-primary">JTIK UNM</span></span>
                        </a>
                    </div>
                    <!-- /Logo -->
                    <h4 class="mb-2">Selamat Datang 👋</h4>
                    <p class="mb-4">Silahkan sign in untuk melanjutkan</p>

                    @if(session()->has('warning-auth'))
                    <div class="alert alert-warning alert-dismissible border-3 bg-white">
                        Username atau password yang anda masukan tidak ditemukan.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <form class="mb-3" wire:submit.prevent="login">
                        <div class="mb-3">
                            <label for="form-email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="form-email" wire:model.defer="email" placeholder="masukan email" autofocus="">
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
                                <label class="form-check-label" for="remember-me"> Remember Me </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
</div>