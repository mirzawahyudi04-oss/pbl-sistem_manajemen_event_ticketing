<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>STEVENtix</title>
<link rel="icon" type="image/png" href="{{ asset('images/logofavicon22.png') }}">
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-slate-900 font-sans">

{{-- NAVBAR --}}
<nav class="bg-white border-b border-black/[.08]">
    <div class="max-w-7xl mx-auto px-6 py-3.5 flex justify-between items-center">
        <a href="/" class="text-[17px] font-semibold tracking-tight text-[#10194F]">STEVENtix</a>
        <div class="flex gap-2">
           
        </div>
    </div>
</nav>

{{-- ========================= --}}
{{-- HERO --}}
{{-- ========================= --}}
<section
class="relative bg-cover bg-center bg-no-repeat min-h-screen"
style="background-image: url('{{ asset('images/bgLP.jpg') }}');">

    <div class="max-w-7xl mx-auto px-6 py-24">

        <div class="grid lg:grid-cols-2 gap-12 items-center">

            <div >

                <span class="px-3 py-1 rounded-full bg-white/10 text-white text-sm">
                     Platform Ticketing Event
                </span>

                <h1 class="mt-6 text-5xl font-bold leading-tight text-white">
                    Temukan Event
                    Favoritmu
                    Dalam Satu Platform
                </h1>

                <p class="mt-5 text-white/80 text-lg leading-8">
                    Pesan tiket konser, seminar, workshop,
                    festival hingga olahraga dengan mudah,
                    cepat dan aman.
                </p>

                <div class="mt-8 flex gap-3">

                    <a href="{{ route('register') }}"
                    class="px-6 py-3 rounded-xl bg-white text-[#10194F] font-semibold hover:scale-105 duration-300">

                        Daftar Gratis

                    </a>

                    <a href="{{ route('login') }}"
                    class="px-6 py-3 rounded-xl border border-white text-white hover:bg-white hover:text-[#10194F] duration-300">

                        Login Brader

                    </a>
                    

                    <a href="#event"
                    class="px-6 py-3 rounded-xl border border-white text-white hover:bg-white hover:text-[#10194F] duration-300">

                        Jelajahi Event

                    </a>

                </div>

            </div>

           
        </div>

    </div>
</section>


{{-- ========================= --}}
{{-- KEUNGGULAN --}}
{{-- ========================= --}}
<section class="py-16 bg-white">

<div class="max-w-7xl mx-auto px-6">

<div class="grid md:grid-cols-4 gap-5">

<div class="bg-slate-50 rounded-2xl p-6">

<div class="text-4xl"></div>

<h3 class="font-semibold mt-3 text-[#10194F]">
Tiket Resmi
</h3>

<p class="text-sm text-slate-500 mt-2">
Semua event berasal dari organizer terpercaya.
</p>

</div>


<div class="bg-slate-50 rounded-2xl p-6">

<div class="text-4xl"></div>

<h3 class="font-semibold mt-3 text-[#10194F]">
Pemesanan Cepat
</h3>

<p class="text-sm text-slate-500 mt-2">
Hanya beberapa langkah hingga tiket berhasil dibeli.
</p>

</div>


<div class="bg-slate-50 rounded-2xl p-6">

<div class="text-4xl"></div>

<h3 class="font-semibold mt-3 text-[#10194F]">
Pembayaran Aman
</h3>

<p class="text-sm text-slate-500 mt-2">
Proses pembayaran aman dan mudah digunakan.
</p>

</div>


<div class="bg-slate-50 rounded-2xl p-6">

<div class="text-4xl"></div>

<h3 class="font-semibold mt-3 text-[#10194F]">
QR Check-in
</h3>

<p class="text-sm text-slate-500 mt-2">
Masuk event cukup scan QR Code tiketmu.
</p>

</div>

</div>

</div>
</section>


{{-- ========================= --}}
{{-- EVENT --}}
{{-- ========================= --}}
<section id="event" class="py-16 bg-slate-50">

<div class="max-w-7xl mx-auto px-6">

<div class="flex justify-between mb-8">

<div>

<p class="uppercase tracking-widest text-sm text-slate-400">
EVENT POPULER
</p>

<h2 class="text-3xl font-bold text-[#10194F]">
Temukan Event Menarik
</h2>

</div>

</div>

<div class="grid lg:grid-cols-3 gap-6">

@foreach($events as $event)

<div class="
    bg-white 
    rounded-2xl 
    overflow-hidden 
    shadow-sm 
    hover:shadow-xl 
    hover:-translate-y-1 
    duration-300
">

<img
src="{{ $event->gambar && file_exists(public_path('images/'.$event->gambar))
    ? asset('images/'.$event->gambar)
    : asset('images/default-event.jpg') }}"
class="h-52 w-full object-cover">


<div class="p-5">

<span class="text-sm text-slate-500">
📍 {{ $event->lokasi }}
</span>

<h3 class="font-bold text-lg mt-2 text-[#10194F]">
    {{ $event->nama_event }}
</h3>

{{ $event->organizer->nama_organizer ?? 'Organizer' }}

<div class="flex justify-between mt-5">

<div>

<p class="text-xs text-slate-400">
Mulai dari
</p>

<p class="font-bold text-[#10194F]">
    Rp {{ number_format($event->tikets->min('harga'), 0, ',', '.') }}
</p>

</div>

<a
href="{{ route('login') }}"
class="text-[#5661A4] font-semibold">

Detail →

</a>

</div>

</div>

</div>

@endforeach

</div>

</div>

</section>


{{-- ========================= --}}
{{-- CTA --}}
{{-- ========================= --}}
<section class="py-20 bg-[#10194F]">

<div class="max-w-4xl mx-auto text-center px-6">

<h2 class="text-4xl font-bold text-white">

Siap Mengikuti Event Favoritmu?

</h2>

<p class="mt-5 text-white/70">

Gabung sekarang dan nikmati pengalaman membeli tiket event
dengan mudah, cepat, dan aman bersama STEVENtix.

</p>

<a
href="{{ route('register') }}"
class="inline-block mt-8 px-8 py-3 bg-white text-[#10194F] rounded-xl font-semibold hover:scale-105 duration-300">

Daftar Gratis

</a>

</div>

</section>


{{-- ========================= --}}
{{-- FOOTER --}}
{{-- ========================= --}}
<footer class="bg-slate-900 text-white">

<div class="max-w-7xl mx-auto px-6 py-8 flex justify-between">

<div>

<h2 class="font-bold text-xl">
STEVENtix
</h2>

<p class="text-white/60 text-sm mt-2">
Platform pemesanan tiket event modern
untuk konser, seminar, workshop,
dan festival di Indonesia.
</p>

</div>

<div class="text-right text-white/50 text-sm">

© {{ date('Y') }} STEVENtix

</div>

</div>

</footer>
```
