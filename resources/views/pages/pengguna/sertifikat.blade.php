<div 
    class="page">

    <style>
        .page{
            width: 21cm;
            min-height: 29.7cm;
            padding: 2cm;
            margin: 1cm auto;
            border: 1px #D3D3D3 solid;
            border-radius: 5px;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        @media print {
            .page {
                padding: 0;
                margin: auto auto;
                border: none;
                border-radius: 0;
                background: white;
                box-shadow: none;
            }
        }
    </style>

	<center>
		<table>
			<tbody>
				<tr>
					<td>
						<img src="{{ asset('unm_hitam.png') }}" class="img-circle" height="100" width="100">
						<table></table>
					</td>
					<td width="600" align="center">
						<p class="kecil">
							<font size="3">KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET DAN TEKNOLOGI <br>
							</font>
							<font size="3">UNIVERSITAS NEGERI MAKASSAR (UNM) <br>
							</font>
							<font size="3">
								<b>FAKULTAS TEKNIK</b>
								<br>
							</font>
							<font size="3">
								<b>JURUSAN TEKNIK INFORMATIKA DAN KOMPUTER</b>
								<br>
							</font>
							<font size="2">Alamat: Jalan Daeng Tata Raya Parangtambung Makassar <br>
							</font>
							<font size="2">Telp (0411) 865677 – Fax. (0411) 861377 <br>
							</font>
							<font size="2">Laman: <a target="_blank" href="https://jtik.ft.unm.ac.id/">jtik.ft.unm.ac.id</a>
							</font>
						</p>
					</td>
				</tr>
			</tbody>
		</table>
		<hr>
		<b>
			<u>SURAT KETERANGAN</u>
		</b>
		{{-- <br> No: 896/UN36.2/JTIK/V/2024 <br> --}}
		<br>
		<br>
		<br>
	</center> Yang bertanda tangan dibawah ini: <table>
		<tbody>
			<tr>
				<td></td>
				<td>Nama</td>
				<td>: </td>
				<td>Dr. Ir. Mustari S. Lamada, S.Pd., M.T. </td>
			</tr>
			<tr>
				<td></td>
				<td>NIP</td>
				<td>: </td>
				<td>197505052005011001 </td>
			</tr>
			<tr>
				<td></td>
				<td>Jabatan</td>
				<td>: </td>
				<td>Ketua Jurusan TIK</td>
			</tr>
		</tbody>
	</table>
	<br> Menerangkan bahwa, mahasiswa berikut: <table>
		<tbody>
			<tr>
				<td></td>
				<td>Nama</td>
				<td>: </td>
				<td>
					<b>{{ session('login')?->nama }}</b>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>NIM</td>
				<td>: </td>
				<td>{{ session('login')?->nim }} </td>
			</tr>
			<tr>
				<td></td>
				<td>Program Studi</td>
				<td>: </td>
				<td>{{ session('login')?->prodi_data->nama }}</td>
			</tr>
		</tbody>
	</table>
	<br> Telah menyelesaikan pengisian kuesioner <i>tracer study</i> <b>"{{ $kuesioner->nama }}"</b> yang diselenggarakan oleh Jurusan Teknik Informatika dan Komputer Universitas Negeri Makassar.
    <br>
    <br>
    Kuesioner ini merupakan bagian dari upaya untuk mengumpulkan data dan informasi untuk keperluan evaluasi dan pengembangan jurusan Teknik Informatika dan Komputer. Kami mengucapkan terima kasih atas partisipasi dan kerjasamanya.
    <br>
	<br> Demikian penyampaian kami, atas kerjasamanya kami ucapkan banyak terima kasih. <br>
	<br>
	<p></p>
	<table align="right">
		<tbody>
			<tr>
				<td></td>
				<td>Makassar, {{ $tanggal_jawab }} <br>Ketua Jurusan TIK </td>
			</tr>
			<tr>
				<td></td>
				<td>
					<img src="{{ $route }}" width="70px">
					<br>
					<b>Dr. Ir. Mustari S. Lamada, S.Pd., M.T. <br>NIP. 197505052005011001 </b>
				</td>
			</tr>
		</tbody>
	</table>
	<p></p>
</div>