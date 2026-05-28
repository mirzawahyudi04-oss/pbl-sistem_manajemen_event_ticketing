@extends('layouts.app')
@section('title', 'Dashboard User')

@section('sidebar')
    <a href="{{ route('dashboard_user') }}"
       class="block px-4 py-2.5 rounded-lg text-sm transition
              {{ request()->routeIs('dashboard_user') ? 'bg-indigo-600 text-white font-medium' : 'text-slate-300 hover:bg-slate-700 hover:text-white' }}">
        Dashboard
    </a>
    <a href="{{ route('user.tiket') }}"
       class="block px-4 py-2.5 rounded-lg text-sm transition
              {{ request()->routeIs('user.tiket') ? 'bg-indigo-600 text-white font-medium' : 'text-slate-300 hover:bg-slate-700 hover:text-white' }}">
        Tiket Saya
    </a>
    <a href="{{ route('events.index') }}"
       class="block px-4 py-2.5 rounded-lg text-sm transition
              {{ request()->routeIs('events.index') ? 'bg-indigo-600 text-white font-medium' : 'text-slate-300 hover:bg-slate-700 hover:text-white' }}">
        Event
    </a>
    <a href="{{ route('user.riwayat') }}"
       class="block px-4 py-2.5 rounded-lg text-sm transition
              {{ request()->routeIs('user.riwayat') ? 'bg-indigo-600 text-white font-medium' : 'text-slate-300 hover:bg-slate-700 hover:text-white' }}">
        Riwayat
    </a>
    <a href="{{ route('user.profile') }}"
       class="block px-4 py-2.5 rounded-lg text-sm transition
              {{ request()->routeIs('user.profile') ? 'bg-indigo-600 text-white font-medium' : 'text-slate-300 hover:bg-slate-700 hover:text-white' }}">
        Profil
    </a>
@endsection

@section('content')

    {{-- GREETING --}}
    <div class="mb-6">
        <h1 class="text-2xl font-semibold">Halo, {{ auth()->user()->name }}</h1>
        <p class="text-sm text-slate-500 mt-1">Selamat datang di STEVENtix</p>
    </div>

    {{-- STAT CARDS --}}
    <div class="grid grid-cols-3 gap-4 mb-6">
        <div class="bg-white rounded-xl p-5 border border-slate-100">
            <p class="text-xs text-slate-500 mb-1">Tiket</p>
            <p class="text-3xl font-semibold">2</p>
        </div>
        <div class="bg-white rounded-xl p-5 border border-slate-100">
            <p class="text-xs text-slate-500 mb-1">Riwayat</p>
            <p class="text-3xl font-semibold">9</p>
        </div>
        <div class="bg-white rounded-xl p-5 border border-slate-100">
            <p class="text-xs text-slate-500 mb-1">Pending</p>
            <p class="text-3xl font-semibold text-amber-600">1</p>
        </div>
    </div>

    {{-- TIKET TERBARU --}}
    <div class="bg-white rounded-xl border border-slate-100 p-5 mb-4">
        <div class="flex justify-between items-center mb-4 pb-3 border-b border-slate-100">
            <p class="text-xs uppercase tracking-wide text-slate-400">Tiket Terbaru</p>
            <a href="{{ route('user.tiket') }}" class="text-xs text-indigo-600 hover:underline">Lihat semua →</a>
        </div>

        <div class="flex justify-between items-center py-3 border-b border-slate-50">
            <div>
                <p class="font-medium text-sm">Java Jazz Festival</p>
                <p class="text-xs text-slate-400">25 Mei 2026</p>
            </div>
            <div class="flex items-center gap-2">
                <span class="text-xs bg-green-100 text-green-700 px-3 py-1 rounded-full">Lunas</span>
                <a href="#" class="text-xs bg-indigo-600 text-white px-3 py-1 rounded-full hover:bg-indigo-700 transition">E-Tiket</a>
            </div>
        </div>

        <div class="flex justify-between items-center py-3">
            <div>
                <p class="font-medium text-sm">Fun Run Batam</p>
                <p class="text-xs text-slate-400">30 Mei 2026</p>
            </div>
            <div class="flex items-center gap-2">
                <span class="text-xs bg-green-100 text-green-700 px-3 py-1 rounded-full">Lunas</span>
                <a href="#" class="text-xs bg-indigo-600 text-white px-3 py-1 rounded-full hover:bg-indigo-700 transition">E-Tiket</a>
            </div>
        </div>
    </div>

    {{-- TRANSAKSI PENDING --}}
    <div class="bg-white rounded-xl border border-slate-100 p-5">
        <div class="pb-3 mb-4 border-b border-slate-100">
            <p class="text-xs uppercase tracking-wide text-slate-400">Transaksi Pending</p>
        </div>

        <div class="flex justify-between items-center py-2">
            <div>
                <p class="font-medium text-sm">Konser Indie Night</p>
                <p class="text-xs text-slate-400">12 Jun 2026 · Menunggu pembayaran</p>
            </div>
            <span class="text-xs bg-amber-100 text-amber-700 px-3 py-1 rounded-full">Pending</span>
        </div>
    </div>

@endsection