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
    max-width:550px;
    margin:auto;
    padding:30px;
    border-radius:15px;
}

input,select{
    width:100%;
    padding:12px;
    margin-top:10px;
    margin-bottom:20px;
    box-sizing:border-box;
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

.error{
    background:#ffbaba;
    padding:10px;
    margin-bottom:20px;
    border-radius:8px;
}

.payment-box{
    background:#f8f8f8;
    padding:15px;
    border-radius:10px;
    margin-bottom:20px;
}

.payment-box p{
    margin:5px 0;
}

</style>

</head>
<body>

<div class="card">

@if(session('success'))
<div class="bg-green-100 border border-green-300 rounded-lg p-5 mb-5">

    <p class="text-green-700 font-semibold mb-4">
        {{ session('success') }}
    </p>

    <div class="flex gap-3">
        <a href="{{ route('dashboard_user') }}"
           class="px-5 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700">
            ← Kembali ke Dashboard
        </a>

        <a href="{{ route('user.tiket') }}"
           class="px-5 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
            Lihat Status Tiket
        </a>
    </div>

</div>
@endif

@if(session('error'))
    <div class="error">
        {{ session('error') }}
    </div>
@endif

@if($errors->any())
    <div class="error">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h2>{{ $event->nama_event }}</h2>

<div class="payment-box">
    <h4>Informasi Pembayaran</h4>
   

    <p><b>DANA</b> : 081234567890</p>
    <p><b>Atas Nama</b> : StevenTix</p>

    <br>

    <p><b>GoPay</b> : 081234567890</p>
    <p><b>Atas Nama</b> : StevenTix</p>

    <br>

    <p><b>Mandiri</b> : 1234567890123</p>
    <p><b>Atas Nama</b> : StevenTix</p>

</div>

<form action="{{ route('transactions.store', $event->id_event) }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    <label>Jenis Tiket</label>

<select name="ticket_type" id="ticket_type" required>

        @foreach($event->tikets as $tiket)

            <option
    value="{{ $tiket->nama_tiket }}"
    data-harga="{{ $tiket->harga }}">
                {{ $tiket->nama_tiket }}
                -
                Rp {{ number_format($tiket->harga,0,',','.') }}
            </option>

        @endforeach

    </select>

    <label>Jumlah Tiket</label>

<input
    type="number"
    id="qty"
    name="qty"
    value="1"
    min="1"
    required>

<label>Total Harga</label>

<input
    type="text"
    id="total_harga"
    readonly
    style="background:#f5f5f5;">

<label>Metode Pembayaran</label>

<select name="payment_method" required>
    <option value="">-- Pilih Metode --</option>
    <option value="dana">DANA</option>
    <option value="gopay">GoPay</option>
    <option value="mandiri">Mandiri Transfer</option>
    <option value="qris">QRIS</option>
</select>

<div id="qris-box" style="display:none; margin-bottom:20px;">
    <p><b>Scan QRIS STEVENtix</b></p>

    <img
        src="{{ asset('images/qris-steventix.png') }}"
        alt="QRIS STEVENtix"
        width="250">
</div>

<label>Upload Bukti Pembayaran</label>
    <input
        type="file"
        name="payment_proof"
        accept="image/*"
        required>

    <button type="submit">
        Kirim Pembayaran
    </button>

</form>

</div>
<script>
function updateTotal() {

    let tiket = document.getElementById('ticket_type');
    let qty = document.getElementById('qty').value;

    let harga =
        tiket.options[tiket.selectedIndex]
             .dataset.harga;

    let total = harga * qty;

    document.getElementById('total_harga').value =
        'Rp ' + Number(total).toLocaleString('id-ID');
}

document.getElementById('ticket_type')
        .addEventListener('change', updateTotal);

document.getElementById('qty')
        .addEventListener('input', updateTotal);

updateTotal();
</script>
<script>
const metode = document.querySelector('[name="payment_method"]');

metode.addEventListener('change', function() {

    const qrisBox = document.getElementById('qris-box');

    if (this.value === 'qris') {
        qrisBox.style.display = 'block';
    } else {
        qrisBox.style.display = 'none';
    }
});
</script>

</body>
</body>
</html>
</body>
</html>