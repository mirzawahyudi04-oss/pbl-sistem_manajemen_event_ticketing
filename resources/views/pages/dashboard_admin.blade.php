<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

    <link rel="icon" type="image/png" href="{{ asset('images/logofavicon22.png') }}">

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-100">

<div class="flex">

    <!-- Sidebar -->
    <aside class="fixed left-0 top-0 h-screen w-64 bg-slate-900 text-white">

        <div class="p-6 border-b border-slate-800">
            <h2 class="text-2xl font-bold">EventHub</h2>
            <p class="text-sm text-slate-400">Admin Dashboard</p>
        </div>

        <nav class="p-4 space-y-2">

            <a href="{{ route('dashboard_admin') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg bg-blue-600">
                Dashboard
            </a>

            <a href="{{ route('admin.manajemen') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800">
                Manajemen Event
            </a>

            <a href="{{ route('admin.organizer') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800">
                Organizer
            </a>

            <a href="{{ route('admin.peserta') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800">
                Peserta
            </a>

            <a href="{{ route('admin.tiket') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800">
                Tiket
            </a>

            <a href="{{ route('admin.laporan') }}"
               class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-slate-800">
                Laporan
            </a>

        </nav>

        <div class="absolute bottom-0 w-full p-4 border-t border-slate-800">
            <a href="{{ route('admin.login.form') }}"
               class="text-red-400 hover:text-red-300">
                Logout
            </a>
        </div>

    </aside>

    <!-- Content -->
    <main class="ml-64 flex-1 p-8">

        <div class="flex justify-between items-center mb-8">

            <div>
                <h1 class="text-3xl font-bold text-slate-800">
                    Dashboard Admin
                </h1>

                <p class="text-slate-500 mt-1">
                    Selamat datang Admin
                </p>
            </div>

            <div class="bg-white px-4 py-2 rounded-xl shadow-sm border">
                Admin
            </div>

        </div>

        <!-- Statistik -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

            <div class="bg-white p-6 rounded-xl shadow-sm border">
                <p class="text-slate-500 text-sm">Total Event</p>
                <h2 class="text-3xl font-bold mt-2">
                    {{ $totalEvent }}
                </h2>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm border">
                <p class="text-slate-500 text-sm">Organizer</p>
                <h2 class="text-3xl font-bold mt-2">
                    {{ $totalOrganizer }}
                </h2>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm border">
                <p class="text-slate-500 text-sm">Peserta</p>
                <h2 class="text-3xl font-bold mt-2">
                    {{ $totalPeserta }}
                </h2>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm border">
                <p class="text-slate-500 text-sm">Total Kuota Tiket</p>
                <h2 class="text-3xl font-bold mt-2">
                    {{ $totalKuota }}
                </h2>
            </div>

        </div>

        <!-- Grafik -->
        <!-- Grafik Status Event -->
<div class="bg-white p-6 rounded-xl shadow-sm border mb-6">
    <h2 class="text-2xl font-bold mb-4">Grafik Status Event</h2>

    <div style="height:300px;">
        <canvas id="statusChart"></canvas>
    </div>
</div>

<!-- Persentase Status Event -->
<div class="bg-white p-6 rounded-xl shadow-sm border">
    <h2 class="text-2xl font-bold mb-4">Persentase Status Event</h2>

    <div style="height:250px; width:250px; margin:auto;">
        <canvas id="statusPieChart"></canvas>
    </div>
</div>

<!-- Chart JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// Grafik Batang
const barCtx = document.getElementById('statusChart');

new Chart(barCtx, {
    type: 'bar',
    data: {
        labels: ['Approved', 'Pending', 'Rejected'],
        datasets: [{
            label: 'Jumlah Event',
            data: [
                {{ $approvedEvent }},
                {{ $pendingEvent }},
                {{ $rejectedEvent }}
            ],
            backgroundColor: [
                '#22c55e',
                '#f59e0b',
                '#ef4444'
            ]
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    precision: 0
                }
            }
        }
    }
});

// Grafik Donut
const pieCtx = document.getElementById('statusPieChart');

new Chart(pieCtx, {
    type: 'doughnut',
    data: {
        labels: ['Approved', 'Pending', 'Rejected'],
        datasets: [{
            data: [
                {{ $approvedEvent }},
                {{ $pendingEvent }},
                {{ $rejectedEvent }}
            ],
            backgroundColor: [
                '#22c55e',
                '#f59e0b',
                '#ef4444'
            ]
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'bottom'
            }
        }
    }
});
</script>

</body>
</html>