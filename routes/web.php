<?php

use App\Livewire\Me;
use App\Livewire\Home;
use App\Livewire\Carts;
use App\Livewire\Orders;
use App\Livewire\Products;
use App\Livewire\Merchants;
use App\Livewire\Auth\Login;
use App\Livewire\OrderStatus;
use App\Livewire\OrderHistory;
use App\Livewire\Auth\Register;
use App\Livewire\Notifications;
use App\Livewire\Auth\EmailSent;
use App\Livewire\ChangePassword;
use App\Livewire\OrderVerification;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\Auth\ForgetPassword;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

Route::group(['middleware' => ['guest']], function () {
    Route::get('/auth/login', Login::class)->name('login');
    Route::get('/auth/register', Register::class)->name('register');
    Route::get('/auth/forget-password', ForgetPassword::class)->name('forget-password');
    Route::get('/auth/email-sent/{email}', EmailSent::class)->name('email-sent');
    Route::get('/auth/reset-password/{token}', ResetPassword::class)->name('reset-password');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', Home::class)->name('home');
    Route::get('/notifications', Notifications::class)->name('notifications');
    Route::get('/merchants', Merchants::class)->name('merchants');
    Route::get('/merchants/{slug}', Products::class)->name('products');
    Route::get('/merchants/{slug}/carts', Carts::class)->name('carts');
    Route::get('/order-verification', OrderVerification::class)->name('order-verification');
    Route::get('/orders', Orders::class)->name('orders');
    Route::get('/order-history', OrderHistory::class)->name('order-history');
    Route::get('/orders/{order_number}', OrderStatus::class)->name('order-status');
    Route::get('/me', Me::class)->name('me');
    Route::get('/change-password', ChangePassword::class)->name('change-password');
});

Route::post('/xendit/callback', [PaymentController::class, 'handleXenditCallback']);
