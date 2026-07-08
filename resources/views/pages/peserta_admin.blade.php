<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Peserta - Admin</title>

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

    <!-- ================= Sidebar ================= -->

    <aside class="fixed left-0 top-0 w-64 h-screen bg-slate-900 text-white flex flex-col">

        <div class="p-6 border-b border-slate-800">

            <h2 class="text-2xl font-bold">
                EventHub
            </h2>

            <p class="text-sm text-slate-400">
                Admin Dashboard
            </p>

        </div>

        <nav class="flex-1 p-4 space-y-2">

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
               class="flex items-center gap-3 px-4 py-3 rounded-lg bg-blue-600 text-white">

                Peserta

            </a>

            <a href="{{ route('admin.laporan') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800 text-slate-300">

                Laporan

            </a>

        </nav>

        <div class="border-t border-slate-800 p-4">

            <a href="{{ route('admin.login.form') }}"
               class="flex items-center gap-3 px-4 py-3 text-red-400 hover:text-red-300">

                Logout

            </a>

        </div>

    </aside>

    <!-- ================= Main ================= -->

    <main class="ml-64 flex-1 p-8">

        <!-- Header -->

        <div class="flex justify-between items-center mb-8">

            <div>

                <h1 class="text-3xl font-bold text-slate-800">
                    Kelola Peserta
                </h1>

                <p class="text-slate-500 mt-2">
                    Daftar seluruh buyer yang telah terdaftar pada sistem.
                </p>

            </div>

        </div>

        <!-- Card -->

        <div class="bg-white rounded-xl shadow-sm border border-slate-200">

            <!-- Card Header -->

            <div class="flex justify-between items-center p-6 border-b">

                <h2 class="text-lg font-semibold text-slate-800">
                    Daftar Peserta
                </h2>

                <form method="GET" action="{{ route('admin.peserta') }}">

    <input
        type="text"
        name="search"
        value="{{ request('search') }}"
        placeholder="Cari nama atau email..."
        class="border border-slate-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-blue-500">

</form>
            </div>

            <!-- Table -->

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead class="bg-slate-50">

                        <tr>

                            <th class="p-4 text-left text-sm font-semibold text-slate-500">
                                No
                            </th>

                            <th class="p-4 text-left text-sm font-semibold text-slate-500">
                                Nama
                            </th>

                            <th class="p-4 text-left text-sm font-semibold text-slate-500">
                                Email
                            </th>

                            <th class="p-4 text-left text-sm font-semibold text-slate-500">
                                No Handphone
                            </th>

                            <th class="p-4 text-center text-sm font-semibold text-slate-500">
                                Total Tiket
                            </th>

                            <th class="p-4 text-center text-sm font-semibold text-slate-500">
                                Terdaftar
                            </th>

                            <th class="p-4 text-center text-sm font-semibold text-slate-500">
                                Status
                            </th>

                            <th class="p-4 text-center text-sm font-semibold text-slate-500">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody>
@forelse($pesertas as $peserta)

<tr class="border-t hover:bg-slate-50">

    <td class="p-4 text-slate-600">
        {{ $loop->iteration }}
    </td>

    <td class="p-4">

        <div class="flex items-center gap-3">

            <div class="w-9 h-9 bg-blue-100 text-blue-700 rounded-full flex items-center justify-center font-bold">

    {{ strtoupper(substr($peserta->name,0,1)) }}

</div>

            <div>

                <p class="font-semibold text-slate-800">
                    {{ $peserta->name }}
                </p>

            </div>

        </div>

    </td>

    <td class="p-4 text-slate-600">

        {{ $peserta->email }}

    </td>

    <td class="p-4 text-slate-600">

        {{ $peserta->no_handphone ?? '-' }}

    </td>

    <td class="p-4 text-center font-semibold text-slate-700">

        {{ $peserta->transactions_sum_qty ?? 0 }}

    </td>

    <td class="p-4 text-center text-slate-600">

        {{ $peserta->created_at->format('d M Y') }}

    </td>

    <td class="p-4 text-center">

        @if($peserta->status == 'aktif')

            <span class="inline-flex items-center px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold">

                ● Aktif

            </span>

        @else

            <span class="inline-flex items-center px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-semibold">

                ● Nonaktif

            </span>

        @endif

    </td>

    <td class="p-4 text-center">

        @if($peserta->status == 'aktif')

            <form action="{{ route('admin.peserta.blokir',$peserta->id) }}"
      method="POST"
      onsubmit="return confirm('Yakin ingin memblokir peserta ini?')">

    @csrf
    @method('PUT')

    <button
        class="px-4 py-2 bg-red-100 hover:bg-red-200 text-red-600 rounded-lg text-xs font-semibold">
        Blokir
    </button>

</form>

        @else

            <form action="{{ route('admin.peserta.aktifkan',$peserta->id) }}"
      method="POST">

    @csrf
    @method('PUT')

    <button
        class="px-4 py-2 bg-green-100 hover:bg-green-200 text-green-700 rounded-lg text-xs font-semibold">

        Aktifkan

    </button>

</form>

        @endif

    </td>

</tr>

@empty

<tr>

    <td colspan="8" class="py-14">

        <div class="flex flex-col items-center justify-center">

            <div class="text-6xl mb-3">

                📭

            </div>

            <h3 class="text-lg font-semibold text-slate-700">

                Belum Ada Peserta

            </h3>

            <p class="text-slate-500 mt-1">

                Saat ini belum ada buyer yang terdaftar.

            </p>

        </div>

    </td>

</tr>

@endforelse

</tbody>

</table>

</div>

</div>

</main>

</div>

</body>

</html>