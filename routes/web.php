<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SimplePasswordResetController;

Route::get('/', fn() => view('pages.home'))->name('home');

Route::get('/login', [AuthController::class, 'showLoginUser'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', fn() => view('register'))->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/forgot-password', [SimplePasswordResetController::class, 'showForm'])->name('password.request');
Route::post('/forgot-password', [SimplePasswordResetController::class, 'checkEmail'])->name('password.check-email');
Route::get('/reset-password', [SimplePasswordResetController::class, 'showResetForm'])->name('password.reset-form');
Route::post('/reset-password', [SimplePasswordResetController::class, 'updatePassword'])->name('password.update-simple');

Route::get('/admin/login', [AuthController::class, 'showLoginAdmin'])->name('admin.login.form');
Route::post('/admin/login', [AuthController::class, 'loginAdmin'])->name('admin.login');
Route::get('/dashboard-admin', function () {
    if (!session()->has('admin')) return redirect()->route('admin.login.form');
    return view('pages.dashboard');
})->name('dashboard_admin');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard-user', fn() => view('pages.dashboard_user'))->name('dashboard_user');
    Route::get('/dashboard-organizer', fn() => view('pages.dashboard_organizer'))->name('dashboard_organizer');
    Route::get('/user/riwayat', fn() => view('pages.riwayat_user'))->name('user.riwayat');
    Route::get('/user/profile', fn() => view('pages.profile_user'))->name('user.profile');
    Route::get('/user/tiket', fn() => view('pages.tiket_user'))->name('user.tiket');
    Route::get('/events', fn() => view('pages.events'))->name('events');
    Route::get('/transaksi', fn() => view('pages.transaksi'))->name('transaksi');
    Route::get('/peserta', fn() => view('pages.dashboard_user'))->name('peserta');
    Route::get('/laporan', fn() => view('pages.dashboard'))->name('laporan');
    Route::get('/profile-organizer', fn() => view('pages.profile_user'))->name('profile.organizer');
    Route::get('/tiket', fn() => view('pages.kategori_tiket'))->name('tiket');
    Route::get('/manajemen-event', fn() => view('pages.kelola_event'))->name('manajemen');
});