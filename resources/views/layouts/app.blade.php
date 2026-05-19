<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            width: 220px;
            height: 100vh;
            background: #333;
            color: white;
            position: fixed;
        }

        .sidebar h2 {
            text-align: center;
            padding: 20px 0;
        }

        .sidebar a {
            display: block;
            padding: 12px 20px;
            color: white;
            text-decoration: none;
        }

        .sidebar a:hover {
            background: #444;
        }

        .active {
            background: #555;
        }

        .main {
            margin-left: 220px;
            padding: 20px;
            background: #e5e5e5;
            min-height: 100vh;
        }
    </style>
</head>
<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h2>DASHBOARD USER</h2>

    <div class="menu">
        <a href="/">Beranda</a>
            <a href="{{ route('dashboard_user') }}">Dashboard</a>
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
<!-- CONTENT -->
<div class="main">
    @yield('content')
</div>

</body>
</html>