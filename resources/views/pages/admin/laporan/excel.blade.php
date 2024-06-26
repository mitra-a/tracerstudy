<?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=".date('Ymd')."-Kuesioner Data.xls");
?>

<div>
    <table cellspacing="0px" cellpadding="5px" border="1px">
        <tr style="text-align: center">
            <td rowspan="2">NIM</td>
            <td rowspan="2">Nama</td>
            <td rowspan="2">Prodi</td>
            @foreach ($soal as $item)
                @if(!in_array($item['type'], ['petak-kotak-centang','petak-pilihan-ganda']))
                    <td style="white-space:nowrap" rowspan="2">{{ $item['pertanyaan'] }}</td>
                @else
                    <td style="white-space:nowrap" colspan="{{ count($item['opsi_x']) }}">{{ $item['pertanyaan'] }}</td>
                @endif
            @endforeach
        </tr>

        <tr style="text-align: center;">
            @foreach ($soal as $item)
                @if(in_array($item['type'], ['petak-kotak-centang','petak-pilihan-ganda']))
                    @foreach ($item['opsi_x'] as $opsiX)
                        <td style="white-space:nowrap">{{ $opsiX['opsi'] }}</td>
                    @endforeach
                @endif
            @endforeach
        </tr>

        @foreach ($jawaban as $key => $item)
            <tr>
                <td style="white-space: nowrap">&nbsp; {{ $item['nim'] }}</td>
                <td style="white-space: nowrap">{{ $item['nama'] }}</td>
                <td style="white-space: nowrap">{{ $item['prodi'] }}</td>
                @foreach ($item['jawaban'] as $jawab)
                    @if(is_array($jawab['jawaban']))
                        @foreach ($jawab['jawaban'] as $jawabItem)
                            <td style="white-space: nowrap">{{ $jawabItem['jawaban'] }}</td>
                        @endforeach
                    @else
                        <td style="white-space: nowrap">{{ $jawab['jawaban'] }}</td>
                    @endif
                @endforeach
            </tr>
        @endforeach
    </table>
</div>