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

                    <h4 class="mb-2">Verifikasi Tanda Tangan ✅</h4>
                    <p class="mb-4">Mengkonfirmasi Tanda Tangan Elektronik / Barcode </p>
    
                    <div class="alert alert-primary alert-dismissible border-3 bg-white">
                        Telah menjawab <b>kuesioner</b>, silahkan melihat data berikut untuk mengkonfirmasi kebenaran.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>


                    <table class="table">
                        <tbody>
                            <tr>
                                <td style="width: 1px">Nama</td>
                                <td style="width: 1px" class="p-0">: </td>
                                <td>
                                    <b>{{ $akun->nama }}</b>
                                </td>
                            </tr>
                            <tr>
                                <td>NIM</td>
                                <td class="p-0">: </td>
                                <td>{{ $akun->nim }} </td>
                            </tr>
                            <tr>
                                <td style="white-space: nowrap">Program Studi</td>
                                <td class="p-0">: </td>
                                <td>{{ optional($prodi)['nama'] }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <h4 class="mt-4 mb-2">Kuesioner 📝</h4>
                    <p class="mb-4">{{ $kuesioner->id }} </p>

                    <table class="table">
                        <tbody>
                            <tr>
                                <td style="width: 1px">Kuesioner</td>
                                <td style="width: 1px" class="p-0">: </td>
                                <td>
                                    <b>{{ $kuesioner->nama }}</b>
                                </td>
                            </tr>
                            <tr>
                                <td style="white-space: nowrap">Tanggal</td>
                                <td class="p-0">: </td>
                                <td>{{ $tanggal_jawab }}</td>
                            </tr>
                            <tr>
                                <td style="white-space: nowrap">Waktu</td>
                                <td class="p-0">: </td>
                                <td>{{ $waktu_jawab }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>