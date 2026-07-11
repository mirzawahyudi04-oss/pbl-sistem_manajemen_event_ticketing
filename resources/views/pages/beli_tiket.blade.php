@extends('layouts.guest')

@section('title','Beli Tiket')


@section('content')

<div class="max-w-5xl mx-auto px-6 py-10">


{{-- HEADER --}}
<div class="mb-8">

    <p class="text-sm text-[#5661A4] font-semibold uppercase tracking-widest">
        Checkout Tiket
    </p>

    <h1 class="text-3xl font-bold text-[#10194F] mt-2">
        {{ $event->nama_event }}
    </h1>

    <p class="text-slate-400 mt-2">
        Lengkapi pembayaran untuk mendapatkan tiket event
    </p>

</div>



@if(session('success'))

<div class="bg-green-50 border border-green-200 rounded-xl p-5 mb-6">

    <p class="text-green-700 font-semibold mb-4">
        {{ session('success') }}
    </p>


    <div class="flex gap-3">

        <a href="{{ route('dashboard_user') }}"
        class="px-5 py-2 bg-slate-700 text-white rounded-lg text-sm">
            Dashboard
        </a>


        <a href="{{ route('user.tiket') }}"
        class="px-5 py-2 bg-[#10194F] text-white rounded-lg text-sm">
            Status Tiket
        </a>

    </div>

</div>

@endif



@if(session('error'))

<div class="bg-red-50 border border-red-200 text-red-600 rounded-xl p-4 mb-6">

{{ session('error') }}

</div>

@endif



@if($errors->any())

<div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-6">

<ul class="text-sm text-red-600">

@foreach($errors->all() as $error)

<li>
{{ $error }}
</li>

@endforeach

</ul>

</div>

@endif



<div class="grid md:grid-cols-3 gap-6">



{{-- KIRI --}}
<div class="md:col-span-2 bg-white rounded-2xl border border-slate-200 p-6 shadow-sm">


<h2 class="font-bold text-lg text-[#10194F] mb-5">
Detail Pembelian
</h2>



<form action="{{ route('transactions.store', $event->id_event) }}"
method="POST"
enctype="multipart/form-data">

@csrf



<label class="text-sm font-semibold">
Jenis Tiket
</label>


<select name="ticket_type"
id="ticket_type"
required
class="w-full mt-2 mb-5 px-4 py-3 rounded-xl border border-slate-200">

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



<label class="text-sm font-semibold">
Jumlah Tiket
</label>


<input
type="number"
id="qty"
name="qty"
value="1"
min="1"
required

class="w-full mt-2 mb-5 px-4 py-3 rounded-xl border border-slate-200">



<label class="text-sm font-semibold">
Total Harga
</label>


<input
type="text"
id="total_harga"
readonly

class="w-full mt-2 mb-5 px-4 py-3 rounded-xl bg-slate-100 border border-slate-200 font-bold text-[#10194F]">



<label class="text-sm font-semibold">
Metode Pembayaran
</label>


<select name="payment_method"
required

class="w-full mt-2 mb-5 px-4 py-3 rounded-xl border border-slate-200">


<option value="">
-- Pilih Metode --
</option>


<option value="dana">
DANA
</option>


<option value="gopay">
GoPay
</option>


<option value="mandiri">
Mandiri Transfer
</option>


<option value="qris">
QRIS
</option>


</select>



<div id="qris-box"
style="display:none"

class="bg-slate-50 rounded-xl p-5 mb-5">


<p class="font-semibold text-[#10194F] mb-3">
Scan QRIS STEVENtix
</p>


<img src="{{ asset('images/qris-steventix.png') }}"
width="220">


</div>



<label class="text-sm font-semibold">
Upload Bukti Pembayaran
</label>


<input
type="file"
name="payment_proof"
accept="image/*"
required

class="w-full mt-2 mb-6 text-sm">



<button
type="submit"

class="w-full py-3 rounded-xl bg-[#10194F] text-white font-bold hover:bg-[#5661A4] transition">

Kirim Pembayaran

</button>



</form>


</div>





{{-- KANAN --}}
<div class="bg-white rounded-2xl border border-slate-200 p-6 h-fit shadow-sm">


<h2 class="font-bold text-lg text-[#10194F] mb-5">
Pembayaran
</h2>



<div class="bg-slate-50 rounded-xl p-4 text-sm">


<p>
<b>DANA</b>
<br>
081234567890
</p>


<hr class="my-4">


<p>
<b>GoPay</b>
<br>
081234567890
</p>


<hr class="my-4">


<p>
<b>Mandiri</b>
<br>
1234567890123
</p>



</div>


<p class="text-xs text-slate-400 mt-4">
Transfer sesuai total pembayaran lalu upload bukti pembayaran.
</p>


</div>



</div>

</div>



<script>

function updateTotal(){

let tiket=document.getElementById('ticket_type');

let qty=document.getElementById('qty').value;


let harga=tiket.options[tiket.selectedIndex].dataset.harga;


let total=harga*qty;


document.getElementById('total_harga').value =
'Rp ' + Number(total).toLocaleString('id-ID');

}


document.getElementById('ticket_type')
.addEventListener('change',updateTotal);


document.getElementById('qty')
.addEventListener('input',updateTotal);


updateTotal();



const metode=document.querySelector('[name="payment_method"]');


metode.addEventListener('change',function(){


const qrisBox=document.getElementById('qris-box');


if(this.value==='qris'){

qrisBox.style.display='block';

}else{

qrisBox.style.display='none';

}


});


</script>


@endsection