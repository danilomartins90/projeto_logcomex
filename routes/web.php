<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return redirect()->route('index');
});

Route::get('pokemon', [HomeController::class, "index"])->name('index');
Route::get('pokemon/{id}', [HomeController::class, "searchPokemon"])->name('searchPokemon');
