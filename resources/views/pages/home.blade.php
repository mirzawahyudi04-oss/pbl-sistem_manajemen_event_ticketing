<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>STEVENtix</title>
<link rel="icon" type="image/png" href="{{ asset('images/logofavicon22.png') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
:root{
    --navy:#10194F;
    --indigo:#5661A4;
    --soft:#7E92B8;
    --cream:#D9D0BF;
    --bg:#F8F9FC;
}

body{
    background:var(--bg);
    font-family:Arial,sans-serif;
    color:var(--navy);
}

/* navbar */
.navbar{
    padding:20px 0;
    background:white;
    box-shadow:0 2px 20px rgba(0,0,0,.05);
}
.navbar-brand{
    font-size:30px;
    font-weight:700;
    color:var(--navy)!important;
}
.nav-link{
    color:var(--navy)!important;
    font-weight:500;
}
.nav-link:hover{
    color:var(--indigo)!important;
}

/* hero */
.hero{
    min-height:100vh;
    display:flex;
    align-items:center;
    position:relative;
    overflow:hidden;
}

.hero::before{
    content:'';
    position:absolute;
    width:500px;
    height:500px;
    background:var(--indigo);
    border-radius:50%;
    top:-150px;
    right:-150px;
    opacity:.15;
}

.hero::after{
    content:'';
    position:absolute;
    width:400px;
    height:400px;
    background:var(--soft);
    border-radius:50%;
    bottom:-120px;
    left:-120px;
    opacity:.15;
}

.hero h1{
    font-size:62px;
    font-weight:800;
    line-height:1.2;
}

.hero p{
    font-size:20px;
    color:#666;
    margin:25px 0;
}

.btn-main{
    background:var(--navy);
    color:white;
    padding:15px 30px;
    border-radius:12px;
    text-decoration:none;
    font-weight:bold;
}
.btn-main:hover{
    background:var(--indigo);
}

.btn-second{
    border:2px solid var(--navy);
    color:var(--navy);
    padding:15px 30px;
    border-radius:12px;
    text-decoration:none;
    font-weight:bold;
}
.btn-second:hover{
    background:var(--navy);
    color:white;
}

/* floating cards */
.float-box{
    background:white;
    padding:25px;
    border-radius:20px;
    box-shadow:0 15px 40px rgba(0,0,0,.08);
    margin-bottom:20px;
    transition:.3s;
}
.float-box:hover{
    transform:translateY(-8px);
}

/* feature */
.feature{
    background:white;
    padding:35px;
    border-radius:20px;
    text-align:center;
    box-shadow:0 8px 20px rgba(0,0,0,.06);
    transition:.3s;
}
.feature:hover{
    transform:translateY(-10px);
}

.feature .icon{
    font-size:50px;
    margin-bottom:15px;
}

/* cta */
.cta{
    background:linear-gradient(135deg,var(--navy),var(--indigo));
    color:white;
    padding:70px;
    border-radius:30px;
}

/* footer */
footer{
    background:var(--navy);
    color:white;
    padding:40px 0;
}
</style>
</head>
<body>


<!-- NAV -->
<nav class="navbar navbar-expand-lg">
<div class="container">
    <a class="navbar-brand" href="/">STEVENtix</a>

    <div class="d-flex gap-3">
        
        <a href="{{ route('login') }}" class="btn btn-outline-dark">Login</a>
        <a href="{{ route('register') }}" class="btn btn-dark">Daftar</a>
    </div>
</div>
</nav>


<!-- HERO -->
<section class="hero">
<div class="container">
<div class="row align-items-center">

<div class="col-md-7">
    <h1>Beli Tiket Event<br>Tanpa Ribet </h1>

    <p>
        Platform modern untuk booking tiket konser,
        seminar, workshop, dan event favoritmu.
    </p>

    <div class="d-flex gap-3">
        <a href="{{ route('login') }}" class="btn-main">
            Mulai Sekarang
        </a>

        <a href="{{ route('register') }}" class="btn-second">
            Daftar Gratis
        </a>
    </div>
</div>


<div class="col-md-5">

    <div class="float-box">
    <h3> Kelola Event</h3>
    <p class="mb-0 text-muted">Panitia dapat membuat dan mengatur event dengan mudah</p>
    </div>

    <div class="float-box">
        <h3> Manajemen Tiket</h3>
        <p class="mb-0 text-muted">Pemesanan dan distribusi tiket lebih terorganisir</p>
    </div>

    <div class="float-box">
        <h3> Monitoring Transaksi</h3>
        <p class="mb-0 text-muted">Pantau riwayat pembayaran dan status tiket pengguna</p>
</div>
</div>

</div>
</div>
</section>



<!-- FEATURE -->
<section class="container py-5">
<h2 class="text-center mb-5 fw-bold">Kenapa Harus STEVENtix?</h2>

<div class="row g-4">

<div class="col-md-4">
    <div class="feature">
        <div class="icon">⚡</div>
        <h5>Cepat</h5>
        <p>Pesan tiket hanya dalam hitungan detik.</p>
    </div>
</div>

<div class="col-md-4">
    <div class="feature">
        <div class="icon">🔒</div>
        <h5>Aman</h5>
        <p>Pembayaran aman dan terenkripsi.</p>
    </div>
</div>

<div class="col-md-4">
    <div class="feature">
        <div class="icon">🎉</div>
        <h5>Banyak Event</h5>
        <p>Konser, seminar, workshop, semua ada.</p>
    </div>
</div>
</div>
</section>
<div class="container mt-5">
    <h4 class="mb-4 fw-bold">Event Seru Untukmu</h4>

    <div class="row g-4">

        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                <img src="https://picsum.photos/400/220?random=11"
                     style="height:180px; object-fit:cover;">
                <div class="card-body">
                    <small class="text-muted">Batam</small>
                    <h5 class="mt-2">Music Festival 2026</h5>
                    <p class="text-muted mb-2">Oleh STEVENtix Organizer</p>
                    <hr>
                    <small class="text-muted">Mulai dari</small>
                    <h6 class="fw-bold text-primary">Rp150.000</h6>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                <img src="https://picsum.photos/400/220?random=12"
                     style="height:180px; object-fit:cover;">
                <div class="card-body">
                    <small class="text-muted">Jakarta</small>
                    <h5 class="mt-2">Tech Conference</h5>
                    <p class="text-muted mb-2">Oleh Event Corp</p>
                    <hr>
                    <small class="text-muted">Mulai dari</small>
                    <h6 class="fw-bold text-primary">Rp100.000</h6>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                <img src="https://picsum.photos/400/220?random=13"
                     style="height:180px; object-fit:cover;">
                <div class="card-body">
                    <small class="text-muted">Bandung</small>
                    <h5 class="mt-2">Workshop UI/UX</h5>
                    <p class="text-muted mb-2">Oleh Design Hub</p>
                    <hr>
                    <small class="text-muted">Mulai dari</small>
                    <h6 class="fw-bold text-primary">Rp75.000</h6>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100">
                <img src="https://picsum.photos/400/220?random=14"
                     style="height:180px; object-fit:cover;">
                <div class="card-body">
                    <small class="text-muted">Surabaya</small>
                    <h5 class="mt-2">Fun Run 5K</h5>
                    <p class="text-muted mb-2">Oleh Sport Indo</p>
                    <hr>
                    <small class="text-muted">Mulai dari</small>
                    <h6 class="fw-bold text-primary">Rp50.000</h6>
                </div>
            </div>
        </div>

    </div>
</div>


<!-- CTA -->
<section class="container py-5">
<div class="cta text-center">
    <h2 class="fw-bold mb-3">
        Siap Ikut Event Favoritmu?
    </h2>

    <p class="mb-4">
        Daftar sekarang dan mulai booking tiket pertama kamu.
    </p>

    <a href="{{ route('register') }}" class="btn btn-light px-5 py-3">
        Daftar Sekarang
    </a>
</div>
</section>



<!-- FOOTER -->
<footer>
<div class="container text-center">
    <h4>STEVENtix</h4>
    <p>Platform event ticketing modern.</p>
    <small>© {{ date('Y') }} All Rights Reserved</small>
</div>
</footer>

</body>
</html>