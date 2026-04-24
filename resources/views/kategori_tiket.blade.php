<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kategori Tiket</title>
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

        .icons {
            font-size: 20px;
        }

        .btn {
            padding: 6px 12px;
            border-radius: 20px;
            border: 1px solid #ccc;
            background: white;
            cursor: pointer;
        }

        /* TABLE */
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

        .btn-edit {
            padding: 4px 10px;
            border-radius: 15px;
            border: 1px solid #ccc;
            background: white;
            cursor: pointer;
        }

        .btn-delete {
            padding: 4px 10px;
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
        <div class="icons">🔔 👤</div>
    </div>

    <h3>Kategori tiket</h3>

    <button class="btn">+ kelola tiket</button>

    <table>
        <thead>
            <tr>
                <th>Jenis Tiket</th>
                <th>Harga</th>
                <th>Kuota</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>VIP</td>
                <td>350.000</td>
                <td>01 April 2026</td>
                <td>
                    <button class="btn-edit">Edit</button>
                    <button class="btn-delete">Hapus</button>
                </td>
            </tr>
            <tr>
                <td>Reguler</td>
                <td>250.000</td>
                <td>06 April 2026</td>
                <td>
                    <button class="btn-edit">Edit</button>
                    <button class="btn-delete">Hapus</button>
                </td>
            </tr>
            <tr>
                <td>Festival</td>
                <td>200.000</td>
                <td>15 April 2026</td>
                <td>
                    <button class="btn-edit">Edit</button>
                    <button class="btn-delete">Hapus</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

</body>
</html>