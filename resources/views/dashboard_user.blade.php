<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard User</title>

    <style>
        body {
            margin: 0;
            font-family: Arial;
            background: #f5f5f5;
        }

        .container {
            display: flex;
        }

        /* SIDEBAR */
        .sidebar {
            width: 220px;
            background: #3d3d3d;
            color: white;
            height: 100vh;
            padding: 20px;
            position: relative;
        }

        .sidebar h2 {
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
        }

        .logout a {
            color: white;
            text-decoration: none;
        }

        /* MAIN */
        .main {
            flex: 1;
            padding: 20px;
        }

        .cards {
            display: flex;
            gap: 20px;
        }

        .card {
            background: white;
            padding: 15px;
            border-radius: 5px;
            width: 150px;
            text-align: center;
        }

        .event {
            background: white;
            padding: 15px;
            border-radius: 5px;
            margin-top: 10px;
            display: flex;
            justify-content: space-between;
        }

        .btn {
            background: navy;
            color: white;
            padding: 8px 12px;
            border-radius: 20px;
            text-decoration: none;
        }

        .status {
            background: green;
            color: white;
            padding: 3px 8px;
            border-radius: 10px;
            font-size: 12px;
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
            <a href="/tiket">Tiket Saya</a>
            <a href="{{ route('events') }}">Event</a> <!-- ✅ INI YANG BISA DIKLIK -->
            <a href="/transaksi">Riwayat</a>
            <a href="/profil">Profil</a>
        </div>

        <div class="logout">
            <a href="{{ route('logout') }}">Keluar</a>
        </div>
    </div>

    <!-- MAIN -->
    <div class="main">
        <h3>Halo, {{ session('user') }} 👋</h3>

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
                <p>1</p>
            </div>
        </div>

        <div class="event">
            <div>
                <b>Java Jazz Festival</b><br>
                <small>25 Mei 2026</small><br>
                <span class="status">Lunas</span>
            </div>
            <a href="#" class="btn">E-Tiket</a>
        </div>

        <div class="event">
            <div>
                <b>Fun Run Batam</b><br>
                <small>30 Mei 2026</small><br>
                <span class="status">Lunas</span>
            </div>
            <a href="#" class="btn">E-Tiket</a>
        </div>

    </div>

</div>

</body>
</html>