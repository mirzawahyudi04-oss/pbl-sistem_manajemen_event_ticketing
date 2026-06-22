
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Beli Tiket</title>

<style>
body{
    font-family:Arial, sans-serif;
    background:#f4f4f4;
}

.container{
    width:500px;
    margin:50px auto;
    background:#fff;
    padding:30px;
    border-radius:15px;
    box-shadow:0 0 10px rgba(0,0,0,0.1);
}

input,
select{
    width:100%;
    padding:12px;
    margin-top:10px;
    margin-bottom:20px;
}

button{
    width:100%;
    padding:15px;
    background:#4f46e5;
    color:white;
    border:none;
    border-radius:10px;
    cursor:pointer;
}

.success{
    background:#bbf7d0;
    padding:15px;
    margin-bottom:20px;
    border-radius:10px;
}
</style>

</head>
<body>

<div class="container">

@if(session('success'))
<div class="success">
    {{ session('success') }}
</div>
@endif

<h1>{{ $event->nama_event }}</h1>

<form action="{{ route('tickets.payment', $event->id_event) }}"
      method="POST">

    @csrf

    <label>Jenis Tiket</label>

   <select name="ticket_type" required>
    @foreach($tikets as $tiket)
        <option value="{{ $tiket->nama_tiket }}">
            {{ $tiket->nama_tiket }}
            - Rp{{ number_format($tiket->harga,0,',','.') }}
        </option>
    @endforeach
</select>

    <label>Jumlah Tiket</label>

    <input type="number"
           name="quantity"
           value="1"
           min="1"
           required>

    <button type="submit">
        Lanjut Pembayaran
    </button>

</form>

</div>

</body>
</html>
<h2>Beli Tiket</h2>

<form method="POST" action="{{ route('tickets.payment', $event->id_event) }}">
    @csrf

    <input type="number" name="qty" min="1" required placeholder="Jumlah tiket">

    <select name="ticket_type" required>
        <option value="regular">Regular</option>
        <option value="vip">VIP</option>
    </select>

    <select name="payment_method" required>
        <option value="dana">DANA</option>
        <option value="gopay">GoPay</option>
        <option value="mandiri">Mandiri</option>
    </select>

    <button type="submit">Lanjut Bayar</button>
</form>