<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Data Transaksi</title>
<link rel="icon" type="image/png" href="{{ asset('images/logofavicon22.png') }}">
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

<style>
body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    background: #eee;
}

/* SIDEBAR */
.sidebar {
    width: 220px;
    height: 100vh;
    background: #3f3f3f;
    color: white;
    position: fixed;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.menu {
    padding-top: 20px;
}

.menu a {
    display: block;
    padding: 12px 20px;
    color: white;
    text-decoration: none;
}

.menu a:hover {
    background: #555;
}

.logout {
    padding: 20px;
}

/* MAIN */
.main {
    margin-left: 220px;
    padding: 20px;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.card {
    background: white;
    padding: 20px;
    margin-top: 20px;
    border-radius: 10px;
}

/* TABLE */
table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 10px;
    border-bottom: 1px solid #ccc;
    text-align: center;
}

.status {
    padding: 5px 12px;
    border-radius: 20px;
    color: white;
    font-size: 12px;
}

.lunas { background: green; }
.pending { background: orange; }
.batal { background: red; }

.aksi {
    font-size: 18px;
    cursor: pointer;
}

.search {
    float: right;
    margin-bottom: 10px;
    padding: 5px;
}

footer {
    text-align: center;
    margin-top: 20px;
    font-size: 12px;
}
</style>

</head>
<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <div class="menu">
        <h3 style="text-align:center;">ADMIN</h3>

        <!-- ✅ pakai route -->
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('manajemen') }}">Manajemen Event</a>
        <a href="{{ route('transaksi') }}">Data Transaksi</a>
        <a href="{{ route('kategori') }}">Kategori Tiket</a>
    </div>

    <div class="logout">
        <a href="{{ route('logout') }}">Keluar</a>
    </div>
</div>

<!-- MAIN -->
<div class="main">
    <div class="header">
        <h2>Halo, Admin!</h2>
        <div>🔔 👤</div>
    </div>

    <div class="card">
        <h3>DATA TRANSAKSI</h3>

        <input type="text" class="search" placeholder="Cari Transaksi...">

        <table>
    <tr>
        <th>ID Transaksi</th>
        <th>Pelanggan</th>
        <th>Event</th>
        <th>Total</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    <tr>
        <td>#INV-202604010</td>
        <td>Andi Pratama</td>
        <td>Java Jazz Festival</td>
        <td>Rp.120.000</td>
        <td><span class="status lunas">Lunas</span></td>
        <td class="aksi">👁️</td>
    </tr>

    <tr>
        <td>#INV-202604011</td>
        <td>Siti Rahma</td>
        <td>We The Fest</td>
        <td>Rp.500.000</td>
        <td><span class="status pending">Pending</span></td>
        <td class="aksi">👁️</td>
    </tr>

    <tr>
        <td>#INV-202604012</td>
        <td>Budi Santoso</td>
        <td>Coldplay Live</td>
        <td>Rp.1.500.000</td>
        <td><span class="status lunas">Lunas</span></td>
        <td class="aksi">👁️</td>
    </tr>

    <tr>
        <td>#INV-202604013</td>
        <td>Dewi Lestari</td>
        <td>DWP Festival</td>
        <td>Rp.750.000</td>
        <td><span class="status batal">Batal</span></td>
        <td class="aksi">👁️</td>
    </tr>

    <tr>
        <td>#INV-202604014</td>
        <td>Rizky Hidayat</td>
        <td>Seminar IT</td>
        <td>Rp.50.000</td>
        <td><span class="status lunas">Lunas</span></td>
        <td class="aksi">👁️</td>
    </tr>
</table>
    </div>

    <footer>
        Copyright ©2026
    </footer>
</div>

</body>
</html>