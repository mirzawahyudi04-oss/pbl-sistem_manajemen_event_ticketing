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
        <th class="py-3 text-center">Bukti</th>
        <th class="py-3 text-center">Status</th>
        <th class="py-3 text-center">Aksi</th>
    </tr>
</thead>

<tbody>

@forelse($transaksi as $item)

<tr class="border-b border-slate-100 hover:bg-slate-50">

    <td class="py-3">
        {{ $loop->iteration }}
    </td>

    <td class="py-3">
        TRX{{ str_pad($item->id,5,'0',STR_PAD_LEFT) }}
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
        Rp {{ number_format($item->total_price,0,',','.') }}
    </td>

    <td class="py-3 text-center">
        {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
    </td>

    
<td class="py-3 text-center">

    @if($item->payment_proof)

        <button
            onclick="showProof('{{ asset('storage/'.$item->payment_proof) }}')"
            class="text-indigo-600 hover:underline">

            Lihat

        </button>

    @else

        <span class="text-slate-400">-</span>

    @endif

</td>



    <td class="py-3 text-center">

        @if($item->status=='pending')

            <span class="px-2 py-1 rounded-full bg-yellow-100 text-yellow-700 text-xs">
                Pending
            </span>

        @elseif($item->status=='paid')

            <span class="px-2 py-1 rounded-full bg-green-100 text-green-700 text-xs">
                Lunas
            </span>

        @else

            <span class="px-2 py-1 rounded-full bg-red-100 text-red-700 text-xs">
                Ditolak
            </span>

        @endif

    </td>

    <td class="py-3 text-center">

        @if($item->status=='pending')

        <div class="flex justify-center gap-2">

            <form action="{{ route('transaksi.approve',$item->id) }}" method="POST">

                @csrf
                @method('PUT')

                <button
                    class="px-3 py-1 rounded bg-green-500 text-white text-sm hover:bg-green-600">

                    Terima

                </button>

            </form>

            <form action="{{ route('transaksi.reject',$item->id) }}" method="POST">

                @csrf
                @method('PUT')

                <button
                    class="px-3 py-1 rounded bg-red-500 text-white text-sm hover:bg-red-600">

                    Tolak

                </button>

            </form>

        </div>

        @else

            <span class="text-slate-400 text-sm">
                -
            </span>

        @endif

    </td>

</tr>

@empty

<tr>

    <td colspan="11"
        class="py-6 text-center text-slate-500">

        Belum ada transaksi.

    </td>

</tr>

@endforelse

</tbody>



    </table>

</div>

<!-- Modal Bukti Pembayaran -->
<div
    id="proofModal"
    class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

    <div class="bg-white rounded-xl p-5 w-full max-w-lg">

        <div class="flex justify-between items-center mb-4">

            <h2 class="text-lg font-semibold">
                Bukti Pembayaran
            </h2>

            <button
        onclick="closeProof()"
        class="absolute top-3 right-3 flex items-center justify-center
               w-10 h-10 bg-white rounded-full
               text-slate-500 hover:text-red-500
               shadow-lg border">

        <span class="text-2xl">&times;</span>

    </button>
        
        </div>

        <img
            id="proofImage"
            src=""
            class="w-full rounded-lg border">

    </div>

</div>

<script>

function showProof(image){

    document.getElementById('proofImage').src = image;

    document.getElementById('proofModal')
        .classList.remove('hidden');

    document.getElementById('proofModal')
        .classList.add('flex');

}

function closeProof(){

    document.getElementById('proofModal')
        .classList.remove('flex');

    document.getElementById('proofModal')
        .classList.add('hidden');

}

</script>



@endsection
