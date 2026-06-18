@extends('layouts.app')

@section('title', 'Transaksi Organizer')

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
   class="block px-4 py-2.5 rounded-lg text-sm bg-indigo-600 text-white font-medium">
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
        Riwayat Transaksi
    </h1>

    <p class="text-sm text-slate-500 mt-1">
        Daftar transaksi pembelian tiket pada event yang Anda selenggarakan.
    </p>
</div>

<div class="bg-white rounded-xl border border-slate-200 p-5">

    <table class="w-full">

        <thead>
            <tr class="border-b border-slate-200">
                <th class="py-3 text-left">No</th>
                <th class="py-3 text-left">ID Transaksi</th>
                <th class="py-3 text-left">Pembeli</th>
                <th class="py-3 text-left">Event</th>
                <th class="py-3 text-left">Jenis Tiket</th>
                <th class="py-3 text-center">Qty</th>
                <th class="py-3 text-right">Total Bayar</th>
                <th class="py-3 text-center">Tanggal</th>
            </tr>
        </thead>

        <tbody>

        @forelse($transaksi as $item)

            <tr class="border-b border-slate-100">

                <td class="py-3">
                    {{ $loop->iteration }}
                </td>

                <td class="py-3">
                    TRX{{ str_pad($item->id, 5, '0', STR_PAD_LEFT) }}
                </td>

                <td class="py-3">
                    {{ $item->name }}
                </td>

                <td class="py-3">
                    {{ $item->nama_event }}
                </td>

                <td class="py-3">
                    {{ $item->ticket_type }}
                </td>

                <td class="py-3 text-center">
                    {{ $item->qty }}
                </td>

                <td class="py-3 text-right">
                    Rp {{ number_format($item->total_price, 0, ',', '.') }}
                </td>

                <td class="py-3 text-center">
                    {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                </td>

            </tr>

        @empty

            <tr>
                <td colspan="8" class="py-6 text-center text-slate-500">
                    Belum ada transaksi.
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection
