<?php

use App\Livewire\Me;
use App\Livewire\Home;
use App\Livewire\Warung;
use App\Livewire\Pesanan;
use App\Livewire\Auth\Login;
use App\Livewire\Verifikasi;
use App\Livewire\MenuMakanan;
use App\Livewire\Auth\Register;
use App\Livewire\DetailProduct;
use App\Livewire\Auth\EmailSent;
use App\Livewire\ChangePassword;
use App\Livewire\RiwayatPesanan;
use App\Livewire\StatusPemesanan;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\Auth\ForgetPassword;
use App\Livewire\Notifikasi;
use Illuminate\Support\Facades\Route;

Route::get('/auth/login', Login::class)->name('login');
Route::get('/auth/register', Register::class)->name('register');
Route::get('/auth/forget-password', ForgetPassword::class)->name('forget-password');
Route::get('/auth/email-sent', EmailSent::class)->name('email-sent');
Route::get('/auth/reset-password', ResetPassword::class)->name('reset-password');

Route::get('/', Home::class)->name('home');
Route::get('/warung', Warung::class)->name('warung');
Route::get('/pesanan', Pesanan::class)->name('pesanan');
Route::get('/riwayat-pesanan', RiwayatPesanan::class)->name('riwayat-pesanan');
Route::get('/me', Me::class)->name('me');
Route::get('/verifikasi', Verifikasi::class)->name('verifikasi');
Route::get('/status-pemesanan', StatusPemesanan::class)->name('status-pemesanan');
Route::get('/menu-makanan', MenuMakanan::class)->name('menu-makanan');
Route::get('/detail-product', DetailProduct::class)->name('detail-product');
Route::get('/notifikasi', Notifikasi::class)->name('notifikasi');

Route::get('/change-password', ChangePassword::class)->name('change-password');
