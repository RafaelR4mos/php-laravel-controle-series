<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\SeasonsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/series');
});

//Route::resource('/series', SeriesController::class); - Para utilizar as convenções de nome de rotas do Laravel.

Route::controller(SeriesController::class)->group(function () {
    Route::get('series', 'index')->name('series.index');
    Route::get('series/create', 'create')->name('series.create');
    Route::get('series/{series}/edit', 'edit')->name('series.edit');
    Route::post('series/create', 'store')->name('series.store');
    Route::delete('series/destroy/{series}', 'destroy')->name('series.destroy');
    Route::put('series/{series}', 'update')->name('series.update');
});

Route::controller(SeasonsController::class)->group(function () {
    Route::get('series/{series}/seasons', 'index')->name('seasons.index');
});



