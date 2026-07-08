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
            <a href="{{ route('admin.login.form') }}" class="text-red-400 hover:text-red-300 px-4 py-3 flex items-center gap-3">
                Logout
            </a>
        </div>
    </aside>
    </aside>

<main class="ml-64 flex-1 p-8">
<div class="flex justify-between items-center mb-8">

    <div>
        <h1 class="text-3xl font-bold text-slate-800">
            Laporan Platform
        </h1>

        <p class="text-slate-500 mt-1">
            Ringkasan aktivitas seluruh event dan transaksi.
        </p>
    </div>

    <button
        class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg font-semibold">

        Export PDF

    </button>

</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

    <div class="bg-white rounded-xl border p-6">
        <p class="text-slate-500 text-sm">Total Event</p>
        <h2 class="text-3xl font-bold mt-2">42</h2>
    </div>

    <div class="bg-white rounded-xl border p-6">
        <p class="text-slate-500 text-sm">Organizer</p>
        <h2 class="text-3xl font-bold mt-2">15</h2>
    </div>

    <div class="bg-white rounded-xl border p-6">
        <p class="text-slate-500 text-sm">Peserta</p>
        <h2 class="text-3xl font-bold mt-2">738</h2>
    </div>

    <div class="bg-white rounded-xl border p-6">
        <p class="text-slate-500 text-sm">Pendapatan</p>
        <h2 class="text-3xl font-bold mt-2 text-green-600">
            Rp 148.500.000
        </h2>
    </div>

</div>
<div class="bg-white rounded-xl border p-6 mb-6">

    <div class="flex flex-wrap gap-4">


        <input
            type="date"
            class="border rounded-lg px-4 py-2">

        <select class="border rounded-lg px-4 py-2">

            <option>Semua Status</option>
            <option>Approved</option>
            <option>Pending</option>
            <option>Rejected</option>

        </select>

        <button
            class="bg-blue-600 text-white px-5 rounded-lg">

            Filter

        </button>

    </div>

</div>
<div class="bg-white rounded-xl border overflow-hidden">

<div class="p-5 border-b">

<h2 class="font-semibold text-lg">

Laporan Event

</h2>

</div>

<table class="w-full">

<thead class="bg-slate-50">

<tr>

<th class="p-4 text-left">No</th>
<th class="p-4 text-left">Nama Event</th>
<th class="p-4 text-left">Organizer</th>
<th class="p-4 text-left">Tiket Terjual</th>
<th class="p-4 text-left">Pendapatan</th>
<th class="p-4 text-left">Status</th>

</tr>

</thead>

<tbody>

<tr class="border-t">

<td class="p-4">1</td>
<td class="p-4">Coldplay World Tour</td>
<td class="p-4">Steven Organizer</td>
<td class="p-4">520</td>
<td class="p-4">Rp52.000.000</td>

<td class="p-4">

<span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">

Approved

</span>

</td>

</tr>

<tr class="border-t">

<td class="p-4">2</td>
<td class="p-4">Festival Musik Batam</td>
<td class="p-4">Batam EO</td>
<td class="p-4">320</td>
<td class="p-4">Rp24.000.000</td>

<td class="p-4">

<span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs">

Pending

</span>

</td>

</tr>

<tr class="border-t">

<td class="p-4">3</td>
<td class="p-4">Fun Run Batam</td>
<td class="p-4">Run Indonesia</td>
<td class="p-4">870</td>
<td class="p-4">Rp72.500.000</td>

<td class="p-4">

<span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">

Approved

</span>

</td>

</tr>

</tbody>

</table>

</div>
<div class="grid md:grid-cols-3 gap-6 mt-8">

<div class="bg-white border rounded-xl p-6">

<h3 class="font-semibold">

Event Terlaris

</h3>

<p class="mt-3 text-slate-600">

Coldplay World Tour

</p>

<p class="text-2xl font-bold mt-2">

520 Tiket

</p>

</div>

<div class="bg-white border rounded-xl p-6">

<h3 class="font-semibold">

Organizer Terbaik

</h3>

<p class="mt-3 text-slate-600">

Steven Organizer

</p>

<p class="text-2xl font-bold mt-2">

5 Event

</p>

</div>

<div class="bg-white border rounded-xl p-6">

<h3 class="font-semibold">

Pendapatan Bulan Ini

</h3>

<p class="text-2xl font-bold mt-3 text-green-600">

Rp148.500.000

</p>

</div>
</main>
</div>

</div>
</body>
</html>
