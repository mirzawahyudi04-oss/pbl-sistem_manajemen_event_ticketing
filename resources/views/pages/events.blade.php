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
    --navy:#10194F;
    --indigo:#5661A4;
    --soft:#7E92B8;
    --cream:#D9D0BF;
    --bg:#F8F9FC;
    --white:#fff;
}

body{
    font-family:'Poppins',sans-serif;
    background:var(--bg);
    margin:0;
    color:var(--navy);
}

/* NAVBAR */
.navbar{
    background:var(--navy)!important;
    padding:14px 0;
    box-shadow:0 4px 12px rgba(0,0,0,.1);
}
.navbar-brand{
    font-weight:700;
    color:var(--cream)!important;
    font-size:24px;
}
.btn-outline-light{
    border-radius:10px;
}

/* SEARCH */
.search-bar{
    padding:35px 0 20px;
    text-align:center;
}
.search-bar input{
    width:420px;
    max-width:90%;
    padding:14px 20px;
    border:none;
    border-radius:30px;
    box-shadow:0 8px 20px rgba(16,25,79,.08);
    outline:none;
}

/* FILTER */
.filter-bar{
    display:flex;
    justify-content:center;
    flex-wrap:wrap;
    gap:12px;
    padding:10px 20px 25px;
}

.filter-btn{
    border:none;
    padding:10px 20px;
    border-radius:30px;
    background:white;
    box-shadow:0 4px 12px rgba(0,0,0,.06);
    color:var(--navy);
    transition:.3s;
}

.filter-btn:hover,
.filter-btn.active{
    background:var(--indigo);
    color:white;
}

/* GRID */
.event-grid{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:28px;
    padding:20px 35px 50px;
}

/* CARD */
.card{
    border:none;
    border-radius:20px;
    overflow:hidden;
    background:white;
    box-shadow:0 8px 24px rgba(16,25,79,.08);
    transition:.3s;
}

.card:hover{
    transform:translateY(-8px);
    box-shadow:0 14px 30px rgba(16,25,79,.15);
}

.card img{
    width:100%;
    height:180px;
    object-fit:cover;
    transition:.4s;
}

.card:hover img{
    transform:scale(1.05);
}

.card-body{
    padding:20px;
}

.kategori{
    background:#EEF2FF;
    color:var(--indigo);
    padding:6px 14px;
    border-radius:20px;
    font-size:12px;
    font-weight:600;
}

.card-body h3{
    margin:15px 0 8px;
    font-size:20px;
    font-weight:700;
}

.card-body p{
    color:#666;
    margin-bottom:6px;
    font-size:14px;
}

.harga{
    color:var(--navy)!important;
    font-size:22px !important;
    font-weight:700;
    margin:15px 0;
}

.btn-detail{
    display:inline-block;
    width:100%;
    text-align:center;
    padding:12px;
    border-radius:12px;
    text-decoration:none;
    background:var(--indigo);
    color:white;
    transition:.3s;
}

.btn-detail:hover{
    background:var(--soft);
    color:white;
}

.footer-card{
    padding:15px 20px;
    border-top:1px solid #eee;
    color:#777;
    font-size:13px;
}

/* FOOTER */
.footer-custom{
    background:var(--navy);
    color:white;
}

.footer-logo{
    color:var(--cream);
    font-weight:bold;
}

.footer-desc{
    color:rgba(255,255,255,.75);
}

.footer-line{
    width:50%;
    margin:15px auto;
    border-color:rgba(255,255,255,.2);
}

/* RESPONSIVE */
@media(max-width:1000px){
    .event-grid{
        grid-template-columns:repeat(2,1fr);
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

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="/">STEVENtix</a>
        <a href="{{ route('dashboard_user') }}" class="btn btn-outline-light">
            Dashboard
        </a>
    </div>
</nav>

<div class="search-bar">
    <input type="text"
           id="search"
           placeholder="Cari event..."
           onkeyup="searchEvent()">
</div>

<div class="filter-bar">
    <button class="filter-btn active" onclick="filterEvent('semua', this)">Semua</button>
    <button class="filter-btn" onclick="filterEvent('konser', this)">Konser</button>
    <button class="filter-btn" onclick="filterEvent('festival', this)">Festival</button>
    <button class="filter-btn" onclick="filterEvent('olahraga', this)">Olahraga</button>
    <button class="filter-btn" onclick="filterEvent('seminar', this)">Seminar</button>
</div>

@php $events = $events ?? []; @endphp

<div class="event-grid" id="eventContainer">
@forelse($events as $event)

<div class="card"
     data-search="{{ strtolower($event->nama_event.' '.$event->lokasi) }}"
     data-kategori="{{ strtolower($event->kategori ?? 'umum') }}">

    <img src="{{ asset('storage/'.$event->gambar) }}" alt="{{ $event->nama_event }}">

    <div class="card-body">
        <span class="kategori">{{ $event->kategori ?? 'Umum' }}</span>

        <h3>{{ $event->nama_event }}</h3>

        <p>📅 {{ \Carbon\Carbon::parse($event->tanggal)->translatedFormat('d F Y') }}</p>
        <p>📍 {{ $event->lokasi }}</p>

        <p class="harga">
            Rp {{ number_format($event->tikets->min('harga'),0,',','.') }}
        </p>

        <a href="{{ route('events.show', $event->id_event) }}" class="btn-detail">
            Lihat Tiket
        </a>
    </div>

    <div class="footer-card">
        {{ $event->organizer->user->name ?? '-' }}
    </div>
</div>

@empty
<p class="text-center">Belum ada event tersedia.</p>
@endforelse
</div>

<footer class="footer-custom">
    <div class="container text-center py-4">
        <h5 class="footer-logo">STEVENtix</h5>
        <p class="footer-desc">
            Platform tiket event terbaik untuk mempermudah pemesanan tiket secara online.
        </p>
        <hr class="footer-line">
        <p class="mb-0 small">
            © {{ date('Y') }} STEVENtix
        </p>
    </div>
</footer>

<script>
function searchEvent(){
    let input=document.getElementById("search").value.toLowerCase();
    let cards=document.querySelectorAll(".card");

    cards.forEach(card=>{
        let data=card.getAttribute("data-search");
        card.style.display=data.includes(input)?"block":"none";
    });
}

function filterEvent(kategori,btn){
    document.querySelectorAll(".filter-btn")
    .forEach(b=>b.classList.remove("active"));

    btn.classList.add("active");

    document.querySelectorAll(".card").forEach(card=>{
        if(kategori==="semua" || card.getAttribute("data-kategori")===kategori){
            card.style.display="block";
        }else{
            card.style.display="none";
        }
    });
}
</script>

</body>
</html>