<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Get = melihat
// post = mengirim data dlm bentuk form insert/create
// put  = untuk update
// delete = dlm bentuk form menghapus

Route::get('belajar',  [\App\Http\Controllers\BelajarController::class, 'index']);
Route::get('login',  [\App\Http\Controllers\LoginController::class, 'login'])->name('login');
Route::post('login',  [\App\Http\Controllers\LoginController::class, 'loginAction'])->name('login_action');

Route::resource('dashboard', \App\Http\Controllers\DashboardController::class);


// Route::get('belajar', function(){
//     return "<h1>Selamat Datang di Larave</h1>";});

Route::get("call_name", [\App\Http\Controllers\BelajarController::class, 'getCallName']);
Route::get("tambah", [\App\Http\Controllers\BelajarController::class, 'tambah'])->name('tambah');
Route::get("kurang", [\App\Http\Controllers\BelajarController::class, 'kurang'])->name('kurang');
Route::get("bagi", [\App\Http\Controllers\BelajarController::class, 'bagi'])->name('bagi');
Route::get("kali", [\App\Http\Controllers\BelajarController::class, 'kali'])->name('kali');

Route::post('store_tambah', [\App\Http\Controllers\BelajarController::class, 'storeTambah'])->name('store_tambah');
Route::post('store_kurang', [\App\Http\Controllers\BelajarController::class, 'storeKurang'])->name('store_kurang');
Route::post('store_bagi', [\App\Http\Controllers\BelajarController::class, 'storeBagi'])->name('store_bagi');
Route::post('store_kali', [\App\Http\Controllers\BelajarController::class, 'storeKali'])->name('store_kali');
