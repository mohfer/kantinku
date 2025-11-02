<?php

use App\Livewire\Me;
use App\Livewire\Home;
use App\Livewire\Warung;
use App\Livewire\Pesanan;
use App\Livewire\Verifikasi;
use App\Livewire\StatusPemesanan;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\ChangePassword;
use Illuminate\Support\Facades\Route;

Route::get('/auth/login', Login::class)->name('login');
Route::get('/auth/register', Register::class)->name('register');

Route::get('/', Home::class)->name('home');
Route::get('/warung', Warung::class)->name('warung');
Route::get('/pesanan', Pesanan::class)->name('pesanan');
Route::get('/me', Me::class)->name('me');
Route::get('/verifikasi', Verifikasi::class)->name('verifikasi');
Route::get('/status-pemesanan', StatusPemesanan::class)->name('status-pemesanan');

Route::get('/change-password', ChangePassword::class)->name('change-password');
