@extends('layouts.app')

@section('title', 'Peserta Organizer')

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
    class="block px-4 py-2.5 rounded-lg text-sm bg-indigo-600 text-white font-medium">
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
        Data Peserta Event Saya
    </h1>

    <p class="text-sm text-slate-500 mt-1">
        Daftar peserta yang telah membeli tiket pada event yang Anda selenggarakan.
    </p>
</div>

<div class="bg-white rounded-xl border border-slate-200 shadow-sm">

    <div class="px-5 py-4 border-b">
        <h2 class="font-semibold text-slate-700">
            Daftar Peserta
        </h2>
    </div>

    <div class="overflow-x-auto">

        <table class="w-full text-sm">

            <thead class="bg-slate-50">

                <tr>
                    <th class="px-4 py-3 text-left">No</th>
                    <th class="px-4 py-3 text-left">Nama Peserta</th>
                    <th class="px-4 py-3 text-left">Email</th>
                    <th class="px-4 py-3 text-left">Event</th>
                    <th class="px-4 py-3 text-left">Jenis Tiket</th>
                    <th class="px-4 py-3 text-center">Qty</th>
                    <th class="px-4 py-3 text-right">Total Bayar</th>
                </tr>

            </thead>

            <tbody>

                @forelse($peserta as $item)

                <tr class="border-t">

                    <td class="px-4 py-3">
                        {{ $loop->iteration }}
                    </td>

                    <td class="px-4 py-3">
                        {{ $item->name }}
                    </td>

                    <td class="px-4 py-3">
                        {{ $item->email }}
                    </td>

                    <td class="px-4 py-3">
                        {{ $item->nama_event }}
                    </td>

                    <td class="px-4 py-3">
                        {{ $item->ticket_type }}
                    </td>

                    <td class="px-4 py-3 text-center">
                        {{ $item->qty }}
                    </td>

                    <td class="px-4 py-3 text-right">
                        Rp {{ number_format($item->total_price, 0, ',', '.') }}
                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="7" class="text-center py-6 text-slate-500">
                        Belum ada peserta yang membeli tiket.
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection

