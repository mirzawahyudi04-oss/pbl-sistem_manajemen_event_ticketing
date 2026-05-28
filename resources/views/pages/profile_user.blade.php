@extends('layouts.app')
@section('title', 'Profil')

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

    <div class="mb-6">
        <h1 class="text-2xl font-semibold">Profil Saya</h1>
        <p class="text-sm text-slate-500 mt-1">Informasi dan pengaturan akun kamu</p>
    </div>

    <div class="max-w-lg space-y-4">

        {{-- AVATAR + NAMA --}}
        <div class="bg-white rounded-xl border border-slate-100 p-6 flex items-center gap-4">
            <div class="w-14 h-14 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-semibold text-xl">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>
            <div>
                <p class="font-semibold text-slate-800">{{ auth()->user()->name }}</p>
                <p class="text-sm text-slate-400">{{ auth()->user()->email }}</p>
                <span class="text-xs bg-indigo-100 text-indigo-700 px-3 py-0.5 rounded-full mt-1 inline-block">
                    {{ auth()->user()->role ?? 'User' }}
                </span>
            </div>
        </div>

        {{-- INFO AKUN --}}
        <div class="bg-white rounded-xl border border-slate-100 p-6">
            <p class="text-xs uppercase tracking-wide text-slate-400 mb-4">Informasi Akun</p>
            <div class="space-y-3">
                <div class="flex justify-between items-center py-2 border-b border-slate-50">
                    <p class="text-sm text-slate-500">Nama</p>
                    <p class="text-sm font-medium text-slate-800">{{ auth()->user()->name }}</p>
                </div>
                <div class="flex justify-between items-center py-2 border-b border-slate-50">
                    <p class="text-sm text-slate-500">Email</p>
                    <p class="text-sm font-medium text-slate-800">{{ auth()->user()->email }}</p>
                </div>
                <div class="flex justify-between items-center py-2">
                    <p class="text-sm text-slate-500">Bergabung sejak</p>
                    <p class="text-sm font-medium text-slate-800">
                        {{ \Carbon\Carbon::parse(auth()->user()->created_at)->format('d M Y') }}
                    </p>
                </div>
            </div>
        </div>

        {{-- EDIT PROFIL --}}
        <div class="bg-white rounded-xl border border-slate-100 p-6">
            <p class="text-xs uppercase tracking-wide text-slate-400 mb-4">Edit Profil</p>

            @if(session('success'))
            <div class="text-xs bg-green-100 text-green-700 px-4 py-2 rounded-lg mb-4">
                {{ session('success') }}
            </div>
            @endif

            <form method="POST" action="#">
                @csrf
                <div class="space-y-3">
                    <div>
                        <label class="text-xs text-slate-500 mb-1 block">Nama Baru</label>
                        <input type="text" name="name"
                               value="{{ auth()->user()->name }}"
                               class="w-full px-4 py-2.5 text-sm rounded-lg border border-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    <div>
                        <label class="text-xs text-slate-500 mb-1 block">Email Baru</label>
                        <input type="email" name="email"
                               value="{{ auth()->user()->email }}"
                               class="w-full px-4 py-2.5 text-sm rounded-lg border border-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    <div>
                        <label class="text-xs text-slate-500 mb-1 block">Password Baru</label>
                        <input type="password" name="password"
                               placeholder="Kosongkan jika tidak diubah"
                               class="w-full px-4 py-2.5 text-sm rounded-lg border border-slate-200 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    <button type="submit"
                            class="w-full bg-indigo-600 text-white text-sm py-2.5 rounded-lg hover:bg-indigo-700 transition mt-2">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

    </div>

@endsection