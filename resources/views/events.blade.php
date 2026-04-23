<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Jelajahi Event</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f3f3f3;
            margin: 0;
        }

        h1 {
            padding: 20px;
            font-weight: bold;
        }

        /* SEARCH */
        .search-bar {
            background: #666;
            padding: 15px;
            text-align: center;
        }

        .search-bar input {
            width: 300px;
            padding: 10px;
            border-radius: 20px;
            border: none;
            text-align: center;
        }

        /* GRID */
        .container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 25px;
            padding: 20px;
        }

        /* CARD */
        .card {
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            overflow: hidden;
            text-align: center;
            transition: 0.3s;
        }

        .card:hover {
            transform: scale(1.03);
        }

        .card img {
            width: 100%;
            height: 140px;
            object-fit: cover;
        }

        .card h3 {
            margin: 10px 0 5px;
            font-size: 16px;
        }

        .card p {
            font-size: 13px;
            color: gray;
            margin: 2px 0;
        }

        .btn {
            background: #999;
            border: none;
            border-radius: 20px;
            padding: 8px 20px;
            margin: 10px 0;
            color: white;
            cursor: pointer;
        }

        .footer-card {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 10px;
            border-top: 1px solid #eee;
        }

        .footer-card img {
            width: 30px;
            height: 30px;
            border-radius: 50%;
        }

        footer {
            background: #666;
            color: white;
            text-align: center;
            padding: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<h1>JELAJAHI EVENT</h1>

<!-- SEARCH -->
<div class="search-bar">
    <input type="text" id="search" placeholder="Cari Event..." onkeyup="searchEvent()">
</div>

<!-- DATA EVENT (TIDAK DOUBLE) -->
@php
$events = [
 ['Live Music','Java Jazz Fest','25 Mei 2026','Jazz Fest','concert'],
 ['Workshop','Fullstack Web','05 Mei 2026','Fullstack Tech','coding'],
 ['FunRun','Batam 5K','30 Mei 2026','GoRun Batam','run'],
 ['Seminar','Masa Depan AI','10 Juli 2026','MindTech','seminar'],
];
@endphp

<div class="container" id="eventContainer">

@foreach($events as $e)
<div class="card" data-name="{{ strtolower($e[0].' '.$e[1]) }}">
    <img src="https://source.unsplash.com/300x200/?{{ $e[4] }}">

    <h3>{{ $e[0] }}</h3>
    <p>{{ $e[1] }}</p>
    <p>{{ $e[2] }}</p>

    <button class="btn">Detail</button>

    <div class="footer-card">
        <img src="https://source.unsplash.com/50x50/?person">
        <span>{{ $e[3] }}</span>
    </div>
</div>
@endforeach

</div>

<footer>
    Copyright ©2026, Design by Steven.id
</footer>

<!-- SEARCH SCRIPT -->
<script>
function searchEvent() {
    let input = document.getElementById("search").value.toLowerCase();
    let cards = document.querySelectorAll(".card");

    cards.forEach(card => {
        let name = card.getAttribute("data-name");

        if (name.includes(input)) {
            card.style.display = "block";
        } else {
            card.style.display = "none";
        }
    });
}
</script>

</body>
</html>