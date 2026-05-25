<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard User</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logofavicon22.png') }}">

    <style>
        :root{
            --navy: #10194F;
            --indigo: #5661A4;
            --soft-blue: #7E92B8;
            --cream: #D9D0BF;
            --bg: #F8F9FC;
            --white: #FFFFFF;
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

        /* SIDEBAR */
        .sidebar{
            width:250px;
            background: var(--navy);
            color:white;
            padding:25px 20px;
            position:relative;
            box-shadow: 4px 0 20px rgba(0,0,0,0.08);
        }

        .sidebar h2{
            text-align:center;
            color: var(--cream);
            margin-bottom:30px;
            letter-spacing:2px;
            font-size:18px;
        }

        .menu a{
            display:block;
            padding:14px 18px;
            margin-bottom:8px;
            color: rgba(255,255,255,0.8);
            text-decoration:none;
            border-radius:12px;
            transition:.3s;
            font-size:15px;
        }

        .menu a:hover{
            background: rgba(255,255,255,0.08);
            color:white;
            transform: translateX(5px);
        }

        .menu a.active{
            background: var(--indigo);
            color:white;
            font-weight:bold;
            box-shadow: 0 5px 15px rgba(0,0,0,0.15);
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
            background: var(--cream);
            color: var(--navy);
            text-decoration:none;
            border-radius:12px;
            font-weight:bold;
            transition:.3s;
        }

        .btn-logout:hover{
            background:white;
            transform: translateY(-2px);
        }

        /* MAIN */
        .main{
            flex:1;
            padding:35px;
            border-top: 6px solid var(--indigo);
        }

        .greeting{
            font-size:30px;
            font-weight:bold;
            margin-bottom:30px;
        }

        .subtext{
            font-size:14px;
            color:gray;
            margin-top:5px;
            font-weight:normal;
        }

        /* CARD STAT */
        .cards{
            display:flex;
            gap:20px;
            flex-wrap:wrap;
            margin-bottom:30px;
        }

        .card{
            background:white;
            width:190px;
            padding:25px;
            border-radius:18px;
            text-align:center;
            box-shadow: 0 8px 24px rgba(16,25,79,0.08);
            transition:.3s;
        }

        .card:hover{
            transform: translateY(-8px);
            box-shadow: 0 14px 30px rgba(16,25,79,0.15);
        }

        .card h4{
            font-size:15px;
            color:gray;
            margin-bottom:12px;
        }

        .card p{
            font-size:34px;
            font-weight:bold;
            color: var(--navy);
        }

        /* PANEL */
        .panel{
            background:white;
            padding:25px;
            border-radius:18px;
            margin-bottom:20px;
            box-shadow: 0 8px 24px rgba(16,25,79,0.08);
        }

        .panel-header{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:18px;
            border-bottom:1px solid #eee;
            padding-bottom:10px;
        }

        .panel-header h5{
            font-size:13px;
            color:gray;
            text-transform:uppercase;
            letter-spacing:1px;
        }

        .panel-header a{
            text-decoration:none;
            color: var(--indigo);
            font-weight:bold;
        }

        .panel-header a:hover{
            color: var(--soft-blue);
        }

        /* TIKET */
        .tiket-row{
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:15px 0;
            border-bottom:1px solid #f1f1f1;
        }

        .tiket-row:last-child{
            border-bottom:none;
        }

        .tiket-row b{
            font-size:15px;
        }

        .tiket-row small{
            color:gray;
            font-size:12px;
        }

        .tiket-actions{
            display:flex;
            align-items:center;
            gap:10px;
        }

        .status-lunas{
            background:#DCFCE7;
            color:#166534;
            padding:6px 12px;
            border-radius:20px;
            font-size:12px;
            font-weight:bold;
        }

        .status-pending{
            background:#FEF3C7;
            color:#92400E;
            padding:6px 12px;
            border-radius:20px;
            font-size:12px;
            font-weight:bold;
        }

        .btn-etiket{
            background: var(--indigo);
            color:white;
            text-decoration:none;
            padding:8px 15px;
            border-radius:20px;
            font-size:12px;
            transition:.3s;
        }

        .btn-etiket:hover{
            background: var(--soft-blue);
        }
    </style>
</head>
<body>

<div class="container">

    <!-- SIDEBAR -->
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
            <a href="{{ route('logout') }}" class="btn-logout">Logout</a>
        </div>
    </div>

    <!-- MAIN -->
    <div class="main">

        <div class="greeting">
            Halo, {{ auth()->user()->name }}👋
            <div class="subtext">
                Selamat datang di STEVENtix
            </div>
        </div>

        <!-- CARD -->
        <div class="cards">
            <div class="card">
                <h4>🎟 Tiket</h4>
                <p>2</p>
            </div>

            <div class="card">
                <h4>📜 Riwayat</h4>
                <p>9</p>
            </div>

            <div class="card">
                <h4>⏳ Pending</h4>
                <p style="color:#b45309;">1</p>
            </div>
        </div>

        <!-- TIKET -->
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

        <!-- PENDING -->
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