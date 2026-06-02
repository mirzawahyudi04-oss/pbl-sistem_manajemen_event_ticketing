@extends('layouts.app')

@section('title', 'Dashboard Organizer')

@section('sidebar')
    <a href="{{ route('dashboard_organizer') }}"
       class="block px-4 py-2.5 rounded-lg text-sm transition bg-indigo-600 text-white font-medium">
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
    <a href="{{ route('laporan') }}"
       class="block px-4 py-2.5 rounded-lg text-sm text-slate-300 hover:bg-slate-700 hover:text-white">
       Profil
    </a>
    
    
@endsection

@section('content')

<div class="mb-6">
    <h1 class="text-2xl font-semibold">
        Halo, Organizer
    </h1>
    <p class="text-sm text-slate-500 mt-1">
        Kelola event dan pantau performa penjualan tiket
    </p>
</div>

<!-- STAT CARD -->
<div class="grid grid-cols-4 gap-4 mb-6">

    <div class="bg-white rounded-xl p-5 border border-slate-100">
        <p class="text-3xl font-semibold">
        {{ $events->count() }}</p>Total Event</p>
        <p class="text-3xl font-semibold">12</p>
    </div>

    <div class="bg-white rounded-xl p-5 border border-slate-100">
        <p class="text-xs text-slate-500 mb-1">Tiket Terjual</p>
        <p class="text-3xl font-semibold">540</p>
    </div>

    <div class="bg-white rounded-xl p-5 border border-slate-100">
        <p class="text-xs text-slate-500 mb-1">Pendapatan</p>
        <p class="text-3xl font-semibold">Rp12JT</p>
    </div>

    <div class="bg-white rounded-xl p-5 border border-slate-100">
        <p class="text-xs text-slate-500 mb-1">Pengunjung</p>
        <p class="text-3xl font-semibold">1.200</p>
    </div>

</div>

<!-- DATA EVENT -->
<!-- DATA EVENT -->
<div class="bg-white rounded-xl border border-slate-100 p-5">

    <div class="pb-3 mb-4 border-b border-slate-100">
        <p class="text-xs uppercase tracking-wide text-slate-400">
            Data Event Saya
        </p>
    </div>

    <table class="w-full">

        <thead>
            <tr class="border-b border-slate-100">
                <th class="text-left py-3">No</th>
                <th class="text-left py-3">Nama Event</th>
                <th class="text-left py-3">Tanggal</th>
                <th class="text-left py-3">Lokasi</th>
                <th class="text-left py-3">Status</th>
            </tr>
        </thead>

        <tbody>

            @forelse($events as $index => $event)

            <tr class="border-b border-slate-50">

                <td class="py-3">{{ $index + 1 }}</td>

                <td class="py-3">
                    {{ $event->nama_event }}
                </td>

                <td class="py-3">
                    {{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}
                </td>

                <td class="py-3">
                    {{ $event->lokasi }}
                </td>

                <td class="py-3">
                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">
                        Aktif
                    </span>
                </td>

            </tr>

            @empty

            <tr>
                <td colspan="5" class="py-5 text-center text-slate-400">
                    Belum ada event
                </td>
            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection