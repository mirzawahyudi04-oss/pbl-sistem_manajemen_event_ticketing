<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tiket Saya</title>
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

        /* TIKET CARD */
        .tiket-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.08);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .tiket-info h4 {
            margin: 0 0 5px;
            font-size: 16px;
        }

        .tiket-info p {
            margin: 2px 0;
            font-size: 13px;
            color: gray;
        }

        .tiket-action {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .status-lunas {
            background: #d4edda;
            color: #155724;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 11px;
        }

        .status-pending {
            background: #fff3cd;
            color: #856404;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 11px;
        }

        .btn-etiket {
            background: navy;
            color: white;
            padding: 7px 15px;
            border-radius: 20px;
            text-decoration: none;
            font-size: 13px;
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
            <a href="{{ route('dashboard_user') }}"
               class="{{ request()->is('dashboard-user') ? 'active' : '' }}">Dashboard</a>

            <a href="{{ route('user.tiket') }}"
               class="{{ request()->is('user/tiket') ? 'active' : '' }}">Tiket Saya</a>

            <a href="{{ route('events') }}"
               class="{{ request()->is('events') ? 'active' : '' }}">Event</a>

            <a href="{{ route('user.riwayat') }}"
               class="{{ request()->is('user/riwayat') ? 'active' : '' }}">Riwayat</a>

            <a href="{{ route('user.profile') }}"
               class="{{ request()->is('user/profile') ? 'active' : '' }}">Profil</a>
        </div>

        <div class="logout">
            <a href="{{ route('logout') }}" class="btn-logout">Logout</a>
        </div>
    </div>

    <!-- MAIN -->
    <div class="main">
        <div class="title">Tiket Saya</div>
        <div class="subtitle">Tiket event yang kamu miliki.</div>

        <div class="tiket-card">
            <div class="tiket-info">
                <h4>Java Jazz Festival</h4>
                <p>📅 25 Mei 2026</p>
                <p>📍 Jakarta</p>
                <p>🎟 1 Tiket · Regular</p>
            </div>
            <div class="tiket-action">
                <span class="status-lunas">Lunas</span>
                <a href="#" class="btn-etiket">E-Tiket</a>
            </div>
        </div>

        <div class="tiket-card">
            <div class="tiket-info">
                <h4>Fun Run Batam 5K</h4>
                <p>📅 30 Mei 2026</p>
                <p>📍 Batam</p>
                <p>🎟 2 Tiket · Regular</p>
            </div>
            <div class="tiket-action">
                <span class="status-lunas">Lunas</span>
                <a href="#" class="btn-etiket">E-Tiket</a>
            </div>
        </div>

        <div class="tiket-card">
            <div class="tiket-info">
                <h4>Konser Indie Night</h4>
                <p>📅 12 Juni 2026</p>
                <p>📍 Batam</p>
                <p>🎟 1 Tiket · VIP</p>
            </div>
            <div class="tiket-action">
                <span class="status-pending">Pending</span>
            </div>
        </div>

    </div>
</div>

</body>
</html>