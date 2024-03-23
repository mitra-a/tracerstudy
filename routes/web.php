<?php

use Illuminate\Support\Facades\Route;

Route::get('/logout', function(){
    Auth()->logout();
    return redirect()->route('login');
})->name('logout');

Route::namespace('App\Livewire\Pages')->group(function(){
    Route::get('/login', Login::class)->name('login');

    Route::namespace('Admin')->middleware(['auth','role:admin'])->prefix('admin')->name('admin.')->group(function(){
        Route::get('/', Dashboard::class)->name('dashboard');
        Route::get('/prodi', Prodi::class)->name('prodi');
        Route::get('/periode', Periode::class)->name('periode');

        Route::namespace('Alumni')->prefix('alumni')->name('alumni.')->group(function(){
            Route::get('/', Index::class)->name('index');
            Route::get('/tambah', Create::class)->name('create');
            Route::get('/edit/{id}', Update::class)->name('update');
        });

        Route::namespace('Akun')->prefix('akun')->name('akun.')->group(function(){
            Route::get('/', Index::class)->name('index');
            Route::get('/tambah', Create::class)->name('create');
            Route::get('/edit/{id}', Update::class)->name('update');
        });

        Route::namespace('Kuesioner')->prefix('kuesioner')->name('kuesioner.')->group(function(){
            Route::get('/', Index::class)->name('index');
            Route::get('/tambah', Create::class)->name('create');
            Route::get('/edit/{id}', Update::class)->name('update');
            Route::get('/halaman/{id}', Halaman::class)->name('halaman');
            Route::get('/soal/{id}/{halaman}', Soal::class)->name('soal');
        });

        Route::namespace('LihatJawaban')->prefix('lihat-jawaban')->name('lihat-jawaban.')->group(function(){
            Route::get('/', Index::class)->name('index');
            Route::get('/detail/{id}', Detail::class)->name('detail');
            Route::get('/jawaban/{id}/{user}', Jawaban::class)->name('jawaban');
        });

        Route::namespace('Laporan')->prefix('laporan')->name('laporan.')->group(function(){
            Route::get('/', Index::class)->name('index');
            Route::get('/detail/{id}', Detail::class)->name('detail');
        });
    });

    Route::namespace('Alumni')->middleware(['auth','role:alumni'])->prefix('alumni')->name('alumni.')->group(function(){
        Route::get('/', Dashboard::class)->name('dashboard');
        Route::get('/jawab-kuesioner/{id}', JawabKuesioner::class)->name('dashboard.jawab-kuesioner');
        Route::get('/lihat-jawaban-kuesioner/{id}', LihatJawabanKuesioner::class)->name('dashboard.lihat-jawaban-kuesioner');
    });

    Route::get('/', Welcome::class);
});
