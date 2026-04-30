<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Event</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f3f3f3;
            margin: 0;
        }

        .event-banner {
            width: 100%;
            height: 350px;
            object-fit: cover;
        }

        .box {
            background: white;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 20px;
        }

        .tiket-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px 20px;
            margin-bottom: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .tiket-card h6 {
            font-weight: bold;
            margin: 0 0 3px;
            font-size: 14px;
        }

        .tiket-card p {
            font-size: 12px;
            color: gray;
            margin: 0;
        }

        .tiket-card .harga {
            font-weight: bold;
            font-size: 14px;
            color: #222;
        }

        .tiket-card .qty-box {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .tiket-card .qty-box button {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            border: 1px solid #aaa;
            background: white;
            font-size: 16px;
            cursor: pointer;
            line-height: 1;
        }

        .tiket-card .qty-box span {
            font-size: 14px;
            min-width: 20px;
            text-align: center;
        }

        .ringkasan {
            background: #f9f9f9;
            border-radius: 10px;
            padding: 15px 20px;
            font-size: 13px;
        }

        .ringkasan .item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 6px;
        }

        .ringkasan .total {
            display: flex;
            justify-content: space-between;
            font-weight: bold;
            font-size: 15px;
            border-top: 1px solid #ddd;
            padding-top: 10px;
            margin-top: 6px;
        }

        .form-box input {
            width: 100%;
            padding: 10px 15px;
            margin: 6px 0 12px;
            border-radius: 10px;
            border: 1px solid #ccc;
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
        }

        label {
            font-size: 13px;
            font-weight: bold;
        }

        .btn-beli {
            width: 100%;
            padding: 13px;
            background: #222;
            color: white;
            border: none;
            border-radius: 10px;
            font-family: 'Poppins', sans-serif;
            font-size: 15px;
            cursor: pointer;
            margin-top: 10px;
        }

        .btn-beli:hover {
            background: #444;
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
            <a class="nav-link text-white" href="/events">Jelajahi Event</a>
            <a class="nav-link text-white" href="#">Cara Kerja</a>
        </div>
    </div>
</nav>

@php
    $nama      = request()->get('nama');
    $tanggal   = request()->get('tanggal');
    $lokasi    = request()->get('lokasi');
    $harga     = request()->get('harga');
    $img       = request()->get('img');
    $organizer = request()->get('organizer');
    $harga_angka = (int) str_replace(['Rp ', '.', ' '], '', $harga);
@endphp

<!-- BANNER -->
<img src="{{ asset('images/' . $img) }}" class="event-banner">

<div class="container mt-4">

    <!-- INFO EVENT -->
    <div class="box">
        <h4 class="fw-bold">{{ $nama }}</h4>
        <p style="font-size:13px;">📅 {{ $tanggal }} &nbsp;|&nbsp; 📍 {{ $lokasi }} &nbsp;|&nbsp; 🎟 {{ $organizer }}</p>
        <hr>
        <p class="text-muted" style="font-size:13px;">
            Jangan lewatkan event seru ini! Dapatkan tiketmu sekarang sebelum kehabisan.
            Segera pesan dan nikmati pengalaman yang tak terlupakan bersama orang-orang tersayang.
        </p>
    </div>

    <!-- PILIHAN TIKET -->
    <div class="box">
        <h5 class="fw-bold mb-3">Pilih Tiket</h5>

        <div class="tiket-card">
            <div>
                <h6>Regular</h6>
                <p>Akses area umum</p>
                <span class="harga">{{ $harga }}</span>
            </div>
            <div class="qty-box">
                <button onclick="kurang('regular', {{ $harga_angka }})">−</button>
                <span id="qty-regular">0</span>
                <button onclick="tambah('regular', {{ $harga_angka }})">+</button>
            </div>
        </div>

        <div class="tiket-card">
            <div>
                <h6>VIP</h6>
                <p>Akses area VIP + merchandise</p>
                @php $harga_vip = $harga_angka * 2; @endphp
                <span class="harga">Rp {{ number_format($harga_vip, 0, ',', '.') }}</span>
            </div>
            <div class="qty-box">
                <button onclick="kurang('vip', {{ $harga_vip }})">−</button>
                <span id="qty-vip">0</span>
                <button onclick="tambah('vip', {{ $harga_vip }})">+</button>
            </div>
        </div>

        <div class="tiket-card">
            <div>
                <h6>VVIP</h6>
                <p>Akses area VVIP + meet & greet</p>
                @php $harga_vvip = $harga_angka * 3; @endphp
                <span class="harga">Rp {{ number_format($harga_vvip, 0, ',', '.') }}</span>
            </div>
            <div class="qty-box">
                <button onclick="kurang('vvip', {{ $harga_vvip }})">−</button>
                <span id="qty-vvip">0</span>
                <button onclick="tambah('vvip', {{ $harga_vvip }})">+</button>
            </div>
        </div>
    </div>

    <!-- RINGKASAN -->
    <div class="box">
        <h5 class="fw-bold mb-3">Ringkasan Pesanan</h5>
        <div class="ringkasan">
            <div class="item"><span id="label-regular" style="display:none">Regular x<span id="jml-regular">0</span></span><span id="harga-regular"></span></div>
            <div class="item"><span id="label-vip" style="display:none">VIP x<span id="jml-vip">0</span></span><span id="harga-vip-total"></span></div>
            <div class="item"><span id="label-vvip" style="display:none">VVIP x<span id="jml-vvip">0</span></span><span id="harga-vvip-total"></span></div>
            <div class="total">
                <span>Total</span>
                <span id="grand-total">Rp 0</span>
            </div>
        </div>
    </div>

    <!-- FORM DATA PEMBELI -->
    <div class="box form-box">
        <h5 class="fw-bold mb-3">Data Pembeli</h5>

        <label>Nama Lengkap</label>
        <input type="text" placeholder="Masukkan nama lengkap">

        <label>Email</label>
        <input type="email" placeholder="Masukkan email">

        <label>Nomor WhatsApp</label>
        <input type="text" placeholder="Contoh: 08123456789">

        <button class="btn-beli">Konfirmasi Pembelian</button>
    </div>

</div>

<!-- FOOTER -->
<footer>
    <p class="mb-1 fw-bold">Steven.id</p>
    <p style="font-size:12px; color:#aaa;">&copy; {{ date('Y') }} Steven.id — Platform tiket event terbaik di Indonesia.</p>
</footer>

<script>
    var qty = { regular: 0, vip: 0, vvip: 0 };
    var harga = { regular: {{ $harga_angka }}, vip: {{ $harga_vip }}, vvip: {{ $harga_vvip }} };

    function tambah(jenis, h) {
        qty[jenis]++;
        update();
    }

    function kurang(jenis, h) {
        if (qty[jenis] > 0) qty[jenis]--;
        update();
    }

    function update() {
        var total = 0;

        ['regular', 'vip', 'vvip'].forEach(function(j) {
            document.getElementById('qty-' + j).innerText = qty[j];
            document.getElementById('jml-' + j).innerText = qty[j];

            var subtotal = qty[j] * harga[j];
            total += subtotal;

            if (qty[j] > 0) {
                document.getElementById('label-' + j).style.display = 'block';
                document.getElementById('harga-' + j + (j === 'regular' ? '' : '-total')).innerText = 'Rp ' + subtotal.toLocaleString('id-ID');
            } else {
                document.getElementById('label-' + j).style.display = 'none';
                document.getElementById('harga-' + j + (j === 'regular' ? '' : '-total')).innerText = '';
            }
        });

        document.getElementById('grand-total').innerText = 'Rp ' + total.toLocaleString('id-ID');
    }
</script>

</body>
</html>