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

<div class="p-8">

    <h1 class="text-2xl font-bold mb-6">
        Laporan Penjualan
    </h1>

    <div class="grid grid-cols-3 gap-5 mb-8">

        <div class="bg-white shadow rounded-xl p-5">

            <h3 class="text-gray-500">
                Total Event
            </h3>

            <p class="text-3xl font-bold">
                {{ $totalEvent }}
            </p>

        </div>

        <div class="bg-white shadow rounded-xl p-5">

            <h3 class="text-gray-500">
                Tiket Terjual
            </h3>

            <p class="text-3xl font-bold">
                0
            </p>

        </div>

        <div class="bg-white shadow rounded-xl p-5">

            <h3 class="text-gray-500">
                Pendapatan
            </h3>

            <p class="text-3xl font-bold">
                Rp0
            </p>

        </div>

    </div>

    <div class="bg-white rounded-xl shadow p-6">

        <table class="w-full">

            <thead>

                <tr class="border-b">

                    <th class="text-left py-3">Event</th>
                    <th>Tanggal</th>
                    <th>Lokasi</th>
                    <th>Tiket Terjual</th>
                    <th>Pendapatan</th>

                </tr>

            </thead>

            <tbody>

                @forelse($events as $event)

                <tr class="border-b">

                    <td class="py-3">
                        {{ $event->nama }}
                    </td>

                    <td>
                        {{ $event->tanggal }}
                    </td>

                    <td>
                        {{ $event->lokasi }}
                    </td>

                    <td class="text-center">
                        0
                    </td>

                    <td class="text-center">
                        Rp0
                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5"
                        class="text-center py-10 text-gray-400">

                        Belum ada event

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection