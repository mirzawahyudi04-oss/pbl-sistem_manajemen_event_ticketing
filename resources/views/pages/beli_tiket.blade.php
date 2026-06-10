<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Beli Tiket</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

<style>

body{
    font-family:Poppins;
    background:#f2f2f2;
    padding:40px;
}

.card{
    background:white;
    max-width:500px;
    margin:auto;
    padding:30px;
    border-radius:15px;
}

input,select{
    width:100%;
    padding:12px;
    margin-top:10px;
    margin-bottom:20px;
}

button{
    width:100%;
    padding:14px;
    border:none;
    background:#4f46e5;
    color:white;
    border-radius:10px;
    cursor:pointer;
}

button:hover{
    opacity:.9;
}

.success{
    background:lightgreen;
    padding:10px;
    margin-bottom:20px;
    border-radius:8px;
}

</style>

</head>
<body>

<div class="card">

@if(session('success'))

    <div class="success">
        {{ session('success') }}
    </div>

@endif

<h2>{{ $event->nama_event }}</h2>

<form action="{{ route('transactions.store', $event->id_event) }}"
      method="POST">

    @csrf

    <label>Jenis Tiket</label>

    <select name="ticket_type">

    @foreach($event->tikets as $tiket)

        <option value="{{ $tiket->nama_tiket }}">

            {{ $tiket->nama_tiket }}
            -
            Rp {{ number_format($tiket->harga,0,',','.') }}

        </option>

    @endforeach

</select>

    <label>Jumlah Tiket</label>

    <input type="number"
           name="qty"
           value="1"
           min="1">

    <button type="submit">
        Beli Tiket
    </button>

</form>

</div>

</body>
</html>