<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f3f3f3;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .wrapper {
            background: #e5e5e5;
            padding: 40px;
            border-radius: 20px;
            width: 350px;
        }

        .card {
            background: #f9f9f9;
            padding: 30px;
            border-radius: 20px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border-radius: 30px;
            border: 1px solid #ccc;
            text-align: center;
        }

        button {
            width: 100%;
            padding: 12px;
            border-radius: 30px;
            border: none;
            background: #222;
            color: white;
            margin-top: 15px;
        }

        .footer {
            margin-top: 15px;
            font-size: 14px;
        }

        a {
            color: blue;
            text-decoration: none;
        }

        .error {
            color: red;
            font-size: 13px;
        }
    </style>
</head>
<body>

<div class="wrapper">
    <div class="card">
        <h2>REGISTER</h2>

        @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="/register">
            @csrf

            <input type="text" name="name" placeholder="Nama Lengkap" required>
            <input type="text" name="phone" placeholder="Nomor Whatsapp" required>
            <input type="email" name="email" placeholder="Masukkan Email Anda" required>
            <input type="password" name="password" placeholder="Masukkan Password Anda" required>
            <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>

            <button type="submit">Daftar</button>
        </form>

        <div class="footer">
            Punya Akun? <a href="/login">Login di sini</a>
        </div>
    </div>
</div>

</body>
</html>