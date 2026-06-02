@extends('layouts.app')

@section('title', 'Kelola Event')

@section('sidebar')
    <a href="{{ route('dashboard_organizer') }}"
       class="block px-4 py-2.5 rounded-lg text-sm text-slate-300 hover:bg-slate-700 hover:text-white">
        Dashboard
    </a>

    <a href="{{ route('manajemen') }}"
       class="block px-4 py-2.5 rounded-lg text-sm transition bg-indigo-600 text-white font-medium">
        Kelola Event
    </a>

    <a href="{{ route('tiket') }}"
       class="block px-4 py-2.5 rounded-lg text-sm text-slate-300 hover:bg-slate-700 hover:text-white">
        Tiket
    </a>

    <a href="{{ route('transaksi') }}"
       class="block px-4 py-2.5 rounded-lg text-sm text-slate-300 hover:bg-slate-700 hover:text-white">
        Transaksi
    </a>
@endsection

@section('content')

<div class="mb-6 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-semibold">Kelola Event</h1>
        <p class="text-sm text-slate-500 mt-1">
            Kelola event yang telah dibuat
        </p>
    </div>

    <button onclick="toggleForm()"
        class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-sm">
        + Tambah Event
    </button>
</div>

@if(session('success'))
<div class="mb-4 bg-green-100 text-green-700 px-4 py-3 rounded-lg">
    {{ session('success') }}
</div>
@endif

<!-- TABEL EVENT -->
<div class="bg-white rounded-xl border border-slate-100 p-5">

    <div class="pb-3 mb-4 border-b border-slate-100">
        <p class="text-xs uppercase tracking-wide text-slate-400">
            Data Event
        </p>
    </div>

    <table class="w-full">

        <thead>
            <tr class="border-b border-slate-100 text-sm text-slate-500">
                <th class="text-left py-3">No</th>
                <th class="text-left py-3">Nama Event</th>
                <th class="text-left py-3">Tanggal</th>
                <th class="text-left py-3">Lokasi</th>
                <th class="text-left py-3">Tiket</th>
                <th class="text-left py-3">Aksi</th>
            </tr>
        </thead>

        <tbody>

        @forelse($events as $i => $event)

            <tr class="border-b border-slate-50">

                <td class="py-3">{{ $i + 1 }}</td>

                <td class="py-3 font-medium">
                    {{ $event->nama_event }}
                </td>

                <td class="py-3">
                    {{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}
                </td>

                <td class="py-3">
                    {{ $event->lokasi }}
                </td>

                <td class="py-3">
                    {{ $event->tikets->count() }} Jenis
                </td>

                <td class="py-3 flex gap-2">

                    <button
                        class="bg-indigo-100 text-indigo-700 px-3 py-1 rounded-full text-xs">
                        Edit
                    </button>

                    <form action="{{ route('events.destroy', $event->id_event) }}"
                          method="POST">
                        @csrf
                        @method('DELETE')

                        <button
                            onclick="return confirm('Hapus event ini?')"
                            class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs">
                            Hapus
                        </button>
                    </form>

                </td>

            </tr>

        @empty

            <tr>
                <td colspan="6" class="text-center py-6 text-slate-400">
                    Belum ada event
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

</div>

<!-- FORM TAMBAH EVENT -->
<div id="formBox"
     class="hidden mt-6 bg-white rounded-xl border border-slate-100 p-5">

    <div class="pb-3 mb-4 border-b border-slate-100">
        <p class="text-xs uppercase tracking-wide text-slate-400">
            Form Tambah Event
        </p>
    </div>

    <form action="{{ route('events.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="space-y-4">

            <div>
                <label class="block text-sm mb-2">Nama Event</label>
                <input type="text"
                       name="nama_event"
                       class="w-full border border-slate-200 rounded-lg px-3 py-2"
                       required>
            </div>

            <div>
                <label class="block text-sm mb-2">Deskripsi</label>
                <textarea name="deskripsi"
                          rows="4"
                          class="w-full border border-slate-200 rounded-lg px-3 py-2"
                          required></textarea>
            </div>

            <div>
                <label class="block text-sm mb-2">Poster Event</label>
                <input type="file"
                       name="gambar"
                       class="w-full border border-slate-200 rounded-lg px-3 py-2">
            </div>

            <div>
                <label class="block text-sm mb-2">Lokasi</label>
                <input type="text"
                       name="lokasi"
                       class="w-full border border-slate-200 rounded-lg px-3 py-2"
                       required>
            </div>

            <div>
                <label class="block text-sm mb-2">Tanggal Event</label>
                <input type="date"
                       name="tanggal"
                       class="w-full border border-slate-200 rounded-lg px-3 py-2"
                       required>
            </div>

            <!-- Tiket -->
            <div>
                <label class="block text-sm mb-2">Tiket</label>

                <div id="tiketContainer" class="space-y-2">

                    <div class="grid grid-cols-3 gap-2">
                        <input type="text"
                               name="tiket[0][nama_tiket]"
                               placeholder="Nama tiket"
                               class="border border-slate-200 rounded-lg px-3 py-2">

                        <input type="number"
                               name="tiket[0][harga]"
                               placeholder="Harga"
                               class="border border-slate-200 rounded-lg px-3 py-2">

                        <input type="number"
                               name="tiket[0][kuota]"
                               placeholder="Kuota"
                               class="border border-slate-200 rounded-lg px-3 py-2">
                    </div>

                </div>

                <button type="button"
                        onclick="addTiket()"
                        class="mt-3 bg-green-100 text-green-700 px-3 py-2 rounded-lg text-sm">
                    + Tambah Jenis Tiket
                </button>

            </div>

        </div>

        <button type="submit"
                class="mt-5 bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg">
            Simpan Event
        </button>

    </form>

</div>

<script>
let tiketCount = 1;

function toggleForm() {
    document.getElementById('formBox').classList.toggle('hidden');
}

function addTiket() {

    const container = document.getElementById('tiketContainer');

    container.insertAdjacentHTML('beforeend', `
        <div class="grid grid-cols-4 gap-2 mt-2">
            <input type="text"
                name="tiket[${tiketCount}][nama_tiket]"
                placeholder="Nama tiket"
                class="border border-slate-200 rounded-lg px-3 py-2">

            <input type="number"
                name="tiket[${tiketCount}][harga]"
                placeholder="Harga"
                class="border border-slate-200 rounded-lg px-3 py-2">

            <input type="number"
                name="tiket[${tiketCount}][kuota]"
                placeholder="Kuota"
                class="border border-slate-200 rounded-lg px-3 py-2">

            <button type="button"
                onclick="this.parentElement.remove()"
                class="bg-red-100 text-red-700 rounded-lg">
                Hapus
            </button>
        </div>
    `);

    tiketCount++;
}
</script>

@endsection