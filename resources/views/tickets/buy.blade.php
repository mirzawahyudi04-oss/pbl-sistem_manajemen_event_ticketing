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
        <option value="Reguler">
            Reguler - Rp100.000
        </option>

        <option value="VIP">
            VIP - Rp250.000
        </option>
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