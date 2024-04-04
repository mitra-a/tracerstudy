<div class="container-fluid bg-primary text-white d-none d-lg-flex">
    <div class="container py-3">
        <div class="d-flex align-items-center">
            <a href="index.html">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('logo-white.png') }}" width="40px" class="me-3">
                    <h4 class="text-white m-0">TracerStudy | <b>JTIK UNM</b></h5>
                </div>
            </a>
            <div class="ms-auto d-flex align-items-center">
                <small class="ms-4"><i class="fa fa-map-marker-alt me-3"></i>Jl. Daeng Tata Raya</small>
                <small class="ms-4"><i class="fa fa-envelope me-3"></i>tik@unm.ac.id</small>
                <small class="ms-4"><i class="fa fa-phone-alt me-3"></i>+62 853-1122-4040</small>
                <div class="ms-3 d-flex">
                    <a class="btn btn-sm-square btn-light text-primary rounded-circle ms-2" href="/"><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-sm-square btn-light text-primary rounded-circle ms-2" href="/"><i
                            class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid bg-white sticky-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-white navbar-light p-lg-0">
            <a href="index.html" class="navbar-brand d-lg-none">
                <h1 class="fw-bold m-0">TracerStudy</h1>
            </a>
            <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">
                    <a href="{{ route('welcome') }}" class="nav-item nav-link">Home</a>
                    <a href="{{ route('welcome') }}#alur-pengisian" class="nav-item nav-link">Alur Pengisian</a>
                    <a href="{{ route('welcome') }}#tentang-kami" class="nav-item nav-link">Tentang Kami</a>
                    <a href="{{ route('registrasi') }}" class="nav-item nav-link">Daftar</a>
                </div>
                <div class="ms-auto d-none d-lg-block">
                    @if(auth()->check())
                        <a href="{{ route(auth()->user()->role . '.dashboard') }}" class="btn btn-primary rounded-pill py-2 px-3">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary rounded-pill py-2 px-3">Login</a>
                    @endif
                </div>
            </div>
        </nav>
    </div>
</div>