<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $jurusan = [
        //     [
        //         'kode' => 'JPTSP',
        //         'nama' => 'Jurusan Pendidikan Teknik Sipil dan Perencanaan'
        //     ],
        //     [
        //         'kode' => 'JPTM',
        //         'nama' => 'Jurusan Pendidikan Teknik Mesin'
        //     ],
        //     [
        //         'kode' => 'JPTELEKTRO',
        //         'nama' => 'Jurusan Pendidikan Teknik Elektro'
        //     ],
        //     [
        //         'kode' => 'JPTE',
        //         'nama' => 'Jurusan Pendidikan Teknik Elektronika'
        //     ],
        //     [
        //         'kode' => 'JPKK',
        //         'nama' => 'Jurusan Pendidikan Kesejahteraan Keluarga'
        //     ],
        //     [
        //         'kode' => 'JPTO',
        //         'nama' => 'Jurusan Pendidikan Teknik Otomotif'
        //     ],
        //     [
        //         'kode' => 'JTIK',
        //         'nama' => 'Jurusan Teknik Informatika dan Komputer'
        //     ],
        //     [
        //         'kode' => 'JPTP',
        //         'nama' => 'Jurusan Pendidikan Teknologi Pertanian'
        //     ],
        // ];

        // foreach($jurusan as $item){
        //     \App\Models\Jurusan::create($item);
        // }

        // $prodi = [
        //     //JPTSP
        //     [
        //         'kode' => 'PTB',
        //         'jurusan' => 'JPTSP',
        //         'nama' => 'Pendidikan Teknik Bangunan'
        //     ],
        //     [
        //         'kode' => 'TSBG',
        //         'jurusan' => 'JPTSP',
        //         'nama' => 'Teknik Sipil Bangunan Gedung'
        //     ],
        //     [
        //         'kode' => 'ARSITEKTUR',
        //         'jurusan' => 'JPTSP',
        //         'nama' => 'Arsitektur'
        //     ],

        //     //JPTM
        //     [
        //         'kode' => 'PTM',
        //         'jurusan' => 'JPTM',
        //         'nama' => 'Pendidikan Teknik Mesin'
        //     ],
        //     [
        //         'kode' => 'TMST',
        //         'jurusan' => 'JPTM',
        //         'nama' => 'Teknik Mesin Sarjana Terapan'
        //     ],

        //     //JPELEKTRO
        //     [
        //         'kode' => 'PTELEKTRO',
        //         'jurusan' => 'JPTELEKTRO',
        //         'nama' => 'Pendidikan Teknik Elektro'
        //     ],
        //     [
        //         'kode' => 'STTE',
        //         'jurusan' => 'JPTELEKTRO',
        //         'nama' => 'Sarjana Terapan Teknik Elektro'
        //     ],
        //     [
        //         'kode' => 'RE',
        //         'jurusan' => 'JPTELEKTRO',
        //         'nama' => 'Rekayasa Elektro'
        //     ],

        //     //JPTE
        //     [
        //         'kode' => 'PTE',
        //         'jurusan' => 'JPTE',
        //         'nama' => 'Pendidikan Teknik Elektronika'
        //     ],
        //     [
        //         'kode' => 'PVM',
        //         'jurusan' => 'JPTE',
        //         'nama' => 'Pendidikan Vokasional Mekatronika'
        //     ],
        //     [
        //         'kode' => 'TED3',
        //         'jurusan' => 'JPTE',
        //         'nama' => 'Teknik Elektronika (D3)'
        //     ],
        //     [
        //         'kode' => 'TED4',
        //         'jurusan' => 'JPTE',
        //         'nama' => 'Teknik Elektronika (D4)'
        //     ],

        //     //JPKK
        //     [
        //         'kode' => 'PKK',
        //         'jurusan' => 'JPKK',
        //         'nama' => 'Pendidikan Kesejahteraan Keluarga'
        //     ],

        //     //JPTO
        //     [
        //         'kode' => 'PTO',
        //         'jurusan' => 'JPTO',
        //         'nama' => 'Pendidikan Teknik Otomotif'
        //     ],
        //     [
        //         'kode' => 'MO',
        //         'jurusan' => 'JPTO',
        //         'nama' => 'Mesin Otomotif'
        //     ],

        //     //JTIK
        //     [
        //         'kode' => 'PTIK',
        //         'jurusan' => 'JTIK',
        //         'nama' => 'Pendidikan Teknik Informatika dan Komputer'
        //     ],
        //     [
        //         'kode' => 'TI',
        //         'jurusan' => 'JTIK',
        //         'nama' => 'Teknik Informatika'
        //     ],

        //     //JPTP
        //     [
        //         'kode' => 'PTP',
        //         'jurusan' => 'JPTP',
        //         'nama' => 'Pendidikan Teknologi Pertanian'
        //     ],
        // ];

        // foreach($prodi as $item){
        //     \App\Models\Prodi::create($item);
        // }

        // $periode = [
        //     [
        //         'kode' => 'P2018',
        //         'nama' => '2018'
        //     ],
        //     [
        //         'kode' => 'P2019',
        //         'nama' => '2019'
        //     ],
        //     [
        //         'kode' => 'P2020',
        //         'nama' => '2020'
        //     ],
        //     [
        //         'kode' => 'P2021',
        //         'nama' => '2021',
        //     ],
        // ];

        // foreach($periode as $item){
        //     \App\Models\Periode::create($item);
        // }

        $admin = [
            [
                'nama' => 'Admin',
                'nim' => 'admin',
                'username' => 'admin',
                'password' => Hash::make('admin'),
                'role' => 'admin',
            ],
        ];

        foreach ($admin as $item) {
            \App\Models\User::create($item);
        }
    }
}
