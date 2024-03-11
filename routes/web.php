<?php

use Illuminate\Support\Facades\Route;

Route::namespace('App\Livewire\Pages')->group(function(){
    Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
        Route::get('/prodi', Prodi::class)->name('prodi');
        Route::get('/periode', Periode::class)->name('periode');
    });

    Route::get('/', Welcome::class);
});
