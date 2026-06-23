@extends('layouts.app')

@section('title','Laporan')

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
       class="block px-4 py-2.5 rounded-lg text-sm transition bg-indigo-600 text-white font-medium">
        Laporan
    </a>
    <a href="{{ route('profile.organizer') }}"
       class="block px-4 py-2.5 rounded-lg text-sm text-slate-300 hover:bg-slate-700 hover:text-white">
        Profil
    </a>
@endsection

@section('content')

<div class="mb-6">
    <h1 class="text-2xl font-semibold">Laporan Penjualan</h1>
    <p class="text-sm text-slate-500 mt-1">Ringkasan penjualan tiket event kamu.</p>
</div>

<div class="grid grid-cols-3 gap-4 mb-6">
    <div class="bg-white rounded-xl p-5 border border-slate-100">
        <p class="text-xs text-slate-500 mb-1">Total Event</p>
        <p class="text-3xl font-semibold">{{ $totalEvent }}</p>
    </div>
    <div class="bg-white rounded-xl p-5 border border-slate-100">
        <p class="text-xs text-slate-500 mb-1">Tiket Terjual</p>
        <p class="text-3xl font-semibold">{{ $totalTiketTerjual }}</p>
    </div>
    <div class="bg-white rounded-xl p-5 border border-slate-100">
        <p class="text-xs text-slate-500 mb-1">Pendapatan</p>
        <p class="text-3xl font-semibold">Rp{{ number_format($totalPendapatan, 0, ',', '.') }}</p>
    </div>
</div>

<div class="bg-white rounded-xl border border-slate-100 p-5">
    <div class="pb-3 mb-4 border-b border-slate-100">
        <p class="text-xs uppercase tracking-wide text-slate-400">Per Event</p>
    </div>
    <table class="w-full table-fixed">
        <thead>
            <tr class="border-b border-slate-100">
                <th class="text-left py-3 w-1/4">Event</th>
                <th class="text-left py-3 w-1/6">Tanggal</th>
                <th class="text-left py-3 w-1/3">Lokasi</th>
                <th class="text-center py-3 w-1/6">Tiket Terjual</th>
                <th class="text-right py-3 w-1/6">Pendapatan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($events as $event)
            <tr class="border-b border-slate-50">
                <td class="py-3 font-medium truncate pr-2">{{ $event->nama_event }}</td>
                <td class="py-3 whitespace-nowrap">{{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}</td>
                <td class="py-3 truncate pr-2">{{ $event->lokasi }}</td>
                <td class="py-3 text-center">{{ $event->tiket_terjual }}</td>
                <td class="py-3 text-right">Rp{{ number_format($event->pendapatan, 0, ',', '.') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center py-10 text-slate-400">
                    Belum ada event
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection