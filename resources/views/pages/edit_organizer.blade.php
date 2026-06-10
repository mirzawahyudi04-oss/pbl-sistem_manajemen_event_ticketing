<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Organizer</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded-lg shadow">

    <h2 class="text-2xl font-bold mb-6">
        Edit Organizer
    </h2>

    <form action="{{ route('admin.organizer.update', $organizer->id_organizer) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-2 font-semibold">
                Nama Organizer
            </label>

            <input type="text"
                   name="nama_organizer"
                   value="{{ $organizer->nama_organizer }}"
                   class="w-full border rounded p-2">
        </div>

        <div class="mb-4">
            <label class="block mb-2 font-semibold">
                Kontak
            </label>

            <input type="text"
                   name="kontak"
                   value="{{ $organizer->kontak }}"
                   class="w-full border rounded p-2">
        </div>

        <div class="mb-4">
    <label>Status</label>

    <select name="status" class="w-full border p-2 rounded">
        <option value="Aktif"
            {{ $organizer->status == 'Aktif' ? 'selected' : '' }}>
            Aktif
        </option>

        <option value="Nonaktif"
            {{ $organizer->status == 'Nonaktif' ? 'selected' : '' }}>
            Nonaktif
        </option>
    </select>
</div>

        <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded">
            Simpan Perubahan
        </button>

    </form>

</div>

</body>
</html>