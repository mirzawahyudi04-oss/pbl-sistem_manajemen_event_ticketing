<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Transaksi</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f5f5;
        }

        .container {
            display: flex;
        }

        /* SIDEBAR (SAMA SEPERTI PUNYA KAMU) */
        .sidebar {
            width: 220px;
            height: 100vh;
            background: #3d3d3d;
            color: white;
            padding: 20px;
            position: relative;
        }

        .sidebar h2 {
            margin: 0;
            font-size: 18px;
        }

        .menu {
            margin-top: 20px;
        }

        .menu a {
            display: block;
            padding: 10px;
            margin: 5px 0;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .menu a:hover {
            background: #575757;
        }

        .logout {
            position: absolute;
            bottom: 20px;
            width: 80%;
        }

        .btn-logout {
            display: block;
            text-align: center;
            padding: 10px;
            background: red;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        /* MAIN */
        .main {
            flex: 1;
            padding: 20px;
        }

        .title {
            font-size: 22px;
            font-weight: bold;
        }

        .subtitle {
            color: #555;
            margin-bottom: 15px;
        }

        .search {
            float: right;
            margin-bottom: 10px;
        }

        .search input {
            padding: 5px 10px;
            border-radius: 20px;
            border: 1px solid #ccc;
        }

        table {
            width: 100%;
            background: white;
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background: #eee;
        }

        .status {
            padding: 5px 10px;
            border-radius: 15px;
            color: white;
            font-size: 12px;
        }

        .lunas { background: green; }
        .pending { background: orange; }
        .batal { background: red; }
    </style>
</head>
<body>

<div class="container">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h2>DASHBOARD USER</h2>

        <div class="menu">
            <a href="{{ route('dashboard_user') }}">Dashboard</a>
            <a href="#">Tiket Saya</a>
            <a href="{{ route('events') }}">Event</a>
            <a href="{{ route('user.riwayat') }}">Riwayat</a>
            <a href="#">Profil</a>
        </div>

        <div class="logout">
            <a href="{{ route('logout') }}" class="btn-logout">Logout</a>
        </div>
    </div>

    <!-- MAIN -->
    <div class="main">
        <div class="title">Riwayat Transaksi</div>
        <div class="subtitle">Semua catatan pembayaran tiket kamu.</div>

        <div class="search">
            <input type="text" placeholder="Cari Transaksi...">
        </div>

        <table>
            <tr>
                <th>ID Transaksi</th>
                <th>Tanggal</th>
                <th>Nama Event</th>
                <th>Total Bayar</th>
                <th>Metode</th>
                <th>Status</th>
            </tr>

            <tr>
                <td>#INV-20260404</td>
                <td>01 April 2026</td>
                <td>Java Jazz Festival</td>
                <td>(1 Tiket) Rp.120.000</td>
                <td>Gopay</td>
                <td><span class="status lunas">Lunas</span></td>
            </tr>

            <tr>
                <td>#INV-20260403</td>
                <td>03 Juni 2026</td>
                <td>Workshop Fullstack Web</td>
                <td>(1 Tiket) Rp.50.000</td>
                <td>Dana</td>
                <td><span class="status pending">Menunggu</span></td>
            </tr>

            <tr>
                <td>#INV-20260402</td>
                <td>10 Maret 2026</td>
                <td>Seminar Nasional</td>
                <td>(1 Tiket) Rp.50.000</td>
                <td>Bank BNI</td>
                <td><span class="status batal">Kadaluarsa</span></td>
            </tr>

            <tr>
                <td>#INV-20260401</td>
                <td>25 April 2026</td>
                <td>FunRun Batam 5K</td>
                <td>(2 Tiket) Rp.120.000</td>
                <td>Bank BCA</td>
                <td><span class="status lunas">Lunas</span></td>
            </tr>

        </table>
    </div>

</div>

</body>
</html>