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

        /* SIDEBAR */
        .sidebar {
            width: 220px;
            height: 100vh;
            background: #2c2c2c;
            color: white;
            padding: 20px;
            position: relative;
        }

        .sidebar h2 {
            margin: 0;
            font-size: 15px;
            color: #888;
            letter-spacing: 1px;
        }

        .menu {
            margin-top: 20px;
        }

        .menu a {
            display: block;
            padding: 10px 15px;
            margin: 3px 0;
            color: #aaa;
            text-decoration: none;
            border-radius: 5px;
            border-left: 3px solid transparent;
            font-size: 14px;
        }

        .menu a:hover {
            background: #3a3a3a;
            color: white;
        }

        .menu a.active {
            background: #3a3a3a;
            color: white;
            border-left: 3px solid red;
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
            font-size: 14px;
        }

        .btn-logout:hover {
            background: darkred;
        }

        /* MAIN */
        .main {
            flex: 1;
            padding: 25px;
        }

        .title {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .subtitle {
            color: #888;
            font-size: 13px;
            margin-bottom: 20px;
        }

        /* SEARCH */
        .search-box {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 15px;
        }

        .search-box input {
            padding: 7px 15px;
            border-radius: 20px;
            border: 1px solid #ccc;
            font-size: 13px;
            outline: none;
            width: 220px;
        }

        /* TABLE */
        .table-wrap {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0,0,0,0.08);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f0f0f0;
            padding: 12px 15px;
            text-align: left;
            font-size: 12px;
            color: gray;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        td {
            padding: 14px 15px;
            font-size: 13px;
            border-bottom: 1px solid #f0f0f0;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover td {
            background: #fafafa;
        }

        .status {
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
        }

        .lunas {
            background: #d4edda;
            color: #155724;
        }

        .pending {
            background: #fff3cd;
            color: #856404;
        }

        .batal {
            background: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>

<div class="container">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h2>DASHBOARD USER</h2>

        <div class="menu">
            <a href="{{ route('dashboard_user') }}">Dashboard</a>
            <a href="{{ route('user.tiket') }}" 
   class="{{ request()->is('user/tiket') ? 'active' : '' }}">Tiket Saya</a>
            <a href="{{ route('events') }}">Event</a>
            <a href="{{ route('user.riwayat') }}" class="active">Riwayat</a>
            <a href="{{ route('user.profile') }}">Profil</a>
        </div>

        <div class="logout">
            <a href="{{ route('logout') }}" class="btn-logout">Logout</a>
        </div>
    </div>

    <!-- MAIN -->
    <div class="main">
        <div class="title">Riwayat Transaksi</div>
        <div class="subtitle">Semua catatan pembayaran tiket kamu.</div>

        <div class="search-box">
            <input type="text" placeholder="Cari transaksi..." onkeyup="cariTransaksi()">
        </div>

        <div class="table-wrap">
            <table id="tabelRiwayat">
                <tr>
                    <th>ID Transaksi</th>
                    <th>Tanggal Beli</th>
                    <th>Nama Event</th>
                    <th>Total Bayar</th>
                    <th>Metode</th>
                    <th>Status</th>
                </tr>

                <tr>
                    <td>#INV-20260404</td>
                    <td>01 April 2026</td>
                    <td>Java Jazz Festival</td>
                    <td>(1 Tiket) Rp 250.000</td>
                    <td>GoPay</td>
                    <td><span class="status lunas">Lunas</span></td>
                </tr>

                <tr>
                    <td>#INV-20260403</td>
                    <td>03 Maret 2026</td>
                    <td>Workshop Fullstack Web</td>
                    <td>(1 Tiket) Rp 150.000</td>
                    <td>Dana</td>
                    <td><span class="status pending">Menunggu</span></td>
                </tr>

                <tr>
                    <td>#INV-20260402</td>
                    <td>10 Februari 2026</td>
                    <td>Seminar Nasional IT</td>
                    <td>(1 Tiket) Rp 50.000</td>
                    <td>Bank BNI</td>
                    <td><span class="status batal">Kadaluarsa</span></td>
                </tr>

                <tr>
                    <td>#INV-20260401</td>
                    <td>25 Januari 2026</td>
                    <td>Fun Run Batam 5K</td>
                    <td>(2 Tiket) Rp 150.000</td>
                    <td>Bank BCA</td>
                    <td><span class="status lunas">Lunas</span></td>
                </tr>

            </table>
        </div>
    </div>

</div>

<script>
    function cariTransaksi() {
        var input = document.querySelector('input').value.toLowerCase();
        var rows = document.querySelectorAll('#tabelRiwayat tr:not(:first-child)');

        rows.forEach(function(row) {
            var teks = row.innerText.toLowerCase();
            row.style.display = teks.includes(input) ? '' : 'none';
        });
    }
</script>

</body>
</html>