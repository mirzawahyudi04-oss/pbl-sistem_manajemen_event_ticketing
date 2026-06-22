@extends('layouts.app')
@section('title', 'Tiket Saya')

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
        <h1 class="text-2xl font-semibold">Tiket Saya</h1>
        <p class="text-sm text-slate-500 mt-1">Daftar tiket event yang kamu miliki</p>
    </div>

    <div class="bg-white rounded-xl border border-slate-100 p-5">

        {{-- Jika ada tiket --}}
        @forelse($tikets ?? [] as $tiket)
        <div class="flex justify-between items-center py-3 border-b border-slate-50 last:border-0">
            <div>
                <p class="font-medium text-sm">{{ $tiket->event->nama_event ?? '-' }}</p>
                <p class="text-xs text-slate-400 mt-0.5">
                    {{ \Carbon\Carbon::parse($tiket->event->tanggal)->format('d M Y') }} · {{ $tiket->event->lokasi }}
                </p>
            </div>
            <div class="flex items-center gap-2">
               <a href="{{ route('e-ticket', $tiket->id) }}"
   class="text-xs bg-indigo-600 text-white px-3 py-1 rounded-full hover:bg-indigo-700 transition">
    E-Tiket
</a>
            </div>
        </div>
        @empty
        <p class="text-sm text-slate-400 text-center py-6">Kamu belum memiliki tiket.</p>
        @endforelse

    </div>

@endsection