<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Jelajahi Event</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logofavicon22.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-slate-900 min-h-screen flex flex-col">

    {{-- NAVBAR --}}
    <nav class="bg-slate-800 px-8 py-4 flex justify-between items-center">
        <a href="/" class="text-white font-bold text-xl tracking-wide">STEVENtix</a>
        <a href="{{ route('dashboard_user') }}"
           class="text-sm text-slate-300 border border-slate-600 px-4 py-2 rounded-lg hover:bg-slate-700 hover:text-white transition">
            Dashboard
        </a>
    </nav>

    {{-- SEARCH --}}
    <div class="flex justify-center pt-8 pb-4 px-4">
        <input type="text"
               id="search"
               onkeyup="searchEvent()"
               placeholder="Cari event..."
               class="w-full max-w-md px-5 py-3 text-sm rounded-full border border-slate-200 bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
    </div>

    {{-- FILTER --}}
    <div class="flex justify-center gap-2 flex-wrap pb-6 px-4">
        <button onclick="filterEvent('semua', this)"
                class="filter-btn px-5 py-2 rounded-full text-sm bg-indigo-600 text-white border border-transparent transition">
            Semua
        </button>
        <button onclick="filterEvent('konser', this)"
                class="filter-btn px-5 py-2 rounded-full text-sm bg-white text-slate-600 border border-slate-200 hover:bg-slate-100 transition">
            Konser
        </button>
        <button onclick="filterEvent('festival', this)"
                class="filter-btn px-5 py-2 rounded-full text-sm bg-white text-slate-600 border border-slate-200 hover:bg-slate-100 transition">
            Festival
        </button>
        <button onclick="filterEvent('olahraga', this)"
                class="filter-btn px-5 py-2 rounded-full text-sm bg-white text-slate-600 border border-slate-200 hover:bg-slate-100 transition">
            Olahraga
        </button>
        <button onclick="filterEvent('seminar', this)"
                class="filter-btn px-5 py-2 rounded-full text-sm bg-white text-slate-600 border border-slate-200 hover:bg-slate-100 transition">
            Seminar
        </button>
    </div>

    {{-- GRID --}}
    @php $events = $events ?? []; @endphp
    
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 px-8 pb-12 flex-1 items-start" id="eventContainer">
        @forelse($events as $event)
        <div class="event-card bg-white rounded-2xl overflow-hidden border border-slate-100 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all duration-200 cursor-pointer"
             data-search="{{ strtolower($event->nama_event . ' ' . $event->lokasi) }}"
             data-kategori="{{ strtolower($event->kategori ?? 'umum') }}">

            {{-- GAMBAR --}}
            <div class="overflow-hidden h-44">
                <img src="{{ asset('images/' . $event->gambar) }}"
                     alt="{{ $event->nama_event }}"
                     class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
            </div>

            {{-- BODY --}}
            <div class="p-4">
                <p class="text-xs text-slate-400 mb-1">{{ $event->lokasi }}</p>
                <h3 class="font-semibold text-slate-800 text-base mb-0.5">{{ $event->nama_event }}</h3>
                <p class="text-xs text-slate-400 mb-3">
                    Oleh {{ $event->organizer->nama_organizer ?? '-' }}
                </p>

                <hr class="border-slate-100 mb-3">

                <p class="text-xs text-slate-400 mb-0.5">Mulai dari</p>
                <p class="text-sm font-semibold text-indigo-600">
                    Rp {{ number_format($event->tikets->min('harga'), 0, ',', '.') }}
                </p>
            </div>

            {{-- TOMBOL --}}
            <div class="px-4 pb-4">
                <a href="{{ route('events.show', $event->id_event) }}"
                   class="block text-center text-sm bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700 transition">
                    Lihat Tiket
                </a>
            </div>
        </div>

        @empty
        <p class="col-span-4 text-center text-slate-400 text-sm py-12">
            Belum ada event tersedia.
        </p>
        @endforelse
    </div>

    {{-- FOOTER --}}
    
    <footer class="bg-slate-800 text-white text-center py-6">
        <p class="font-bold text-lg mb-1">STEVENtix</p>
        <p class="text-sm text-slate-400 mb-3">Platform tiket event terbaik untuk mempermudah pemesanan tiket secara online.</p>
        <hr class="border-slate-600 w-1/3 mx-auto mb-3">
        <p class="text-xs text-slate-500">© {{ date('Y') }} STEVENtix</p>
        
    </footer>

    <script>
    function searchEvent() {
        const input = document.getElementById('search').value.toLowerCase();
        document.querySelectorAll('.event-card').forEach(card => {
            card.style.display = card.getAttribute('data-search').includes(input) ? 'block' : 'none';
        });
    }

    function filterEvent(kategori, btn) {
        document.querySelectorAll('.filter-btn').forEach(b => {
            b.classList.remove('bg-indigo-600', 'text-white', 'border-transparent');
            b.classList.add('bg-white', 'text-slate-600', 'border-slate-200');
        });
        btn.classList.add('bg-indigo-600', 'text-white', 'border-transparent');
        btn.classList.remove('bg-white', 'text-slate-600', 'border-slate-200');

        document.querySelectorAll('.event-card').forEach(card => {
            card.style.display =
                (kategori === 'semua' || card.getAttribute('data-kategori') === kategori)
                ? 'block' : 'none';
        });
    }
    </script>

</body>
</html>