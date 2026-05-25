<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logofavicon22.png') }}">

    <style>
        :root{
            --navy:#10194F;
            --indigo:#5661A4;
            --soft-blue:#7E92B8;
            --cream:#D9D0BF;
            --bg:#F8F9FC;
            --white:#FFFFFF;
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
            color: var(--cream);
            margin-bottom:30px;
            font-size:18px;
        }

        .menu a{
            display:block;
            padding:14px 18px;
            margin-bottom:8px;
            color:rgba(255,255,255,.8);
            text-decoration:none;
            border-radius:12px;
        }

        .menu a:hover{
            background:rgba(255,255,255,.08);
            color:white;
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

        .page-title{
            font-size:30px;
            font-weight:bold;
            margin-bottom:8px;
        }

        .subtitle{
            color:gray;
            margin-bottom:25px;
        }

        .card{
            background:white;
            padding:25px;
            border-radius:18px;
            box-shadow:0 8px 24px rgba(16,25,79,.08);
            margin-bottom:20px;
        }
    </style>
</head>
<body>

<div class="container">

    <div class="sidebar">
        <h2>🎫 STEVENtix</h2>

        <div class="menu">
            <a href="{{ route('dashboard_user') }}"
               class="{{ request()->routeIs('dashboard_user') ? 'active' : '' }}">
               Dashboard
            </a>

            <a href="{{ route('user.tiket') }}"
               class="{{ request()->routeIs('user.tiket') ? 'active' : '' }}">
               Tiket Saya
            </a>

            <a href="{{ route('events.index') }}"
               class="{{ request()->routeIs('events.index') ? 'active' : '' }}">
               Event
            </a>

            <a href="{{ route('user.riwayat') }}"
               class="{{ request()->routeIs('user.riwayat') ? 'active' : '' }}">
               Riwayat
            </a>

            <a href="{{ route('user.profile') }}"
               class="{{ request()->routeIs('user.profile') ? 'active' : '' }}">
               Profil
            </a>
        </div>

        <div class="logout">
            <a href="{{ route('logout') }}" class="btn-logout">
                Logout
            </a>
        </div>
    </div>

    <div class="main">
        @yield('content')
    </div>

</div>

</body>
</html>