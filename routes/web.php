<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| HALAMAN AWAL (LANDING)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('home');
})->name('home');


/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);


/*
|--------------------------------------------------------------------------
| REGISTER
|--------------------------------------------------------------------------
*/
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [AuthController::class, 'register']);


/*
|--------------------------------------------------------------------------
| DASHBOARD ADMIN
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('dashboard'); // pastikan file ada
})->name('dashboard');


/*
|--------------------------------------------------------------------------
| DASHBOARD USER
|--------------------------------------------------------------------------
*/
Route::get('/dashboard-user', function () {
    return view('dashboard_user'); // pastikan file ada
})->name('dashboard_user');


/*
|--------------------------------------------------------------------------
| EVENTS
|--------------------------------------------------------------------------
*/
Route::get('/events', function () {
    return view('events'); // pastikan file ada
})->name('events');


/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/
Route::get('/logout', function () {
    session()->flush();
    return redirect('/login');
})->name('logout');

Route::get('/transaksi', function () {
    return view('transaksi');
});

Route::get('/manajemen-event', function () {
    return view('manajemen_event');
});

Route::get('/kategori-tiket', function () {
    return view('kategori_tiket');
});

Route::get('/detail-event', function () {
    return view('detail_event');
})->name('detail.event');