<div>
    <div class="container-fluid px-0 mb-5">
        <div id="header-carousel" class="carousel slide carousel-fade">
            <div class="carousel-inner">
                <style>
                    @media (max-width: 768px){
                        #header-carousel .carousel-item {
                            position: relative;
                            min-height: 580px;
                            background-color: white;
                        }
                    }
                    @media (min-width: 767.98px) { 
                        .w-md-0{
                            width: auto !important;
                        }

                        .image-hero{
                            height: auto;
                        }
                    }

                    .image-hero{
                        height: 600px;
                    }
                </style>

                <div class="carousel-item active">
                    <div
                        class="position-absolute d-none d-md-block"
                        style="
                        width:100%;
                        background-image: linear-gradient(-90deg, #00000054, #00000091)
                        height:100%;
                        z-index: 1040"
                    ></div>

                    <img loading="lazy" 
                        style="object-fit: cover; z-index:9"
                        class="w-100 image-hero d-none d-md-block"
                        src="{{ asset('img/landing-page.webp') }}"
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

                                    <p class="fs-4 text-dark animated slideInRight d-block d-md-none" style="line-height: 37px; text-align: left">
                                        <b>Tracer Study JTIK UNM</b> adalah jendela yang membuka pandangan ke arah masa depan
                                    </p>

                                    <img loading="lazy" 
                                        style="object-fit: cover; height: 250px"
                                        class="w-100 animated slideInRight rounded position-relative d-block d-md-none"
                                        src="{{ asset('img/landing-page-mobile.webp') }}"
                                        alt="Image">

                                    @if(session()->has('login'))
                                        <a 
                                            href="{{ route(session('login')?->role . '.dashboard') }}"
                                            class="btn btn-primary rounded-pill py-3 px-5 mt-3 mt-md-5 w-md-0 w-100 me-2 animated slideInRight">
                                            Dashboard
                                        </a>
                                    @else
                                        <a 
                                            href="{{ route('login') }}"
                                            class="btn btn-primary rounded-pill py-3 px-5 mt-3 mt-md-5 w-md-0 w-100 me-2 animated slideInRight">
                                            Masuk disini
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

    <div class="container-xxl py-0 py-md-5" id="alur-pengisian">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp d-none d-md-block" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium text-primary">Tracer Study</p>
                <h1 class="display-5 mb-5 d-md-block d-none">Alur Pengisian <br> Tracer Study</h1>
            </div>

            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item position-relative h-100">
                        <div class="service-text rounded p-5">
                            <div class="btn-square bg-light rounded-circle mx-auto mb-4"
                                style="width: 64px; height: 64px;">
                                <img loading="lazy" class="img-fluid" src="{{ asset('home/img/icon/icon-5.png') }}" alt="Icon">
                            </div>
                            <h5 class="mb-3">Akses Tracer Study</h4>
                            <p class="mb-0 text-center mx-auto" style="width: 80%">Akses halaman tracer study JTIK UNM pada tautan <a href="{{ env('APP_URL') }}">{{ env('APP_URL') }}</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-item position-relative h-100">
                        <div class="service-text rounded p-5">
                            <div class="btn-square bg-light rounded-circle mx-auto mb-4"
                                style="width: 64px; height: 64px;">
                                <img loading="lazy" class="img-fluid" src="{{ asset('home/img/icon/icon-6.png') }}" alt="Icon">
                            </div>
                            <h5 class="mb-3">Login</h4>
                            <p class="mb-0 mx-auto" style="width: 80%">Masuk atau login pada halaman <a href="{{ route('login') }}">login</a>, masukan email dan password</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="service-item position-relative h-100">
                        <div class="service-text rounded p-5">
                            <div class="btn-square bg-light rounded-circle mx-auto mb-4"
                                style="width: 64px; height: 64px;">
                                <img loading="lazy" class="img-fluid" src="{{ asset('home/img/icon/icon-10.png') }}" alt="Icon">
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
                        <a href="/" 
                            aria-label="Vidio Profile" 
                            class="btn-play"
                            data-bs-toggle="modal"
                            data-src="https://www.youtube.com/embed/0gpS1ShXjpo" data-bs-target="#videoModal">
                            <span></span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 pt-lg-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="bg-white rounded-top p-5 mt-lg-5">
                        <p class="fs-5 fw-medium text-primary">Tentang Kami</p>
                        <h1 class="display-6 mb-4">Jurusan Teknik Informatika dan Komputer Universitas Negeri Makassar</h1>
                        <p class="mb-4" style="text-align: justify">
                            Jurusan Teknik Informatika dan Komputer di bawah naungan Fakultas Teknik Universitas negeri Makassar atas dasar Permenristekdikti Nomor 15 Tahun 2019 tentang Organisasi Tata Kelola Universitas Negeri Makassar dan Surat keputusan Rektor Nomor 669/UN36/KP/2020  tentang pembentukan Jurusan Teknik Informatika dan Komputer Fakultas Teknik Universitas Negeri Makassar. Jurusan ini merupakan jurusan pertama dengan nomenklatur Jurusan Teknik Informatika dan Komputer  dalam lingkungan Fakultas Teknik UNM. Jurusan Teknik Informatika dan Komputer (JTIK) berada dalam lingkungan Fakultas Teknik bersama  6 Jurusan lainnya.  Kampus JTIK FT UNM berada dalam kompleks Fakultas Teknik Universitas Negeri Makassar berlokasi di Kampus UNM Parangtambung. JTIK merupakan salah satu jurusan yang memiliki mahasiswa terbanyak dalam lingkup Fakultas Teknik UNM.
                        </p>
                        <a class="btn btn-primary rounded-pill py-3 px-5 mt-4" href="https://jtik.ft.unm.ac.id/index.php/profil">
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
                    <h3 class="modal-title" id="exampleModalLabel">Jurusan Teknik Informatika dan Komputer | UNM</h3>
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
                            loading="lazy"
                            src="{{ asset('logo-white.webp') }}"
                            height="150px"
                        />
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-4">Kontak Kami</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Jl. Daeng Tata Raya (90224)</p>
                    <p class="mb-2"><i class="fab fa-instagram me-3"></i>@jtikunm_official</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>jtik@unm.ac.id</p>
                    <p class="mb-2"><i class="fas fa-phone"></i><b>Telp:</b> 0853-1122-4040 <br> <b>Fax:</b> (0411) 861507
                    </p>
                   
                </div>
                <div class="col-lg-4 col-md-6">
                    {{-- <h4 class="text-white mb-4"></h4> --}}
                    <p>
                        <b>Universitas Negeri Makassar</b> <br>
                        <b>Fakultas Teknik</b> <br>
                        Jurusan Teknik Informatika dan Komputer <br>
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
                {{-- <div class="col-md-6 text-center text-md-end">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed By <a class="fw-medium text-light" href="https://htmlcodex.com">HTML Codex</a>
                    Distributed By <a class="fw-medium text-light" href="https://themewagon.com">ThemeWagon</a>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- Copyright End -->


    <!-- Back to Top -->
    <a 
        href="#"
        aria-label="Halaman depan"
        class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top">
        <i class="fas fa-chevron-up"></i></a>
</div>
