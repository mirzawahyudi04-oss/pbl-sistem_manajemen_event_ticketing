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
    <a href="{{ route('profile.organizer') }}"
       class="block px-4 py-2.5 rounded-lg text-sm text-slate-300 hover:bg-slate-700 hover:text-white">
       Profil
    </a>
    
    
@endsection

@section('content')

<div class="mb-6">
    <h1 class="text-2xl font-semibold">
    Halo, {{ $organizer->nama_organizer }}
</h1>
    <p class="text-sm text-slate-500 mt-1">
        Kelola event dan pantau performa penjualan tiket
    </p>
</div>

<!-- STAT CARD -->
<div class="grid grid-cols-3 gap-4 mb-6">

    <div class="bg-white rounded-xl p-5 border border-slate-100">
        <p class="text-xs text-slate-500 mb-1">Total Event</p>
        <p class="text-3xl font-semibold">{{ $events->count() }}</p>
    </div>

    <div class="bg-white rounded-xl p-5 border border-slate-100">
        <p class="text-xs text-slate-500 mb-1">Tiket Terjual</p>
        <p class="text-3xl font-semibold">{{ $totalTiketTerjual }}</p>
    </div>

    <div class="bg-white rounded-xl p-5 border border-slate-100">
        <p class="text-xs text-slate-500 mb-1">Pendapatan</p>
        <p class="text-3xl font-semibold">
            Rp{{ number_format($totalPendapatan, 0, ',', '.') }}
        </p>
    </div>

</div>

<!-- GRAFIK PENJUALAN -->

<div class="bg-white rounded-xl border border-slate-100 p-6 mb-6">

    <div class="flex justify-between items-center mb-5">
        <div>
            <h2 class="text-lg font-semibold">
                Grafik Penjualan Tiket
            </h2>
            <p class="text-sm text-slate-500">
                Penjualan tiket selama 6 bulan terakhir
            </p>
        </div>
    </div>

    <div class="h-80">

        <canvas id="salesChart"></canvas>

    </div>

</div>
<!-- TOP EVENT -->

<div class="bg-white rounded-xl border border-slate-100 p-6">

    <div class="mb-5">

        <h2 class="text-lg font-semibold">
            Top 5 Event Terlaris
        </h2>

        <p class="text-sm text-slate-500">
            Event dengan jumlah tiket terjual terbanyak.
        </p>

    </div>

    <table class="w-full">

        <thead>

            <tr class="border-b">

                <th class="text-left py-3">Ranking</th>

                <th class="text-left py-3">Nama Event</th>

                <th class="text-center py-3">Tiket Terjual</th>

            </tr>

        </thead>

        <tbody>

            @forelse($topEvents as $index => $event)

            <tr class="border-b">

                <td class="py-3 font-semibold">
                    #{{ $index + 1 }}
                </td>

                <td class="py-3">
                    {{ $event->nama_event }}
                </td>

                <td class="py-3 text-center">
                    {{ $event->tiket_terjual }}
                </td>

            </tr>

            @empty

            <tr>

                <td colspan="3" class="py-6 text-center text-slate-400">

                    Belum ada data

                </td>

            </tr>

            @endforelse

        </tbody>

    </table>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const ctx = document.getElementById('salesChart');

new Chart(ctx, {

    type: 'line',

    data: {

        labels: @json($months),

        datasets: [{

            label: 'Tiket Terjual',

            data: @json($sales),

            borderWidth: 3,

            fill: false,

            tension: 0.4

        }]

    },

    options: {

        responsive: true,

        maintainAspectRatio: false

    }

});

</script>

@endsection