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
    <h2>Dashboard</h2>

    <a href="{{ route('dashboard') }}" class="{{ request()->is('dashboard') ? 'active' : '' }}">Dashboard</a>
    <a href="{{ route('manajemen.event') }}" class="{{ request()->is('manajemen-event') ? 'active' : '' }}">Manajemen Event</a>
    <a href="{{ route('transaksi') }}" class="{{ request()->is('transaksi') ? 'active' : '' }}">Data Transaksi</a>
    <a href="{{ route('kategori.tiket') }}" class="{{ request()->is('kategori-tiket') ? 'active' : '' }}">Kategori Tiket</a>

    <div style="position:absolute; bottom:20px; width:100%;">
        <a href="#">Keluar</a>
    </div>
</div>

<!-- CONTENT -->
<div class="main">
    @yield('content')
</div>

</body>
</html>