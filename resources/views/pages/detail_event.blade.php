<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Event</title>

    <style>
    body {
        margin: 0;
        font-family: Arial;
        background: #e5e5e5;
    }

    .banner {
        background: url('https://i.imgur.com/8Km9tLL.jpg') center/cover;
        height: 220px;
        color: white;
        padding: 20px;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
    }

    .tabs {
        background: #ddd;
        padding: 10px;
    }

    .box {
        background: white;
        padding: 15px;
        margin: 10px;
        border: 1px solid #ccc;
    }

    .flex {
        display: flex;
        gap: 20px;
        margin: 10px;
    }

    .left { flex: 2; }
    .right {
        flex: 1;
        background: white;
        padding: 15px;
        border-radius: 10px;
        text-align: center;
    }

    .ticket-item {
        border-bottom: 1px solid #ddd;
        padding: 10px 0;
    }

    .status {
        float: right;
        background: lightblue;
        padding: 3px 10px;
        border-radius: 10px;
    }

    .btn-buy {
        background: #444;
        color: white;
        padding: 10px;
        border-radius: 10px;
        border: none;
        width: 100%;
        cursor: pointer;
    }
    </style>
</head>
<body>

<div class="banner">
    <h2>KONSER JAVA JAZZ FESTIVAL</h2>
    <p>📍 Temenggung Abdul Jamal, Batam</p>
    <p>📅 25 Mei 2026</p>
</div>

<div class="tabs">
    Deskripsi | Tiket | Syarat
</div>

<div class="box">
    <p>Ini deskripsi event Java Jazz Festival...</p>
</div>

<div class="flex">

    <div class="left box">
        <h4>Tiket</h4>

        <div class="ticket-item">
            Platinum
            <span class="status">Available</span><br>
            Rp1.000.000
        </div>

        <div class="ticket-item">
            Gold
            <span class="status">Available</span><br>
            Rp600.000
        </div>

        <div class="ticket-item">
            Silver
            <span class="status">Available</span><br>
            Rp300.000
        </div>
    </div>

    <div class="right">
        <img src="https://i.imgur.com/8Km9tLL.jpg" width="100%">
        <br><br>
        <button class="btn-buy">Beli Tiket</button>
    </div>

</div>

<div class="box">
    <h4>Syarat & Ketentuan</h4>
    <ul>
        <li>Tiket tidak bisa refund</li>
        <li>Wajib bawa e-ticket</li>
    </ul>
</div>

</body>
</html>