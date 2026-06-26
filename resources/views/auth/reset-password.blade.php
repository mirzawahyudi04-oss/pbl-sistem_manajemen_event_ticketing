<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>

<h2>Password Baru</h2>

<form action="{{ route('password.update-simple') }}" method="POST">
    @csrf

    <label>Password Baru</label><br>
    <input type="password" name="password" required><br><br>

    <label>Konfirmasi Password</label><br>
    <input type="password" name="password_confirmation" required><br><br>

    <button type="submit">
        Simpan Password
    </button>

</form>

</body>
</html>