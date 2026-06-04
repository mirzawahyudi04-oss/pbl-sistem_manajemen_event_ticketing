<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logofavicon22.png') }}">

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body{
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background:#f3f4f6;
        }

        .login-card{
            width:100%;
            max-width:400px;
            background:#fff;
            padding:35px;
            border-radius:16px;
            box-shadow:0 10px 25px rgba(0,0,0,0.08);
        }

        .logo{
            text-align:center;
            margin-bottom:20px;
        }

        .logo img{
            width:60px;
        }

        h2{
            text-align:center;
            color:#111827;
            margin-bottom:8px;
        }

        .subtitle{
            text-align:center;
            color:#6b7280;
            font-size:14px;
            margin-bottom:25px;
        }

        .form-group{
            margin-bottom:16px;
        }

        label{
            display:block;
            margin-bottom:6px;
            color:#374151;
            font-size:14px;
            font-weight:500;
        }

        input{
            width:100%;
            padding:12px;
            border:1px solid #d1d5db;
            border-radius:8px;
            outline:none;
            transition:0.3s;
        }

        input:focus{
            border-color:#111827;
        }

        button{
            width:100%;
            padding:12px;
            background:#111827;
            color:white;
            border:none;
            border-radius:8px;
            cursor:pointer;
            font-weight:600;
            transition:0.3s;
        }

        button:hover{
            background:#000;
        }

        .error{
            background:#fee2e2;
            color:#dc2626;
            padding:10px;
            border-radius:8px;
            margin-bottom:15px;
            text-align:center;
            font-size:14px;
        }
    </style>
</head>
<body>

<div class="login-card">

    <div class="logo">
        <img src="{{ asset('images/logofavicon22.png') }}" alt="Logo">
    </div>

    <h2>Admin Login</h2>
    
    @if(session('error'))
        <div class="error">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.login') }}">
        @csrf

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="Masukkan email admin" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Masukkan password" required>
        </div>

        <button type="submit">
            Login
        </button>
    </form>

</div>

</body>
</html>