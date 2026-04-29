<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Kategori Tiket</title>

<style>
body { margin:0; font-family:Arial; background:#e5e5e5; }

/* SIDEBAR */
.sidebar {
    width:220px; height:100vh;
    background:#333; color:white;
    position:fixed;
}
.sidebar h2 { text-align:center; padding:15px; }
.sidebar a {
    display:block; padding:12px; color:white; text-decoration:none;
}
.sidebar a:hover { background:#444; }

/* MAIN */
.main { margin-left:220px; padding:20px; }

.btn {
    padding:6px 12px; border-radius:20px;
    border:1px solid #ccc; background:white;
    text-decoration:none;
}

table {
    width:100%; margin-top:20px;
    border-collapse:collapse;
    background:white;
}
th, td {
    border:1px solid #999;
    padding:10px;
    text-align:center;
}
</style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h2>ADMIN</h2>
    <a href="{{ route('dashboard') }}">Dashboard</a>
    <a href="{{ route('manajemen') }}">Manajemen Event</a>
    <a href="{{ route('transaksi') }}">Data Transaksi</a>
    <a href="{{ route('kategori') }}">Kategori Tiket</a>
</div>

<!-- MAIN -->
<div class="main">

<h2>Manajemen Kategori Tiket 🎫</h2>

<!-- ✅ tombol sudah bisa diklik -->
<a href="{{ route('tambah.kategori') }}" class="btn">+ Tambah Kategori</a>

<table>
<tr>
    <th>Jenis</th>
    <th>Harga</th>
    <th>Kuota</th>
    <th>Aksi</th>
</tr>

<tr>
    <td>VIP</td>
    <td>350.000</td>
    <td>100</td>
    <td>
        <button onclick="edit('VIP')">Edit</button>
        <button onclick="hapus('VIP')">Hapus</button>
    </td>
</tr>

<tr>
    <td>Reguler</td>
    <td>250.000</td>
    <td>200</td>
    <td>
        <button onclick="edit('Reguler')">Edit</button>
        <button onclick="hapus('Reguler')">Hapus</button>
    </td>
</tr>

</table>

</div>

<script>
function edit(nama){
    alert("Edit: " + nama);
}

function hapus(nama){
    if(confirm("Hapus "+nama+"?")){
        alert("Data dihapus (dummy)");
    }
}
</script>

</body>
</html>