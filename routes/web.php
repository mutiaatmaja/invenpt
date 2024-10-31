<?php

use App\Livewire\Barang\Index as BarangIndex;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->get('/', function () {
    return view('welcome');
});

Route::redirect('/', '/home');

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'barang', 'middleware' => ['auth', 'role:admin']], function () {
    Route::get('/', BarangIndex::class)->name('barang.index');
});
