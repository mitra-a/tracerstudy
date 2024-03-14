<?php

return [
    //ADMIN
    [
        'title' => 'Dashboard',
        'icon' => 'bx bx-home-circle',
        'route' => '',
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
        'route' => '',
        'active' => 'admin.ket-jurnal.*',
        'role' => 'admin'
    ],
    [
        'title' => 'Laporan',
        'icon' => 'bx bx-edit',
        'route' => '',
        'active' => 'admin.izin-penelitian.*',
        'role' => 'admin'
    ],
    [
        'title-menu' => 'Master Data',
        'role' => 'admin'
    ],
    [
        'title' => 'Alumni',
        'icon' => 'bx bx-user-check',
        'route' => 'admin.alumni.index',
        'active' => 'admin.alumni.*',
        'role' => 'admin'
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
    [
        'title' => 'Periode Wisuda',
        'icon' => 'bx bx-archive',
        'route' => 'admin.periode',
        'active' => 'admin.periode',
        'role' => 'admin'
    ],
    [
        'title-menu' => 'Profile',
        'role' => 'admin'
    ],
    [
        'title' => 'Profile',
        'icon' => 'bx bx-user',
        'route' => '',
        'active' => 'admin.mahasiswa.*',
        'role' => 'admin'
    ],
    [
        'title' => 'Log Out',
        'icon' => 'bx bx-exit',
        'route' => '',
        'active' => 'admin.admin.*',
        'role' => 'admin'
    ],
];