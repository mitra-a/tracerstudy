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
        $prodi = [
            [
                'kode' => 'PTIK',
                'nama' => 'Pendidikan Teknik Informatika dan Komputer'
            ],
            [
                'kode' => 'TIK',
                'nama' => 'Teknik Informatika dan Komputer'
            ]
        ];

        foreach($prodi as $item){
            \App\Models\Prodi::create($item);
        }

        $periode = [
            [
                'kode' => 'P2018',
                'nama' => '2018'
            ],
            [
                'kode' => 'P2019',
                'nama' => '2019'
            ],
            [
                'kode' => 'P2020',
                'nama' => '2020'
            ],
            [
                'kode' => 'P2021',
                'nama' => '2021',
            ],
        ];

        foreach($periode as $item){
            \App\Models\Periode::create($item);
        }

        $alumni = [
            [
                'nim' => '200209501019',
                'nama' => 'Mitra',
                'email' => 'mitra@email',
                'password' => Hash::make('mitra'),
                'periode' => 'P2020',
                'prodi' => 'PTIK',
                'role' => 'alumni',
            ],
            [
                'nama' => 'Admin',
                'email' => 'admin@email',
                'password' => Hash::make('admin'),
                'role' => 'admin',
            ],
        ];

        foreach ($alumni as $item) {
            \App\Models\User::create($item);
        }
    }
}
