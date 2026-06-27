<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logofavicon22.png') }}">
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
            background:linear-gradient(135deg,#1456c5,#0b2f7a);
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
        }

        .left h1{
            font-size:54px;
            line-height:1.1;
            margin-bottom:20px;
            z-index:1;
        }

        .left span{
            color:white;
        }

        .left p{
            color:rgba(255,255,255,.8);
            max-width:400px;
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

        h2{
            font-size:36px;
            margin-bottom:10px;
            color:#0b2f7a;
        }

        .subtitle{
            color:#777;
            margin-bottom:25px;
        }

        input,select{
            width:100%;
            padding:15px;
            margin-bottom:15px;
            border:1px solid #ddd;
            border-radius:12px;
            outline:none;
            transition:.2s;
        }

        input:focus,
        select:focus{
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
            text-align:center;
            margin-top:20px;
            font-size:14px;
        }

        a{
            color:#1456c5;
            text-decoration:none;
            font-weight:600;
        }

        @media(max-width:900px){
            .left{display:none;}
        }
    </style>
</head>
<body>

<div class="left">
    <div class="logo">STEVENTix</div>

    <h1>Buat akunmu <br><span>sekarang.</span></h1>

    <p>
        Mulai perjalanan event-mu hari ini.
        Daftar dan nikmati pengalaman tanpa ribet.
    </p>
</div>

<div class="right">
    <div class="form-box">
        <h2>Register</h2>
        <p class="subtitle">Daftar untuk mulai menggunakan STEVENTix</p>

        <form method="POST" action="/register">
            @csrf
            <input type="text" name="name" placeholder="Nama Lengkap" required>
            <input type="text" name="no_handphone" placeholder="Nomor Handphone" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required>

            <select name="role" required>
                <option value="buyer">Buyer</option>
                <option value="organizer">Organizer</option>
            </select>

            <button type="submit">Daftar</button>
        </form>

        <div class="footer">
            Sudah punya akun? <a href="/login">Login</a>
        </div>
    </div>
</div>

</body>
</html>