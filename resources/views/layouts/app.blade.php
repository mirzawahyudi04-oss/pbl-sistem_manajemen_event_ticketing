<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'STEVENtix')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logofavicon22.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-slate-900 font-sans">

<div class="flex min-h-screen">

    {{-- SIDEBAR --}}
    <aside class="w-60 bg-slate-800 flex flex-col fixed top-0 left-0 h-screen">
        <div class="px-6 py-6 text-white font-bold text-lg tracking-wide border-b border-slate-700">
            STEVENtix
        </div>

        <nav class="flex-1 px-4 py-4 space-y-1">
            @yield('sidebar')
        </nav>

        <div class="px-4 py-5 border-t border-slate-700">
            <a href="{{ route('logout') }}"
               class="block text-center py-2 rounded-lg text-sm text-slate-300 hover:bg-slate-700 hover:text-white transition">
                Logout
            </a>
        </div>
    </aside>

    {{-- MAIN --}}
    <main class="ml-60 flex-1 p-8">
        @yield('content')
    </main>

</div>

</body>
</html>