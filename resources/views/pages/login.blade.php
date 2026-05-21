<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;

            background: url('/images/bglogin.jpg') center/cover no-repeat fixed;
            
        }

        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.55);
            z-index: 0;
        }

        .box {
            position: relative;
            z-index: 1;
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            padding: 40px;
            border-radius: 20px;
            width: 300px;
            text-align: center;
        }

        h2 {
            color: white;
            letter-spacing: 4px;
            margin-bottom: 20px;
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

        .error {
            color: #ff8080;
            font-size: 13px;
            margin-bottom: 10px;
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
        .forgot {
            display: block;
            margin-top: 10px;
            font-size: 13px;
            color: rgba(255,255,255,0.6);
            text-align: center;
        }
        .forgot:hover {
            color: #90c8ff;
        }
        .forgot {
            color: #90c8ff;
;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>LOGIN</h2>

    @if(session('error'))
        <p class="error">{{ session('error') }}</p>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Masuk</button>
    </form>

    <div class="footer">
        <a href="{{ route('password.request') }}" class="forgot">Lupa password?</a>
        Belum punya akun? <a href="/register">Daftar di sini</a>
    </div>
</div>

</body>
</html>