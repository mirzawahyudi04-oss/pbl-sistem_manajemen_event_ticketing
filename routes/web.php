<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
| KATEGORI TIKET (INI YANG DIPERBAIKI 🔥)
|--------------------------------------------------------------------------
*/
Route::get('/kategori-tiket', function () {
    if (!session()->has('user')) {
        return redirect()->route('login');
    }
    return view('kategori_tiket');
})->name('kategori'); // ✅ penting!


/*
|--------------------------------------------------------------------------
| HALAMAN LAIN
|--------------------------------------------------------------------------
*/
Route::get('/transaksi', function () {
    if (!session()->has('user')) {
        return redirect()->route('login');
    }
    return view('transaksi');
})->name('transaksi');

Route::get('/detail-event', function () {
    if (!session()->has('user')) {
        return redirect()->route('login');
    }
    return view('detail_event');
})->name('detail.event');


/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/
Route::get('/logout', function () {
    session()->forget('user');
    return redirect()->route('login');
})->name('logout');

Route::get('/manajemen-event', function () {
    if (!session()->has('user')) {
        return redirect('/login');
    }
    return view('manajemen_event'); // pastikan file ada
})->name('manajemen');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/manajemen-event', function () {
    return view('manajemen_event');
})->name('manajemen');

Route::get('/kategori-tiket', function () {
    return view('kategori_tiket');
})->name('kategori');

Route::get('/transaksi', function () {
    return view('transaksi');
})->name('transaksi');

Route::get('/logout', function () {
    session()->forget('user');
    return redirect('/login');
})->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/manajemen-event', function () {
    return view('manajemen_event');
})->name('manajemen');

Route::get('/transaksi', function () {
    return view('transaksi');
})->name('transaksi');

Route::get('/kategori-tiket', function () {
    return view('kategori_tiket');
})->name('kategori');

Route::get('/logout', function () {
    session()->forget('user');
    return redirect('/login');
})->name('logout');

Route::get('/tambah-kategori', function () {
    return "Halaman tambah kategori tiket";
})->name('tambah.kategori');