<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil User</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logofavicon22.png') }}">

    <style>
        :root{
            --navy:#10194F;
            --indigo:#5661A4;
            --soft-blue:#7E92B8;
            --cream:#D9D0BF;
            --bg:#F8F9FC;
        }

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family: Arial, sans-serif;
            background: var(--bg);
            color: var(--navy);
        }

        .container{
            display:flex;
            min-height:100vh;
        }

        .sidebar{
            width:250px;
            background: var(--navy);
            color:white;
            padding:25px 20px;
            position:relative;
        }

        .sidebar h2{
            text-align:center;
            color:var(--cream);
            margin-bottom:30px;
        }

        .menu a{
            display:block;
            padding:14px 18px;
            margin-bottom:8px;
            color:rgba(255,255,255,0.8);
            text-decoration:none;
            border-radius:12px;
        }

        .menu a:hover{
            background:rgba(255,255,255,0.08);
        }

        .menu a.active{
            background:var(--indigo);
            color:white;
            font-weight:bold;
        }

        .logout{
            position:absolute;
            bottom:30px;
            width:84%;
        }

        .btn-logout{
            display:block;
            text-align:center;
            padding:13px;
            background:var(--cream);
            color:var(--navy);
            text-decoration:none;
            border-radius:12px;
            font-weight:bold;
        }

        .main{
            flex:1;
            padding:35px;
            border-top:6px solid var(--indigo);
        }

        .title{
            font-size:28px;
            font-weight:bold;
            margin-bottom:25px;
        }

        .card{
            background:white;
            padding:25px;
            border-radius:18px;
            margin-bottom:20px;
            box-shadow:0 8px 24px rgba(16,25,79,0.08);
        }

        .card h3{
            margin-bottom:20px;
            color:var(--navy);
        }

        .card p{
            margin-bottom:10px;
        }

        input{
            width:100%;
            padding:12px;
            margin-bottom:15px;
            border:1px solid #ddd;
            border-radius:10px;
            font-size:14px;
        }

        button{
            background:var(--indigo);
            color:white;
            border:none;
            padding:12px 20px;
            border-radius:10px;
            cursor:pointer;
        }

        button:hover{
            background:var(--soft-blue);
        }
    </style>
</head>
<body>

<div class="container">

    <div class="sidebar">
        <h2>🎫 STEVENtix</h2>

        <div class="menu">
            <a href="{{ route('dashboard_user') }}">Dashboard</a>
            <a href="{{ route('user.tiket') }}">Tiket Saya</a>
            <a href="{{ route('events.index') }}">Event</a>
            <a href="{{ route('user.riwayat') }}">Riwayat</a>
            <a href="{{ route('user.profile') }}" class="active">Profil</a>
        </div>

        <div class="logout">
            <a href="{{ route('logout') }}" class="btn-logout">Logout</a>
        </div>
    </div>

    <div class="main">
        <div class="title">Profil Saya</div>

        <div class="card">
            <h3>Informasi Akun</h3>
            <p><b>Nama:</b> {{ auth()->user()->name }}</p>
            <p><b>Email:</b> {{ auth()->user()->email }}</p>
            <p><b>Role:</b> {{ auth()->user()->role }}</p>
        </div>

        <div class="card">
            <h3>Edit Profil</h3>

            <form method="POST" action="#">
                @csrf
                <input type="text" placeholder="Nama Baru">
                <input type="email" placeholder="Email Baru">
                <input type="password" placeholder="Password Baru">
                <button type="submit">Simpan Perubahan</button>
            </form>
        </div>
    </div>

</div>

</body>
</html>