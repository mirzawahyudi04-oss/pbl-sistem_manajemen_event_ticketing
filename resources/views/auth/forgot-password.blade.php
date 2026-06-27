<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Lupa Password – STEVENTix</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style> body { font-family: 'Poppins', sans-serif; } </style>
</head>
<body class="min-h-screen flex">

    {{-- KIRI --}}
    <div class="hidden md:flex flex-1 bg-gradient-to-br from-blue-600 to-blue-900 text-white flex-col justify-center px-16 relative overflow-hidden">
        <div class="absolute w-80 h-80 rounded-full bg-white opacity-5 -right-20 -bottom-20"></div>

        <div class="absolute top-10 left-16 text-2xl font-bold tracking-wide">STEVENTix</div>

        <h1 class="text-5xl font-bold leading-tight mb-4">Lupa<br>Password?</h1>
        <p class="text-blue-200 text-sm leading-relaxed mb-10">Tenang, ikuti langkah berikut untuk reset password akunmu.</p>

        {{-- Langkah --}}
        <div class="space-y-5">
            <div class="flex items-start gap-4">
                <div class="w-8 h-8 rounded-full bg-white text-blue-700 font-bold text-sm flex items-center justify-center flex-shrink-0">1</div>
                <div>
                    <p class="font-semibold text-sm">Masukkan Email & No. Handphone</p>
                    <p class="text-blue-300 text-xs">Gunakan data yang didaftarkan saat register</p>
                </div>
            </div>
            <div class="w-px h-4 bg-blue-500 ml-4"></div>
            <div class="flex items-start gap-4 opacity-60">
                <div class="w-8 h-8 rounded-full border-2 border-blue-400 text-blue-300 font-bold text-sm flex items-center justify-center flex-shrink-0">2</div>
                <div>
                    <p class="font-semibold text-sm">Buat Password Baru</p>
                    <p class="text-blue-300 text-xs">Minimal 6 karakter</p>
                </div>
            </div>
            <div class="w-px h-4 bg-blue-500 ml-4"></div>
            <div class="flex items-start gap-4 opacity-60">
                <div class="w-8 h-8 rounded-full border-2 border-blue-400 text-blue-300 font-bold text-sm flex items-center justify-center flex-shrink-0">3</div>
                <div>
                    <p class="font-semibold text-sm">Login Kembali</p>
                    <p class="text-blue-300 text-xs">Masuk dengan password barumu</p>
                </div>
            </div>
        </div>
    </div>

    {{-- KANAN --}}
    <div class="flex-1 bg-white flex items-center justify-center px-10">
        <div class="w-full max-w-md">
            <h2 class="text-3xl font-bold text-blue-900 mb-1">Verifikasi Akun</h2>
            <p class="text-gray-500 text-sm mb-7">Masukkan email & nomor handphone yang terdaftar.</p>

            @if(session('error'))
                <div class="bg-red-50 text-red-600 text-sm px-4 py-3 rounded-xl mb-5">
                    ⚠️ {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.check-email') }}">
                @csrf
                <label class="text-xs font-semibold text-gray-600 mb-1 block">Email</label>
                <input type="email" name="email" placeholder="contoh@email.com" value="{{ old('email') }}" required
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 mb-4 text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                <label class="text-xs font-semibold text-gray-600 mb-1 block">Nomor Handphone</label>
                <input type="text" name="no_handphone" placeholder="08xxxxxxxxxx" value="{{ old('no_handphone') }}" required
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 mb-6 text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                <button type="submit"
                    class="w-full bg-blue-700 hover:bg-blue-800 text-white font-semibold py-3 rounded-xl transition">
                    Verifikasi & Lanjut →
                </button>
            </form>

            <p class="text-center text-sm text-gray-500 mt-5">
                Ingat password? <a href="{{ route('login') }}" class="text-blue-700 font-semibold">Login</a>
            </p>
        </div>
    </div>

</body>
</html>