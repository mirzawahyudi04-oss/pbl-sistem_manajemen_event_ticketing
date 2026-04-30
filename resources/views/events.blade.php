<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Jelajahi Event</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f3f3f3;
            margin: 0;
        }

        /* SEARCH */
        .search-bar {
            background: #666;
            padding: 15px;
            text-align: center;
        }

        .search-bar input {
            width: 350px;
            padding: 10px 20px;
            border-radius: 20px;
            border: none;
            text-align: center;
            font-family: 'Poppins', sans-serif;
            outline: none;
        }

        /* FILTER */
        .filter-bar {
            background: #f3f3f3;
            padding: 12px 20px;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            justify-content: center;
            border-bottom: 1px solid #ddd;
        }

        .filter-btn {
            padding: 6px 16px;
            border-radius: 20px;
            border: 1px solid #aaa;
            background: white;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
            transition: 0.2s;
        }

        .filter-btn:hover, .filter-btn.active {
            background: #444;
            color: white;
            border-color: #444;
        }

        /* GRID */
        .event-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            padding: 20px;
        }

        /* CARD */
        .card {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: 0.3s;
        }

        .card:hover {
            transform: scale(1.02);
        }

        .card img {
            width: 100%;
            height: 140px;
            object-fit: cover;
            object-position: center;
        
        }

        .card-body {
            padding: 12px;
            text-align: center;
        }

        .card-body h3 {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 4px;
        }

        .card-body .kategori {
            display: inline-block;
            background: #eee;
            border-radius: 20px;
            padding: 2px 10px;
            font-size: 11px;
            color: #555;
            margin-bottom: 6px;
        }

        .card-body p {
            font-size: 12px;
            color: gray;
            margin: 2px 0;
        }

        .card-body .harga {
            font-size: 13px;
            font-weight: bold;
            color: #333;
            margin: 6px 0;
        }

        .btn-detail {
            background: #999;
            border: none;
            border-radius: 20px;
            padding: 7px 20px;
            color: white;
            cursor: pointer;
            text-decoration: none;
            font-size: 13px;
            font-family: 'Poppins', sans-serif;
            transition: 0.2s;
        }

        .btn-detail:hover {
            background: #777;
            color: white;
        }

        .footer-card {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 10px;
            border-top: 1px solid #eee;
            font-size: 12px;
            color: #555;
        }

        footer {
            background: #222;
            color: white;
            text-align: center;
            padding: 16px;
            margin-top: 20px;
            font-size: 13px;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">LOGO</a>
        <div class="d-flex align-items-center gap-3">
            <a class="nav-link text-white" href="/">Beranda</a>
            <a class="nav-link text-white" href="#">Jelajahi Event</a>
            <a class="nav-link text-white" href="#">Cara Kerja</a>
        </div>
    </div>
</nav>

<!-- SEARCH -->
<div class="search-bar">
    <input type="text" id="search" placeholder="Cari event, lokasi, kategori..." onkeyup="searchEvent()">
</div>

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
@php
$events = [
    ['kategori'=>'Konser',    'nama'=>'Java Jazz Festival',         'tanggal'=>'25 Mei 2026',    'lokasi'=>'Jakarta',    'harga'=>'Rp 250.000',   'organizer'=>'Jazz Fest',    'img'=>'musik1.jpg'],
    ['kategori'=>'Konser',    'nama'=>'We The Fest',                'tanggal'=>'20 Juli 2026',   'lokasi'=>'Jakarta',    'harga'=>'Rp 500.000',   'organizer'=>'Ismaya Live',  'img'=>'musik2.jpg'],
    ['kategori'=>'Konser',    'nama'=>'Coldplay Live',              'tanggal'=>'10 Sept 2026',   'lokasi'=>'Jakarta',    'harga'=>'Rp 1.500.000', 'organizer'=>'Music Asia',   'img'=>'musik3.jpg'],
    ['kategori'=>'Festival',  'nama'=>'Djakarta Warehouse Project', 'tanggal'=>'12 Des 2026',    'lokasi'=>'Jakarta',    'harga'=>'Rp 750.000',   'organizer'=>'DWP',          'img'=>'festival.jpg'],
    ['kategori'=>'Olahraga',  'nama'=>'Liga 1 Indonesia',           'tanggal'=>'05 Mei 2026',    'lokasi'=>'Bandung',    'harga'=>'Rp 100.000',   'organizer'=>'PSSI',         'img'=>'liga.jpg'],
    ['kategori'=>'Olahraga',  'nama'=>'Fun Run Batam 5K',           'tanggal'=>'30 Mei 2026',    'lokasi'=>'Batam',      'harga'=>'Rp 75.000',    'organizer'=>'GoRun',        'img'=>'funrun3.jpg'],
    ['kategori'=>'Seminar',   'nama'=>'Seminar Nasional IT',        'tanggal'=>'15 Juni 2026',   'lokasi'=>'Surabaya',   'harga'=>'Rp 50.000',    'organizer'=>'TechTalk',     'img'=>'seminar4.jpg'],
    ['kategori'=>'Workshop',  'nama'=>'Bootcamp Coding',            'tanggal'=>'18 Juni 2026',   'lokasi'=>'Online',     'harga'=>'Rp 150.000',   'organizer'=>'Code Academy', 'img'=>'ws.jpg'],
    ['kategori'=>'Expo',      'nama'=>'Indonesia Comic Con',        'tanggal'=>'01 Juli 2026',   'lokasi'=>'Jakarta',    'harga'=>'Rp 120.000',   'organizer'=>'Comic ID',     'img'=>'expo.jpg'],
    ['kategori'=>'Teater',    'nama'=>'Pentas Drama Musikal',       'tanggal'=>'22 Juni 2026',   'lokasi'=>'Yogyakarta', 'harga'=>'Rp 80.000',    'organizer'=>'ArtStage',     'img'=>'teater.jpg'],
    ['kategori'=>'Pameran',   'nama'=>'Art Exhibition 2026',        'tanggal'=>'28 Juni 2026',   'lokasi'=>'Bali',       'harga'=>'Rp 60.000',    'organizer'=>'ArtSpace',     'img'=>'pameran.jpg'],
    ['kategori'=>'Kompetisi', 'nama'=>'Turnamen E-Sport MLBB',      'tanggal'=>'10 Juli 2026',   'lokasi'=>'Online',     'harga'=>'Gratis',       'organizer'=>'E-Sport ID',   'img'=>'turnamenml.jpg'],
];
@endphp

<div class="event-grid" id="eventContainer">
    @foreach($events as $e)
    <div class="card" 
         data-search="{{ strtolower($e['kategori'].' '.$e['nama'].' '.$e['lokasi']) }}"
         data-kategori="{{ strtolower($e['kategori']) }}">

        <img src="{{ asset('images/' . $e['img']) }}" alt="{{ $e['nama'] }}">

        <div class="card-body">
            <span class="kategori">{{ $e['kategori'] }}</span>
            <h3>{{ $e['nama'] }}</h3>
            <p>📅 {{ $e['tanggal'] }}</p>
            <p>📍 {{ $e['lokasi'] }}</p>
            <p class="harga">{{ $e['harga'] }}</p>
            <a href="/detail?nama={{ urlencode($e['nama']) }}&tanggal={{ urlencode($e['tanggal']) }}&lokasi={{ urlencode($e['lokasi']) }}&harga={{ urlencode($e['harga']) }}&img={{ urlencode($e['img']) }}&organizer={{ urlencode($e['organizer']) }}" class="btn-detail">Lihat Tiket</a>
        </div>

        <div class="footer-card">
            <span>{{ $e['organizer'] }}</span>
        </div>
    </div>
    @endforeach
</div>

<!-- FOOTER -->
<footer>
    <p class="mb-1 fw-bold">Steven.id</p>
    <p style="font-size:12px; color:#aaa;">&copy; {{ date('Y') }} Steven.id — Platform tiket event terbaik di Indonesia.</p>
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