<?php

use Illuminate\Support\Facades\Route;

Route::namespace('App\Livewire\Pages')->group(function(){
    Route::get('/', Welcome::class);
});
