<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil User</title>
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

        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .card h3 {
            margin-top: 0;
        }

        input {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            background: navy;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: darkblue;
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
            <a href="{{ route('user.riwayat') }}">Riwayat</a>
            <a href="{{ route('user.profile') }}">Profil</a>
        </div>

        <div class="logout">
            <a href="{{ route('logout') }}" class="btn-logout">Logout</a>
        </div>
    </div>

    <!-- MAIN -->
    <div class="main">
        <h2>Profil Saya</h2>

        <!-- INFO -->
        <div class="card">
            <h3>Informasi Akun</h3>
            <p><b>Nama:</b> {{ session('user') ?? 'Mirza' }}</p>
            <p><b>Email:</b> user@email.com</p>
            <p><b>No HP:</b> 08123456789</p>
        </div>

        <!-- EDIT -->
        <div class="card">
            <h3>Edit Profil</h3>

            <form method="POST" action="#">
                @csrf
                <input type="text" name="nama" placeholder="Nama Baru">
                <input type="email" name="email" placeholder="Email Baru">
                <input type="password" name="password" placeholder="Password Baru">
                <br><br>
                <button type="submit">Simpan Perubahan</button>
            </form>
        </div>

    </div>

</div>

</body>
</html>