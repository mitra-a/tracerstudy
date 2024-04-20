<div>
    <div class="container-fluid px-0 mb-5">
        <div id="header-carousel" class="carousel slide carousel-fade">
            <div class="carousel-inner">
                <style>
                    @media (min-width: 767.98px) { 
                        .w-md-0{
                            width: auto !important;
                        }
                    }
                </style>

                <div class="carousel-item active">
                    <div
                        class="position-absolute"
                        style="
                        width:100%;
                        background-image: linear-gradient(-90deg, #00000054, #000000b5);
                        height:100%;
                        z-index: 1040"
                    ></div>

                    <img 
                        style="height: 600px; object-fit: cover; z-index:9"
                        class="w-100" 
                        src="{{ asset('img/landing-page.jpg') }}" 
                        alt="Image">
                        
                    <div class="carousel-caption" style="z-index: 1041">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-6 text-start">
                                    <h3 class="display-5 d-none d-md-block text-white mb-4 animated slideInRight">
                                        Selamat Datang
                                    </h3>
                                    <p class="fs-4 text-white animated slideInRight d-none d-md-block" style="line-height: 37px; text-align: justify">
                                        Kami menyambut Anda dalam perjalanan yang tak ternilai dalam menggali potensi dan kesuksesan setelah meninggalkan bangku kuliah. <b>Tracer Study JTIK UNM</b> adalah jendela yang membuka pandangan ke arah masa depan
                                    </p>

                                    <p class="fs-4 text-white animated slideInRight d-block d-md-none" style="line-height: 37px; text-align: left">
                                        <b>Tracer Study JTIK UNM</b> adalah jendela yang membuka pandangan ke arah masa depan
                                    </p>
                                    @if(auth()->check())
                                        <a 
                                            href="{{ route(auth()->user()->role . '.dashboard') }}"
                                            class="btn btn-primary rounded-pill py-3 px-5 mt-3 mt-md-5 w-md-0 w-100 me-2 animated slideInRight>
                                            Dashboard
                                        </a>
                                    @else
                                        <a 
                                            href="{{ route('login') }}"
                                            class="btn btn-primary rounded-pill py-3 px-5 mt-3 mt-md-5 w-md-0 w-100 me-2 animated slideInRight">
                                            Masuk disini
                                        </a>
                                        <a 
                                            href="{{ route('registrasi') }}"
                                            class="btn btn-light rounded-pill py-3 px-5 mt-2 mt-md-5 w-md-0 w-100 animated slideInRight">
                                            Daftar
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-xxl py-5" id="alur-pengisian">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium text-primary">Tracer Study</p>
                <h1 class="display-5 mb-5">Alur Pengisian <br> Tracer Study</h1>
            </div>

            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item position-relative h-100">
                        <div class="service-text rounded p-5">
                            <div class="btn-square bg-light rounded-circle mx-auto mb-4"
                                style="width: 64px; height: 64px;">
                                <img class="img-fluid" src="{{ asset('home/img/icon/icon-5.png') }}" alt="Icon">
                            </div>
                            <h5 class="mb-3">Akses Tracer Study</h4>
                            <p class="mb-0 text-center mx-auto" style="width: 80%">Akses halaman tracer study JTIK UNM pada tautan <a href="{{ env('APP_URL') }}">{{ env('APP_URL') }}</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item position-relative h-100">
                        <div class="service-text rounded p-5">
                            <div class="btn-square bg-light rounded-circle mx-auto mb-4"
                                style="width: 64px; height: 64px;">
                                <img class="img-fluid" src="{{ asset('home/img/icon/icon-6.png') }}" alt="Icon">
                            </div>
                            <h5 class="mb-3">Registrasi </h4>
                            <p class="mb-0 mx-auto" style="width: 80%">Mengakses halaman registrasi dengan klik tombol Daftar <a href="{{ route('registrasi') }}">disini</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item position-relative h-100">
                        <div class="service-text rounded p-5">
                            <div class="btn-square bg-light rounded-circle mx-auto mb-4"
                                style="width: 64px; height: 64px;">
                                <img class="img-fluid" src="{{ asset('home/img/icon/icon-2.png') }}" alt="Icon">
                            </div>
                            <h5 class="mb-3">Mengisi Data</h4>
                            <p class="mb-0 mx-auto" style="width: 80%">Mengisi data pada halaman registrasi berupa nim, email dan password</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item position-relative h-100">
                        <div class="service-text rounded p-5">
                            <div class="btn-square bg-light rounded-circle mx-auto mb-4"
                                style="width: 64px; height: 64px;">
                                <img class="img-fluid" src="{{ asset('home/img/icon/icon-6.png') }}" alt="Icon">
                            </div>
                            <h5 class="mb-3">Login</h4>
                            <p class="mb-0 mx-auto" style="width: 80%">Masuk atau login pada halaman <a href="{{ route('login') }}">login</a>, masukan email dan password</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item position-relative h-100">
                        <div class="service-text rounded p-5">
                            <div class="btn-square bg-light rounded-circle mx-auto mb-4"
                                style="width: 64px; height: 64px;">
                                <img class="img-fluid" src="{{ asset('home/img/icon/icon-2.png') }}" alt="Icon">
                            </div>
                            <h5 class="mb-3">Melengkapi Data</h4>
                            <p class="mb-0 mx-auto" style="width: 80%">Melengkapi data profile Alumni pada menu alumni setelah registrasi</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item position-relative h-100">
                        <div class="service-text rounded p-5">
                            <div class="btn-square bg-light rounded-circle mx-auto mb-4"
                                style="width: 64px; height: 64px;">
                                <img class="img-fluid" src="{{ asset('home/img/icon/icon-10.png') }}" alt="Icon">
                            </div>
                            <h5 class="mb-3">Mengisi Kuesioner</h4>
                            <p class="mb-0 mx-auto" style="width: 80%">Mengisi kuesioner yang terdapat pada dashboard alumni</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-xxl about my-5" id="tentang-kami">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-6">
                    <div class="h-100 d-flex align-items-center justify-content-center" style="min-height: 300px;">
                        <button type="button" class="btn-play" data-bs-toggle="modal"
                            data-src="https://www.youtube.com/embed/0gpS1ShXjpo" data-bs-target="#videoModal">
                            <span></span>
                        </button>
                    </div>
                </div>
                <div class="col-lg-6 pt-lg-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="bg-white rounded-top p-5 mt-lg-5">
                        <p class="fs-5 fw-medium text-primary">Tentang Kami</p>
                        <h1 class="display-6 mb-4">Jurusan Teknik Informatika & Komputer FT UNM</h1>
                        <p class="mb-4" style="text-align: justify">
                            Jurusan Teknik Informatika dan Komputer di bawah naungan Fakultas Teknik Universitas negeri Makassar atas dasar Permenristekdikti Nomor 15 Tahun 2019 tentang Organisasi Tata Kelola Universitas Negeri Makassar dan Surat keputusan Rektor Nomor 669/UN36/KP/2020  tentang pembentukan Jurusan Teknik Informatika dan Komputer Fakultas Teknik Universitas Negeri Makassar. Jurusan ini merupakan jurusan pertama dengan nomenklatur Jurusan Teknik Informatika dan Komputer  dalam lingkungan Fakultas Teknik UNM.
                        </p>
                        <a class="btn btn-primary rounded-pill py-3 px-5 mt-4" href="https://tik.ft.unm.ac.id/">
                            Explore More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-video fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Profile Jurusan Teknik Informatika & Komputer FT UNM</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- 16:9 aspect ratio -->
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="" id="video" allowfullscreen
                            allowscriptaccess="always" allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-5 col-md-6">
                    <div class="d-flex justify-content-center align-items-center h-100">
                        <img
                            src="{{ asset('jtik.png') }}"
                            height="85px"
                        />
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Kontak Kami</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Jl. Daeng Tata Raya (90224)</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+62 853-1122-4040</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>tik@unm.ac.id</p>
                   
                </div>
                <div class="col-lg-4 col-md-6">
                    {{-- <h4 class="text-white mb-4"></h4> --}}
                    <p>
                        <b>Jurusan Teknik Informatika dan Komputer</b> <br>
                        <b>Universitas Negeri Makassar</b> <br>
                        Kampus Parang Tambung Makassar <br>
                    </p>

                    <div class="d-flex pt-3">
                        <a class="btn btn-square btn-light rounded-circle me-2" href=""><i
                                class="fab fa-instagram"></i></a>
                        <a class="btn btn-square btn-light rounded-circle me-2" href=""><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-light rounded-circle me-2" href=""><i
                                class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Copyright Start -->
    <div class="container-fluid copyright py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="fw-medium text-light" href="#">Tracer Study</a>, Universitas Negeri Makassar.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed By <a class="fw-medium text-light" href="https://htmlcodex.com">HTML Codex</a>
                    Distributed By <a class="fw-medium text-light" href="https://themewagon.com">ThemeWagon</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>
</div>
