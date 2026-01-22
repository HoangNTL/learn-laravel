<!DOCTYPE html>
<html>
<head>
    <title>Thêm sản phẩm</title>
</head>
<body>
    <h1>Thêm sản phẩm mới</h1>
    <form>
        <label>Tên sản phẩm:</label>
        <input type="text" name="name"><br>
        <label>Giá:</label>
        <input type="number" name="price"><br>
        <button type="submit">Thêm</button>
    </form>
    <a href="{{ route('product.index') }}">Quay lại danh sách</a>
</body>
</html>
