<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SimplePasswordResetController;

/*
|--------------------------------------------------------------------------
| LANDING PAGE
|--------------------------------------------------------------------------
*/
Route::get('/', fn() => view('pages.home'))->name('home');

/*
|--------------------------------------------------------------------------
| AUTH - LOGIN & REGISTER
|--------------------------------------------------------------------------
*/
Route::get('/login', fn() => view('pages.login'))->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', fn() => view('auth.register'))->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/logout', function () {
    session()->forget('user');
    return redirect()->route('login');
})->name('logout');

/*
|--------------------------------------------------------------------------
| RESET PASSWORD
|--------------------------------------------------------------------------
*/
Route::get('/forgot-password', [SimplePasswordResetController::class, 'showForm'])->name('password.request');
Route::post('/forgot-password', [SimplePasswordResetController::class, 'checkEmail'])->name('password.check-email');
Route::get('/reset-password', [SimplePasswordResetController::class, 'showResetForm'])->name('password.reset-form');
Route::post('/reset-password', [SimplePasswordResetController::class, 'updatePassword'])->name('password.update-simple');

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', [AuthController::class, 'showLoginAdmin'])->name('admin.login.form');
Route::post('/admin/login', [AuthController::class, 'loginAdmin'])->name('admin.login');

Route::get('/dashboard-admin', function () {
    if (!session()->has('admin')) {
        return redirect()->route('admin.login.form');
    }
    return view('pages.dashboard');
})->name('dashboard_admin');

/*
|--------------------------------------------------------------------------
| USER (Auth Required)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard-user', function () {
    if (!session()->has('user')) return redirect()->route('login');
    return view('pages.dashboard_user');
})->name('dashboard_user');

Route::get('/dashboard', function () {
    if (!session()->has('user')) return redirect()->route('login');
    return view('pages.dashboard');
})->name('dashboard');

Route::get('/events', function () {
    if (!session()->has('user')) return redirect()->route('login');
    return view('pages.events');
})->name('events');

Route::get('/kategori-tiket', function () {
    if (!session()->has('user')) return redirect()->route('login');
    return view('pages.kategori_tiket');
})->name('kategori');

Route::get('/detail-event', function () {
    if (!session()->has('user')) return redirect()->route('login');
    return view('pages.detail_event');
})->name('detail.event');

Route::get('/manajemen-event', function () {
    if (!session()->has('user')) return redirect()->route('login');
    return view('pages.manajemen_event');
})->name('manajemen');

Route::get('/transaksi', function () {
    if (!session()->has('user')) return redirect()->route('login');
    return view('pages.transaksi');
})->name('transaksi');

Route::get('/detail', function () {
    if (!session()->has('user')) return redirect()->route('login');
    return view('pages.detail');
});

Route::get('/tambah-kategori', function () {
    if (!session()->has('user')) return redirect()->route('login');
    return "Halaman tambah kategori tiket";
})->name('tambah.kategori');

/*
|--------------------------------------------------------------------------
| USER PREFIX
|--------------------------------------------------------------------------
*/
Route::get('/user/riwayat', function () {
    if (!session()->has('user')) return redirect()->route('login');
    return view('pages.riwayat_user');
})->name('user.riwayat');

Route::get('/user/profile', function () {
    if (!session()->has('user')) return redirect()->route('login');
    return view('pages.profile_user');
})->name('user.profile');

Route::get('/user/tiket', function () {
    if (!session()->has('user')) return redirect()->route('login');
    return view('pages.tiket_user');
})->name('user.tiket');