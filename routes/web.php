<?php

use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
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
})->middleware(\App\Http\Middleware\Authenticator::class);

//Route::resource('/series', SeriesController::class); - Para utilizar as convenções de nome de rotas do Laravel.

Route::controller(SeriesController::class)->group(function () {
    Route::get('series', 'index')->name('series.index');
    Route::get('series/create', 'create')->name('series.create');
    Route::get('series/{series}/edit', 'edit')->name('series.edit');
    Route::post('series/create', 'store')->name('series.store');
    Route::delete('series/destroy/{series}', 'destroy')->name('series.destroy');
    Route::put('series/{series}', 'update')->name('series.update');
});

Route::middleware('authenticator')->group(function () {
    Route::controller(SeasonsController::class)->group(function () {
        Route::get('series/{series}/seasons', 'index')->name('seasons.index');
    });

    Route::controller(EpisodesController::class)->group(function () {
        Route::get('seasons/{season}/episodes', 'index')->name('episodes.index');
        Route::post('seasons/{season}/episodes', 'update')->name('episodes.update');
    });
});


Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'index')->name('login');
    Route::post('login', 'store')->name('signin');
    Route::get('logout', 'destroy')->name('logout');
});

Route::controller(UsersController::class)->group(function () {
    Route::get('register', [UsersController::class, 'create'])->name('users.create');
    Route::post('register', [UsersController::class, 'store'])->name('users.store');
});




