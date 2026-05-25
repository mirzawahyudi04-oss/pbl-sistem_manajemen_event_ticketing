<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Jelajahi Event</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logofavicon22.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    :root{
        --navy: #0F172A;
        --blue: #2563EB;
        --blue-hover: #1D4ED8;
        --accent: #38BDF8;
        --bg-light: #F8FAFC;
    }

    body{
        font-family:'Poppins', sans-serif;
        background: var(--bg-light);
        margin:0;
    }

    /* NAVBAR */
    .navbar{
    background: var(--navy) !important;
    padding: 8px 0;
    }

    .navbar-brand{
    font-weight: bold;
    font-size: 20px;
    }
    .nav-link{
    font-size: 15px;
    }   

    .nav-link:hover{
        color: var(--accent)!important;
    }
    .btn-outline-light{
    padding: 5px 14px;
    font-size: 14px;
    }

    /* SEARCH */
    .search-bar{
    background: var(--bg-light);
    padding: 25px 0 10px;
    text-align: center;
    }
    .search-bar input{
    width: 380px;
    max-width: 90%;
    padding: 12px 18px;
    border: 1px solid #d1d5db;
    border-radius: 30px;
    outline: none;
    box-shadow: 0 2px 8px rgba(0,0,0,.08);
    }

    /* FILTER */
    .filter-bar{
        padding:20px;
        display:flex;
        justify-content:center;
        flex-wrap:wrap;
        gap:10px;
        background:white;
        border-bottom:1px solid #ddd;
    }

    .filter-btn{
        border:none;
        padding:8px 18px;
        border-radius:25px;
        background:#eef2ff;
        color: var(--navy);
        transition:.3s;
    }

    .filter-btn:hover,
    .filter-btn.active{
        background: var(--blue);
        color:white;
    }

    /* GRID */
    .event-grid{
        display:grid;
        grid-template-columns: repeat(4,1fr);
        gap:25px;
        padding:30px;
    }

    /* CARD */
    .card{
        border:none;
        border-radius:18px;
        overflow:hidden;
        box-shadow:0 4px 15px rgba(0,0,0,.08);
        transition:.3s;
    }

    .card:hover{
        transform: translateY(-8px);
    }

    .card img{
        width:100%;
        height:180px;
        object-fit:cover;
    }

    .card-body{
        text-align:center;
        padding:20px;
    }

    .kategori{
        background:#DBEAFE;
        color: var(--blue);
        padding:5px 14px;
        border-radius:20px;
        font-size:12px;
    }

    .card-body h3{
        margin-top:12px;
        font-size:20px;
        font-weight:600;
    }

    .harga{
        color: var(--blue);
        font-size:20px;
        font-weight:bold;
    }

    .btn-detail{
        background: var(--blue);
        color:white;
        padding:10px 25px;
        border-radius:25px;
        text-decoration:none;
        transition:.3s;
    }

    .btn-detail:hover{
        background: var(--blue-hover);
        color:white;
    }

    .footer-card{
        text-align:center;
        padding:12px;
        color:#777;
        border-top:1px solid #eee;
    }

    /* FOOTER */
    footer{
        background: var(--navy);
        color:white;
        text-align:center;
        padding:25px;
        margin-top:40px;
    }
    body {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}

.event-grid {
    flex: 1; 
}

    @media(max-width:1000px){
        .event-grid{
            grid-template-columns: repeat(2,1fr);
        }
    }

    @media(max-width:600px){
        .event-grid{
            grid-template-columns:1fr;
        }
    }
</style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="/">STEVENtix</a>

        <div class="d-flex align-items-center gap-3">
            <a href="{{ route('dashboard_user') }}" class="btn btn-outline-light">
                Dashboard
            </a>
        </div>
    </div>
</nav>

<!-- SEARCH -->
<div class="search-bar">
<input type="text" 
       id="search" 
       placeholder="🔍 Cari event..." 
       onkeyup="searchEvent()"></div>

<!-- FILTER -->
<div class="filter-bar">
    <button class="filter-btn active" onclick="filterEvent('semua', this)">Semua</button>
    <button class="filter-btn" onclick="filterEvent('konser', this)">Konser</button>
    <button class="filter-btn" onclick="filterEvent('festival', this)">Festival</button>
    <button class="filter-btn" onclick="filterEvent('olahraga', this)">Olahraga</button>
    <button class="filter-btn" onclick="filterEvent('seminar', this)">Seminar</button>
    <button class="filter-btn" onclick="filterEvent('workshop', this)">Workshop</button>
    <button class="filter-btn" onclick="filterEvent('expo', this)">Expo</button>
    <button class="filter-btn" onclick="filterEvent('teater', this)">Teater</button>
    <button class="filter-btn" onclick="filterEvent('pameran', this)">Pameran</button>
    <button class="filter-btn" onclick="filterEvent('kompetisi', this)">Kompetisi</button>
</div>

<!-- DATA EVENT -->
@php $events = $events ?? []; @endphp

<div class="event-grid" id="eventContainer">
    @forelse($events as $event)
<div class="card"
     data-search="{{ strtolower($event->nama_event.' '.$event->lokasi) }}"
     data-kategori="{{ strtolower($event->kategori ?? 'umum') }}">

    <img src="{{ asset('images/default.jpg') }}" alt="{{ $event->nama_event }}">

    <div class="card-body">
        <span class="kategori">{{ $event->kategori ?? 'Umum' }}</span>
        <h3>{{ $event->nama_event }}</h3>
        <p>📅 {{ \Carbon\Carbon::parse($event->tanggal)->translatedFormat('d F Y') }}</p>
        <p>📍 {{ $event->lokasi }}</p>
        <p class="harga">
            Rp {{ number_format($event->tikets->min('harga'), 0, ',', '.') }}
        </p>
        <a href="{{ route('events.show', $event->id_event) }}" class="btn-detail">
    Lihat Tiket
</a>
    </div>

    <div class="footer-card">
        <span>{{ $event->organizer->nama_organizer ?? '-' }}</span>
    </div>
</div>

@empty
<p class="text-center">Belum ada event tersedia.</p>
@endforelse
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

<script>
function searchEvent() {
    let input = document.getElementById("search").value.toLowerCase();
    let cards = document.querySelectorAll(".card");

    cards.forEach(card => {
        let data = card.getAttribute("data-search");
        card.style.display = data.includes(input) ? "block" : "none";
    });
}

function filterEvent(kategori, btn) {
    document.querySelectorAll(".filter-btn").forEach(b => b.classList.remove("active"));
    btn.classList.add("active");

    document.querySelectorAll(".card").forEach(card => {
        if (kategori === "semua" || card.getAttribute("data-kategori") === kategori) {
            card.style.display = "block";
        } else {
            card.style.display = "none";
        }
    });
}
</script>

</body>
</html>