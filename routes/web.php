<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SimplePasswordResetController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\AdminOrganizerController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\OrganizerProfileController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\AdminEventController;


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
Route::get('/admin/manajemen', [AdminEventController::class, 'index'])
    ->name('admin.manajemen');

Route::get('/manajemen-event', 
[AdminEventController::class,'index'])
->name('admin.manajemen');
Route::get('/admin/organizer', [AdminOrganizerController::class, 'index'])
    ->name('admin.organizer');

Route::get('/admin/organizer/{id}/edit', [AdminOrganizerController::class, 'edit'])
    ->name('admin.organizer.edit');

Route::put('/admin/organizer/{id}', [AdminOrganizerController::class, 'update'])
    ->name('admin.organizer.update');

Route::delete('/admin/organizer/{id}', [AdminOrganizerController::class, 'destroy'])
    ->name('admin.organizer.destroy');

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
    Route::get('/user/profile', [UserProfileController::class, 'index'])
        ->name('user.profile');

    Route::put('/user/profile/update', [UserProfileController::class, 'update'])
        ->name('user.profile.update');
    Route::delete('/user/profile/delete', [UserProfileController::class, 'destroy'])
    ->name('user.profile.delete');

    // CRUD Event
    Route::get('/manajemen-event', [EventController::class, 'kelolaEvent'])->name('manajemen');
    Route::post('/events-store', [EventController::class, 'store'])->name('events.store');
    Route::put('/events-update/{id}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events-delete/{id}', [EventController::class, 'destroy'])->name('events.destroy');

    //pesserta
    Route::get('/peserta', [PesertaController::class, 'show'])->name('peserta.index');
    Route::post('/peserta', [PesertaController::class, 'simpan'])->name('peserta.simpan');
   
    //laporan organizer nich gengs
     Route::get('/laporan', [LaporanController::class, 'index'])
        ->name('laporan');
});
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');

Route::get('/app', fn() => view('app'));

Route::get('/events/{event}/buy', [TicketController::class, 'buy'])
    ->name('tickets.buy');

Route::post('/events/{event}/buy', [TicketController::class, 'store'])
    ->name('tickets.store');

    Route::post('/events/{event}/payment',
    [TicketController::class, 'payment'])
    ->name('tickets.payment');
    Route::get('/events/{event}/buy',
    [TicketController::class, 'buy'])
    ->name('tickets.buy');

Route::post('/events/{event}/payment',
    [TicketController::class, 'payment'])
    ->name('tickets.payment');

Route::post('/events/{event}/store',
    [TicketController::class, 'store'])
    ->name('tickets.store');
Route::get('/transactions/create', function () {
    return view('transactions.create');
})->name('transactions.create');
Route::get('/transactions/create', function () {
    return redirect()->route('tickets.buy', 1);
})->name('transactions.create');

//
Route::get('/profile-organizer', [OrganizerProfileController::class, 'index'])
    ->name('profile.organizer');

Route::put('/profile-organizer/update', [OrganizerProfileController::class, 'update'])
    ->name('profile.organizer.update');
    
//admin acc we
Route::put('/admin/event/{id}/approve',
[AdminEventController::class,'approve'])
->name('admin.event.approve');

//admin menolak wkwk
Route::put('/admin/event/{id}/reject',
[AdminEventController::class,'reject'])
->name('admin.event.reject');