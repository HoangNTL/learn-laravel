<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SignIn</title>
</head>

<body>
    <form action="{{ '/auth/checkSignIn' }}" method="POST">
        @csrf
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required >
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="pass" name="pass" required>
        </div>
        <div>
            <label for="repass">Nhập lại Password:</label>
            <input type="password" id="repass" name="repass" required>
        </div>
        <div>
            <label for="mssv">mssv:</label>
            <input type="text" id="mssv" name="mssv" required>
        </div>
        <div>
            <label for="lopmonhoc">Lớp môn học:</label>
            <input type="text" id="lopmonhoc" name="lopmonhoc" required>
        </div>
        <div>
            <label for="gioitinh">Giới tính:</label>
            <select id="gioitinh" name="gioitinh" required>
                <option value=""> Chọn giới tính </option>
                <option value="nam" {{ old('gioitinh') === 'nam' ? 'selected' : '' }}>Nam</option>
                <option value="nữ" {{ old('gioitinh') === 'nữ' ? 'selected' : '' }}>Nữ</option>
            </select>
        </div>
        <button type="submit">Đăng ký</button>
    </form>
</body>

</html>
