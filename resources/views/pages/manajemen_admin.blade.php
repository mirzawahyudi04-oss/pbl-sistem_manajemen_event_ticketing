<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Manajemen Event - Admin</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logofavicon22.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { margin:0; padding:0; box-sizing:border-box; font-family:'Poppins',sans-serif; }
        body { background:#f8fafc; }
        .sidebar { width:240px; height:100vh; background:#111827; position:fixed; color:white; display:flex; flex-direction:column; overflow-y:auto; }
        .sidebar-brand { display:flex; align-items:center; gap:10px; padding:22px 20px; border-bottom:1px solid #374151; }
        .brand-icon { width:36px; height:36px; background:#3b82f6; border-radius:8px; display:flex; align-items:center; justify-content:center; font-size:18px; }
        .sidebar-brand h2 { font-size:16px; font-weight:700; letter-spacing:1px; }
        .sidebar-brand span { font-size:11px; color:#6b7280; display:block; }
        .menu-label { padding:10px 20px 4px; font-size:10px; font-weight:600; color:#4b5563; letter-spacing:1.5px; text-transform:uppercase; }
        .sidebar a { display:flex; align-items:center; gap:12px; color:#9ca3af; text-decoration:none; padding:11px 20px; transition:all .2s; font-size:14px; border-left:3px solid transparent; }
        .sidebar a:hover { background:#1f2937; color:white; border-left-color:#3b82f6; }
        .sidebar a.active { background:#1e3a5f; color:#60a5fa; border-left-color:#3b82f6; }
        .sidebar a .icon { font-size:16px; width:20px; text-align:center; }
        .sidebar-menu { padding:15px 0; flex:1; }
        .sidebar-footer { padding:15px 0; border-top:1px solid #374151; }
        .sidebar-footer a { color:#ef4444 !important; }
        .sidebar-footer a:hover { background:#1f2937 !important; border-left-color:#ef4444 !important; }
        .main { margin-left:240px; padding:30px; min-height:100vh; }
        .page-header { display:flex; justify-content:space-between; align-items:center; margin-bottom:28px; }
        .page-header h1 { font-size:22px; font-weight:700; color:#111827; }
        .page-header p { color:#6b7280; font-size:13px; margin-top:2px; }
        .box { background:white; border-radius:12px; padding:24px; box-shadow:0 1px 8px rgba(0,0,0,.06); }
        .mini-cards { display:grid; grid-template-columns:repeat(4,1fr); gap:16px; margin-bottom:24px; }
        .mini-card { background:white; border-radius:12px; padding:16px; box-shadow:0 1px 8px rgba(0,0,0,.06); display:flex; align-items:center; gap:14px; }
        .mini-icon { width:42px; height:42px; border-radius:10px; display:flex; align-items:center; justify-content:center; font-size:20px; }
        table { width:100%; border-collapse:collapse; }
        th { padding:12px 14px; text-align:left; font-size:12px; color:#6b7280; font-weight:600; text-transform:uppercase; letter-spacing:.5px; background:#f9fafb; border-bottom:2px solid #f3f4f6; }
        td { padding:14px; border-bottom:1px solid #f3f4f6; font-size:14px; color:#374151; }
        tr:last-child td { border-bottom:none; }
        tr:hover td { background:#f9fafb; }
        .badge { padding:4px 12px; border-radius:20px; font-size:11px; font-weight:600; }
        .badge-green  { background:#dcfce7; color:#16a34a; }
        .badge-yellow { background:#fef9c3; color:#ca8a04; }
        .badge-red    { background:#fee2e2; color:#dc2626; }
        .badge-blue   { background:#dbeafe; color:#2563eb; }
        .btn { padding:7px 14px; border-radius:8px; border:none; cursor:pointer; font-size:12px; font-weight:600; font-family:'Poppins',sans-serif; text-decoration:none; display:inline-flex; align-items:center; gap:6px; transition:all .2s; }
        .btn-primary { background:#3b82f6; color:white; }
        .btn-primary:hover { background:#2563eb; }
        .btn-success { background:#dcfce7; color:#16a34a; }
        .btn-danger  { background:#fee2e2; color:#dc2626; }
        .search-bar { display:flex; gap:10px; margin-bottom:20px; }
        .search-bar input, .search-bar select { padding:9px 14px; border:1px solid #e5e7eb; border-radius:8px; font-size:13px; font-family:'Poppins',sans-serif; outline:none; background:white; }
        .search-bar input { flex:1; }
        .search-bar input:focus { border-color:#3b82f6; }
        footer { text-align:center; padding:20px; color:#9ca3af; font-size:12px; margin-left:240px; }
    </style>
</head>
<body>

<div class="sidebar">
    <div class="sidebar-brand">
        <div class="brand-icon"></div>
        <div><h2>EVENTHUB</h2><span>Admin Panel</span></div>
    </div>
    <div class="sidebar-menu">
        <div class="menu-label">Main</div>
        <a href="{{ route('dashboard_admin') }}"><span class="icon"></span> Dashboard</a>
        <a href="{{ route('admin.manajemen') }}" class="active"><span class="icon"></span> Manajemen Event</a>
        <div class="menu-label">Kelola</div>
        <a href="{{ route('admin.organizer') }}"><span class="icon"></span> Organizer</a>
        <a href="{{ route('admin.peserta') }}"><span class="icon"></span> Peserta</a>
        <a href="{{ route('admin.tiket') }}"><span class="icon"></span> Tiket</a>
        <div class="menu-label">Analitik</div>
        <a href="{{ route('admin.laporan') }}"><span class="icon"></span> Laporan</a>
    </div>
    <div class="sidebar-footer">
        <a href="{{ route('admin.login') }}"><span class="icon"></span> Logout</a>
    </div>
</div>

<div class="main">
    <div class="page-header">
        <div><h1>Manajemen Event</h1><p>Kelola semua event yang terdaftar di platform</p></div>
        <a href="#" class="btn btn-primary">+ Tambah Event</a>
    </div>

    <div class="mini-cards">
        <div class="mini-card"><div class="mini-icon" style="background:#dbeafe;"></div><div><p style="font-size:11px;color:#6b7280;font-weight:600;">Total Event</p><p style="font-size:22px;font-weight:700;">25</p></div></div>
        <div class="mini-card"><div class="mini-icon" style="background:#dcfce7;"></div><div><p style="font-size:11px;color:#6b7280;font-weight:600;">Approved</p><p style="font-size:22px;font-weight:700;">18</p></div></div>
        <div class="mini-card"><div class="mini-icon" style="background:#fef9c3;"></div><div><p style="font-size:11px;color:#6b7280;font-weight:600;">Pending</p><p style="font-size:22px;font-weight:700;">5</p></div></div>
        <div class="mini-card"><div class="mini-icon" style="background:#fee2e2;"></div><div><p style="font-size:11px;color:#6b7280;font-weight:600;">Rejected</p><p style="font-size:22px;font-weight:700;">2</p></div></div>
    </div>

    <div class="box">
        <div class="search-bar">
            <input type="text" placeholder="🔍  Cari nama event...">
            <select><option>Semua Status</option><option>Approved</option><option>Pending</option><option>Rejected</option></select>
            <select><option>Semua Kategori</option><option>Musik</option><option>Teknologi</option><option>Kuliner</option><option>Olahraga</option></select>
        </div>
        <table>
            <tr><th>#</th><th>Event</th><th>Organizer</th><th>Kategori</th><th>Tanggal</th><th>Tiket</th><th>Status</th><th>Aksi</th></tr>
            <tbody>

@foreach($events as $i => $event)

<tr>

<td>{{ $i+1 }}</td>

<td>
<strong>{{ $event->nama_event }}</strong>
</td>

<td>
{{ $event->organizer->nama_organizer }}
</td>

<td>-</td>

<td>
{{ \Carbon\Carbon::parse($event->tanggal)->format('d M Y') }}
</td>

<td>
{{ $event->tikets->sum('kuota') }}
</td>

<td>

@if($event->status=='approved')

<span class="badge badge-green">
Approved
</span>

@elseif($event->status=='pending')

<span class="badge badge-yellow">
Pending
</span>

@else

<span class="badge badge-red">
Rejected
</span>

@endif

</td>

<td>
@if($event->status == 'pending')

<div style="display:flex; gap:6px;">

<form action="{{ route('admin.event.approve',$event->id_event) }}" method="POST">
    @csrf
    @method('PUT')
    <button type="submit"
        style="background:#22c55e;color:white;border:none;padding:7px 12px;border-radius:6px;cursor:pointer;">
        Approve
    </button>
</form>

<form action="{{ route('admin.event.reject',$event->id_event) }}" method="POST">
    @csrf
    @method('PUT')
    <button type="submit"
        style="background:#ef4444;color:white;border:none;padding:7px 12px;border-radius:6px;cursor:pointer;">
        Tolak
    </button>
</form>

</div>

@elseif($event->status == 'approved')

<span class="badge badge-green">Approved</span>

@else

<span class="badge badge-red">Rejected</span>

@endif
@endforeach

</tbody>
</table>

</div>

</div>

<footer>
Copyright ©2026 EventHub Admin Panel
</footer>

</body>
</html>