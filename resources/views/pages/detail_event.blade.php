<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $event->nama_event }}</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logofavicon22.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
    :root {
        --navy: #1E293B;
        --navy-soft: #334155;
        --indigo: #4F46E5;
        --indigo-hover: #4338CA;
        --indigo-light: #EEF2FF;
        --bg: #F8FAFC;
        --white: #FFFFFF;
        --text: #0F172A;
        --text-soft: #64748B;
        --border: #E2E8F0;
    }

    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
    }

    body{
        font-family:'Poppins',sans-serif;
        background:var(--bg);
        color:var(--text);
    }

    /* NAVBAR */
    .navbar{
        background:var(--navy);
        padding:16px 32px;
        display:flex;
        justify-content:space-between;
        align-items:center;
    }

    .navbar a{
        color:white;
        text-decoration:none;
        font-weight:600;
    }

    .back-btn{
        font-size:14px;
        background:rgba(255,255,255,.08);
        padding:8px 16px;
        border-radius:999px;
        transition:.2s;
    }

    .back-btn:hover{
        background:rgba(255,255,255,.15);
    }

    /* BANNER */
    .banner{
    background:linear-gradient(135deg,#1E293B,#334155);
    padding:42px 40px 34px;
    color:white;
    border-radius:0 0 24px 24px;
    margin-bottom:24px;
}

.banner h1{
    font-size:42px;
    font-weight:700;
    margin-bottom:14px;
}

.meta{
    display:flex;
    gap:24px;
    flex-wrap:wrap;
    font-size:14px;
    opacity:.9;
}

    /* LAYOUT */
    .content{
        display:flex;
        gap:24px;
        padding:24px 40px;
        align-items:flex-start;
    }

    .main{
        flex:2;
    }

    .sidebar{
        flex:1;
        position:sticky;
        top:20px;
    }

    /* CARD */
    .section-box,
    .sidebar-card{
        background:white;
        border:1px solid var(--border);
        border-radius:18px;
        box-shadow:0 2px 10px rgba(15,23,42,.04);
    }

    .section-box{
        padding:24px;
        margin-bottom:20px;
    }

    .section-box h3{
        font-size:16px;
        margin-bottom:18px;
        padding-left:12px;
        border-left:4px solid var(--indigo);
        color:var(--navy);
    }

    /* DESKRIPSI */
    .deskripsi-text{
        font-size:14px;
        line-height:1.8;
        color:var(--text-soft);
    }

    /* TIKET */
    .ticket-item{
        border:1px solid var(--border);
        border-radius:14px;
        padding:18px;
        margin-bottom:14px;
        display:flex;
        justify-content:space-between;
        align-items:center;
        transition:.2s;
    }

    .ticket-item:hover{
        border-color:var(--indigo);
    }

    .ticket-name{
        font-weight:600;
        margin-bottom:4px;
    }

    .ticket-price{
        color:var(--indigo);
        font-weight:700;
        margin-bottom:4px;
    }

    .ticket-quota{
        font-size:12px;
        color:var(--text-soft);
    }

    .status-badge{
        padding:6px 14px;
        border-radius:999px;
        font-size:12px;
        font-weight:600;
    }

    .status-available{
        background:#DCFCE7;
        color:#166534;
    }

    .status-soldout{
        background:#FEE2E2;
        color:#DC2626;
    }

    /* ORGANIZER */
    .organizer-info{
        display:flex;
        align-items:center;
        gap:14px;
    }

    .org-avatar{
        width:50px;
        height:50px;
        border-radius:50%;
        background:var(--indigo-light);
        display:flex;
        align-items:center;
        justify-content:center;
        font-weight:700;
        color:var(--indigo);
    }

    .org-name{
        font-weight:600;
    }

    .org-kontak{
        font-size:13px;
        color:var(--text-soft);
    }

    /* SYARAT */
    .syarat-list{
        list-style:none;
    }

    .syarat-list li{
        padding:10px 0;
        border-bottom:1px solid #f1f5f9;
        font-size:14px;
        color:var(--text-soft);
    }

    /* SIDEBAR */
    .sidebar-card{
        overflow:hidden;
    }

    .sidebar-banner{
    height:180px;
    overflow:hidden;
    background:#1E293B;
}

.sidebar-banner img{
    width:100%;
    height:100%;
    object-fit:cover;
    display:block;
}
    .sidebar-info{
        padding:22px;
    }

    .harga-mulai{
        font-size:12px;
        color:var(--text-soft);
        margin-bottom:4px;
    }

    .harga{
        font-size:28px;
        font-weight:700;
        color:var(--indigo);
        margin-bottom:18px;
    }

    .btn-buy{
        width:100%;
        border:none;
        background:var(--indigo);
        color:white;
        padding:14px;
        border-radius:14px;
        font-family:'Poppins',sans-serif;
        font-weight:600;
        cursor:pointer;
        transition:.2s;
    }

    .btn-buy:hover{
        background:var(--indigo-hover);
    }

    .sidebar-meta{
        margin-top:18px;
        display:flex;
        flex-direction:column;
        gap:8px;
        font-size:13px;
        color:var(--text-soft);
    }
</style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar">
    <a href="/">STEVENtix</a>
    <a href="{{ route('events.index') }}" class="back-btn">← Kembali</a>
</nav>

<!-- BANNER -->
<div class="banner">
    <h1>{{ strtoupper($event->nama_event) }}</h1>

    <div class="meta">
        <span>| {{ \Carbon\Carbon::parse($event->tanggal)->translatedFormat('d F Y') }}</span>
        <span>| {{ $event->lokasi }}</span>
        <span>| {{ $event->organizer->nama_organizer ?? '-' }}</span>
    </div>
</div>
</div>

<!-- CONTENT -->
<div class="content">

    <!-- KIRI: semua section scroll -->
    <div class="main">

        <div class="section-box">
            <h3>Tentang Event</h3>
            <p class="deskripsi-text">{{ $event->deskripsi }}</p>
        </div>

        <div class="section-box">
            <h3>Pilihan Tiket</h3>
            @foreach($event->tikets as $tiket)
            <div class="ticket-item">
                <div>
                    <div class="ticket-name">{{ $tiket->nama_tiket }}</div>
                    <div class="ticket-price">
                        {{ $tiket->harga == 0 ? 'Gratis' : 'Rp ' . number_format($tiket->harga, 0, ',', '.') }}
                    </div>
                    <div class="ticket-quota">Sisa kuota: {{ $tiket->kuota }}</div>
                </div>
                <span class="status-badge {{ $tiket->kuota > 0 ? 'status-available' : 'status-soldout' }}">
                    {{ $tiket->kuota > 0 ? 'Available' : 'Sold Out' }}
                </span>
            </div>
            @endforeach
        </div>

        <div class="section-box">
            <h3>Penyelenggara</h3>
            <div class="organizer-info">
                <div class="org-avatar">
                    {{ strtoupper(substr($event->organizer->nama_organizer ?? 'O', 0, 1)) }}
                </div>
                <div>
                    <div class="org-name">{{ $event->organizer->nama_organizer ?? '-' }}</div>
                    <div class="org-kontak">{{ $event->organizer->kontak ?? '-' }}</div>
                </div>
            </div>
        </div>

        <div class="section-box">
            <h3>Syarat & Ketentuan</h3>
            <ul class="syarat-list">
                <li>Tiket tidak dapat di-refund setelah pembelian</li>
                <li>Wajib membawa e-ticket saat memasuki venue</li>
                <li>Dilarang membawa makanan dan minuman dari luar</li>
                <li>Penyelenggara berhak menolak pengunjung yang melanggar aturan</li>
            </ul>
        </div>

    </div>

    <!-- KANAN: sticky card -->
    <div class="sidebar">
        <div class="sidebar-card">
            <div class="sidebar-banner">
                 <img src="{{ asset('images/' . $event->gambar) }}"
                        alt="{{ $event->nama_event }}">
            </div>
            <div class="sidebar-info">
                <div class="harga-mulai">Harga mulai dari</div>
                <div class="harga">
                    @php $minHarga = $event->tikets->min('harga'); @endphp
                    {{ $minHarga == 0 ? 'Gratis' : 'Rp ' . number_format($minHarga, 0, ',', '.') }}
                </div>
                <button class="btn-buy"> Beli Tiket</button>
                <div class="sidebar-meta">
                    <span>📅 {{ \Carbon\Carbon::parse($event->tanggal)->translatedFormat('d F Y') }}</span>
                    <span>📍 {{ $event->lokasi }}</span>
                    <span>👤 {{ $event->organizer->nama_organizer ?? '-' }}</span>
                </div>
            </div>
        </div>
    </div>

</div>

</body>
</html>