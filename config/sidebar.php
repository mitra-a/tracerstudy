<?php

return [
    //ADMIN
    [
        'title' => 'Dashboard',
        'icon' => 'bx bx-home-circle',
        'route' => 'admin.dashboard',
        'active' => 'admin.dashboard',
        'role' => 'admin'
    ],
    [
        'title-menu' => 'Kuesioner',
        'role' => 'admin'
    ],
    [
        'title' => 'Kuesioner',
        'icon' => 'bx bx-book-open',
        'route' => 'admin.kuesioner.index',
        'active' => 'admin.kuesioner.*',
        'role' => 'admin'
    ],
    [
        'title' => 'Lihat Jawaban',
        'icon' => 'bx bx-book',
        'route' => 'admin.lihat-jawaban.index',
        'active' => 'admin.lihat-jawaban.*',
        'role' => 'admin'
    ],
    [
        'title' => 'Laporan',
        'icon' => 'bx bx-edit',
        'route' => 'admin.laporan.index',
        'active' => 'admin.laporan.*',
        'role' => 'admin'
    ],
    [
        'title-menu' => 'Master Data',
        'role' => 'admin'
    ],
    [
        'title' => 'Mahasiswa',
        'route' => 'admin.mahasiswa.index',
        'icon' => 'bx bx-user-check',
        'active' => 'admin.mahasiswa.*',
        'role' => 'admin',
    ],
    [
        'title' => 'Admin',
        'icon' => 'bx bx-user-voice',
        'route' => 'admin.akun.index',
        'active' => 'admin.akun.*',
        'role' => 'admin'
    ],
    [
        'title' => 'Program Studi',
        'icon' => 'bx bx-copy',
        'route' => 'admin.prodi',
        'active' => 'admin.prodi',
        'role' => 'admin'
    ],
    // [
    //     'title' => 'Periode Wisuda',
    //     'icon' => 'bx bx-archive',
    //     'route' => 'admin.periode',
    //     'active' => 'admin.periode',
    //     'role' => 'admin'
    // ],
    [
        'title-menu' => 'Profile',
        'role' => 'admin'
    ],
    [
        'title' => 'Profile',
        'icon' => 'bx bx-user',
        'route' => 'admin.profile',
        'active' => 'admin.profile*',
        'role' => 'admin'
    ],
    [
        'title' => 'Log Out',
        'icon' => 'bx bx-exit',
        'route' => 'logout',
        'active' => 'admin.admin.*',
        'role' => 'admin'
    ],

    //ALUMNI
    [
        'title' => 'Dashboard',
        'icon' => 'bx bx-home-circle',
        'route' => 'pengguna.dashboard',
        'active' => ['pengguna.dashboard*'],
        'role' => 'pengguna'
    ],
    [
        'title' => 'Hasil Survey',
        'icon' => 'bx bx-pie-chart-alt-2',
        'route' => 'pengguna.hasil-survey.index',
        'active' => ['pengguna.hasil-survey.*'],
        'role' => 'pengguna'
    ],
    [
        'title-menu' => 'Profile',
        'role' => 'pengguna'
    ],
    [
        'title' => 'Profile',
        'icon' => 'bx bx-user',
        'route' => 'pengguna.profile',
        'active' => 'pengguna.profile*',
        'role' => 'pengguna'
    ],
    [
        'title' => 'Log Out',
        'icon' => 'bx bx-exit',
        'route' => 'logout',
        'active' => 'pengguna.admin.*',
        'role' => 'pengguna'
    ],
];