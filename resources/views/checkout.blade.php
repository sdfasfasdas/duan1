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

<section class="checkout_area section_gap">
    <div class="container">
        @if(!Auth::check())
            <div class="returning_customer">
                <div class="check_title">
                    <h2>Returning Customer? <a href="#">Click here to login</a></h2>
                </div>
                <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new
                    customer, please proceed to the Billing & Shipping section.</p>
                <form class="row contact_form" action="{{ route('login') }}" method="post" novalidate="novalidate">
                    @csrf
                    <div class="col-md-6 form-group p_star">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Username or Email">
                    </div>
                    <div class="col-md-6 form-group p_star">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="col-md-12 form-group">
                        <button type="submit" value="submit" class="primary-btn">login</button>
                        <div class="creat_account">
                            <input type="checkbox" id="f-option" name="remember">
                            <label for="f-option">Remember me</label>
                        </div>
                        <a class="lost_pass" href="#">Lost your password?</a>
                    </div>
                </form>
            </div>
        @endif
        <div class="billing_details">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Billing Details</h3>
                    <form class="row contact_form" action="{{ route('checkout.confirm') }}" method="post">
                        @csrf
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="ten" name="ten"
                                value="{{ old('name', $user ? $user->name : '') }}" placeholder="Full Name">
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ old('email', $user ? $user->email : '') }}" placeholder="Email Address">
                        </div>
                        <div class="col-md-6 form-group p_star">
                            <input type="text" class="form-control" id="dienthoai" name="dienthoai"
                                value="{{ old('number', $user ? $user->sdt : '') }}" placeholder="Phone Number">
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" id="diachi" name="diachi"
                                value="{{ old('address', $user ? $user->diachi : '') }}" placeholder="Address">
                        </div>
                        <div class="col-md-12 form-group">
                            <textarea class="form-control" name="message" id="message" rows="1"
                                placeholder="Order Notes"></textarea>
                        </div>
                        <div class="payment_item">
                            <div class="radion_btn">
                                <input type="radio" id="pay_on_delivery" name="pttt" value="pay_on_delivery" checked>
                                <label for="pay_on_delivery">Thanh toán khi nhận hàng</label>
                                <div class="check"></div>
                            </div>
                            <p>Vui lòng chuẩn bị tiền mặt để thanh toán khi nhận hàng.</p>
                        </div>
                        <button type="submit" class="primary-btn">Xác Nhận</button>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="order_box">
                        <h2>Your Order</h2>
                        <ul class="list">
                            @foreach($cart as $id => $details)
                                <li>
                                    <a href="#">{{ $details['name'] }}
                                        <span class="middle">x {{ $details['quantity'] }}</span>
                                        <span
                                            class="last">${{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <ul class="list list_2">
                            <li><a href="#">Subtotal <span>${{ number_format($subtotal, 0, ',', '.') }}</span></a></li>
                            <li><a href="#">Shipping <span>${{ number_format($shipping, 0, ',', '.') }}</span></a></li>
                            <li><a href="#">Total <span>${{ number_format($total, 0, ',', '.') }}</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('footer')