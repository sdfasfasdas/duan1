@include('menusp')
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Checkout</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="single-product.html">Checkout</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <h1>Chi Tiết Đơn Hàng #{{ $order->id }}</h1>
    <p>Mã Hóa Đơn: {{ $order->mahd }}</p>
    <p>Trạng Thái: {{ $order->trangthai }}</p>

    <h2>Chi Tiết Hóa Đơn</h2>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Hình Ảnh</th>
                <th scope="col">Sản Phẩm</th>
                <th scope="col">Số Lượng</th>
                <th scope="col">Giá</th>
                <th scope="col">Tổng</th>
               
            </tr>
        </thead>
        <tbody>
            @php
                $totalAmount = 0;
            @endphp

            @foreach($orderDetails as $index => $detail)
                        @php
                            $subTotal = $detail->price * $detail->soluong; // Tính tổng số tiền cho từng sản phẩm
                            $totalAmount += $subTotal; // Cộng dồn vào tổng số tiền
                        @endphp
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><img src="{{asset('img/product/' . $detail->img) }}" width="50" alt="" class="img-fluid"></td>
                            <td>{{ $detail->name }}</td>
                            <td>{{ $detail->soluong }}</td>
                            <td>{{ number_format($detail->price, 0, ',', '.') }} đ</td>
                            <td>{{ number_format($subTotal, 0, ',', '.') }} đ</td>
                            
                        </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4"></td>
                <td><strong>Tổng Tiền:</strong></td>
                <td>{{ number_format($totalAmount, 0, ',', '.') }} đ</td> <!-- Điền giá trị tổng số tiền vào đây -->
            </tr>
        </tfoot>
    </table>
</div>
@include('footer')