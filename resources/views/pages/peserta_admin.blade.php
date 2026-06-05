<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Peserta - Admin</title>
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
        table { width:100%; border-collapse:collapse; }
        th { padding:12px 14px; text-align:left; font-size:12px; color:#6b7280; font-weight:600; text-transform:uppercase; letter-spacing:.5px; background:#f9fafb; border-bottom:2px solid #f3f4f6; }
        td { padding:14px; border-bottom:1px solid #f3f4f6; font-size:14px; color:#374151; }
        tr:last-child td { border-bottom:none; }
        tr:hover td { background:#f9fafb; }
        .badge { padding:4px 12px; border-radius:20px; font-size:11px; font-weight:600; }
        .badge-green  { background:#dcfce7; color:#16a34a; }
        .badge-gray   { background:#f3f4f6; color:#6b7280; }
        .btn { padding:5px 10px; border-radius:8px; border:none; cursor:pointer; font-size:11px; font-weight:600; font-family:'Poppins',sans-serif; text-decoration:none; display:inline-flex; align-items:center; gap:6px; transition:all .2s; }
        .btn-lg { padding:9px 18px; font-size:13px; }
        .btn-primary { background:#3b82f6; color:white; }
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
        <a href="{{ route('admin.manajemen') }}"><span class="icon"></span> Manajemen Event</a>
        <div class="menu-label">Kelola</div>
        <a href="{{ route('admin.organizer') }}"><span class="icon"></span> Organizer</a>
        <a href="{{ route('admin.peserta') }}" class="active"><span class="icon"></span> Peserta</a>
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
        <div><h1>Kelola Peserta</h1><p>Daftar semua buyer / peserta terdaftar di platform</p></div>
        <a href="#" class="btn btn-primary btn-lg">Export Data</a>
    </div>

    <div class="box">
        <div class="search-bar">
            <input type="text" placeholder="  Cari nama atau email...">
            <select><option>Semua Status</option><option>Aktif</option><option>Nonaktif</option></select>
        </div>
        <table>
            <tr><th>#</th><th>Nama</th><th>Email</th><th>No. HP</th><th>Tiket Dibeli</th><th>Bergabung</th><th>Status</th><th>Aksi</th></tr>
            <tr>
                <td>1</td>
                <td><div style="display:flex;align-items:center;gap:10px;"><div style="width:34px;height:34px;background:#d1fae5;border-radius:50%;display:flex;align-items:center;justify-content:center;">👤</div><strong>Andi Saputra</strong></div></td>
                <td>andi.saputra@gmail.com</td><td>0812-1111-2222</td><td>5</td><td>Feb 2025</td>
                <td><span class="badge badge-green">Aktif</span></td>
                <td style="display:flex;gap:6px;"><a href="#" class="btn btn-primary">Detail</a><a href="#" class="btn btn-danger">Blokir</a></td>
            </tr>
            <tr>
                <td>2</td>
                <td><div style="display:flex;align-items:center;gap:10px;"><div style="width:34px;height:34px;background:#d1fae5;border-radius:50%;display:flex;align-items:center;justify-content:center;">👤</div><strong>Siti Rahayu</strong></div></td>
                <td>siti.rahayu@mail.com</td><td>0856-3333-4444</td><td>3</td><td>Mar 2025</td>
                <td><span class="badge badge-green">Aktif</span></td>
                <td style="display:flex;gap:6px;"><a href="#" class="btn btn-primary">Detail</a><a href="#" class="btn btn-danger">Blokir</a></td>
            </tr>
            
            <tr>
                <td>4</td>
                <td><div style="display:flex;align-items:center;gap:10px;"><div style="width:34px;height:34px;background:#fee2e2;border-radius:50%;display:flex;align-items:center;justify-content:center;">👤</div><strong>Dewi Lestari</strong></div></td>
                <td>dewi.lestari@gmail.com</td><td>0895-7777-8888</td><td>1</td><td>Mei 2025</td>
                <td><span class="badge badge-gray">Nonaktif</span></td>
                <td style="display:flex;gap:6px;"><a href="#" class="btn btn-primary">Detail</a><a href="#" class="btn btn-success">Aktifkan</a></td>
            </tr>
           
        </table>
    </div>
</div>

<footer>Copyright ©2026 EventHub Admin Panel</footer>
</body>
</html>