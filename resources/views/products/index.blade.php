@extends('layout.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Quản lý Sản phẩm</h3>
                    <div class="card-tools">
                        <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Thêm mới
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                        </div>
                    @endif

                    <!-- Filter Form -->
                    <form action="{{ route('products.index') }}" method="GET" class="mb-3">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="keyword">Từ khóa</label>
                                    <input type="text" class="form-control" id="keyword" name="keyword"
                                           value="{{ request('keyword') }}" placeholder="Tìm theo tên sản phẩm...">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="category_id">Danh mục</label>
                                    <select class="form-control" id="category_id" name="category_id">
                                        <option value="">-- Tất cả danh mục --</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>&nbsp;</label>
                                    <div>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-search"></i> Tìm kiếm
                                        </button>
                                        <a href="{{ route('products.index') }}" class="btn btn-secondary">
                                            <i class="fas fa-redo"></i> Làm mới
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 50px">ID</th>
                                    <th style="width: 80px">Ảnh</th>
                                    <th>Tên sản phẩm</th>
                                    <th style="width: 150px">Danh mục</th>
                                    <th style="width: 120px">Giá</th>
                                    <th style="width: 120px">Giá KM</th>
                                    <th style="width: 80px">Tồn kho</th>
                                    <th style="width: 100px">Trạng thái</th>
                                    <th style="width: 150px">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>
                                            @if($product->image)
                                                <img src="{{ asset('uploads/products/' . $product->image) }}"
                                                     alt="{{ $product->name }}"
                                                     style="max-width: 60px; max-height: 60px; object-fit: cover;">
                                            @else
                                                <span class="text-muted">Chưa có</span>
                                            @endif
                                        </td>
                                        <td>{{ $product->name }}</td>
                                        <td>
                                            @if($product->category)
                                                {{ $product->category->name }}
                                            @else
                                                <span class="text-muted">Chưa phân loại</span>
                                            @endif
                                        </td>
                                        <td>{{ number_format($product->price, 0, ',', '.') }} VNĐ</td>
                                        <td>
                                            @if($product->sale_price)
                                                <span class="text-danger font-weight-bold">
                                                    {{ number_format($product->sale_price, 0, ',', '.') }} VNĐ
                                                </span>
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                        <td>{{ $product->stock }}</td>
                                        <td>
                                            @if($product->is_active)
                                                <span class="badge badge-success">Hoạt động</span>
                                            @else
                                                <span class="badge badge-secondary">Ẩn</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">Không có sản phẩm nào</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3">
                        {{ $products->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
