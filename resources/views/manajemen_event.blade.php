<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Event</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #e5e5e5;
        }

        /* SIDEBAR */
        .sidebar {
            width: 220px;
            height: 100vh;
            background: #333;
            color: white;
            position: fixed;
            padding-top: 20px;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
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

        .logout {
            position: absolute;
            bottom: 20px;
            width: 100%;
        }

        /* MAIN */
        .main {
            margin-left: 220px;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn {
            padding: 8px 12px;
            border-radius: 20px;
            border: none;
            cursor: pointer;
        }

        .btn-add {
            background: white;
            border: 1px solid #ccc;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
        }

        table, th, td {
            border: 1px solid #999;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        .status {
            padding: 5px 10px;
            border-radius: 15px;
            color: white;
        }

        .approved { background: green; }
        .pending { background: orange; }
        .rejected { background: red; }

        .btn-edit {
            padding: 5px 10px;
            border-radius: 15px;
            border: 1px solid #ccc;
            background: white;
            cursor: pointer;
        }
    </style>
</head>
<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h2>Dashboard</h2>
    <a href="#">Dashboard</a>
    <a href="#">Manajemen Event</a>
    <a href="#">Data Transaksi</a>
    <a href="#">Kategori Tiket</a>

    <div class="logout">
        <a href="#">Keluar</a>
    </div>
</div>

<!-- MAIN -->
<div class="main">
    <div class="header">
        <h2>Halo, Admin!</h2>
        <button class="btn btn-add">+ Tambah event</button>
    </div>

    <h3>Manajemen Event</h3>

    <table>
        <thead>
            <tr>
                <th>Event</th>
                <th>Kategori</th>
                <th>Tanggal Pelaksanaan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Java Jazz Festival 2026</td>
                <td>Music</td>
                <td>01 April 2026</td>
                <td><span class="status approved">Approved</span></td>
                <td><button class="btn-edit">Edit</button></td>
            </tr>
            <tr>
                <td>Workshop Fullstack</td>
                <td>Seminar</td>
                <td>06 April 2026</td>
                <td><span class="status pending">Pending</span></td>
                <td><button class="btn-edit">Edit</button></td>
            </tr>
            <tr>
                <td>Crypto GetRich Seminar</td>
                <td>Seminar</td>
                <td>15 April 2026</td>
                <td><span class="status rejected">Rejected</span></td>
                <td><button class="btn-edit">Edit</button></td>
            </tr>
        </tbody>
    </table>
</div>

</body>
</html>