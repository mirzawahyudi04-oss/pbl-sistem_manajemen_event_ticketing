
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pembayaran</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial,sans-serif;
}

body{
    background:#f4f4f4;
}

.container{
    max-width:600px;
    margin:50px auto;
    background:white;
    padding:30px;
    border-radius:15px;
    box-shadow:0 4px 10px rgba(0,0,0,0.1);
}

h1{
    margin-bottom:20px;
    color:#4f46e5;
}

.info{
    margin-bottom:25px;
}

.info p{
    margin-bottom:10px;
}

.payment-box{
    border:2px solid #ddd;
    border-radius:10px;
    padding:15px;
    margin-bottom:15px;
}

.payment-box:hover{
    border-color:#4f46e5;
}

label{
    display:block;
    margin-top:20px;
    margin-bottom:10px;
    font-weight:bold;
}

input[type=file]{
    width:100%;
    padding:10px;
}

button{
    width:100%;
    padding:15px;
    border:none;
    border-radius:10px;
    background:#4f46e5;
    color:white;
    font-size:16px;
    cursor:pointer;
    margin-top:20px;
}

button:hover{
    background:#4338ca;
}

</style>
</head>
<body>

<div class="container">

<h1>Pembayaran Tiket</h1>

@php
    $harga = ($ticket_type == 'VIP') ? 250000 : 100000;
    $total = $harga * $quantity;
@endphp

<div class="info">
    <p><b>Event:</b> {{ $event->nama_event }}</p>

    <p><b>Jenis Tiket:</b> {{ $ticket_type }}</p>

    <p><b>Harga Tiket:</b>
        Rp {{ number_format($harga,0,',','.') }}
    </p>

    <p><b>Jumlah Tiket:</b> {{ $quantity }}</p>

    <div style="
    background:#eef2ff;
    border:2px solid #4f46e5;
    border-radius:12px;
    padding:15px;
    margin-top:15px;
    margin-bottom:20px;
    text-align:center;
">

    <p style="
        margin:0;
        color:#666;
        font-size:14px;
    ">
        Total Pembayaran
    </p>

    <h2 style="
        margin-top:8px;
        color:#4f46e5;
    ">
        Rp {{ number_format($total,0,',','.') }}
    </h2>

</div>
</div>

<form action="{{ route('tickets.store', $event) }}"
      method="POST"
      enctype="multipart/form-data">
    @csrf

    <input type="hidden" name="ticket_type" value="{{ $ticket_type }}">
    <input type="hidden" name="quantity" value="{{ $quantity }}">

    <!-- Mandiri -->
    <div class="payment-box">

        <input type="radio"
               name="payment_method"
               value="mandiri"
               required>

        <h3>Transfer Bank Mandiri</h3>
        <br>

        <p>No Rekening:</p>
        <b>1234567890</b>

        <br><br>

        <p>a/n STEVENtix</p>

    </div>

    <!-- DANA -->
    <div class="payment-box">

        <input type="radio"
               name="payment_method"
               value="dana">

        <h3>DANA</h3>
        <br>

        <p>Nomor DANA:</p>
        <b>081234567890</b>

    </div>

    <!-- GoPay -->
    <div class="payment-box">

        <input type="radio"
               name="payment_method"
               value="gopay">

        <h3>GoPay</h3>
        <br>

        <p>Nomor GoPay:</p>
        <b>081234567890</b>

    </div>

    <label>Upload Bukti Pembayaran</label>

    <input type="file"
           name="payment_proof"
           accept="image/*"
           required>

    <button type="submit">
        Konfirmasi Pembayaran
    </button>

</form>

</div>

</body>
</html>

<h2>Halaman Pembayaran</h2>

<p>Event: {{ $event->nama_event }}</p>
<p>Jumlah: {{ $qty }}</p>
<p>Tipe Tiket: {{ $ticket_type }}</p>
<p>Metode: {{ $payment_method }}</p>
<p>Total: Rp {{ $total }}</p>

<hr>

@if($payment_method == 'dana')
    <p>Transfer ke DANA: 08xxxxxxx</p>
@elseif($payment_method == 'gopay')
    <p>Transfer ke GoPay: 08xxxxxxx</p>
@elseif($payment_method == 'mandiri')
    <p>Transfer Mandiri: 1234567890</p>
@endif

<hr>

<h3>Upload Bukti Pembayaran</h3>

<form method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="payment_proof" required>
    <button type="submit">Kirim</button>
</form>

