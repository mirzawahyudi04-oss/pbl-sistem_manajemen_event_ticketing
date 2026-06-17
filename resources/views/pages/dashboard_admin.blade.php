<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

    <link rel="icon" type="image/png" href="{{ asset('images/logofavicon22.png') }}">

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-100">

    <body class="bg-slate-100">

<div class="flex">

    <!-- Sidebar -->
    <aside class="fixed left-0 top-0 h-screen w-64 bg-slate-900 text-white">

        <div class="p-6 border-b border-slate-800">
            <h2 class="text-2xl font-bold"> EventHub</h2>
            <p class="text-sm text-slate-400">Admin Dashboard</p>
        </div>

        <nav class="p-4 space-y-2">

            <a href="{{ route('dashboard_admin') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg bg-blue-600">
                 Dashboard
            </a>

            <a href="{{ route('admin.manajemen') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800">
                 Manajemen Event
            </a>

            <a href="{{ route('admin.organizer') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800">
                Organizer
            </a>

            <a href="{{ route('admin.peserta') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800">
                 Peserta
            </a>

            <a href="{{ route('admin.tiket') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800">
                 Tiket
            </a>

            <a href="{{ route('admin.laporan') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800">
                 Laporan
            </a>

        </nav>

        <div class="absolute bottom-0 w-full p-4 border-t border-slate-800">
            <a href="{{ route('admin.login.form') }}"
               class="text-red-400 hover:text-red-300">
                 Logout
            </a>
        </div>

    </aside>

    <!-- Content -->
    <main class="ml-64 flex-1 p-8">

        <div class="flex justify-between items-center mb-8">

            <div>
                <h1 class="text-3xl font-bold text-slate-800">
                    Dashboard Admin
                </h1>

                <p class="text-slate-500 mt-1">
                    Selamat datang 
                </p>
            </div>

            <div class="bg-white px-4 py-2 rounded-xl shadow-sm border">
                 Admin
            </div>

        </div>

        <!-- Statistik -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

            <div class="bg-white p-6 rounded-xl shadow-sm border">
                <p class="text-slate-500 text-sm">Total Event</p>
                <h2 class="text-3xl font-bold mt-2">
    {{ $totalEvent }}
</h2>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm border">
                <p class="text-slate-500 text-sm">Organizer</p>
                <h2 class="text-3xl font-bold mt-2">
    {{ $totalOrganizer }}
</h2>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm border">
                <p class="text-slate-500 text-sm">Peserta</p>
                <h2 class="text-3xl font-bold mt-2">
    {{ $totalPeserta }}
</h2>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm border">
                <p class="text-slate-500 text-sm">Tiket Terjual</p>
                <h2 class="text-3xl font-bold mt-2">
    {{ $totalKuota }}
</h2>
            </div>

        </div>

        <!-- Event Terbaru -->
        <div class="bg-white rounded-xl shadow-sm border">

            <div class="p-6 border-b flex justify-between items-center">
                <h2 class="font-semibold text-lg">
                    Event Terbaru
                </h2>

                <a href="{{ route('admin.manajemen') }}"
                   class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                    Lihat Semua
                </a>
            </div>

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead class="bg-slate-50">
                        <tr>
                            <th class="text-left p-4">Event</th>
                            <th class="text-left p-4">Organizer</th>
                            <th class="text-left p-4">Tanggal</th>
                            <th class="text-left p-4">Status</th>
                        </tr>
                    </thead>

                    <tbody>

@foreach($eventTerbaru as $event)

<tr class="border-t hover:bg-slate-50">

    <td class="p-4">
        {{ $event->nama_event }}
    </td>

    <td class="p-4">
        {{ $event->organizer->nama_organizer ?? '-' }}
    </td>

    <td class="p-4">
        {{ $event->tanggal }}
    </td>

    <td class="p-4">

        @if($event->status == 'Approved')
            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">
                Aktif
            </span>

        @elseif($event->status == 'Pending')
            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs">
                Pending
            </span>

        @else
            <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs">
                Rejected
            </span>
        @endif

    </td>

</tr>

@endforeach

</tbody>
                </table>

            </div>

        </div>

    </main>

</div>

</body>

</body>

</html>