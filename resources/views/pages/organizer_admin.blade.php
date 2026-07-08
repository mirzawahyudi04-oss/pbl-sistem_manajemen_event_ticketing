<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organizer - Admin</title>

    <link rel="icon" type="image/png" href="{{ asset('images/logofavicon22.png') }}">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
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
               class="flex items-center gap-3 px-4 py-3 rounded-lg bg-blue-600 text-white">
                Organizer
            </a>

            <a href="{{ route('admin.peserta') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800 text-slate-300">
                Peserta
            </a>

            <a href="{{ route('admin.laporan') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800 text-slate-300">
                Laporan
            </a>

        </nav>

        <div class="p-4 border-t border-slate-800">
            <a href="{{ route('admin.login.form') }}"
               class="text-red-400 hover:text-red-300 px-4 py-3 flex items-center gap-3">
                Logout
            </a>
        </div>

    </aside>

    <!-- Main -->
    <main class="ml-64 flex-1 p-8">

        <!-- Header -->
        <div class="flex justify-between items-center mb-8">

            <div>
                <h1 class="text-3xl font-bold text-slate-800">
                    Kelola Organizer
                </h1>

                <p class="text-slate-500 mt-1">
                    Daftar semua organizer yang terdaftar di platform
                </p>
            </div>

            <div class="bg-white px-4 py-2 rounded-xl shadow-sm border">
                Admin
            </div>

        </div>

        <!-- Card -->
        <div class="bg-white rounded-xl shadow-sm border">

            <div class="p-6 border-b flex justify-between items-center">

                <h2 class="font-semibold text-lg text-slate-800">
                    Daftar Organizer
                </h2>

                <div class="flex gap-3">

                    <input
                        type="text"
                        placeholder="Cari nama organizer..."
                        class="border border-slate-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-blue-500">

                    <select
                        class="border border-slate-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-blue-500">
                        <option>Semua Status</option>
                        <option>Aktif</option>
                        <option>Nonaktif</option>
                    </select>

                </div>

            </div>

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead class="bg-slate-50">
                        <tr>
                            <th class="text-left p-4">ID</th>
                            <th class="text-left p-4">Nama Organizer</th>
                            <th class="text-left p-4">Kontak</th>
                            <th class="text-left p-4">Status</th>
                            <th class="text-left p-4">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($organizers as $organizer)

                        <tr class="border-t hover:bg-slate-50">

                            <td class="p-4">
                                {{ $organizer->id_organizer }}
                            </td>

                            <td class="p-4 font-medium">
                                {{ $organizer->nama_organizer }}
                            </td>

                            <td class="p-4">
                                {{ $organizer->kontak }}
                            </td>

                            <td class="p-4">

                                @if($organizer->status == 'Aktif')

                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                                        Aktif
                                    </span>

                                @else

                                    <span class="bg-slate-100 text-slate-500 px-3 py-1 rounded-full text-xs font-semibold">
                                        Nonaktif
                                    </span>

                                @endif

                            </td>

                            <td class="p-4">

                                <div class="flex gap-2">

                                    <a href="{{ route('admin.organizer.edit', $organizer->id_organizer) }}"
                                       class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-semibold px-3 py-2 rounded-lg">
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('admin.organizer.destroy', $organizer->id_organizer) }}"
                                        method="POST"
                                        class="delete-form">

                                        @csrf
                                        @method('DELETE')

                                        <form action="{{ route('admin.organizer.destroy', $organizer->id_organizer) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus organizer ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="bg-red-100 hover:bg-red-200 text-red-600 text-xs font-semibold px-3 py-2 rounded-lg">
                                            Hapus
                                        </button>

                                    </form>

                                    </form>

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

<!-- SweetAlert Delete -->
<script>
document.querySelectorAll('.delete-form').forEach(form => {

    form.addEventListener('submit', function (e) {

        e.preventDefault();

        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: 'Akun organizer yang dihapus tidak dapat dikembalikan!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, Hapus',
            cancelButtonText: 'Batal',
            confirmButtonColor: '#dc2626',
            cancelButtonColor: '#2563eb',
            reverseButtons: true
        }).then((result) => {

            if (result.isConfirmed) {
                form.submit();
            }

        });

    });

});
</script>

</body>
</html>