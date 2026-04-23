<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Event Ticketing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .hero {
            background: url('/images/concert.jpg') center/cover no-repeat;
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

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">LOGO</a>
        <div>
            <a class="nav-link d-inline text-white" href="/">Beranda</a>
            <a class="nav-link d-inline text-white" href="#">Event Populer</a>
            <a class="nav-link d-inline text-white" href="#">Cara Kerja</a>

            <!-- ✅ LOGIN BUTTON FIX -->
            <a href="{{ route('login') }}" class="btn btn-outline-light">Login</a>

            <!-- (Opsional) REGISTER -->
            <a href="/register" class="btn btn-light">Daftar</a>
        </div>
    </div>
</nav>

<!-- HERO -->
<section class="hero">
    <div class="overlay container">
        <h2>Temukan Event Terbaik,<br>Pesan Tiket dalam Sekejap</h2>
        <p>Cari, Pilih, dan beli tiket event favoritmu dengan cepat dan aman.</p>
        <button class="btn btn-light">Jelajahi Event</button>
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

<!-- EVENT -->
<div class="container mt-5">
    <h5 class="text-center">Event Terbaru</h5>
    <div class="row mt-4">
        @for($i=0;$i<3;$i++)
        <div class="col-md-4">
            <div class="card p-3 text-center">
                <div style="height:100px; background:#ccc;"></div>
                <p class="mt-2">Nama Event</p>
                <button class="btn btn-secondary">Detail</button>
            </div>
        </div>
        @endfor
    </div>
</div>

<!-- CARA KERJA -->
<div class="container mt-5 text-center">
    <h5>Cara Kerja</h5>
    <div class="row mt-4">
        <div class="col-md-3"><div class="step">Cari event</div></div>
        <div class="col-md-3"><div class="step">Pilih tiket</div></div>
        <div class="col-md-3"><div class="step">Pembayaran</div></div>
        <div class="col-md-3"><div class="step">E-ticket dikirim</div></div>
    </div>
</div>

<!-- FOOTER -->
<footer class="bg-dark text-white text-center mt-5 p-3">
    Copyright ©2026
</footer>

</body>
</html>