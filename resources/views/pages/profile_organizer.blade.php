@extends('layouts.app')

@section('sidebar')
    <a href="{{ route('dashboard_organizer') }}"
       class="block px-4 py-2.5 rounded-lg text-sm text-slate-300 hover:bg-slate-700 hover:text-white">
        Dashboard
    </a>

    <a href="{{ route('manajemen') }}"
       class="block px-4 py-2.5 rounded-lg text-sm text-slate-300 hover:bg-slate-700 hover:text-white">
        Kelola Event
    </a>

    <a href="{{ route('transaksi') }}"
       class="block px-4 py-2.5 rounded-lg text-sm text-slate-300 hover:bg-slate-700 hover:text-white">
        Transaksi
    </a>

    <a href="{{ route('peserta.index') }}"
       class="block px-4 py-2.5 rounded-lg text-sm text-slate-300 hover:bg-slate-700 hover:text-white">
        Peserta
    </a>

    <a href="{{ route('laporan') }}"
       class="block px-4 py-2.5 rounded-lg text-sm text-slate-300 hover:bg-slate-700 hover:text-white">
        Laporan
    </a>
    <a href="{{ route('profile.organizer') }}"
       class="block px-4 py-2.5 rounded-lg text-sm transition bg-indigo-600 text-white font-medium">
       Profil
    </a>
    
    
@endsection

@section('content')

<div class="max-w-3xl mx-auto bg-white rounded-xl shadow p-8">

    <h2 class="text-2xl font-bold mb-6">
        Profil Organizer
    </h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('profile.organizer.update') }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-4">
            <label>Nama Organizer</label>
            <input type="text"
                name="name"
                value="{{ auth()->user()->name }}"
                class="w-full border rounded p-2">
        </div>

        <div class="mb-4">
            <label>Email</label>
            <input type="email"
                name="email"
                value="{{ auth()->user()->email }}"
                class="w-full border rounded p-2">
        </div>

        <div class="mb-4">
            <label>No HP</label>
            <input type="text"
                name="phone"
                value="{{ auth()->user()->phone }}"
                class="w-full border rounded p-2">
        </div>

        <div class="mb-4">
            <label>Password Baru</label>
            <input type="password"
                name="password"
                class="w-full border rounded p-2">
        </div>

        <button
            class="bg-indigo-600 text-white px-6 py-2 rounded">
            Simpan Perubahan
        </button>

    </form>

</div>

@endsection