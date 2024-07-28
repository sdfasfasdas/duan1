@extends('layout_admin')
@section('noidung')

<div class="container mt-5">
    <h1 class="text-center mb-4">Bảng Điều Khiển Quản Trị</h1>

    <div class="row">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body text-center">
                    <i class="fas fa-box fa-3x mb-3"></i>
                    <h3>{{ $totalProducts }}</h3>
                    <a class="nav-link"  href="{{url('admin/sanpham')}}"><p>Tổng Sản Phẩm</p></a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-body text-center">
                    <i class="fas fa-users fa-3x mb-3"></i>
                    <h3>{{ $totalUsers }}</h3>
                    <a class="nav-link"  href="{{url('admin/kh')}}"><p>Tổng Người Dùng</p></a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body text-center">
                    <i class="fas fa-shopping-cart fa-3x mb-3"></i>
                    <h3>{{ $totalOrders }}</h3>
                    <a class="nav-link"  href="{{url('admin/donhang')}}"><p>Tổng Đơn Hàng</p></a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-body text-center">
                    <i class="fas fa-ad fa-3x mb-3"></i>
                    <h3>{{ $totalBanners }}</h3>
                    <p>Tổng Banner</p>
                </div>
            </div>
        </div>
    </div>

    <h2 class="mt-5">Sản Phẩm Bán Chạy Nhất</h2>
    @if ($bestsellerProduct)
        <div class="card mb-4">
            <div class="card-body text-center">
                <img src="{{ asset('img/product/' . $bestsellerProduct->hinhanh) }}" alt="{{ $bestsellerProduct->tensp }}" class="img-fluid mb-3" style="max-height: 200px;">
                <h4>{{ $bestsellerProduct->tensp }}</h4>
                <p>Giá: {{ number_format($bestsellerProduct->giaban, 0, ',', '.') }} VND</p>
                <p>Tổng Bán: {{ $bestsellerProduct->billct_count }}</p>
            </div>
        </div>
    @else
        <p>Không có sản phẩm bán chạy nhất.</p>
    @endif

    <h2 class="mt-5">10 Sản Phẩm Giảm Giá Nhiều Nhất</h2>
    <table class="table table-hover mt-3">
        <thead class="thead-dark">
            <tr>
                <th>Hình Ảnh</th>
                <th>ID</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Giảm Giá</th>
                <th>Ngày Tạo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($topDiscountedProducts as $product)
                <tr>
                    <td>
                        <img src="{{ asset('img/product/' . $product->hinhanh) }}" alt="{{ $product->tensp }}" class="img-fluid" style="max-height: 50px;">
                    </td>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->tensp }}</td>
                    <td>{{ number_format($product->giaban, 0, ',', '.') }} VND</td>
                    <td>{{ $product->bestseller * 100 }}%</td>
                    <td>{{ $product->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Đơn Hàng Mới Nhất</h2>
    <table class="table table-hover mt-3">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Khách Hàng</th>
                <th>Tổng</th>
                <th>Trạng Thái</th>
                <th>Ngày</th>
            </tr>
        </thead>
        <tbody>
            @foreach($latestOrders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->ten }}</td>
                    <td>{{ number_format($order->tongthanhtoan, 0, ',', '.') }} VND</td>
                    <td>{{ $order->trangthai }}</td>
                    <td>{{ $order->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2 class="mt-5">Người Dùng Mới Nhất</h2>
    <table class="table table-hover mt-3">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Ngày Tạo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($latestUsers as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2 class="mt-5">Sản Phẩm Mới Nhất</h2>
    <table class="table table-hover mt-3">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Giá</th>
                <th>Ngày Tạo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($latestProducts as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->tensp }}</td>
                    <td>{{ number_format($product->giaban, 0, ',', '.') }} VND</td>
                    <td>{{ $product->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection