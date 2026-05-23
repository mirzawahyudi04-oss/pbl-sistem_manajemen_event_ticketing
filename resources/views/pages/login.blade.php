<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logofavicon22.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins',sans-serif;
        }

        body{
            min-height:100vh;
            display:flex;
        }

        .left{
            flex:1;
            background: linear-gradient(135deg,#1456c5,#0b2f7a);
            color:white;
            padding:70px;
            display:flex;
            flex-direction:column;
            justify-content:center;
            position:relative;
            overflow:hidden;
        }

        .left::after{
            content:'';
            position:absolute;
            width:320px;
            height:320px;
            border-radius:50%;
            background:rgba(255,255,255,.08);
            right:-100px;
            bottom:-100px;
        }

        .logo{
            position:absolute;
            top:40px;
            left:70px;
            font-size:28px;
            font-weight:700;
            color:white;
            letter-spacing:1px;
        }

        .left h1{
            font-size:56px;
            line-height:1.1;
            margin-bottom:20px;
            z-index:1;
        }

        .left span{
            color:#ffffff;
            font-weight:700;
        }

        .left p{
            color:rgba(255,255,255,.8);
            max-width:420px;
            line-height:1.8;
            z-index:1;
        }

        .right{
            flex:1;
            background:white;
            display:flex;
            justify-content:center;
            align-items:center;
            padding:40px;
        }

        .form-box{
            width:100%;
            max-width:450px;
        }

        .form-box h2{
            font-size:38px;
            margin-bottom:10px;
            color:#0b2f7a;
        }

        .form-box p{
            color:#777;
            margin-bottom:30px;
        }

        input{
            width:100%;
            padding:15px;
            margin-bottom:15px;
            border:1px solid #ddd;
            border-radius:12px;
            outline:none;
            transition:.2s;
        }

        input:focus{
            border-color:#1456c5;
            box-shadow:0 0 0 3px rgba(20,86,197,.15);
        }

        button{
            width:100%;
            padding:15px;
            border:none;
            border-radius:12px;
            background:#1456c5;
            color:white;
            font-weight:600;
            cursor:pointer;
            transition:.3s;
        }

        button:hover{
            transform:translateY(-2px);
            background:#0f47a8;
        }

        .footer{
            margin-top:20px;
            text-align:center;
            font-size:14px;
        }

        a{
            text-decoration:none;
            color:#1456c5;
            font-weight:600;
        }

        .forgot{
            display:block;
            text-align:right;
            margin-bottom:20px;
            color:#777;
            font-size:14px;
        }

        @media(max-width:900px){
            .left{
                display:none;
            }

            .right{
                flex:1;
            }
        }
    </style>
</head>
<body>

<div class="left">
    <div class="logo">STEVENTix</div>

    <h1>
        Temukan event terbaik,<br>
        pesan tiket dalam <span>hitungan detik.</span>
    </h1>

    <p>
        Konser, seminar, workshop, dan festival favoritmu
        tersedia dalam satu platform.
    </p>
</div>

<div class="right">
    <div class="form-box">
        <h2>Login</h2>
        <p>Silakan masuk ke akun Anda</p>

        @if(session('error'))
            <p style="color:red">{{ session('error') }}</p>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>

            <a href="{{ route('password.request') }}" class="forgot">
                Lupa password?
            </a>

            <button type="submit">Masuk</button>
        </form>

        <div class="footer">
            Belum punya akun? <a href="/register">Daftar</a>
        </div>
    </div>
</div>

</body>
</html>