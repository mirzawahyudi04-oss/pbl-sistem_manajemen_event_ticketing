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
                @forelse($riwayat ?? [] as $item)
                <tr class="border-t border-slate-50 hover:bg-slate-50 transition">
                    <td class="px-5 py-4 text-slate-400">#INV{{ str_pad($item->id, 3, '0', STR_PAD_LEFT) }}</td>
                    <td class="px-5 py-4 text-slate-500">
                        {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                    </td>
                    <td class="px-5 py-4 font-medium text-slate-800">
                        {{ $item->event->nama_event ?? '-' }}
                    </td>
                    <td class="px-5 py-4 text-slate-800">
                        Rp {{ number_format($item->total_harga, 0, ',', '.') }}
                    </td>
                    <td class="px-5 py-4 text-slate-500">
                        {{ $item->metode_pembayaran ?? '-' }}
                    </td>
                    <td class="px-5 py-4">
                        @if($item->status === 'lunas')
                            <span class="text-xs bg-green-100 text-green-700 px-3 py-1 rounded-full">Lunas</span>
                        @elseif($item->status === 'pending')
                            <span class="text-xs bg-amber-100 text-amber-700 px-3 py-1 rounded-full">Pending</span>
                        @else
                            <span class="text-xs bg-red-100 text-red-700 px-3 py-1 rounded-full">Batal</span>
                        @endif
                    </td>
                </tr>
                @empty
                {{-- Data dummy sementara --}}
                <tr class="border-t border-slate-50">
                    <td class="px-5 py-4 text-slate-400">#INV001</td>
                    <td class="px-5 py-4 text-slate-500">01 April 2026</td>
                    <td class="px-5 py-4 font-medium text-slate-800">Java Jazz</td>
                    <td class="px-5 py-4 text-slate-800">Rp 250.000</td>
                    <td class="px-5 py-4 text-slate-500">GoPay</td>
                    <td class="px-5 py-4"><span class="text-xs bg-green-100 text-green-700 px-3 py-1 rounded-full">Lunas</span></td>
                </tr>
                <tr class="border-t border-slate-50">
                    <td class="px-5 py-4 text-slate-400">#INV002</td>
                    <td class="px-5 py-4 text-slate-500">03 Maret 2026</td>
                    <td class="px-5 py-4 font-medium text-slate-800">Workshop Web</td>
                    <td class="px-5 py-4 text-slate-800">Rp 150.000</td>
                    <td class="px-5 py-4 text-slate-500">Dana</td>
                    <td class="px-5 py-4"><span class="text-xs bg-amber-100 text-amber-700 px-3 py-1 rounded-full">Pending</span></td>
                </tr>
                <tr class="border-t border-slate-50">
                    <td class="px-5 py-4 text-slate-400">#INV003</td>
                    <td class="px-5 py-4 text-slate-500">10 Februari 2026</td>
                    <td class="px-5 py-4 font-medium text-slate-800">Seminar IT</td>
                    <td class="px-5 py-4 text-slate-800">Rp 50.000</td>
                    <td class="px-5 py-4 text-slate-500">BNI</td>
                    <td class="px-5 py-4"><span class="text-xs bg-red-100 text-red-700 px-3 py-1 rounded-full">Batal</span></td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <script>
    function cariTransaksi() {
        const input = document.querySelector("input").value.toLowerCase();
        const rows = document.querySelectorAll("#tabelRiwayat tbody tr");
        rows.forEach(row => {
            row.style.display = row.innerText.toLowerCase().includes(input) ? "" : "none";
        });
    }
    </script>

@endsection