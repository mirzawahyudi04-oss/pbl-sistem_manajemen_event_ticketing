<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Data Transaksi</title>
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
        <a href="/dashboard">Dashboard</a>
        <a href="#">Manajemen Event</a>
        <a href="#">Data Transaksi</a>
        <a href="#">Kategori Tiket</a>
    </div>

    <div class="logout">
        <a href="/logout">Keluar</a>
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
                <td>#INV-20260409</td>
                <td>Budi Santoso</td>
                <td>Workshop Fullstack</td>
                <td>Rp.50.000</td>
                <td><span class="status pending">Pending</span></td>
                <td class="aksi">✔️</td>
            </tr>

            <tr>
                <td>#INV-20260408</td>
                <td>Dibran AI</td>
                <td>Seminar Nasional</td>
                <td>Rp.50.000</td>
                <td><span class="status batal">Batal</span></td>
                <td class="aksi">🗑️</td>
            </tr>

            <tr>
                <td>#INV-20260407</td>
                <td>Owa Sastro</td>
                <td>FunRun Batam 5K</td>
                <td>Rp.120.000</td>
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