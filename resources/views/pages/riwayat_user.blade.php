<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Transaksi</title>
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
            margin-bottom:5px;
        }

        .subtitle{
            color:gray;
            margin-bottom:25px;
        }

        .search-box{
            margin-bottom:20px;
        }

        .search-box input{
            padding:12px;
            width:250px;
            border:1px solid #ddd;
            border-radius:10px;
        }

        .table-wrap{
            background:white;
            border-radius:18px;
            overflow:hidden;
            box-shadow:0 8px 24px rgba(16,25,79,0.08);
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        th{
            background:#f3f4f6;
            padding:15px;
            text-align:left;
        }

        td{
            padding:15px;
            border-bottom:1px solid #eee;
        }

        .status{
            padding:6px 12px;
            border-radius:20px;
            font-size:12px;
            font-weight:bold;
        }

        .lunas{
            background:#DCFCE7;
            color:#166534;
        }

        .pending{
            background:#FEF3C7;
            color:#92400E;
        }

        .batal{
            background:#FEE2E2;
            color:#991B1B;
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
            <a href="{{ route('user.riwayat') }}" class="active">Riwayat</a>
            <a href="{{ route('user.profile') }}">Profil</a>
        </div>

        <div class="logout">
            <a href="{{ route('logout') }}" class="btn-logout">Logout</a>
        </div>
    </div>

    <div class="main">
        <div class="title">Riwayat Transaksi</div>
        <div class="subtitle">Semua catatan pembayaran tiket kamu</div>

        <div class="search-box">
            <input type="text" placeholder="Cari transaksi..." onkeyup="cariTransaksi()">
        </div>

        <div class="table-wrap">
            <table id="tabelRiwayat">
                <tr>
                    <th>ID</th>
                    <th>Tanggal</th>
                    <th>Event</th>
                    <th>Total</th>
                    <th>Metode</th>
                    <th>Status</th>
                </tr>

                <tr>
                    <td>#INV001</td>
                    <td>01 April 2026</td>
                    <td>Java Jazz</td>
                    <td>Rp 250.000</td>
                    <td>GoPay</td>
                    <td><span class="status lunas">Lunas</span></td>
                </tr>

                <tr>
                    <td>#INV002</td>
                    <td>03 Maret 2026</td>
                    <td>Workshop Web</td>
                    <td>Rp 150.000</td>
                    <td>Dana</td>
                    <td><span class="status pending">Pending</span></td>
                </tr>

                <tr>
                    <td>#INV003</td>
                    <td>10 Februari 2026</td>
                    <td>Seminar IT</td>
                    <td>Rp 50.000</td>
                    <td>BNI</td>
                    <td><span class="status batal">Batal</span></td>
                </tr>
            </table>
        </div>
    </div>

</div>

<script>
function cariTransaksi(){
    let input=document.querySelector("input").value.toLowerCase();
    let rows=document.querySelectorAll("#tabelRiwayat tr:not(:first-child)");

    rows.forEach(function(row){
        let teks=row.innerText.toLowerCase();
        row.style.display=teks.includes(input) ? "" : "none";
    });
}
</script>

</body>
</html>