<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;

            /* background foto konser */
            background: url('/images/bglogin.jpg') center/cover no-repeat fixed;
        }

        /* lapisan gelap di atas foto biar form keliatan */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.55);
            z-index: 0;
        }

        .wrapper {
            position: relative;
            z-index: 1;
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            padding: 40px;
            border-radius: 20px;
            width: 350px;
        }

        .card {
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: white;
            letter-spacing: 4px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border-radius: 30px;
            border: 1px solid rgba(255, 255, 255, 0.25);
            background: rgba(255, 255, 255, 0.1);
            color: white;
            text-align: center;
            font-family: 'Poppins', sans-serif;
            outline: none;
            box-sizing: border-box;
        }

        input::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        input:focus {
            border-color: rgba(255, 255, 255, 0.6);
            background: rgba(255, 255, 255, 0.15);
        }

        button {
            width: 100%;
            padding: 12px;
            border-radius: 30px;
            border: none;
            background: #222;
            color: white;
            margin-top: 15px;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            cursor: pointer;
            transition: background 0.2s;
        }

        button:hover {
            background: #444;
        }

        .footer {
            margin-top: 15px;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.7);
        }

        a {
            color: #90c8ff;
            text-decoration: none;
        }

        .error {
            color: #ff8080;
            font-size: 13px;
            margin-bottom: 10px;
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

            <input type="text" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}" required>
            <input type="text" name="phone" placeholder="Nomor Whatsapp" value="{{ old('phone') }}" required>
            <input type="email" name="email" placeholder="Masukkan Email Anda" value="{{ old('email') }}" required>
            <input type="password" name="password" placeholder="Masukkan Password Anda" required>
            <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>
            <label>Pilih Role</label>
            <select name="role" required>
                <option value="buyer">Buyer</option>
                <option value="organizer">Organizer</option>
            </select>

            <button type="submit">Daftar</button>
        </form>

        <div class="footer">
            Punya Akun? <a href="/login">Login di sini</a>
        </div>
    </div>
</div>

</body>
</html>