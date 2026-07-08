<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Admin</title>

    <link rel="icon" type="image/png" href="{{ asset('images/logofavicon22.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body{
            font-family:'Poppins',sans-serif;
        }
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
                class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800 text-slate-300">
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

            <a href="{{ route('admin.laporan') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-lg bg-blue-600 text-white">
                Laporan
            </a>

        </nav>

        <div class="p-4 border-t border-slate-800">
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
                    Laporan Event
                </h1>

                <p class="text-slate-500 mt-1">
                    Rekap seluruh data event pada platform.
                </p>

            </div>

            <button
                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg font-semibold">

                Export PDF

            </button>

        </div>

        <!-- Filter -->
        <form method="GET" action="{{ route('admin.laporan') }}"
            class="bg-white rounded-xl border p-5 mb-6">

            <div class="flex flex-wrap gap-4">

                <input
                    type="date"
                    name="tanggal"
                    value="{{ request('tanggal') }}"
                    class="border rounded-lg px-4 py-2">

                <select
                    name="status"
                    class="border rounded-lg px-4 py-2">

                    <option value="">Semua Status</option>

                    <option value="Approved"
                        {{ request('status')=='Approved'?'selected':'' }}>
                        Approved
                    </option>

                    <option value="Pending"
                        {{ request('status')=='Pending'?'selected':'' }}>
                        Pending
                    </option>

                    <option value="Rejected"
                        {{ request('status')=='Rejected'?'selected':'' }}>
                        Rejected
                    </option>

                </select>

                <button
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 rounded-lg">

                    Tampilkan

                </button>

            </div>

        </form>

        <!-- Tabel -->
        <div class="bg-white rounded-xl border overflow-hidden">

            <div class="p-5 border-b">

                <h2 class="font-semibold text-lg">
                    Data Event
                </h2>

            </div>

            <table class="w-full">

                <thead class="bg-slate-50">

                <tr>

                <th class="p-4 text-left">No</th>

                <th class="p-4 text-left">Nama Event</th>

                <th class="p-4 text-left">Kategori</th>

                <th class="p-4 text-left">Organizer</th>

                <th class="p-4 text-left">Tanggal</th>

                <th class="p-4 text-left">Kuota</th>

                <th class="p-4 text-left">Status</th>

                </tr>

                </thead>

                <tbody>

                @forelse($events as $event)

                <tr class="border-t hover:bg-slate-50">

                <td class="p-4">
                {{ $loop->iteration }}
                </td>

                <td class="p-4 font-medium">
                {{ $event->nama_event }}
                </td>

                <td class="p-4">
                {{ $event->kategori->nama_kategori ?? '-' }}
                </td>

                <td class="p-4">
                {{ $event->organizer->nama_organizer ?? '-' }}
                </td>

                <td class="p-4">
                {{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}
                </td>

                <td class="p-4">
                {{ $event->tikets->sum('kuota') }}
                </td>

                <td class="p-4">

               @if($event->status == 'approved')

                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">
                    Approved
                </span>

            @elseif($event->status == 'pending')

                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs">
                    Pending
                </span>

            @elseif($event->status == 'rejected')

                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs">
                    Rejected
                </span>

            @endif

                </td>

                </tr>

                @empty

                <tr>

                <td colspan="7" class="text-center py-8 text-slate-500">

                Belum ada data event.

                </td>

                </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </main>

</div>

</body>
</html>