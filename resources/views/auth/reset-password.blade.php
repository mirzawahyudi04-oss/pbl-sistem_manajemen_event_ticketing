<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Reset Password – STEVENTix</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style> body { font-family: 'Poppins', sans-serif; } </style>
</head>
<body class="min-h-screen flex">

    {{-- KIRI --}}
    <div class="hidden md:flex flex-1 bg-gradient-to-br from-blue-600 to-blue-900 text-white flex-col justify-center px-16 relative overflow-hidden">
        <div class="absolute w-80 h-80 rounded-full bg-white opacity-5 -right-20 -bottom-20"></div>

        <div class="absolute top-10 left-16 text-2xl font-bold tracking-wide">STEVENTix</div>

        <h1 class="text-5xl font-bold leading-tight mb-4">Buat<br>Password Baru.</h1>
        <p class="text-blue-200 text-sm leading-relaxed mb-10">Hampir selesai! Satu langkah lagi untuk masuk ke akunmu.</p>

        <div class="space-y-5">
            <div class="flex items-start gap-4 opacity-50">
                <div class="w-8 h-8 rounded-full bg-white text-blue-700 font-bold text-sm flex items-center justify-center flex-shrink-0">✓</div>
                <div>
                    <p class="font-semibold text-sm line-through">Masukkan Email & No. Handphone</p>
                    <p class="text-blue-300 text-xs">Identitas berhasil diverifikasi</p>
                </div>
            </div>
            <div class="w-px h-4 bg-blue-500 ml-4"></div>
            <div class="flex items-start gap-4">
                <div class="w-8 h-8 rounded-full bg-white text-blue-700 font-bold text-sm flex items-center justify-center flex-shrink-0">2</div>
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
            <h2 class="text-3xl font-bold text-blue-900 mb-1">Password Baru</h2>
            <p class="text-gray-500 text-sm mb-7">Buat password yang kuat dan mudah kamu ingat.</p>

            <form method="POST" action="{{ route('password.update-simple') }}">
                @csrf

                <label class="text-xs font-semibold text-gray-600 mb-1 block">Password Baru</label>
                <input type="password" name="password" placeholder="Minimal 6 karakter" required
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 mb-4 text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                <label class="text-xs font-semibold text-gray-600 mb-1 block">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" placeholder="Ulangi password baru" required
                    class="w-full border border-gray-300 rounded-xl px-4 py-3 mb-2 text-sm focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                @error('password')
                    <p class="text-red-500 text-xs mb-4">{{ $message }}</p>
                @enderror

                <button type="submit"
                    class="w-full bg-blue-700 hover:bg-blue-800 text-white font-semibold py-3 rounded-xl transition mt-4">
                    Simpan Password →
                </button>
            </form>

            <p class="text-center text-sm text-gray-500 mt-5">
                <a href="{{ route('login') }}" class="text-blue-700 font-semibold">← Kembali ke Login</a>
            </p>
        </div>
    </div>

</body>
</html>