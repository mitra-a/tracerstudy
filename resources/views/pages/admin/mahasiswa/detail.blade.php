<div>
    <div class="d-flex">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Mater Data /</span> Mahasiswa / Detail
        </h4>

        <div class="ms-auto">
            <a href="{{ route('admin.mahasiswa.index') }}" class="btn btn-light border">Kembali</a>
        </div>
    </div>

    <form wire:submit.prevent="save">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between">
                        <h5>Profile</h5>
                    </div>
            
                    <div class="card-body d-flex flex-column align-items-center p-0">
                        <div class="table-responsive w-100">
                            <table class="table table-striped">
                                <tr>
                                    <td width="1px">
                                        Nama
                                        <div class="fw-bold">{{ $data->nama ?? '-' }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="1px">
                                        NIM
                                        <div class="fw-bold">{{ $data->nim ?? '-' }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="1px">
                                        Tanggal Lahir
                                        <div class="fw-bold">{{ $data->tanggal_lahir ?? '-' }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="1px">
                                        Jenis Kelamin
                                        <div class="fw-bold">{{ $data->jenis_kelamin ?? '-' }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="1px">
                                        Nomor Telepon
                                        <div class="fw-bold">{{ $data->nomor_telepon ?? '-' }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="1px">
                                        Program Studi
                                        <div class="fw-bold">{{ $data->prodi_data->nama ?? '-' }}</div>
                                    </td>
                                </tr>
                                @if($data->periode_data)
                                <tr>
                                    <td width="1px">
                                        Periode
                                        <div class="fw-bold">Periode {{ $data->periode_data->nama ?? '-' }}</div>
                                    </td>
                                </tr>
                                @endif
                                <tr>
                                    <td width="1px">
                                        Alamat
                                        <div class="fw-bold">{{ $data->alamat ?? '-' }}</div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>