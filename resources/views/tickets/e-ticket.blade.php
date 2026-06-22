@extends('layouts.app')

@section('title', 'E-Ticket')

@section('content')
<div class="max-w-2xl mx-auto">

    <div class="bg-white rounded-xl shadow p-8">

        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-indigo-600">
                STEVENtix E-Ticket
            </h1>
            <p class="text-slate-500">
                Tunjukkan tiket ini saat check-in event
            </p>
        </div>

        <div class="border rounded-lg p-5 mb-6">
            <h2 class="text-xl font-semibold mb-4">
                {{ $ticket->event->nama_event }}
            </h2>

            <div class="space-y-2">
                <p><strong>Nama:</strong> {{ $ticket->user->name }}</p>
                <p><strong>Lokasi:</strong> {{ $ticket->event->lokasi }}</p>
                <p><strong>Status:</strong> {{ ucfirst($ticket->status) }}</p>
                <p><strong>Kode Tiket:</strong> {{ $ticket->ticket_code }}</p>
            </div>
        </div>

        <div class="text-center">
            <img
                src="https://api.qrserver.com/v1/create-qr-code/?size=220x220&data={{ $ticket->ticket_code }}"
                class="mx-auto"
                alt="QR Code">

            <p class="mt-3 text-sm text-slate-500">
                Scan QR ini saat masuk event
            </p>
        </div>

        <div class="text-center mt-6">
            <a href="{{ route('user.tiket') }}"
               class="bg-indigo-600 text-white px-5 py-2 rounded-lg">
                Kembali
            </a>
        </div>

    </div>

</div>
@endsection