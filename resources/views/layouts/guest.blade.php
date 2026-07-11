<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'STEVENtix')</title>

    <link rel="icon" type="image/png" href="{{ asset('images/logofavicon22.png') }}">

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50 text-slate-900 font-sans">


{{-- NAVBAR --}}
<nav class="bg-white border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

        <a href="/" 
           class="font-bold text-xl text-[#10194F]">
            STEVENtix
        </a>


        <a href="{{ route('dashboard_user') }}"
           class="text-sm font-semibold text-[#10194F]">
            Dashboard
        </a>

    </div>
</nav>


<main>
    @yield('content')
</main>


</body>
</html>