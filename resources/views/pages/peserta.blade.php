<!DOCTYPE html>
<html>
<head>
    <title>Data Peserta</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">

<div class="max-w-3xl mx-auto">

    {{-- FORM INPUT --}}
    <div class="bg-white rounded-xl shadow p-6 mb-8">
        <h1 class="text-2xl font-bold text-indigo-700 mb-4">🎟️ Input Peserta</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('peserta.simpan') }}">
            @csrf
            <table class="w-full">
                <tr>
                    <td class="py-2 font-semibold w-1/3">ID User</td>
                    <td>
                        <input type="number" name="id_user"
                            class="border rounded px-3 py-1 w-full" required>
                    </td>
                </tr>
                <tr>
                    <td class="py-2 font-semibold">Metode Pembayaran</td>
                    <td>
                        <select name="metode_pembayaran" class="border rounded px-3 py-1 w-full">
                            <option value="transfer">Transfer Bank</option>
                            <option value="cash">Cash</option>
                            <option value="ewallet">E-Wallet</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="py-2 font-semibold">Total Harga</td>
                    <td>
                        <input type="number" name="total_harga"
                            class="border rounded px-3 py-1 w-full" required>
                    </td>
                </tr>
                <tr>
                    <td class="py-2 font-semibold">Tanggal Transaksi</td>
                    <td>
                        <input type="date" name="tanggal_transaksi"
                            class="border rounded px-3 py-1 w-full" required>
                    </td>
                </tr>
                <tr>
                    <td class="py-2 font-semibold">Status</td>
                    <td>
                        <select name="status" class="border rounded px-3 py-1 w-full">
                            <option value="pending">Pending</option>
                            <option value="dibayar">Dibayar</option>
                            <option value="dibatalkan">Dibatalkan</option>
                        </select>
                    </td>
                </tr>
            </table>
            <button type="submit"
                class="mt-4 bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">
                Simpan
            </button>
        </form>
    </div>

    {{-- TABEL DAFTAR PESERTA --}}
    <div class="bg-white rounded-xl shadow p-6">
        <h2 class="text-xl font-bold text-gray-700 mb-4">📋 Daftar Peserta</h2>
        <table class="w-full text-sm border">
            <thead class="bg-indigo-600 text-white">
                <tr>
                    <th class="p-2">No</th>
                    <th class="p-2">ID User</th>
                    <th class="p-2">Metode Bayar</th>
                    <th class="p-2">Total Harga</th>