<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);



Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/login');
})->name('logout');



Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [PengaduanController::class, 'index']);
    Route::post('/kirim', [PengaduanController::class, 'store']);

});



Route::middleware(['auth','admin'])->group(function () {

    Route::get('/admin', [AdminController::class, 'index']);

   
    Route::post('/proses/{id}', [AdminController::class, 'proses']);


    Route::get('/selesai/{id}', [AdminController::class, 'selesai']);

    
    Route::post('/feedback/{id}', [AdminController::class, 'feedback']);

   
    Route::get('/laporan', [AdminController::class, 'laporan']);
    Route::get('/histori', [AdminController::class, 'histori']);

});