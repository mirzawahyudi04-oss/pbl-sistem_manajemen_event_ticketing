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
            <a href="{{ route('login') }}"
               class="px-4 py-1.5 text-[13px] rounded-lg border border-black/[.08] text-[#10194F] hover:bg-slate-100 transition">
                Login
            </a>
            <a href="{{ route('register') }}"
               class="px-4 py-1.5 text-[13px] rounded-lg bg-[#10194F] text-white hover:bg-[#5661A4] transition">
                Daftar
            </a>
        </div>
    </div>
</nav>

{{-- HERO --}}
<section class="max-w-7xl mx-auto px-6 py-20">
    <div class="max-w-lg">
        <h1 class="text-4xl font-semibold leading-tight tracking-tight text-[#10194F] mb-3">
            Beli tiket event<br>tanpa ribet
        </h1>
        <p class="text-[15px] text-slate-500 leading-relaxed mb-7">
            Platform pemesanan tiket untuk konser, seminar, dan workshop.
        </p>
        <div class="flex gap-2">
            <a href="{{ route('login') }}"
               class="px-5 py-2.5 text-[13px] font-medium rounded-lg bg-[#10194F] text-white hover:bg-[#5661A4] transition">
                Mulai sekarang
            </a>
            <a href="{{ route('register') }}"
               class="px-5 py-2.5 text-[13px] font-medium rounded-lg border border-[#10194F]/25 text-[#10194F] hover:bg-white transition">
                Daftar gratis
            </a>
        </div>
    </div>
</section>

<hr class="border-black/[.08]">

{{-- EVENT LIST --}}
<section class="max-w-7xl mx-auto px-6 py-10">
    <p class="text-[11px] uppercase tracking-widest text-slate-400 mb-5">Event tersedia</p>

    <div class="grid grid-cols-4 gap-3">

        <div class="bg-white border border-black/[.08] rounded-xl overflow-hidden hover:border-slate-300 transition">
            <img src="https://picsum.photos/400/220?random=21" alt="Music Festival" class="w-full h-36 object-cover">
            <div class="p-3.5">
                <div class="text-[11px] text-slate-400 mb-1">Batam</div>
                <div class="text-[13px] font-semibold text-[#10194F] mb-1">Music Festival 2026</div>
                <div class="text-[12px] text-slate-400 mb-3">Oleh STEVENtix Organizer</div>
                <div class="border-t border-slate-100 pt-2.5 flex justify-between items-center">
                    <div>
                        <div class="text-[11px] text-slate-400">Mulai dari</div>
                        <div class="text-[13px] font-semibold text-[#10194F]">Rp150.000</div>
                    </div>
                    <a href="{{ route('login') }}" class="text-[12px] font-medium text-[#5661A4] hover:underline">Detail →</a>
                </div>
            </div>
        </div>

        <div class="bg-white border border-black/[.08] rounded-xl overflow-hidden hover:border-slate-300 transition">
            <img src="https://picsum.photos/400/220?random=22" alt="Tech Conference" class="w-full h-36 object-cover">
            <div class="p-3.5">
                <div class="text-[11px] text-slate-400 mb-1">Jakarta</div>
                <div class="text-[13px] font-semibold text-[#10194F] mb-1">Tech Conference 2026</div>
                <div class="text-[12px] text-slate-400 mb-3">Oleh Event Corp</div>
                <div class="border-t border-slate-100 pt-2.5 flex justify-between items-center">
                    <div>
                        <div class="text-[11px] text-slate-400">Mulai dari</div>
                        <div class="text-[13px] font-semibold text-[#10194F]">Rp100.000</div>
                    </div>
                    <a href="{{ route('login') }}" class="text-[12px] font-medium text-[#5661A4] hover:underline">Detail →</a>
                </div>
            </div>
        </div>

        <div class="bg-white border border-black/[.08] rounded-xl overflow-hidden hover:border-slate-300 transition">
            <img src="https://picsum.photos/400/220?random=23" alt="Workshop UI/UX" class="w-full h-36 object-cover">
            <div class="p-3.5">
                <div class="text-[11px] text-slate-400 mb-1">Bandung</div>
                <div class="text-[13px] font-semibold text-[#10194F] mb-1">Workshop UI/UX</div>
                <div class="text-[12px] text-slate-400 mb-3">Oleh Design Hub</div>
                <div class="border-t border-slate-100 pt-2.5 flex justify-between items-center">
                    <div>
                        <div class="text-[11px] text-slate-400">Mulai dari</div>
                        <div class="text-[13px] font-semibold text-[#10194F]">Rp75.000</div>
                    </div>
                    <a href="{{ route('login') }}" class="text-[12px] font-medium text-[#5661A4] hover:underline">Detail →</a>
                </div>
            </div>
        </div>

        <div class="bg-white border border-black/[.08] rounded-xl overflow-hidden hover:border-slate-300 transition">
            <img src="https://picsum.photos/400/220?random=24" alt="Fun Run 5K" class="w-full h-36 object-cover">
            <div class="p-3.5">
                <div class="text-[11px] text-slate-400 mb-1">Surabaya</div>
                <div class="text-[13px] font-semibold text-[#10194F] mb-1">Fun Run 5K</div>
                <div class="text-[12px] text-slate-400 mb-3">Oleh Sport Indo</div>
                <div class="border-t border-slate-100 pt-2.5 flex justify-between items-center">
                    <div>
                        <div class="text-[11px] text-slate-400">Mulai dari</div>
                        <div class="text-[13px] font-semibold text-[#10194F]">Rp50.000</div>
                    </div>
                    <a href="{{ route('login') }}" class="text-[12px] font-medium text-[#5661A4] hover:underline">Detail →</a>
                </div>
            </div>
        </div>

    </div>
</section>

<hr class="border-black/[.08]">


<section class="max-w-7xl mx-auto px-6 py-10">
    <p class="text-[11px] uppercase tracking-widest text-slate-400 mb-5">Event tersedia</p>

    <div class="grid grid-cols-4 gap-3">

        <div class="bg-white border border-black/[.08] rounded-xl overflow-hidden hover:border-slate-300 transition">
            <img src="https://picsum.photos/400/220?random=28" alt="Music Festival" class="w-full h-36 object-cover">
            <div class="p-3.5">
                <div class="text-[11px] text-slate-400 mb-1">Batam</div>
                <div class="text-[13px] font-semibold text-[#10194F] mb-1">Music Festival 2026</div>
                <div class="text-[12px] text-slate-400 mb-3">Oleh STEVENtix Organizer</div>
                <div class="border-t border-slate-100 pt-2.5 flex justify-between items-center">
                    <div>
                        <div class="text-[11px] text-slate-400">Mulai dari</div>
                        <div class="text-[13px] font-semibold text-[#10194F]">Rp150.000</div>
                    </div>
                    <a href="{{ route('login') }}" class="text-[12px] font-medium text-[#5661A4] hover:underline">Detail →</a>
                </div>
            </div>
        </div>

        <div class="bg-white border border-black/[.08] rounded-xl overflow-hidden hover:border-slate-300 transition">
            <img src="https://picsum.photos/400/220?random=27" alt="Tech Conference" class="w-full h-36 object-cover">
            <div class="p-3.5">
                <div class="text-[11px] text-slate-400 mb-1">Jakarta</div>
                <div class="text-[13px] font-semibold text-[#10194F] mb-1">Tech Conference 2026</div>
                <div class="text-[12px] text-slate-400 mb-3">Oleh Event Corp</div>
                <div class="border-t border-slate-100 pt-2.5 flex justify-between items-center">
                    <div>
                        <div class="text-[11px] text-slate-400">Mulai dari</div>
                        <div class="text-[13px] font-semibold text-[#10194F]">Rp100.000</div>
                    </div>
                    <a href="{{ route('login') }}" class="text-[12px] font-medium text-[#5661A4] hover:underline">Detail →</a>
                </div>
            </div>
        </div>

        <div class="bg-white border border-black/[.08] rounded-xl overflow-hidden hover:border-slate-300 transition">
            <img src="https://picsum.photos/400/220?random=25" alt="Workshop UI/UX" class="w-full h-36 object-cover">
            <div class="p-3.5">
                <div class="text-[11px] text-slate-400 mb-1">Bandung</div>
                <div class="text-[13px] font-semibold text-[#10194F] mb-1">Workshop UI/UX</div>
                <div class="text-[12px] text-slate-400 mb-3">Oleh Design Hub</div>
                <div class="border-t border-slate-100 pt-2.5 flex justify-between items-center">
                    <div>
                        <div class="text-[11px] text-slate-400">Mulai dari</div>
                        <div class="text-[13px] font-semibold text-[#10194F]">Rp75.000</div>
                    </div>
                    <a href="{{ route('login') }}" class="text-[12px] font-medium text-[#5661A4] hover:underline">Detail →</a>
                </div>
            </div>
        </div>

        <div class="bg-white border border-black/[.08] rounded-xl overflow-hidden hover:border-slate-300 transition">
            <img src="https://picsum.photos/400/220?random=26" alt="Fun Run 5K" class="w-full h-36 object-cover">
            <div class="p-3.5">
                <div class="text-[11px] text-slate-400 mb-1">Surabaya</div>
                <div class="text-[13px] font-semibold text-[#10194F] mb-1">Fun Run 5K</div>
                <div class="text-[12px] text-slate-400 mb-3">Oleh Sport Indo</div>
                <div class="border-t border-slate-100 pt-2.5 flex justify-between items-center">
                    <div>
                        <div class="text-[11px] text-slate-400">Mulai dari</div>
                        <div class="text-[13px] font-semibold text-[#10194F]">Rp50.000</div>
                    </div>
                    <a href="{{ route('login') }}" class="text-[12px] font-medium text-[#5661A4] hover:underline">Detail →</a>
                </div>
            </div>
        </div>

    </div>
</section>

{{-- FOOTER --}}
<footer class="bg-[#10194F] mt-4">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <span class="text-[14px] font-semibold text-white">STEVENtix</span>
        <small class="text-[12px] text-white/40">© {{ date('Y') }} All Rights Reserved</small>
    </div>
</footer>

</body>
</html>