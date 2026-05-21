<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Event</title>

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
            padding:30px;
            font-size:28px;
        }

        .menu{
            display:flex;
            flex-direction:column;
        }

        .menu a{
            color:white;
            text-decoration:none;
            padding:18px 30px;
            transition:0.3s;
            font-size:18px;
        }

        .menu a:hover{
            background:#4b5563;
        }

        .active{
            background:#4b5563;
        }

        .logout{
            position:absolute;
            bottom:20px;
            width:100%;
        }

        .btn-logout{
            display:block;
            background:#dc2626;
            color:white;
            text-decoration:none;
            padding:18px 30px;
        }

        /* MAIN */

        .main{
            margin-left:270px;
            width:100%;
            padding:30px;
        }

        .main-header{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:30px;
        }

        .main-header h1{
            font-size:45px;
        }

        .btn-add{
            background:#2563eb;
            color:white;
            padding:14px 22px;
            border:none;
            border-radius:10px;
            cursor:pointer;
            font-size:16px;
        }

        /* TABLE */

        .table-box{
            background:white;
            padding:20px;
            border-radius:15px;
            box-shadow:0 2px 10px rgba(0,0,0,0.1);
            margin-bottom:30px;
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

        table tr:hover{
            background:#f9fafb;
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

        .danger{
            background:red;
        }

        .secondary{
            background:gray;
        }

        .btn{
            padding:8px 12px;
            border:none;
            border-radius:8px;
            color:white;
            cursor:pointer;
            font-size:14px;
        }

        .edit{
            background:#2563eb;
        }

        .delete{
            background:#dc2626;
        }

        .detail{
            background:#16a34a;
        }

        /* FORM */

        .form-box{
            background:white;
            padding:25px;
            border-radius:15px;
            box-shadow:0 2px 10px rgba(0,0,0,0.1);
        }

        .form-box h2{
            margin-bottom:20px;
        }

        .form-group{
            margin-bottom:20px;
        }

        .form-group label{
            display:block;
            margin-bottom:8px;
            font-weight:bold;
        }

        .form-group input,
        .form-group textarea,
        .form-group select{
            width:100%;
            padding:12px;
            border:1px solid #ccc;
            border-radius:10px;
        }

        textarea{
            resize:none;
            height:120px;
        }

        .btn-submit{
            background:#2563eb;
            color:white;
            border:none;
            padding:14px 20px;
            border-radius:10px;
            cursor:pointer;
        }
        .checkbox-group{
    display:flex;
    gap:20px;
    margin-top:10px;
}

.check-item{
    display:flex;
    align-items:center;
    gap:8px;
    background:#f3f4f6;
    padding:12px 18px;
    border-radius:10px;
    cursor:pointer;
    font-weight:bold;
}

.check-item input{
    width:18px;
    height:18px;
}

    </style>
</head>
<body>

<div class="container">

    <!-- SIDEBAR -->

    <div class="sidebar">

        <h2>ORGANIZER</h2>

        <div class="menu">

            <a href="/dashboard-organizer">
                Dashboard
            </a>

            <a href="/manajemen-event" class="active">
                Kelola Event
            </a>

            <a href="/tiket">
                Tiket
            </a>

            <a href="/peserta">
                Peserta
            </a>

            <a href="/transaksi">
                Transaksi
            </a>

            <a href="/laporan">
                Laporapn
            </a>

            <a href="/profile-organizer">
                Profile
            </a>

        </div>

        <div class="logout">
            <a href="/logout" class="btn-logout">
                Logout
            </a>
        </div>

    </div>

    <!-- MAIN -->

    <div class="main">

        <div class="main-header">

            <h1>Kelola Event</h1>

            <button class="btn-add">
                + Tambah Event
            </button>

        </div>

        <!-- TABLE EVENT -->

        <div class="table-box">

            <table>

                <tr>
                    <th>No</th>
                    <th>Nama Event</th>
                    <th>Tanggal</th>
                    <th>Lokasi</th>
                    <th>Status</th>
                    <th>Aksi</th>
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
                    <td>
                        <button class="btn edit">Edit</button>
                        <button class="btn delete">Hapus</button>
                        <button class="btn detail">Detail</button>
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
                    <td>
                        <button class="btn edit">Edit</button>
                        <button class="btn delete">Hapus</button>
                        <button class="btn detail">Detail</button>
                    </td>
                </tr>

                <tr>
                    <td>3</td>
                    <td>Gaming Competition</td>
                    <td>10 Juli 2026</td>
                    <td>Nagoya</td>
                    <td>
                        <span class="badge danger">
                            Ditolak
                        </span>
                    </td>
                    <td>
                        <button class="btn edit">Edit</button>
                        <button class="btn delete">Hapus</button>
                        <button class="btn detail">Detail</button>
                    </td>
                </tr>

                <tr>
                    <td>4</td>
                    <td>Business Expo</td>
                    <td>18 Juli 2026</td>
                    <td>Batamindo</td>
                    <td>
                        <span class="badge secondary">
                            Selesai
                        </span>
                    </td>
                    <td>
                        <button class="btn edit">Edit</button>
                        <button class="btn delete">Hapus</button>
                        <button class="btn detail">Detail</button>
                    </td>
                </tr>

            </table>

        </div>

        <!-- FORM TAMBAH EVENT -->

        <div class="form-box">

            <h2>Form Tambah Event</h2>

            <form>

                <div class="form-group">
                    <label>Nama Event</label>
                    <input type="text" placeholder="Masukkan nama event">
                </div>

                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea placeholder="Masukkan deskripsi event"></textarea>
                </div>

                <div class="form-group">
                    <label>Poster Event</label>
                    <input type="file">
                </div>

                <div class="form-group">
                    <label>Lokasi</label>
                    <input type="text" placeholder="Masukkan lokasi">
                </div>

                <div class="form-group">
                    <label>Tanggal Event</label>
                    <input type="date">
                </div>

                <div class="form-group">
                    <label>Harga Tiket</label>
                    <input type="number" placeholder="Masukkan harga tiket">
                </div>

                <div class="form-group">
   

    <div class="form-group">

    <label>Kategori Tiket</label>

    <div class="checkbox-group">

        <label class="check-item">
            <input type="checkbox">
            VIP
        </label>

        <label class="check-item">
            <input type="checkbox">
            VVIP
        </label>

        <label class="check-item">
            <input type="checkbox">
            Regular
        </label>

    </div>

</div>
</div>

                <button class="btn-submit">
                    Simpan Event
                </button>

            </form>

        </div>

    </div>

</div>

</body>
</html>