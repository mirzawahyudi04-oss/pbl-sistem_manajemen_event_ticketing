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

    <a href="{{ route('transaksi') }}"
       class="block px-4 py-2.5 rounded-lg text-sm text-slate-300 hover:bg-slate-700 hover:text-white">
        Transaksi
    </a>

    <a href="{{ route('peserta.index') }}"
       class="block px-4 py-2.5 rounded-lg text-sm text-slate-300 hover:bg-slate-700 hover:text-white">
        Peserta
    </a>

    <a href="{{ route('laporan') }}"
       class="block px-4 py-2.5 rounded-lg text-sm text-slate-300 hover:bg-slate-700 hover:text-white">
        Laporan
    </a>
    <a href="{{ route('profile.organizer') }}"
       class="block px-4 py-2.5 rounded-lg text-sm text-slate-300 hover:bg-slate-700 hover:text-white">
       Profil
    </a>
    
    
@endsection

@section('content')

<div class="mb-6 flex justify-between items-center">
    <div>
        <h1 class="text-2xl font-semibold">Kelola Event</h1>
        <p class="text-sm text-slate-500 mt-1">Kelola event yang telah dibuat</p>
    </div>
    <button onclick="bukaForm('tambah')"
        class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-sm">
        + Tambah Event
    </button>
</div>

@if(session('success'))
    <div class="mb-4 bg-green-100 text-green-700 px-4 py-3 rounded-lg">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="mb-4 bg-red-100 text-red-700 px-4 py-3 rounded-lg text-sm">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

{{-- TABEL EVENT --}}
<div class="bg-white rounded-xl border border-slate-100 p-5">
    <table class="w-full text-sm">
        <thead>
            <tr class="border-b border-slate-100 text-slate-500">
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
                <td class="py-3 font-medium">{{ $event->nama_event }}</td>
                <td class="py-3">{{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}</td>
                <td class="py-3">{{ $event->lokasi }}</td>
                <td class="py-3">{{ $event->tikets->count() }} Jenis</td>
                <td class="py-3 flex gap-2">
                    <button onclick="bukaEdit({{ $event }})"
                            class="bg-indigo-100 text-indigo-700 px-3 py-1 rounded-full text-xs">
                        Edit
                    </button>
                    <form action="{{ route('events.destroy',$event->id_event) }}"
      method="POST">

    @csrf
    @method('DELETE')

    <button
        type="button"
        onclick="showDelete(this)"
        class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs">

        Hapus

    </button>

</form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center py-6 text-slate-400">Belum ada event</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- FORM TAMBAH / EDIT EVENT --}}
<div id="formBox" class="hidden mt-6 bg-white rounded-xl border border-slate-100 p-5">

    <div class="pb-3 mb-4 border-b border-slate-100 flex justify-between items-center">
        <p id="formTitle" class="text-xs uppercase tracking-wide text-slate-400">Form Tambah Event</p>
        <button onclick="tutupForm()" class="text-slate-400 text-xs hover:text-red-500">✕ Tutup</button>
    </div>

    <form id="eventForm" action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div id="methodField"></div>

        <div class="space-y-4">

            <div>
                <label class="block text-sm mb-1">Nama Event</label>
                <input type="text" id="input_nama_event" name="nama_event"
                       class="w-full border border-slate-200 rounded-lg px-3 py-2" required>
            </div>

            <div>
                <label class="block text-sm mb-1">Deskripsi</label>
                <textarea id="input_deskripsi" name="deskripsi" rows="3"
                          class="w-full border border-slate-200 rounded-lg px-3 py-2" required></textarea>
            </div>

            <div>
                <label class="block text-sm mb-1">Poster Event</label>
                <div id="gambarLama" class="hidden mb-2">
                    <img id="previewGambar" src="" class="w-24 h-24 object-cover rounded-lg">
                    <p class="text-xs text-slate-400 mt-1">Kosongkan jika tidak ingin ganti gambar</p>
                </div>
                <input type="file" name="gambar"
                       class="w-full border border-slate-200 rounded-lg px-3 py-2">
            </div>

            <div>
                <label class="block text-sm mb-1">Lokasi</label>
                <input type="text" id="input_lokasi" name="lokasi"
                       class="w-full border border-slate-200 rounded-lg px-3 py-2" required>
            </div>

            <div>
                <label class="block text-sm mb-1">Tanggal Event</label>
                <input type="date" id="input_tanggal" name="tanggal"
                       class="w-full border border-slate-200 rounded-lg px-3 py-2" required>
            </div>
            <div>
    <label class="block text-sm mb-1">Kategori</label>

    <select
        name="id_kategori"
        id="input_kategori"
        class="w-full border border-slate-200 rounded-lg px-3 py-2"
        required>

        <option value="">Pilih kategori</option>

        @foreach($kategori as $k)
            <option value="{{ $k->id_kategori }}">
                {{ $k->nama_kategori }}
            </option>
        @endforeach

    </select>
</div>

            <div>
                <label class="block text-sm mb-1">Jenis Tiket</label>
                <div id="tiketContainer" class="space-y-2">
                    <div class="grid grid-cols-3 gap-2 tiket-row">
                        <input type="text" name="tiket[0][nama_tiket]" placeholder="Nama tiket"
                               class="border border-slate-200 rounded-lg px-3 py-2">
                        <input type="number" name="tiket[0][harga]" placeholder="Harga"
                               class="border border-slate-200 rounded-lg px-3 py-2">
                        <input type="number" name="tiket[0][kuota]" placeholder="Kuota"
                               class="border border-slate-200 rounded-lg px-3 py-2">
                    </div>
                </div>
                <button type="button" onclick="addTiket()"
                        class="mt-2 bg-green-100 text-green-700 px-3 py-2 rounded-lg text-sm">
                    + Tambah Jenis Tiket
                </button>
            </div>

        </div>

        <button type="submit"
                class="mt-5 bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg">
            Simpan
        </button>
    </form>
</div>
<div id="deleteModal"
     class="hidden fixed inset-0 bg-black/40 items-center justify-center z-50">

    <div class="bg-white rounded-lg p-5 w-80">

        <h2 class="text-lg font-semibold mb-2">
            Hapus Event?
        </h2>

        <p class="text-sm text-slate-500 mb-5">
            Event yang dihapus tidak dapat dikembalikan.
        </p>

        <div class="flex justify-end gap-2">

            <button onclick="closeDelete()"
                class="px-4 py-2 border rounded-lg">
                Batal
            </button>

            <button onclick="confirmDelete()"
                class="px-4 py-2 bg-red-600 text-white rounded-lg">
                Hapus
            </button>

        </div>

    </div>

</div>

<script>
let tiketCount = 1;

function bukaForm(mode) {
    // Reset form ke mode tambah
    document.getElementById('formTitle').innerText = 'Form Tambah Event';
    document.getElementById('eventForm').action = '{{ route("events.store") }}';
    document.getElementById('methodField').innerHTML = '';
    document.getElementById('input_nama_event').value = '';
    document.getElementById('input_deskripsi').value = '';
    document.getElementById('input_lokasi').value = '';
    document.getElementById('input_tanggal').value = '';
    document.getElementById('gambarLama').classList.add('hidden');

    // Reset tiket ke 1 baris kosong
    tiketCount = 1;
    document.getElementById('tiketContainer').innerHTML = `
        <div class="grid grid-cols-3 gap-2 tiket-row">
            <input type="text" name="tiket[0][nama_tiket]" placeholder="Nama tiket"
                   class="border border-slate-200 rounded-lg px-3 py-2">
            <input type="number" name="tiket[0][harga]" placeholder="Harga"
                   class="border border-slate-200 rounded-lg px-3 py-2">
            <input type="number" name="tiket[0][kuota]" placeholder="Kuota"
                   class="border border-slate-200 rounded-lg px-3 py-2">
        </div>
    `;

    document.getElementById('formBox').classList.remove('hidden');
    document.getElementById('formBox').scrollIntoView({ behavior: 'smooth' });
}

function bukaEdit(event) {
    document.getElementById('formTitle').innerText = 'Form Edit Event';
    document.getElementById('eventForm').action = '/events-update/' + event.id_event;
    document.getElementById('methodField').innerHTML = `
        <input type="hidden" name="_method" value="PUT">
    `;

    document.getElementById('input_nama_event').value = event.nama_event;
    document.getElementById('input_deskripsi').value = event.deskripsi;
    document.getElementById('input_lokasi').value = event.lokasi;
    document.getElementById('input_tanggal').value = event.tanggal;

    if (event.gambar) {
        document.getElementById('previewGambar').src = '/images/' + event.gambar;
        document.getElementById('gambarLama').classList.remove('hidden');
    }

    // Isi tiket
    tiketCount = event.tikets.length;
    const container = document.getElementById('tiketContainer');
    container.innerHTML = '';
    event.tikets.forEach((t, i) => {
        container.insertAdjacentHTML('beforeend', `
            <div class="grid grid-cols-4 gap-2 tiket-row">
                <input type="text" name="tiket[${i}][nama_tiket]" value="${t.nama_tiket}"
                       class="border border-slate-200 rounded-lg px-3 py-2">
                <input type="number" name="tiket[${i}][harga]" value="${t.harga}"
                       class="border border-slate-200 rounded-lg px-3 py-2">
                <input type="number" name="tiket[${i}][kuota]" value="${t.kuota}"
                       class="border border-slate-200 rounded-lg px-3 py-2">
                <button type="button" onclick="this.closest('.tiket-row').remove()"
                        class="bg-red-100 text-red-700 rounded-lg text-sm">Hapus</button>
            </div>
        `);
    });

    document.getElementById('formBox').classList.remove('hidden');
    document.getElementById('formBox').scrollIntoView({ behavior: 'smooth' });
}

function tutupForm() {
    document.getElementById('formBox').classList.add('hidden');
}

function addTiket() {
    document.getElementById('tiketContainer').insertAdjacentHTML('beforeend', `
        <div class="grid grid-cols-4 gap-2 tiket-row">
            <input type="text" name="tiket[${tiketCount}][nama_tiket]" placeholder="Nama tiket"
                   class="border border-slate-200 rounded-lg px-3 py-2">
            <input type="number" name="tiket[${tiketCount}][harga]" placeholder="Harga"
                   class="border border-slate-200 rounded-lg px-3 py-2">
            <input type="number" name="tiket[${tiketCount}][kuota]" placeholder="Kuota"
                   class="border border-slate-200 rounded-lg px-3 py-2">
            <button type="button" onclick="this.closest('.tiket-row').remove()"
                    class="bg-red-100 text-red-700 rounded-lg text-sm">Hapus</button>
        </div>
    `);
    tiketCount++;
}
let deleteForm = null;

function showDelete(button) {

    deleteForm = button.closest('form');

    document.getElementById('deleteModal').classList.remove('hidden');
    document.getElementById('deleteModal').classList.add('flex');

}

function closeDelete() {

    document.getElementById('deleteModal').classList.remove('flex');
    document.getElementById('deleteModal').classList.add('hidden');

}

function confirmDelete() {

    if(deleteForm){
        deleteForm.submit();
    }

}
</script>

@endsection