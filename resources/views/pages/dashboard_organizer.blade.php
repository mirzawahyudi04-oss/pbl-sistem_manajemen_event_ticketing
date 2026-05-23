<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Organizer</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logofavicon22.png') }}">

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        body{
            background:#f3f4f6;
        }

        .container{
            display:flex;
        }

        /* SIDEBAR */
        .sidebar{
            width:270px;
            height:100vh;
            background:#2f3640;
            position:fixed;
            left:0;
            top:0;
        }

        .sidebar h2{
            color:white;
            padding:35px 25px;
            font-size:24px;
        }

        .sidebar ul{
            list-style:none;
        }

        .sidebar ul li{
            width:100%;
        }

        .sidebar ul li a{
            display:block;
            padding:18px 25px;
            color:white;
            text-decoration:none;
            transition:0.3s;
            font-size:18px;
        }

        .sidebar ul li a:hover{
            background:#4b5563;
        }

        .active{
            background:#4b5563;
        }

        /* CONTENT */
        .main{
            margin-left:270px;
            width:100%;
            padding:30px;
        }

        .main h1{
            margin-bottom:30px;
            font-size:50px;
        }

        .cards{
            display:flex;
            gap:25px;
            flex-wrap:wrap;
            margin-bottom:40px;
        }

        .card{
            flex:1;
            min-width:220px;
            padding:30px;
            border-radius:15px;
            color:white;
        }

        .blue{
            background:#4f6edb;
        }

        .green{
            background:#22c55e;
        }

        .yellow{
            background:#f4c542;
        }

        .red{
            background:#ef4444;
        }

        .card h3{
            margin-bottom:15px;
            font-size:20px;
        }

        .card p{
            font-size:40px;
            font-weight:bold;
        }

        /* TABLE */
        .table-box{
            background:white;
            padding:20px;
            border-radius:12px;
            box-shadow:0 2px 10px rgba(0,0,0,0.1);
        }

        .table-box h2{
            margin-bottom:20px;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        table th{
            background:#f3f4f6;
            padding:15px;
            text-align:left;
        }

        table td{
            padding:15px;
            border-top:1px solid #ddd;
        }

        .badge{
            padding:6px 12px;
            border-radius:8px;
            color:white;
            font-size:14px;
        }

        .success{
            background:green;
        }

        .warning{
            background:orange;
        }

    </style>
</head>
<body>

<div class="container">

    <!-- SIDEBAR -->
<div class="sidebar">

    <h2>Organizer</h2>

    <ul>

        <li>
            <a href="/dashboard-organizer">
                Dashboard
            </a>
        </li>

        <li>
            <a href="/manajemen-event">
                Kelola Event
            </a>
        </li>

        <li>
            <a href="/tiket">
                Tiket
            </a>
        </li>

        <li>
            <a href="/peserta">
                Peserta
            </a>
        </li>

        <li>
            <a href="/transaksi">
                Transaksi
            </a>
        </li>

        <li>
            <a href="/laporan">
                Laporan
            </a>
        </li>

        <li>
            <a href="/profile-organizer">
                Profile
            </a>
        </li>

        <li>
            <a href="/logout">
                Logout
            </a>
        </li>

    </ul>

</div>
    <!-- CONTENT -->
    <div class="main">

        <h1>Dashboard Organizer</h1>

        <div class="cards">

            <div class="card blue">
                <h3>Total Event</h3>
                <p>12</p>
            </div>

            <div class="card green">
                <h3>Tiket Terjual</h3>
                <p>540</p>
            </div>

            <div class="card yellow">
                <h3>Pendapatan</h3>
                <p>Rp12JT</p>
            </div>

            <div class="card red">
                <h3>Pengunjung</h3>
                <p>1.200</p>
            </div>

        </div>

        <!-- TABLE -->
        <div class="table-box">

            <h2>Data Event</h2>

            <table>

                <tr>
                    <th>No</th>
                    <th>Nama Event</th>
                    <th>Tanggal</th>
                    <th>Lokasi</th>
                    <th>Status</th>
                </tr>

                <tr>
                    <td>1</td>
                    <td>Music Festival</td>
                    <td>20 Juni 2026</td>
                    <td>Batam</td>
                    <td>
                        <span class="badge success">
                            Aktif
                        </span>
                    </td>
                </tr>

                <tr>
                    <td>2</td>
                    <td>Seminar Teknologi</td>
                    <td>25 Juni 2026</td>
                    <td>Batam Center</td>
                    <td>
                        <span class="badge warning">
                            Pending
                        </span>
                    </td>
                </tr>

            </table>

        </div>

    </div>

</div>

</body>
</html>