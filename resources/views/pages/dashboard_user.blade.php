<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard User</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logofavicon22.png') }}">
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

        .greeting {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        /* CARDS STATISTIK */
        .cards {
            display: flex;
            gap: 15px;
            margin-bottom: 25px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            width: 150px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.08);
        }

        .card h4 {
            font-size: 13px;
            color: gray;
            margin: 0 0 8px;
        }

        .card p {
            font-size: 26px;
            font-weight: bold;
            margin: 0;
        }

        /* PANEL */
        .panel {
            background: white;
            border-radius: 10px;
            padding: 15px 20px;
            margin-bottom: 15px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.08);
        }

        .panel-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
        }

        .panel-header h5 {
            font-size: 12px;
            color: gray;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin: 0;
        }

        .panel-header a {
            font-size: 12px;
            color: navy;
            text-decoration: none;
        }

        /* TIKET ROW */
        .tiket-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .tiket-row:last-child {
            border-bottom: none;
        }

        .tiket-row b {
            font-size: 14px;
        }

        .tiket-row small {
            color: gray;
            font-size: 12px;
        }

        .tiket-actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .status-lunas {
            background: #d4edda;
            color: #155724;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 11px;
        }

        .status-pending {
            background: #fff3cd;
            color: #856404;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 11px;
        }

        .btn-etiket {
            background: navy;
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            text-decoration: none;
            font-size: 12px;
        }

        .btn-etiket:hover {
            background: #001a6e;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h2>DASHBOARD USER</h2>

        <div class="menu">
            <a href="{{ route('dashboard_user') }}" class="active">Dashboard</a>
            <a href="{{ route('user.tiket') }}" 
   class="{{ request()->is('user/tiket') ? 'active' : '' }}">Tiket Saya</a>
            <a href="{{ route('events.index') }}">Event</a>
            <a href="{{ route('user.riwayat') }}">Riwayat</a>
            <a href="{{ route('user.profile') }}">Profil</a>
        </div>

        <div class="logout">
            <a href="{{ route('logout') }}" class="btn-logout">Logout</a>
        </div>
    </div>

    <!-- MAIN -->
    <div class="main">

        <div class="greeting">Halo, {{ session('name') ?? 'User' }} 👋</div>

        <!-- STATISTIK -->
        <div class="cards">
            <div class="card">
                <h4>Tiket</h4>
                <p>2</p>
            </div>
            <div class="card">
                <h4>Riwayat</h4>
                <p>9</p>
            </div>
            <div class="card">
                <h4>Pending</h4>
                <p style="color: #b45309;">1</p>
            </div>
        </div>

        <!-- TIKET TERBARU -->
        <div class="panel">
            <div class="panel-header">
                <h5>Tiket Terbaru</h5>
                <a href="{{ route('user.tiket') }}">Lihat semua →</a>
            </div>

            <div class="tiket-row">
                <div>
                    <b>Java Jazz Festival</b><br>
                    <small>25 Mei 2026</small>
                </div>
                <div class="tiket-actions">
                    <span class="status-lunas">Lunas</span>
                    <a href="#" class="btn-etiket">E-Tiket</a>
                </div>
            </div>

            <div class="tiket-row">
                <div>
                    <b>Fun Run Batam</b><br>
                    <small>30 Mei 2026</small>
                </div>
                <div class="tiket-actions">
                    <span class="status-lunas">Lunas</span>
                    <a href="#" class="btn-etiket">E-Tiket</a>
                </div>
            </div>
        </div>

        <!-- TRANSAKSI PENDING -->
        <div class="panel">
            <div class="panel-header">
                <h5>Transaksi Pending</h5>
            </div>

            <div class="tiket-row">
                <div>
                    <b>Konser Indie Night</b><br>
                    <small>12 Jun 2026 · Menunggu pembayaran</small>
                </div>
                <span class="status-pending">Pending</span>
            </div>
        </div>

    </div>
</div>

</body>
</html>