<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $event->nama_event }}</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logofavicon22.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        :root {
            --navy: #0F172A;
            --blue: #2563EB;
            --blue-hover: #1D4ED8;
            --blue-light: #DBEAFE;
            --bg: #F1F5F9;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--bg);
            color: #1e293b;
        }

        /* NAVBAR */
        .navbar {
            background: var(--navy);
            padding: 14px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            font-size: 18px;
        }
        .navbar .back-btn {
            font-size: 14px;
            font-weight: normal;
            background: rgba(255,255,255,0.15);
            padding: 6px 16px;
            border-radius: 20px;
        }

        /* BANNER */
        .banner {
            background: linear-gradient(135deg, var(--navy), var(--blue));
            padding: 50px 40px 35px;
            color: white;
        }
        .banner h1 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 12px;
        }
        .banner .meta {
            display: flex;
            gap: 25px;
            font-size: 14px;
            opacity: 0.9;
        }

        /* CONTENT LAYOUT */
        .content {
            display: flex;
            gap: 24px;
            padding: 24px 40px;
            align-items: flex-start;
        }
        .main { flex: 2; }
        .sidebar {
            flex: 1;
            position: sticky;
            top: 20px;
        }

        /* SECTION BOX */
        .section-box {
            background: white;
            border-radius: 14px;
            padding: 24px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,.06);
        }
        .section-box h3 {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 16px;
            color: var(--navy);
            border-left: 4px solid var(--blue);
            padding-left: 10px;
        }

        /* TIKET ITEM */
        .ticket-item {
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 16px;
            margin-bottom: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: .2s;
        }
        .ticket-item:hover {
            border-color: var(--blue);
            box-shadow: 0 2px 10px rgba(37,99,235,.1);
        }
        .ticket-name {
            font-weight: 600;
            font-size: 15px;
            margin-bottom: 4px;
        }
        .ticket-price {
            color: var(--blue);
            font-weight: 700;
            font-size: 16px;
        }
        .ticket-quota {
            font-size: 12px;
            color: #94a3b8;
        }
        .status-badge {
            padding: 5px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        .status-available { background: #dcfce7; color: #16a34a; }
        .status-soldout   { background: #fee2e2; color: #dc2626; }

        /* SYARAT */
        .syarat-list li {
            padding: 8px 0;
            border-bottom: 1px solid #f1f5f9;
            font-size: 14px;
            color: #475569;
            list-style: none;
            padding-left: 20px;
            position: relative;
        }
        .syarat-list li::before {
            content: '✓';
            position: absolute;
            left: 0;
            color: var(--blue);
            font-weight: bold;
        }

        /* DESKRIPSI */
        .deskripsi-text {
            font-size: 14px;
            line-height: 1.8;
            color: #475569;
        }

        /* ORGANIZER */
        .organizer-info {
            display: flex;
            align-items: center;
            gap: 14px;
        }
        .org-avatar {
            width: 46px;
            height: 46px;
            border-radius: 50%;
            background: var(--blue-light);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: var(--blue);
            font-size: 18px;
            flex-shrink: 0;
        }
        .org-name   { font-weight: 600; font-size: 15px; }
        .org-kontak { font-size: 13px; color: #94a3b8; }

        /* SIDEBAR CARD */
        .sidebar-card {
            background: white;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,.1);
        }
        .sidebar-banner {
            background: linear-gradient(135deg, var(--navy), var(--blue));
            height: 140px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 15px;
            font-weight: 600;
            text-align: center;
            padding: 20px;
        }
        .sidebar-info { padding: 20px; }
        .harga-mulai  { font-size: 12px; color: #94a3b8; margin-bottom: 4px; }
        .harga        { font-size: 22px; font-weight: 700; color: var(--blue); margin-bottom: 16px; }

        .btn-buy {
            background: var(--blue);
            color: white;
            padding: 13px;
            border-radius: 10px;
            border: none;
            width: 100%;
            font-family: 'Poppins', sans-serif;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: .2s;
        }
        .btn-buy:hover { background: var(--blue-hover); }

        .sidebar-meta {
            margin-top: 16px;
            font-size: 13px;
            color: #64748b;
            display: flex;
            flex-direction: column;
            gap: 8px;
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
        <span>📅 {{ \Carbon\Carbon::parse($event->tanggal)->translatedFormat('d F Y') }}</span>
        <span>📍 {{ $event->lokasi }}</span>
        <span>👤 {{ $event->organizer->nama_organizer ?? '-' }}</span>
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
                🎵 {{ $event->nama_event }}
            </div>
            <div class="sidebar-info">
                <div class="harga-mulai">Harga mulai dari</div>
                <div class="harga">
                    @php $minHarga = $event->tikets->min('harga'); @endphp
                    {{ $minHarga == 0 ? 'Gratis' : 'Rp ' . number_format($minHarga, 0, ',', '.') }}
                </div>
                <button class="btn-buy">🎟️ Beli Tiket</button>
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