<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Event Ticketing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    :root{
        --navy: #0F172A;
        --blue: #2563EB;
        --blue-hover: #1D4ED8;
        --accent: #38BDF8;
        --bg-light: #F8FAFC;
        --white: #FFFFFF;
    }

    body{
        background-color: var(--bg-light);
        font-family: Arial, sans-serif;
    }

    .hero {
        background: url('/images/concert-bg.jpg') center/cover no-repeat;
        height: 450px;
        color: white;
        display: flex;
        align-items: center;
        background-color: rgba(15, 23, 42, 0.75);
        background-blend-mode: darken;
    }

    .overlay {
        width: 100%;
        padding: 60px 40px;
    }

    .navbar{
        background-color: var(--navy) !important;
    }

    .navbar-brand{
        font-weight: bold;
        color: var(--white) !important;
    }

    .nav-link:hover{
        color: var(--accent) !important;
    }

    .btn-primary{
        background-color: var(--blue);
        border: none;
    }

    .btn-primary:hover{
        background-color: var(--blue-hover);
    }

    .btn-outline-light:hover{
        background-color: var(--blue);
        border-color: var(--blue);
    }

    .btn-light{
        border-radius: 8px;
    }

    .card-box {
        background: white;
        border-radius: 15px;
        padding: 25px 20px;
        text-align: center;
        height: 100%;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        transition: 0.3s;
    }

    .card-box:hover{
        transform: translateY(-5px);
    }

    .step {
        background: white;
        border-radius: 20px;
        padding: 25px 20px;
        text-align: center;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }

    .event-card {
        border-radius: 15px;
        overflow: hidden;
        border: none;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        transition: 0.3s;
    }

    .event-card:hover{
        transform: translateY(-5px);
    }

    .event-card .btn{
        background-color: var(--blue);
        border: none;
        color: white;
    }

    .event-card .btn:hover{
        background-color: var(--blue-hover);
    }

    .footer-custom{
    background: var(--navy);
    color: white;
    }

    .footer-logo{
        color: white;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .footer-desc{
        color: rgba(255,255,255,0.75);
        font-size: 14px;
        margin-bottom: 10px;
    }

    .footer-line{
        border-color: rgba(255,255,255,0.15);
        width: 50%;
        margin: 15px auto;
    }
</style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="/">STEVENtix</a>
        <div class="d-flex align-items-center gap-3">
            <a class="nav-link text-white" href="/">Beranda</a>
            <a class="nav-link text-white" href="{{ route('login') }}">Jelajahi Event</a>
            <a class="nav-link text-white" href="#">Cara Kerja</a>
            <a href="{{ route('login') }}" class="btn btn-outline-light">Login</a>
            <a href="{{ route('register') }}" class="btn btn-light">Daftar</a>
        </div>
    </div>
</nav>

<!-- HERO -->
<section class="hero">
    <div class="overlay">
        <div class="container">
            <h2 class="fw-bold mb-3">Temukan Event Terbaik,<br>Pesan Tiket dalam Sekejap</h2>
            <p class="mb-4">Cari, Pilih, dan beli tiket event favoritmu dengan cepat dan aman.</p>
            <a href="{{ route('login') }}" class="btn btn-primary px-4">Jelajahi Event</a>
        </div>
    </div>
</section>

<!-- KELEBIHAN -->
<div class="container mt-5">
    <h5 class="text-center mb-4">Kenapa Pilih Platform Ini?</h5>
    <div class="row g-4 align-items-stretch">
        <div class="col-md-4 d-flex">
            <div class="card-box w-100">
                <h6 class="fw-bold mb-2">Kemudahan Akses</h6>
                <p class="text-muted mb-0">Cepat & mudah pesan tiket hanya dalam hitungan detik tanpa perlu antre panjang.</p>
            </div>
        </div>
        <div class="col-md-4 d-flex">
            <div class="card-box w-100">
                <h6 class="fw-bold mb-2">Keamanan Transaksi</h6>
                <p class="text-muted mb-0">Pembayaran aman dengan berbagai metode yang terenkripsi dan terjamin keamanannya.</p>
            </div>
        </div>
        <div class="col-md-4 d-flex">
            <div class="card-box w-100">
                <h6 class="fw-bold mb-2">Pilihan Event Lengkap</h6>
                <p class="text-muted mb-0">Mulai dari konser musik, seminar, hingga workshop kreatif semua ada di sini.</p>
            </div>
        </div>
    </div>
</div>

<!-- EVENT PREVIEW -->
<div class="container mt-5">
    <h5 class="text-center mb-4">Event Terbaru</h5>
    <div class="row g-4 align-items-stretch">

        @php
            $events = [
                
                ['nama' => 'Music Festival', 'img' => 'musik1.jpg'],
                ['nama' => 'Workshop Kreatif', 'img' => 'ws2.jpg'],
                ['nama' => 'Fun Run 2026', 'img' => 'funrun3.jpg'],
                ['nama' => 'Seminar Teknologi', 'img' => 'seminar4.jpg'],
                
            ];
        @endphp

        @foreach($events as $event)
        <div class="col-md-3 d-flex">
            <div class="card event-card w-100">
                <img src="{{ asset('images/' . $event['img']) }}"
                     style="height:150px; object-fit:cover; width:100%; filter: grayscale(100%);"">
                <div class="card-body text-center">
                    <p class="mb-3">{{ $event['nama'] }}</p>
                    <a href="{{ route('login') }}" class="btn btn-sm">Detail</a>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>

<!-- CARA KERJA -->
<div class="container mt-5 mb-5">
    <h5 class="text-center mb-2">Cara Kerja</h5>
    <p class="text-center text-muted mb-4">
        Hanya dalam beberapa langkah mudah, kamu sudah bisa mendapatkan tiket event favoritmu.
    </p>
    <div class="row g-4 align-items-stretch">
        <div class="col-md-3 d-flex">
            <div class="step w-100">
                <b>Cari Event</b><br>
                <small class="text-muted">Cari dan pilih event favorit kamu di halaman jelajahi.</small>
            </div>
        </div>
        <div class="col-md-3 d-flex">
            <div class="step w-100">
                <b>Pilih Tiket</b><br>
                <small class="text-muted">Tentukan jumlah tiket dan isi data diri dengan benar.</small>
            </div>
        </div>
        <div class="col-md-3 d-flex">
            <div class="step w-100">
                <b>Pembayaran</b><br>
                <small class="text-muted">Selesaikan pembayaran via transfer bank, e-wallet, atau kartu kredit.</small>
            </div>
        </div>
        <div class="col-md-3 d-flex">
            <div class="step w-100">
                <b>E-Ticket</b><br>
                <small class="text-muted">Tiket dikirim otomatis ke email kamu dan siap digunakan.</small>
            </div>
        </div>
    </div>
</div>
<!-- FOOTER -->
<footer class="footer-custom mt-5">
    <div class="container text-center py-4">
        <h5 class="footer-logo">STEVENtix</h5>
        <p class="footer-desc">
            Platform tiket event terbaik untuk mempermudah pemesanan tiket secara online.
        </p>
        <hr class="footer-line">
        <p class="mb-0 small">
            © {{ date('Y') }} STEVENtix | All Rights Reserved
        </p>
    </div>
</footer>

</body>
</html>