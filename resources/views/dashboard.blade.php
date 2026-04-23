<!DOCTYPE html>
<html lang="en">
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
        }

        .sidebar h2 {
            font-size: 18px;
        }

        .menu {
            margin-top: 20px;
        }

        .menu div {
            padding: 10px;
            margin: 5px 0;
            cursor: pointer;
        }

        .menu div:hover {
            background: #575757;
        }

        .logout {
            position: absolute;
            bottom: 20px;
        }

        /* MAIN */
        .main {
            flex: 1;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
        }

        .cards {
            display: flex;
            gap: 20px;
            margin: 20px 0;
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
            margin-bottom: 10px;
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
            <div>Dashboard</div>
            <div>Tiket Saya</div>
            <div>Jelajahi Event</div>
            <div>Riwayat Transaksi</div>
            <div>Profil Saya</div>
        </div>

        <div class="logout">
            Keluar
        </div>
    </div>

    <!-- MAIN -->
    <div class="main">
        
        <div class="header">
            <h3>Halo, Lex!</h3>
            <div>🔔 👤</div>
        </div>

        <!-- CARD -->
        <div class="cards">
            <div class="card">
                <h4>Tiket Aktif</h4>
                <p>2</p>
            </div>
            <div class="card">
                <h4>Total Riwayat</h4>
                <p>9</p>
            </div>
            <div class="card">
                <h4>Transaksi Pending</h4>
                <p>1</p>
            </div>
        </div>

        <!-- EVENT -->
        <div class="event">
            <div>
                <b>Java Jazz Festival 2026</b><br>
                <small>25 Mei 2026 | 19:00 WIB</small><br>
                <span class="status">Lunas</span>
            </div>
            <a href="#" class="btn">Lihat E-Tiket</a>
        </div>

        <div class="event">
            <div>
                <b>Fun Run Batam 5K</b><br>
                <small>30 Mei 2026 | 19:00 WIB</small><br>
                <span class="status">Lunas</span>
            </div>
            <a href="#" class="btn">Lihat E-Tiket</a>
        </div>

    </div>

</div>

</body>
</html>