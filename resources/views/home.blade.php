<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Event Ticketing</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .hero {
            background: url('https://source.unsplash.com/1600x600/?concert') center/cover no-repeat;
            height: 400px;
            color: white;
            display: flex;
            align-items: center;
        }

        .overlay {
            background: rgba(0,0,0,0.6);
            width: 100%;
            padding: 40px;
        }

        .card-box {
            background: #f1f1f1;
            border-radius: 10px;
            padding: 15px;
            text-align: center;
        }

        .step {
            background: #e0e0e0;
            border-radius: 20px;
            padding: 15px;
        }
    </style>
</head>
<body>

<!-- ✅ NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand" href="/">LOGO</a>

        <div class="d-flex align-items-center">

            <a class="nav-link text-white me-3" href="/">Beranda</a>

            <a class="nav-link text-white me-3" href="{{ route('events') }}">
                Jelajahi Event
            </a>

            <a class="nav-link text-white me-3" href="#">Cara Kerja</a>

            <!-- 🔥 LOGIN & DAFTAR -->
            <a href="{{ route('login') }}" class="btn btn-outline-light me-2">
                Login
            </a>

            <a href="{{ route('register') }}" class="btn btn-light">
                Daftar
            </a>

        </div>
    </div>
</nav>

<!-- ✅ HERO -->
<section class="hero">
    <div class="overlay container">
        <h2>Temukan Event Terbaik,<br>Pesan Tiket dalam Sekejap</h2>
        <p>Cari, Pilih, dan beli tiket event favoritmu dengan cepat dan aman.</p>

        <a href="{{ route('events') }}" class="btn btn-light">
            Jelajahi Event
        </a>
    </div>
</section>

<!-- KELEBIHAN -->
<div class="container mt-5 text-center">
    <h5>Kenapa Pilih Platform Ini?</h5>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card-box">
                <h6>Kemudahan Akses</h6>
                <p>Cepat & Mudah pesan tiket</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card-box">
                <h6>Keamanan Transaksi</h6>
                <p>Pembayaran aman & terpercaya</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card-box">
                <h6>Pilihan Event Lengkap</h6>
                <p>Banyak event menarik tersedia</p>
            </div>
        </div>
    </div>
</div>

<!-- EVENT PREVIEW -->
<div class="container mt-5">
    <h5 class="text-center">Event Terbaru</h5>

    <div class="row mt-4">
        @for($i=0;$i<3;$i++)
        <div class="col-md-4">
            <div class="card p-3 text-center">
                <div style="height:100px; background:#ccc;"></div>
                <p class="mt-2">Nama Event</p>

                <a href="{{ route('events') }}" class="btn btn-secondary">
                    Detail
                </a>
            </div>
        </div>
        @endfor
    </div>
</div>

<!-- CARA KERJA -->
<div class="container mt-5 text-center">
    <h5>Cara Kerja</h5>
    <p class="text-muted">
        Hanya dalam beberapa langkah mudah, kamu sudah bisa mendapatkan tiket event favoritmu.
    </p>

    <div class="row mt-4">
        <div class="col-md-3">
            <div class="step">
                <b>Cari Event</b><br>
                <small>Temukan event sesuai minatmu</small>
            </div>
        </div>

        <div class="col-md-3">
            <div class="step">
                <b>Pilih Tiket</b><br>
                <small>Pilih kategori & jumlah tiket</small>
            </div>
        </div>

        <div class="col-md-3">
            <div class="step">
                <b>Pembayaran</b><br>
                <small>Lakukan pembayaran dengan aman</small>
            </div>
        </div>

        <div class="col-md-3">
            <div class="step">
                <b>E-Ticket</b><br>
                <small>Tiket langsung dikirim ke kamu</small>
            </div>
        </div>
    </div>
</div>