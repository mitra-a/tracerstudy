<?php

use Illuminate\Support\Facades\Route;

Route::namespace('App\Livewire\Pages')->group(function(){
    Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
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
    });

    Route::get('/', Welcome::class);
});
