<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Nhập tuổi</title>
</head>
<body>
    <h2>Nhập tuổi của bạn</h2>
    <form action="{{ url('/save-age') }}" method="POST">
        @csrf
        <input type="number" name="age" min="0" required>
        <button type="submit">Lưu tuổi</button>
    </form>
    @if(session('message'))
        <p>{{ session('message') }}</p>
    @endif
</body>
</html>
