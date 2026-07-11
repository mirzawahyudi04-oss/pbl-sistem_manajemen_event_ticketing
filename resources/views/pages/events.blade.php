<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Jelajahi Event</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logofavicon22.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-slate-900 min-h-screen flex flex-col font-sans">

    {{-- NAVBAR --}}
    <nav class="bg-white border-b border-slate-100 px-8 h-[58px] flex justify-between items-center">
        <a href="/" class="text-[17px] font-bold tracking-tight text-[#10194F]">STEVENtix</a>
        <a href="{{ route('dashboard_user') }}"
           class="text-xs font-semibold text-[#10194F] border border-[#dde3f0] px-4 py-2 rounded-lg hover:bg-[#10194F] hover:text-white hover:border-[#10194F] transition duration-200">
            Dashboard
        </a>
    </nav>

    {{-- TOP / HERO --}}
    <div class="bg-white border-b border-slate-100 px-8 pt-10 pb-0 text-center">

        <p class="text-[11px] font-semibold tracking-widest uppercase text-[#5661A4] mb-2">
            Platform Ticketing Event
        </p>

        <h1 class="text-3xl font-bold text-[#10194F] tracking-tight mb-1">
            Jelajahi Event
        </h1>

        <p class="text-sm text-slate-400 mb-6">
            Temukan konser, seminar, festival, dan olahraga di sekitarmu
        </p>

        {{-- SEARCH --}}
        <div class="flex justify-center mb-6">
            <div class="relative w-full max-w-md">
                <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/>
                </svg>
                <input type="text"
                       id="search"
                       oninput="searchEvent()"
                       placeholder="Cari event atau lokasi..."
                       class="w-full pl-10 pr-4 py-2.5 text-sm rounded-lg border-[1.5px] border-[#e8ecf4] bg-[#f8faff] text-[#10194F] placeholder-slate-300 focus:outline-none focus:border-[#10194F] focus:bg-white transition duration-150">
            </div>
        </div>

        {{-- FILTER --}}
        <div class="flex justify-center gap-1.5 flex-wrap">
            <button onclick="filterEvent('semua', this)"
                    class="filter-btn text-xs font-semibold px-5 py-2 rounded-lg border-[1.5px] bg-[#10194F] text-white border-[#10194F] transition duration-150">
                Semua
            </button>
            <button onclick="filterEvent('konser', this)"
                    class="filter-btn text-xs font-semibold px-5 py-2 rounded-lg border-[1.5px] bg-white text-slate-500 border-[#e8ecf4] hover:border-[#10194F] hover:text-[#10194F] transition duration-150">
                Konser
            </button>
            <button onclick="filterEvent('festival', this)"
                    class="filter-btn text-xs font-semibold px-5 py-2 rounded-lg border-[1.5px] bg-white text-slate-500 border-[#e8ecf4] hover:border-[#10194F] hover:text-[#10194F] transition duration-150">
                Festival
            </button>
            <button onclick="filterEvent('olahraga', this)"
                    class="filter-btn text-xs font-semibold px-5 py-2 rounded-lg border-[1.5px] bg-white text-slate-500 border-[#e8ecf4] hover:border-[#10194F] hover:text-[#10194F] transition duration-150">
                Olahraga
            </button>
            <button onclick="filterEvent('seminar', this)"
                    class="filter-btn text-xs font-semibold px-5 py-2 rounded-lg border-[1.5px] bg-white text-slate-500 border-[#e8ecf4] hover:border-[#10194F] hover:text-[#10194F] transition duration-150">
                Seminar
            </button>
        </div>

        {{-- garis bawah tipis sebagai aksen --}}
        <div class="mt-4 h-[1px] bg-slate-100"></div>
    </div>

    {{-- SECTION HEADER --}}
    <div class="bg-[#f8fafc] flex-1 px-8 pt-6 pb-10">
        <div class="flex justify-between items-center mb-5">
            <span class="text-sm font-bold text-[#10194F]">Event tersedia</span>
            <span class="text-xs text-slate-400 bg-white border border-[#eef0f7] px-3 py-1 rounded-full">
                <span id="eventCount">0</span> event
            </span>
        </div>

        {{-- GRID --}}
        @php $events = $events ?? []; @endphp

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4" id="eventContainer">
@forelse($events as $event)

@php
    $isExpired = \Carbon\Carbon::parse($event->tanggal)->isPast();
@endphp
            <div class="event-card bg-white rounded-2xl overflow-hidden border border-[#eef0f7] hover:border-[#c7ceea] hover:shadow-lg hover:-translate-y-1 transition-all duration-200 cursor-pointer"
            {{ $isExpired ? 'opacity-60 grayscale' : '' }}
                 data-search="{{ strtolower($event->nama_event . ' ' . $event->lokasi) }}"
                 data-kategori="{{ strtolower($event->kategori->nama_kategori ?? '') }}">
        

                {{-- GAMBAR --}}
                <div class="overflow-hidden h-36">
                    <img src="{{ asset('images/' . $event->gambar) }}"
                         alt="{{ $event->nama_event }}"
                         class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                </div>
                @if($isExpired)

<div class="bg-slate-700 text-white text-[10px] font-bold text-center py-2 tracking-wide">
    EVENT SUDAH BERAKHIR
</div>

@endif

                {{-- BODY --}}
                <div class="p-3.5">
                    <span class="inline-block text-[10px] font-bold px-2 py-0.5 rounded-md bg-[#eef0f9] text-[#5661A4] mb-1.5 capitalize">
                        {{ $event->kategori->nama_kategori ?? '-' }}
                    </span>
                    <p class="text-[11px] text-slate-400 mb-1 flex items-center gap-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/><circle cx="12" cy="9" r="2.5"/></svg>
                        {{ $event->lokasi }}
                    </p>
                    <h3 class="font-bold text-[13px] text-[#10194F] mb-0.5 leading-snug">{{ $event->nama_event }}</h3>
                    <p class="text-[11px] text-slate-300 mb-3">
                        Oleh {{ $event->organizer->nama_organizer ?? '-' }}
                    </p>

                    <hr class="border-slate-100 mb-3">

                    <p class="text-[10px] text-slate-400 mb-0.5">Mulai dari</p>
                    <p class="text-sm font-bold text-[#10194F]">
                        Rp {{ number_format($event->tikets->min('harga'), 0, ',', '.') }}
                    </p>
                </div>

                {{-- TOMBOL --}}
                <div class="px-3.5 pb-3.5">

                @if($isExpired)

                <button
                    class="block w-full text-center text-xs font-bold bg-slate-300 text-white py-2.5 rounded-lg cursor-not-allowed">
                    Event Berakhir
                </button>

                @else

                <a href="{{ route('events.show', $event->id_event) }}"
                class="block text-center text-xs font-bold bg-[#10194F] text-white py-2.5 rounded-lg hover:bg-[#5661A4] transition duration-200 tracking-wide">
                    Lihat Tiket
                </a>

                @endif

                </div>
        </div>
        @empty
            <p class="text-sm text-slate-500">
                Tidak ada event yang tersedia.
            </p>
        @endforelse
        </div>
    </div>
    
    {{-- FOOTER --}}
    <footer class="bg-white border-t border-slate-100 px-8 py-5 flex justify-between items-center">
        <span class="text-[15px] font-bold text-[#10194F]">STEVENtix</span>
        <span class="text-xs text-slate-300">© {{ date('Y') }} STEVENtix</span>
    </footer>

    <script>
    let currentKategori = 'semua';

    function updateCount() {
        const visible = document.querySelectorAll('.event-card:not([style*="display: none"])').length;
        document.getElementById('eventCount').textContent = visible;
    }

    document.addEventListener('DOMContentLoaded', updateCount);

    function searchEvent() {
        const q = document.getElementById('search').value.toLowerCase();
        document.querySelectorAll('.event-card').forEach(card => {
            const matchSearch = card.getAttribute('data-search').includes(q);
            const matchKat = currentKategori === 'semua' || card.getAttribute('data-kategori') === currentKategori;
            card.style.display = (matchSearch && matchKat) ? 'block' : 'none';
        });
        updateCount();
    }

    function filterEvent(kategori, btn) {
        currentKategori = kategori;

        document.querySelectorAll('.filter-btn').forEach(b => {
            b.classList.remove('bg-[#10194F]', 'text-white', 'border-[#10194F]');
            b.classList.add('bg-white', 'text-slate-500', 'border-[#e8ecf4]');
        });
        btn.classList.add('bg-[#10194F]', 'text-white', 'border-[#10194F]');
        btn.classList.remove('bg-white', 'text-slate-500', 'border-[#e8ecf4]');

        searchEvent();
    }
    </script>

</body>
</html>