@include('menusp')
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Đặt Lại Mật Khẩu</h1>
                <nav class="d-flex align-items-center">
                    <a href="/">Home</a>

                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Login Box Area =================-->
<section class="login_box_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img">
                    <img class="img-fluid" src="{{asset('img/login.jpg')}}" alt="">
                    <div class="hover">
                        <h4>New to our website?</h4>
                        <p>There are advances being made in science and technology everyday, and a good example of
                            this is the</p>
                        <a class="primary-btn" href="{{ route('register') }}">Create an Account</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login_form_inner">
                    <h3>Đặt Lại Mật Khẩu</h3>

                    <form method="POST" class="row login_form" action="{{ route('password.store') }}">
                            @csrf

                            <!-- Mã Đặt Lại Mật Khẩu -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <!-- Địa chỉ Email -->
                            <div class="col-md-12 form-group mb-3">
                                
                                <input id="email" type="email" class="form-control" name="email"
                                    value="{{ old('email', $request->email) }}" required autofocus autocomplete="username" placeholder="Email">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Mật khẩu -->
                            <div class="col-md-12 form-group mb-3">
                               
                                <input id="password" type="password" class="form-control" name="password" required
                                    autocomplete="new-password" placeholder="Mật Khẩu Mới">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Xác nhận mật khẩu -->
                            <div class="col-md-12 form-group mb-3">
                                
                                <input id="password_confirmation" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password" placeholder="Xác Nhận Mật Khẩu">
                                @error('password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-12 form-group">
                                <button type="submit" class="primary-btn">
                                    {{ __('Đặt Lại Mật Khẩu') }}
                                </button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</section>
@include('footer')