<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SignIn</title>
</head>
<body>
    <h2>Đăng ký tài khoản</h2>
    <form action="{{ url('/check-signin') }}" method="POST">
        @csrf
        <label>Username:</label><br>
        <input type="text" name="username" required><br>
        <label>Password:</label><br>
        <input type="password" name="password" required><br>
        <label>Nhập lại Password:</label><br>
        <input type="password" name="repass" required><br>
        <label>MSSV:</label><br>
        <input type="text" name="mssv" required><br>
        <label>Lớp môn học:</label><br>
        <input type="text" name="lopmonhoc" required><br>
        <label>Giới tính:</label><br>
        <select name="gioitinh" required>
            <option value="nam">Nam</option>
            <option value="nu">Nữ</option>
            <option value="khac">Khác</option>
        </select><br><br>
        <button type="submit">Sign In</button>
    </form>
    @if(session('message'))
        <p>{{ session('message') }}</p>
    @endif
</body>
</html>
