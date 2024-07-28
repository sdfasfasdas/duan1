@include('menusp')
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Xem Đơn Hàng</h1>
                <nav class="d-flex align-items-center">
                    <a href="/">Home</a>

                </nav>
            </div>
        </div>
    </div>
</section>
<div class="container p-5">

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Mã Hóa Đơn</th>
                <th scope="col">Ngày Mua</th>
                <th scope="col">Trạng Thái</th>
                <th scope="col">Thao Tác</th> <!-- Thêm cột cho nút "Xem Chi Tiết" -->
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $index => $order) <!-- Thêm $index để đếm số thứ tự -->
                <tr>
                    <th scope="row">{{ $index + 1 }}</th> <!-- Tăng dần số thứ tự -->
                    <td>{{ $order->mahd }}</td>
                    <td>{{ $order->ngay }}</td>
                    <td>{{ $order->trangthai }}</td>
                    <td>
                        @if($order->trangthai == 'Chờ Duyệt')
                            <a href="{{ route('order.cancel', ['id' => $order->id]) }}" class="btn btn-danger">Hủy Đơn Hàng</a>
                            <a href="{{ route('order.detail', ['id' => $order->id]) }}" class="btn btn-primary">Xem Chi Tiết</a>
                        @else
                            <a href="{{ route('order.detail', ['id' => $order->id]) }}" class="btn btn-primary">Xem Chi Tiết</a>
                        @endif
                    </td>
                </tr>
            @endforeach

        </tbody>

    </table>
    <div class="d-flex justify-content-center mt-4">
        {{ $orders->links() }}
    </div>
</div>
@include('footer')