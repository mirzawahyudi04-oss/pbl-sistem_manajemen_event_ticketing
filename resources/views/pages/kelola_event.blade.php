<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Event</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logofavicon22.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        * { margin:0; padding:0; box-sizing:border-box; font-family:'Poppins',sans-serif; }
        body { background:#f3f4f6; }
        .container { display:flex; }

        /* SIDEBAR */
        .sidebar { width:270px; height:100vh; background:#2f3640; position:fixed; left:0; top:0; overflow-y:auto; }
        .sidebar h2 { color:white; padding:30px; font-size:24px; }
        .menu { display:flex; flex-direction:column; }
        .menu a { color:white; text-decoration:none; padding:18px 30px; transition:0.3s; font-size:16px; }
        .menu a:hover, .menu a.active { background:#4b5563; }
        .logout { margin-top:20px; }
        .btn-logout { display:block; background:#dc2626; color:white; text-decoration:none; padding:18px 30px; }

        /* MAIN */
        .main { margin-left:270px; width:100%; padding:30px; }
        .main-header { display:flex; justify-content:space-between; align-items:center; margin-bottom:30px; }
        .main-header h1 { font-size:32px; }

        .btn-add {
            background:#2563eb; color:white; padding:12px 20px;
            border:none; border-radius:10px; cursor:pointer; font-size:14px;
            font-family:'Poppins',sans-serif;
        }

        /* ALERT */
        .alert { background:#dcfce7; color:#16a34a; padding:12px 18px; border-radius:10px; margin-bottom:20px; }

        /* TABLE */
        .table-box { background:white; padding:20px; border-radius:15px; box-shadow:0 2px 10px rgba(0,0,0,.1); margin-bottom:30px; }
        table { width:100%; border-collapse:collapse; }
        table th { background:#f3f4f6; padding:14px; text-align:left; font-size:14px; }
        table td { padding:14px; border-top:1px solid #ddd; font-size:14px; }
        table tr:hover { background:#f9fafb; }
        .btn { padding:7px 12px; border:none; border-radius:8px; color:white; cursor:pointer; font-size:13px; font-family:'Poppins',sans-serif; }
        .edit { background:#2563eb; }
        .delete { background:#dc2626; }

        /* FORM */
        .form-box { background:white; padding:25px; border-radius:15px; box-shadow:0 2px 10px rgba(0,0,0,.1); display:none; margin-bottom:30px; }
        .form-box.show { display:block; }
        .form-box h2 { margin-bottom:20px; font-size:20px; }
        .form-group { margin-bottom:18px; }
        .form-group label { display:block; margin-bottom:6px; font-weight:600; font-size:14px; }
        .form-group input, .form-group textarea, .form-group select {
            width:100%; padding:11px; border:1px solid #d1d5db;
            border-radius:10px; font-family:'Poppins',sans-serif; font-size:14px;
        }
        textarea { resize:none; height:100px; }
        .btn-submit { background:#2563eb; color:white; border:none; padding:13px 22px; border-radius:10px; cursor:pointer; font-family:'Poppins',sans-serif; font-size:14px; }

        /* TIKET ROWS */
        .tiket-row { display:flex; gap:12px; margin-bottom:12px; align-items:center; }
        .tiket-row input { flex:1; }
        .btn-remove { background:#dc2626; color:white; border:none; padding:8px 14px; border-radius:8px; cursor:pointer; font-size:13px; white-space:nowrap; }
        .btn-add-tiket { background:#16a34a; color:white; border:none; padding:10px 16px; border-radius:8px; cursor:pointer; font-size:13px; font-family:'Poppins',sans-serif; margin-bottom:16px; }
    </style>
</head>
<body>

<div class="container">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h2>ORGANIZER</h2>
        <div class="menu">
            <a href="/dashboard-organizer">Dashboard</a>
            <a href="/manajemen-event" class="active">Kelola Event</a>
            <a href="/tiket">Tiket</a>
            <a href="/peserta">Peserta</a>
            <a href="/transaksi">Transaksi</a>
            <a href="/laporan">Laporan</a>
            <a href="/profile-organizer">Profile</a>
        </div>
        <div class="logout">
            <a href="/logout" class="btn-logout">Logout</a>
        </div>
    </div>

    <!-- MAIN -->
    <div class="main">

        <div class="main-header">
            <h1>Kelola Event</h1>
            <button class="btn-add" onclick="toggleForm()">+ Tambah Event</button>
        </div>

        @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
        @endif

        <!-- TABEL EVENT -->
        <div class="table-box">
            <table>
                <tr>
                    <th>No</th>
                    <th>Nama Event</th>
                    <th>Tanggal</th>
                    <th>Lokasi</th>
                    <th>Tiket</th>
                    <th>Aksi</th>
                </tr>
                @forelse($events as $i => $event)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $event->nama_event }}</td>
                    <td>{{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}</td>
                    <td>{{ $event->lokasi }}</td>
                    <td>{{ $event->tikets->count() }} jenis</td>
                    <td>
                        <button class="btn edit">Edit</button>
                        <form action="{{ route('events.destroy', $event->id_event) }}" method="POST" style="display:inline">
                            @csrf @method('DELETE')
                            <button class="btn delete" onclick="return confirm('Hapus event ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align:center; color:#94a3b8;">Belum ada event</td>
                </tr>
                @endforelse
            </table>
        </div>

        <!-- FORM TAMBAH EVENT -->
        <div class="form-box" id="formBox">
            <h2>Form Tambah Event</h2>

            <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Nama Event</label>
                    <input type="text" name="nama_event" placeholder="Masukkan nama event" required>
                </div>

                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" placeholder="Masukkan deskripsi event" required></textarea>
                </div>

                <div class="form-group">
                    <label>Poster Event</label>
                    <input type="file" name="gambar" accept="image/*">
                </div>

                <div class="form-group">
                    <label>Lokasi</label>
                    <input type="text" name="lokasi" placeholder="Masukkan lokasi" required>
                </div>

                <div class="form-group">
                    <label>Tanggal Event</label>
                    <input type="date" name="tanggal" required>
                </div>

                <!-- TIKET DINAMIS -->
                <div class="form-group">
                    <label>Tiket</label>
                    <div id="tiketContainer">
                        <div class="tiket-row">
                            <input type="text"   name="tiket[0][nama_tiket]" placeholder="Nama tiket (misal: Regular)" required>
                            <input type="number" name="tiket[0][harga]"      placeholder="Harga (0 = Gratis)" min="0" required>
                            <input type="number" name="tiket[0][kuota]"       placeholder="Kuota" min="1" required>
                        </div>
                    </div>
                    <button type="button" class="btn-add-tiket" onclick="addTiket()">+ Tambah Jenis Tiket</button>
                </div>

                <button type="submit" class="btn-submit">Simpan Event</button>
            </form>
        </div>

    </div>
</div>

<script>
    let tiketCount = 1;

    function toggleForm() {
        const form = document.getElementById('formBox');
        form.classList.toggle('show');
    }

    function addTiket() {
        const container = document.getElementById('tiketContainer');
        const row = document.createElement('div');
        row.className = 'tiket-row';
        row.innerHTML = `
            <input type="text"   name="tiket[${tiketCount}][nama_tiket]" placeholder="Nama tiket" required>
            <input type="number" name="tiket[${tiketCount}][harga]"      placeholder="Harga (0 = Gratis)" min="0" required>
            <input type="number" name="tiket[${tiketCount}][kuota]"      placeholder="Kuota" min="1" required>
            <button type="button" class="btn-remove" onclick="this.parentElement.remove()">Hapus</button>
        `;
        container.appendChild(row);
        tiketCount++;
    }
</script>

</body>
</html>