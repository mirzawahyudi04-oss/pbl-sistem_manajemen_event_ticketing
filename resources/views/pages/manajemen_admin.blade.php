<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Event - Admin</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logofavicon22.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-slate-100">

<div class="flex">

    <!-- Sidebar -->
    <aside class="fixed left-0 top-0 h-screen w-64 bg-slate-900 text-white flex flex-col">
        <div class="p-6 border-b border-slate-800">
            <h2 class="text-2xl font-bold">EventHub</h2>
            <p class="text-sm text-slate-400">Admin Dashboard</p>
        </div>
        <nav class="p-4 space-y-2 flex-1">
            <a href="{{ route('dashboard_admin') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800 text-slate-300">
                Dashboard
            </a>
            <a href="{{ route('admin.manajemen') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg bg-blue-600 text-white">
                Manajemen Event
            </a>
            <a href="{{ route('admin.organizer') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800 text-slate-300">
                Organizer
            </a>
            <a href="{{ route('admin.peserta') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800 text-slate-300">
                Peserta
            </a>
            <a href="{{ route('admin.tiket') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800 text-slate-300">
                Tiket
            </a>
            <a href="{{ route('admin.laporan') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800 text-slate-300">
                Laporan
            </a>
        </nav>
        <div class="p-4 border-t border-slate-800">
            <a href="{{ route('admin.login.form') }}" class="text-red-400 hover:text-red-300 px-4 py-3 flex items-center gap-3">
                Logout
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="ml-64 flex-1 p-8">

        <!-- Header -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-slate-800">Manajemen Event</h1>
                <p class="text-slate-500 mt-1">Kelola semua event yang terdaftar di platform</p>
            </div>
            <div class="bg-white px-4 py-2 rounded-xl shadow-sm border">
                Admin
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white p-6 rounded-xl shadow-sm border">
                <p class="text-slate-500 text-sm">Total Event</p>
                <h2 class="text-3xl font-bold mt-2">{{ $events->count() }}</h2>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border">
                <p class="text-slate-500 text-sm">Approved</p>
                <h2 class="text-3xl font-bold mt-2 text-green-600">{{ $events->where('status','approved')->count() }}</h2>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border">
                <p class="text-slate-500 text-sm">Pending</p>
                <h2 class="text-3xl font-bold mt-2 text-yellow-500">{{ $events->where('status','pending')->count() }}</h2>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border">
                <p class="text-slate-500 text-sm">Rejected</p>
                <h2 class="text-3xl font-bold mt-2 text-red-500">{{ $events->where('status','rejected')->count() }}</h2>
            </div>
        </div>

        <!-- Table Card -->
        <div class="bg-white rounded-xl shadow-sm border">

            <div class="p-6 border-b flex justify-between items-center">
                <h2 class="font-semibold text-lg text-slate-800">Daftar Event</h2>
                <div class="flex gap-3">
                    <input type="text" placeholder="Cari nama event..."
                        class="border border-slate-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-blue-500">
                    <select class="border border-slate-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-blue-500">
                        <option>Semua Status</option>
                        <option>Approved</option>
                        <option>Pending</option>
                        <option>Rejected</option>
                    </select>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="text-left p-4 text-slate-500 text-sm font-semibold w-12">#</th>
                            <th class="text-left p-4 text-slate-500 text-sm font-semibold">Nama Event</th>
                            <th class="text-left p-4 text-slate-500 text-sm font-semibold">Organizer</th>
                            <th class="text-left p-4 text-slate-500 text-sm font-semibold w-32">Status</th>
                            <th class="text-left p-4 text-slate-500 text-sm font-semibold w-48">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $i => $event)
                        <tr class="border-t hover:bg-slate-50">

                            <td class="p-4 text-slate-400 text-sm">{{ $i + 1 }}</td>

                            <td class="p-4">
                                <p class="font-semibold text-slate-800">{{ $event->nama_event }}</p>
                                <p class="text-xs text-slate-400 mt-0.5">{{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}</p>
                            </td>

                            <td class="p-4 text-slate-600 text-sm">{{ $event->organizer->nama_organizer }}</td>

                            <td class="p-4">
                                @if($event->status == 'approved')
                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">Approved</span>
                                @elseif($event->status == 'pending')
                                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold">Pending</span>
                                @else
                                    <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">Rejected</span>
                                @endif
                            </td>

                            <td class="p-4">
                                <div class="flex gap-2 items-center">
                                    {{-- Tombol Detail --}}
                                    <button
                                        onclick="openModal(
                                            '{{ addslashes($event->nama_event) }}',
                                            '{{ addslashes($event->organizer->nama_organizer) }}',
                                            '{{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}',
                                            '{{ addslashes($event->lokasi ?? '-') }}',
                                            '{{ addslashes($event->deskripsi ?? '-') }}',
                                            '{{ $event->tikets->sum('kuota') }}',
                                            '{{ $event->status }}',
                                            '{{ $event->id_event }}',
                                            '{{ $event->poster ?? '' }}'
                                        )"
                                        class="bg-blue-50 hover:bg-blue-100 text-blue-600 text-xs font-semibold px-3 py-2 rounded-lg transition">
                                        Lihat Detail
                                    </button>

                                    @if($event->status == 'pending')
                                        <form action="{{ route('admin.event.approve', $event->id_event) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit"
                                                class="bg-green-500 hover:bg-green-600 text-white text-xs font-semibold px-3 py-2 rounded-lg transition">
                                                Approve
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.event.reject', $event->id_event) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit"
                                                class="bg-red-500 hover:bg-red-600 text-white text-xs font-semibold px-3 py-2 rounded-lg transition">
                                                Tolak
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </main>
</div>


<!-- ===================== MODAL DETAIL EVENT ===================== -->
<div id="modalDetail"
     class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm p-4">

    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto">

        <!-- Modal Header -->
        <div class="flex justify-between items-center p-6 border-b">
            <div>
                <h2 class="text-xl font-bold text-slate-800">Detail Event</h2>
                <p class="text-sm text-slate-500 mt-0.5">Informasi lengkap sebelum mengambil keputusan</p>
            </div>
            <button onclick="closeModal()"
                class="w-9 h-9 flex items-center justify-center rounded-full bg-slate-100 hover:bg-slate-200 text-slate-500 text-lg font-bold transition">
                ✕
            </button>
        </div>

        <!-- Modal Body -->
        <div class="p-6 space-y-6">

            <!-- Poster (jika ada) -->
            <div id="modalPosterWrap" class="hidden">
                <img id="modalPoster" src="" alt="Poster Event"
                    class="w-full h-52 object-cover rounded-xl border border-slate-200">
            </div>

            <!-- Info Grid -->
            <div class="grid grid-cols-2 gap-4">

                <div class="bg-slate-50 rounded-xl p-4">
                    <p class="text-xs text-slate-400 font-semibold uppercase tracking-wide mb-1">Nama Event</p>
                    <p id="modalNama" class="text-slate-800 font-semibold text-sm"></p>
                </div>

                <div class="bg-slate-50 rounded-xl p-4">
                    <p class="text-xs text-slate-400 font-semibold uppercase tracking-wide mb-1">Organizer</p>
                    <p id="modalOrganizer" class="text-slate-800 font-semibold text-sm"></p>
                </div>

                <div class="bg-slate-50 rounded-xl p-4">
                    <p class="text-xs text-slate-400 font-semibold uppercase tracking-wide mb-1">Tanggal</p>
                    <p id="modalTanggal" class="text-slate-800 font-semibold text-sm"></p>
                </div>

                <div class="bg-slate-50 rounded-xl p-4">
                    <p class="text-xs text-slate-400 font-semibold uppercase tracking-wide mb-1">Lokasi</p>
                    <p id="modalLokasi" class="text-slate-800 font-semibold text-sm"></p>
                </div>

                <div class="bg-slate-50 rounded-xl p-4">
                    <p class="text-xs text-slate-400 font-semibold uppercase tracking-wide mb-1">Kuota Tiket</p>
                    <p id="modalKuota" class="text-slate-800 font-semibold text-sm"></p>
                </div>

                <div class="bg-slate-50 rounded-xl p-4">
                    <p class="text-xs text-slate-400 font-semibold uppercase tracking-wide mb-1">Status</p>
                    <div id="modalStatus"></div>
                </div>

            </div>

            <!-- Deskripsi -->
            <div class="bg-slate-50 rounded-xl p-4">
                <p class="text-xs text-slate-400 font-semibold uppercase tracking-wide mb-2">Deskripsi Event</p>
                <p id="modalDeskripsi" class="text-slate-700 text-sm leading-relaxed"></p>
            </div>

        </div>

        <!-- Modal Footer -->
        <div id="modalFooter" class="p-6 border-t flex gap-3 justify-end">
            <!-- Tombol Approve & Tolak diisi lewat JS kalau status pending -->
        </div>

    </div>
</div>
<!-- ============================================================== -->


<script>
    function openModal(nama, organizer, tanggal, lokasi, deskripsi, kuota, status, idEvent, poster) {

        // Isi konten
        document.getElementById('modalNama').textContent      = nama;
        document.getElementById('modalOrganizer').textContent = organizer;
        document.getElementById('modalTanggal').textContent   = tanggal;
        document.getElementById('modalLokasi').textContent    = lokasi;
        document.getElementById('modalDeskripsi').textContent = deskripsi;
        document.getElementById('modalKuota').textContent     = kuota + ' tiket';

        // Badge status
        const statusMap = {
            'approved': '<span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">Approved</span>',
            'pending':  '<span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold">Pending</span>',
            'rejected': '<span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">Rejected</span>',
        };
        document.getElementById('modalStatus').innerHTML = statusMap[status] ?? status;

        // Poster
        const posterWrap = document.getElementById('modalPosterWrap');
        if (poster && poster.trim() !== '') {
            document.getElementById('modalPoster').src = '/storage/' + poster;
            posterWrap.classList.remove('hidden');
        } else {
            posterWrap.classList.add('hidden');
        }

        // Footer: tampilkan tombol Approve & Tolak hanya jika pending
        const footer = document.getElementById('modalFooter');
        if (status === 'pending') {
            footer.innerHTML = `
                <button onclick="closeModal()" class="px-4 py-2 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-600 text-sm font-semibold transition">
                    Tutup
                </button>
                <form action="/admin/event/${idEvent}/reject" method="POST" style="display:inline;">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="PUT">
                    <button type="submit" class="px-4 py-2 rounded-lg bg-red-500 hover:bg-red-600 text-white text-sm font-semibold transition">
                        Tolak Event
                    </button>
                </form>
                <form action="/admin/event/${idEvent}/approve" method="POST" style="display:inline;">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="PUT">
                    <button type="submit" class="px-4 py-2 rounded-lg bg-green-500 hover:bg-green-600 text-white text-sm font-semibold transition">
                        Approve Event
                    </button>
                </form>
            `;
        } else {
            footer.innerHTML = `
                <button onclick="closeModal()" class="px-4 py-2 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-600 text-sm font-semibold transition">
                    Tutup
                </button>
            `;
        }

        // Tampilkan modal
        const modal = document.getElementById('modalDetail');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        const modal = document.getElementById('modalDetail');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = '';
    }

    // Tutup modal kalau klik di luar kotak
    document.getElementById('modalDetail').addEventListener('click', function(e) {
        if (e.target === this) closeModal();
    });
</script>

</body>
</html>