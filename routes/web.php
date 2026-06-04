<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SimplePasswordResetController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PesertaController;

Route::get('/', fn() => view('pages.home'))->name('home');

// Auth
Route::get('/login', [AuthController::class, 'showLoginUser'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', fn() => view('auth.register'))->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Password Reset
Route::get('/forgot-password', [SimplePasswordResetController::class, 'showForm'])->name('password.request');
Route::post('/forgot-password', [SimplePasswordResetController::class, 'checkEmail'])->name('password.check-email');
Route::get('/reset-password', [SimplePasswordResetController::class, 'showResetForm'])->name('password.reset-form');
Route::post('/reset-password', [SimplePasswordResetController::class, 'updatePassword'])->name('password.update-simple');

// Admin
Route::get('/admin/login', [AuthController::class, 'showLoginAdmin'])->name('admin.login.form');
Route::post('/admin/login', [AuthController::class, 'loginAdmin'])->name('admin.login');
Route::get('/dashboard-admin', function () {
    if (!session()->has('admin')) {
        return redirect()->route('admin.login.form');
    }

    return view('pages.dashboard_admin');
})->name('dashboard_admin');
Route::get('/admin/manajemen', function () {
    return view('pages.manajemen.admin');
})->name('admin.manajemen');
Route::get('/admin/organizer', function () {
    return view('pages.organizer_admin');
})->name('admin.organizer');
// Admin Pages
Route::get('/admin/manajemen', function () {
    return view('pages.manajemen_admin');
})->name('admin.manajemen');

Route::get('/admin/organizer', function () {
    return view('pages.organizer_admin');
})->name('admin.organizer');

Route::get('/admin/peserta', function () {
    return view('pages.peserta_admin');
})->name('admin.peserta');

Route::get('/admin/tiket', function () {
    return view('pages.tiket_admin');
})->name('admin.tiket');

Route::get('/admin/laporan', function () {
    return view('pages.laporan_admin');
})->name('admin.laporan');


// Protected Routes (perlu login)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard-user', fn() => view('pages.dashboard_user'))->name('dashboard_user');
    Route::get('/dashboard-organizer',
    [EventController::class, 'dashboardOrganizer'])->name('dashboard_organizer');
    Route::get('/user/riwayat', fn() => view('pages.riwayat_user'))->name('user.riwayat');
    Route::get('/user/profile', fn() => view('pages.profile_user'))->name('user.profile');
    Route::get('/user/tiket', fn() => view('pages.tiket_user'))->name('user.tiket');
    Route::get('/transaksi', fn() => view('pages.transaksi'))->name('transaksi');
    Route::get('/peserta', fn() => view('pages.dashboard_user'))->name('peserta');
    Route::get('/laporan', fn() => view('pages.dashboard'))->name('laporan');
    Route::get('/profile-organizer', fn() => view('pages.profile_user'))->name('profile.organizer');
    Route::get('/tiket', fn() => view('pages.kategori_tiket'))->name('tiket');

    // Event CRUD
    Route::get('/manajemen-event', [EventController::class, 'kelolaEvent'])->name('manajemen');
    Route::resource('events', EventController::class);

    //pesserta
    Route::get('/peserta', [PesertaController::class, 'show'])->name('peserta.index');
    Route::post('/peserta', [PesertaController::class, 'simpan'])->name('peserta.simpan');
    //admin
    
});

Route::get('/app', fn() => view('app'));


