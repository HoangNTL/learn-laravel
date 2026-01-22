<!DOCTYPE html>
<html>
<head>
    <title>Trang chủ</title>
</head>
<body>
    <h1>Chào mừng đến với trang chủ!</h1>
    <ul>
        <li><a href="{{ route('product.index') }}">Danh sách sản phẩm</a></li>
        <li><a href="{{ url('/sinhvien') }}">Giới thiệu sinh viên</a></li>
        <li><a href="{{ url('/banco/8') }}">Xem bàn cờ vua 8x8</a></li>
    </ul>
</body>
</html>
