<div>
    <div class="row">
        <div class="col-lg-8 col-12">
            <div class="row">
                @foreach ([1,1,1] as $item)
                    <div class="col-lg-4 mb-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class="mb-3">
                                    <h1 class="text-primary font-weight-bold">195</h1>
                                </div>
                                <h5 class="h3 font-weight-bolder mb-1">Prodi</h5><span class="d-block text-sm text-muted">Jumlah Program Studi <br> dalam Database</span>
                              </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="card">
                <div class="card-body">

                </div>
            </div>
        </div>

        <div class="col-lg-4 col-12">
            <h4 class="mb-4">Akun Terakhir Login</h4>

            @foreach ([1,1,1,1,1,1] as $item)
            <div class="card mb-2">
                <div class="card-body p-3">
                    <h5 class="mb-0">NUR RESKY EVAWANTI</h5>
                    <p class="mb-0 text-primary">mahasiswa</p>
                    <p class="mb-0">2023-10-27 15:31:34</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
