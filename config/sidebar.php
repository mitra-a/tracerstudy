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
        'title' => 'Alumni',
        'route' => '',
        'icon' => 'bx bx-user-check',
        'active' => 'admin.alumni.*',
        'role' => 'admin',
        'child' => [
            [
                'title' => 'Data Alumni',
                'route' => 'admin.alumni.index',
                'active' => ['admin.alumni.index', 'admin.alumni.create', 'admin.alumni.update'],
            ],
            [
                'title' => 'Validasi Akun',
                'route' => 'admin.alumni.validasi',
                'active' => 'admin.alumni.validasi',
            ],
            [
                'title' => 'Hapus Akun',
                'route' => '',
                'active' => 'admin.alumni.hapus',
            ],
        ]
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
        'route' => 'alumni.dashboard',
        'active' => 'alumni.dashboard',
        'role' => 'alumni'
    ],
    [
        'title-menu' => 'Profile',
        'role' => 'alumni'
    ],
    [
        'title' => 'Profile',
        'icon' => 'bx bx-user',
        'route' => 'alumni.profile',
        'active' => 'alumni.profile*',
        'role' => 'alumni'
    ],
    [
        'title' => 'Log Out',
        'icon' => 'bx bx-exit',
        'route' => 'logout',
        'active' => 'alumni.admin.*',
        'role' => 'alumni'
    ],
];