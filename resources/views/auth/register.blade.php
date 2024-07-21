@include('menusp')
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Login/Register</h1>
                <nav class="d-flex align-items-center">
                    <a href="/">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="{{ route('register') }}">Login/Register</a>
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
                    <img class="img-fluid" src="img/login.jpg" alt="">
                    <div class="hover">
                        <h4>New to our website?</h4>
                        <p>There are advances being made in science and technology everyday, and a good example of
                            this is the</p>
                        <a class="primary-btn" href="{{ route('login') }}">Log in</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="dngin_form_inner" >
                    <h3>Đăng Ký tài khoản</h3>
                    <form class="row login_form" action="{{ route('register') }}" method="post" >
                        @csrf
                        <div class="col-md-12 form-group">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <select id="gioi" name="gioi" class="form-control @error('gioi') is-invalid @enderror">
                                <option value="1">Nam</option>
                                <option value="2">Nữ</option>
                                <option value="0">Khác</option>
                            </select>
                            @error('gioi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control @error('diachi') is-invalid @enderror" id="diachi"
                                name="diachi" placeholder="Địa Chỉ" value="{{ old('diachi') }}" required autofocus>
                            @error('diachi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" placeholder="Tên Khách Hàng" value="{{ old('name') }}" required autofocus>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control @error('sdt') is-invalid @enderror" id="sdt"
                                name="sdt" placeholder="Số Điện Thoại" value="{{ old('sdt') }}" required autofocus>
                            @error('sdt')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" placeholder="Password" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="password"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                id="password_confirmation" name="password_confirmation" placeholder="Xác nhận Password"
                                required>
                            @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12 form-group">
                            <button type="submit" class="primary-btn">Đăng Ký</button>
                           
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@include('footer')