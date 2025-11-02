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

Route::get('/auth/login', Login::class);
Route::get('/auth/register', Register::class);

Route::get('/', Home::class);
Route::get('/warung', Warung::class);
Route::get('/pesanan', Pesanan::class);
Route::get('/me', Me::class);
Route::get('/verifikasi', Verifikasi::class);
Route::get('/status-pemesanan', StatusPemesanan::class);

Route::get('/change-password', ChangePassword::class);
