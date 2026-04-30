<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SimplePasswordResetController;

/*
|--------------------------------------------------------------------------
| LANDING PAGE
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('home');
})->name('home');

/*
|--------------------------------------------------------------------------
| LOGIN & REGISTER
|--------------------------------------------------------------------------
*/
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [AuthController::class, 'register']);

/*
|--------------------------------------------------------------------------
| DASHBOARD USER
|--------------------------------------------------------------------------
*/
Route::get('/dashboard-user', function () {
    if (!session()->has('user')) {
        return redirect()->route('login');
    }
    return view('dashboard_user');
})->name('dashboard_user');

/*
|--------------------------------------------------------------------------
| EVENTS
|--------------------------------------------------------------------------
*/
Route::get('/events', function () {
    if (!session()->has('user')) {
        return redirect()->route('login');
    }
    return view('events');
})->name('events');

/*
|--------------------------------------------------------------------------
| DASHBOARD ADMIN
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    if (!session()->has('user')) {
        return redirect()->route('login');
    }
    return view('dashboard');
})->name('dashboard');

/*
|--------------------------------------------------------------------------
| KATEGORI TIKET
|--------------------------------------------------------------------------
*/
Route::get('/kategori-tiket', function () {
    if (!session()->has('user')) {
        return redirect()->route('login');
    }
    return view('kategori_tiket');
})->name('kategori');

/*
|--------------------------------------------------------------------------
| HALAMAN LAIN
|--------------------------------------------------------------------------
*/
Route::get('/detail-event', function () {
    if (!session()->has('user')) {
        return redirect()->route('login');
    }
    return view('detail_event');
})->name('detail.event');

Route::get('/manajemen-event', function () {
    if (!session()->has('user')) {
        return redirect('/login');
    }
    return view('manajemen_event');
})->name('manajemen');

Route::get('/transaksi', function () {
    return view('transaksi');
})->name('transaksi');

Route::get('/tambah-kategori', function () {
    return "Halaman tambah kategori tiket";
})->name('tambah.kategori');

/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/
Route::get('/logout', function () {
    session()->forget('user');
    return redirect()->route('login');
})->name('logout');

/*
|--------------------------------------------------------------------------
| ADMIN AUTH & DASHBOARD
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', [AuthController::class, 'showLoginAdmin'])->name('admin.login.form');
Route::post('/admin/login', [AuthController::class, 'loginAdmin'])->name('admin.login');

Route::get('/dashboard-admin', function () {
    if (!session()->has('admin')) {
        return redirect('/admin/login');
    }
    return view('dashboard');
})->name('dashboard_admin');

/*
|--------------------------------------------------------------------------
| DETAIL
|--------------------------------------------------------------------------
*/
Route::get('/detail', function () {
    return view('detail');
});

/*
|--------------------------------------------------------------------------
| RESET PASSWORD
|--------------------------------------------------------------------------
*/
Route::get('/forgot-password', [SimplePasswordResetController::class, 'showForm'])->name('password.request');
Route::post('/forgot-password', [SimplePasswordResetController::class, 'checkEmail'])->name('password.check-email');
Route::get('/reset-password', [SimplePasswordResetController::class, 'showResetForm'])->name('password.reset-form');
Route::post('/reset-password', [SimplePasswordResetController::class, 'updatePassword'])->name('password.update-simple');

Route::get('/user/riwayat', function () {
    if (!session()->has('user')) {
        return redirect()->route('login');
    }
    return view('riwayat_user');
})->name('user.riwayat');

Route::get('/user/profile', function () {
    if (!session()->has('user')) {
        return redirect()->route('login');
    }
    return view('profile_user');
})->name('user.profile');