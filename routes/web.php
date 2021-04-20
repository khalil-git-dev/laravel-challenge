<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UniversiteController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\EtudantController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::resource('universites', UniversiteController::class);

Route::resource('classes', ClasseController::class);

Route::resource('etudiants', EtudantController::class);
