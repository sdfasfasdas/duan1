@include('menusp')
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Confirmation</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="category.html">Confirmation</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Order Details Area =================-->
<section class="order_details section_gap">
    <div class="container">
        <h3 class="title_confirmation">Thank you. Your order has been received.</h3>
        <h1>Chi Tiết Đơn Hàng #{{ $order->id }}</h1>
        <p>Mã Hóa Đơn: {{ $order->mahd }}</p>
        <p>Trạng Thái: {{ $order->trangthai }}</p>
        <div class="order_details_table">
            <h2>Order Details</h2>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Tên Sản Phẩm</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Số Lượng</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Tổng Tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $totalAmount = 0;
                        @endphp
                        @foreach ($orderDetails as $od)
                                                @php
                                                    $subTotal = $od->price * $od->soluong; // Tính tổng số tiền cho từng sản phẩm
                                                    $totalAmount += $subTotal; // Cộng dồn vào tổng số tiền
                                                @endphp
                                                <tr>
                                                    <td>
                                                        <p>{{$od->name}}</p>
                                                    </td>
                                                    <td><img src="{{asset('img/product/' . $od->img) }}" width="50" alt="" class="img-fluid">
                                                    </td>
                                                    <td>
                                                        <h5>{{$od->soluong}}</h5>
                                                    </td>
                                                    <td>
                                                        <p>{{ number_format($od->price, 0, ',', '.') }} đ</p>
                                                    </td>
                                                    <td>
                                                        <p>{{ number_format($subTotal, 0, ',', '.') }} đ</p>
                                                    </td>
                                                </tr>
                        @endforeach


                        <tr>
                            <td colspan="3">
                                <h4>Subtotal</h4>
                            </td>
                            <td>
                                <h5></h5>
                            </td>
                            <td>
                                <p>{{ number_format($totalAmount, 0, ',', '.') }} đ</p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <h4>Shipping</h4>
                            </td>
                            <td>
                                <h5></h5>
                            </td>
                            <td>
                                <p>Free</p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <h4>Total</h4>
                            </td>
                            <td>
                                <h5></h5>
                            </td>
                            <td>
                                <p>{{ number_format($totalAmount, 0, ',', '.') }} đ</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@include('footer')