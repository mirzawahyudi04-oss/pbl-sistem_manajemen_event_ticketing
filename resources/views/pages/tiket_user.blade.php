@extends('layouts.app')

@section('title', 'Tiket Saya')

@section('content')

<style>
    .title{
        font-size:30px;
        font-weight:bold;
        margin-bottom:8px;
        color: var(--navy);
    }

    .subtitle{
        color:gray;
        margin-bottom:25px;
    }

    .tiket-card{
        background:white;
        border-radius:18px;
        padding:25px;
        margin-bottom:20px;
        box-shadow:0 8px 24px rgba(16,25,79,.08);
        display:flex;
        justify-content:space-between;
        align-items:center;
        transition:.3s;
    }

    .tiket-card:hover{
        transform: translateY(-5px);
        box-shadow:0 14px 30px rgba(16,25,79,.15);
    }

    .tiket-info h4{
        margin:0 0 8px;
        color:var(--navy);
        font-size:20px;
    }

    .tiket-info p{
        margin:4px 0;
        color:gray;
        font-size:14px;
    }

    .tiket-action{
        display:flex;
        align-items:center;
        gap:12px;
    }

    .status-lunas{
        background:#DCFCE7;
        color:#166534;
        padding:8px 14px;
        border-radius:20px;
        font-size:12px;
        font-weight:bold;
    }

    .status-pending{
        background:#FEF3C7;
        color:#92400E;
        padding:8px 14px;
        border-radius:20px;
        font-size:12px;
        font-weight:bold;
    }

    .btn-etiket{
        background:var(--indigo);
        color:white;
        padding:10px 18px;
        border-radius:20px;
        text-decoration:none;
        font-size:13px;
        transition:.3s;
    }

    .btn-etiket:hover{
        background:var(--soft-blue);
    }
</style>

<div class="title">🎟 Tiket Saya</div>
<div class="subtitle">Tiket event yang kamu miliki.</div>

<div class="tiket-card">
    <div class="tiket-info">
        <h4>Java Jazz Festival</h4>
        <p>📅 25 Mei 2026</p>
        <p>📍 Jakarta</p>
        <p>🎟 1 Tiket · Regular</p>
    </div>
    <div class="tiket-action">
        <span class="status-lunas">Lunas</span>
        <a href="#" class="btn-etiket">E-Tiket</a>
    </div>
</div>

<div class="tiket-card">
    <div class="tiket-info">
        <h4>Fun Run Batam 5K</h4>
        <p>📅 30 Mei 2026</p>
        <p>📍 Batam</p>
        <p>🎟 2 Tiket · Regular</p>
    </div>
    <div class="tiket-action">
        <span class="status-lunas">Lunas</span>
        <a href="#" class="btn-etiket">E-Tiket</a>
    </div>
</div>

<div class="tiket-card">
    <div class="tiket-info">
        <h4>Konser Indie Night</h4>
        <p>📅 12 Juni 2026</p>
        <p>📍 Batam</p>
        <p>🎟 1 Tiket · VIP</p>
    </div>
    <div class="tiket-action">
        <span class="status-pending">Pending</span>
    </div>
</div>

@endsection