<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard Admin</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

<style>
body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    background: #f3f3f3;
}

/* SIDEBAR */
.sidebar {
    width: 220px;
    height: 100vh;
    background: #444;
    color: white;
    position: fixed;
}

.sidebar h2 {
    text-align: center;
    padding: 15px;
}

.sidebar a {
    display: block;
    padding: 12px 20px;
    color: white;
    text-decoration: none;
}

.sidebar a:hover {
    background: #666;
}

/* MAIN */
.main {
    margin-left: 220px;
    padding: 20px;
}

.top {
    display: flex;
    justify-content: space-between;
}

.cards {
    display: flex;
    gap: 20px;
}

.card {
    background: #ddd;
    padding: 20px;
    border-radius: 10px;
    width: 200px;
    text-align: center;
}

.mini-cards {
    display: flex;
    gap: 20px;
    margin-top: 20px;
}

.mini {
    background: #eee;
    padding: 15px;
    border-radius: 20px;
    text-align: center;
    width: 150px;
}

table {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
    background: #fff;
}

th, td {
    border: 1px solid #ccc;
    padding: 10px;
    text-align: center;
}

.status {
    padding: 5px 10px;
    border-radius: 15px;
    color: white;
}

.approved { background: green; }
.pending { background: orange; }
.rejected { background: red; }

.btn {
    padding: 5px 10px;
    border: none;
    border-radius: 10px;
}

footer {
    text-align: center;
    margin-top: 20px;
}
</style>

</head>
<body>

<div class="sidebar">
    <h2>ADMIN</h2>
    <a href="/dashboard">Dashboard</a>
    <a href="#">Manajemen Event</a>
    <a href="#">Data Transaksi</a>
    <a href="#">Kategori Tiket</a>
</div>

<div class="main">
    <div class="top">
        <h2>Halo, Admin!</h2>
        <div>🔔 👤</div>
    </div>

    <div class="cards">
        <div class="card">
            <h4>EVENT AKTIF</h4>
            <p>12</p>
        </div>
        <div class="card">
            <h4>TOTAL PENGUNJUNG</h4>
            <p>12.345</p>
        </div>
        <div class="card">
            <h4>TOTAL PENJUALAN</h4>
            <p>Rp.2.456.789.000</p>
        </div>
    </div>

    <h3>Manajemen Event</h3>

    <div class="mini-cards">
        <div class="mini">Total Event<br>100</div>
        <div class="mini">Pending<br>40</div>
        <div class="mini">Disetujui<br>40</div>
        <div class="mini">Ditolak<br>40</div>
    </div>

    <table>
        <tr>
            <th>Event</th>
            <th>Kategori</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        <tr>
            <td>Java Jazz Festival</td>
            <td>Music</td>
            <td>01 April 2026</td>
            <td><span class="status approved">Approved</span></td>
            <td><button class="btn">Edit</button></td>
        </tr>
    </table>

    <footer>
        Copyright ©2026
    </footer>
</div>

</body>
</html>