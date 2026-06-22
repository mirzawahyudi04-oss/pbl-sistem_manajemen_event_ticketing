@extends('layouts.app')

@section('title', 'E-Ticket')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="bg-white rounded-xl shadow-lg overflow-hidden">

        <div class="bg-indigo-600 text-white p-6">
            <h1 class="text-3xl font-bold">STEVENTix E-Ticket</h1>
            <p class="text-indigo-100">Tiket resmi peserta event</p>
        </div>

        <div class="p-6">

            <h2 class="text-2xl font-bold mb-4">
                {{ $ticket->event->nama_event }}
            </h2>

            <div class="grid grid-cols-2 gap-4">

                <div>
                    <p class="text-slate-500 text-sm">Nama Peserta</p>
                    <p class="font-semibold">{{ $ticket->user->name }}</p>
                </div>

                <div>
                    <p class="text-slate-500 text-sm">Kode Tiket</p>
                    <p class="font-semibold">{{ $ticket->ticket_code }}</p>
                </div>

                <div>
                    <p class="text-slate-500 text-sm">Jenis Tiket</p>
                    <p class="font-semibold">{{ $ticket->ticket_type }}</p>
                </div>

                <div>
                    <p class="text-slate-500 text-sm">Jumlah Tiket</p>
                    <p class="font-semibold">{{ $ticket->qty }}</p>
                </div>

                <div>
                    <p class="text-slate-500 text-sm">Lokasi</p>
                    <p class="font-semibold">{{ $ticket->event->lokasi }}</p>
                </div>

                <div>
                    <p class="text-slate-500 text-sm">Total Pembayaran</p>
                    <p class="font-semibold">
                        Rp {{ number_format($ticket->total_price,0,',','.') }}
                    </p>
                </div>

                <div>
                    <p class="text-slate-500 text-sm">Status</p>
                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                        {{ ucfirst($ticket->status) }}
                    </span>
                </div>

            </div>

            <div class="mt-8 text-center">

                <img
                    src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&data={{ $ticket->ticket_code }}"
                    class="mx-auto">

                <p class="mt-3 text-slate-500 text-sm">
                    Scan QR Code ini saat masuk ke event
                </p>

            </div>

            <div class="mt-6 text-center">
                <a href="{{ route('user.tiket') }}"
                   class="bg-indigo-600 text-white px-5 py-2 rounded-lg">
                    Kembali
                </a>
            </div>

        </div>

    </div>

</div>

@endsection