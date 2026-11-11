<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/postlogin', [AuthController::class, 'postlogin'])->name('postlogin');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/postregister', [AuthController::class, 'postregister'])->name('postregister');

Route::middleware('auth')->group(function(){
    Route::get('/home', [UserController::class, 'home'])->name('home');
    Route::get('/ditel{room}', [UserController::class, 'ditel'])->name('ditel');
    Route::get('/reservasi{room}', [UserController::class, 'reservasi'])->name('reservasi');
    Route::post('/booking', [UserController::class, 'booking'])->name('booking');
    Route::get('/riwayat', [UserController::class, 'riwayat'])->name('riwayat');

    Route::get('/admin/home', [AdminController::class, 'adminhome'])->name('adminhome');
    Route::get('/admin/room', [AdminController::class, 'room'])->name('rooma');
    Route::get('/tambah', [AdminController::class, 'tambah'])->name('tambah');
    Route::post('/posttambah', [AdminController::class, 'posttambah'])->name('posttambah');
    Route::get('/hapus{room}', [AdminController::class, 'hapus'])->name('hapus');
    Route::get('/edit/{room}', [AdminController::class, 'edit'])->name('edit');
    Route::post('/postedit/{room}', [AdminController::class, 'postedit'])->name('postedit');
    Route::post('/poststatus/{reservation}', [AdminController::class, 'poststatus'])->name('poststatus');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});