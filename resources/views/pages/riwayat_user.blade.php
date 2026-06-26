@extends('layouts.app')
@section('title', 'Riwayat Transaksi')

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
        <h1 class="text-2xl font-semibold">Riwayat Transaksi</h1>
        <p class="text-sm text-slate-500 mt-1">Semua catatan pembayaran tiket kamu</p>
    </div>

    {{-- SEARCH --}}
    <div class="mb-5">
        <input type="text"
               onkeyup="cariTransaksi()"
               placeholder="Cari transaksi..."
               class="w-full max-w-xs px-4 py-2.5 text-sm rounded-lg border border-slate-200 bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500">
    </div>

    <div class="bg-white rounded-xl border border-slate-100 overflow-hidden">
        <table class="w-full text-sm" id="tabelRiwayat">
            <thead>
                <tr class="bg-slate-50 text-slate-500 text-xs uppercase tracking-wide">
                    <th class="px-5 py-3 text-left">ID</th>
                    <th class="px-5 py-3 text-left">Tanggal</th>
                    <th class="px-5 py-3 text-left">Event</th>
                    <th class="px-5 py-3 text-left">Total</th>
                    <th class="px-5 py-3 text-left">Metode</th>
                    <th class="px-5 py-3 text-left">Status</th>
                </tr>
            </thead>
            <tbody>
    @forelse($riwayat as $item)
    <tr class="border-t border-slate-50 hover:bg-slate-50 transition">
        
        <td class="px-5 py-4 text-slate-400">
            #INV{{ str_pad($item->id, 3, '0', STR_PAD_LEFT) }}
        </td>

        <td class="px-5 py-4 text-slate-500">
            {{ $item->created_at->format('d M Y') }}
        </td>

        <td class="px-5 py-4 font-medium text-slate-800">
            {{ $item->event->nama_event ?? '-' }}
        </td>

        <td class="px-5 py-4 text-slate-800">
            Rp {{ number_format($item->total_price, 0, ',', '.') }}
        </td>

        <td class="px-5 py-4 text-slate-500">
            {{ $item->payment_method ?? '-' }}
        </td>

        <td class="px-5 py-4">
            @if($item->status == 'paid')
                <span class="text-xs bg-green-100 text-green-700 px-3 py-1 rounded-full">
                    Paid
                </span>
            @elseif($item->status == 'pending')
                <span class="text-xs bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full">
                    Pending
                </span>
            @else
                <span class="text-xs bg-red-100 text-red-700 px-3 py-1 rounded-full">
                    Failed
                </span>
            @endif
        </td>

    </tr>
    @empty
    <tr>
        <td colspan="6" class="text-center py-8 text-slate-500">
            Belum ada riwayat transaksi.
        </td>
    </tr>
    @endforelse
</tbody>
</table>
</div>

@endsection