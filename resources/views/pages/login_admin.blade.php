<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logofavicon22.png') }}">
    <style>
        body {
            font-family: Arial;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: url('/images/concert-bg.jpg') center/cover no-repeat;
        }

        .box {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(8px);
            padding: 30px;
            border-radius: 10px;
            width: 300px;
            text-align: center;
        }

        h2 {
            color: black;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background: black;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .error {
            color: #ffaaaa;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>LOGIN ADMIN</h2>

    @if(session('error'))
        <p class="error">{{ session('error') }}</p>
    @endif

    <form method="POST" action="{{ route('admin.login') }}">
        @csrf
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Masuk</button>
    </form>
</div>

</body>
</html>