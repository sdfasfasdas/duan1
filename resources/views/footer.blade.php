<footer class="footer-area section_gap text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Về Chúng Tôi</h6>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                        ut labore et dolore magna aliqua.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Liên Hệ</h6>

                    <div id="">
                        @auth
                            <form class="col-10 mx-auto p-3 border border-primary" method="post" action="/guilienhe">


                                <input type="hidden" name="ht" value="{{ auth()->user()->name }}">
                                <input type="hidden" name="em" value="{{ auth()->user()->email }}">

                                <div class="mb-3">
                                    <label>Nội dung</label>
                                    <textarea class="col-md-9 form-control" name="nd" required></textarea>
                                </div>
                                <div class="mb-3"> @csrf
                                    <button type="submit" class="btn btn-warning p-2">Gửi liên hệ</button>
                                </div>
                            </form>
                        @else
                            <p>Vui lòng <a href="/login" class="btn btn-primary">đăng nhập</a> để gửi liên hệ</p>
                        @endauth
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget mail-chimp">
                    <h6 class="mb-20">Instagram Feed</h6>
                    <ul class="instafeed d-flex flex-wrap">
                        <li><img src="{{ asset('img/i1.jpg') }}" alt=""></li>
                        <li><img src="{{ asset('img/i2.jpg') }}" alt=""></li>
                        <li><img src="{{ asset('img/i3.jpg') }}" alt=""></li>
                        <li><img src="{{ asset('img/i4.jpg') }}" alt=""></li>
                        <li><img src="{{ asset('img/i5.jpg') }}" alt=""></li>
                        <li><img src="{{ asset('img/i6.jpg') }}" alt=""></li>
                        <li><img src="{{ asset('img/i7.jpg') }}" alt=""></li>
                        <li><img src="{{ asset('img/i8.jpg') }}" alt=""></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Theo Dõi Chúng Tôi</h6>
                    <p>Hãy kết nối với chúng tôi</p>
                    <div class="footer-social d-flex align-items-center">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-behance"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
            <p class="footer-text m-0">
                Bản quyền &copy;
                <script>document.write(new Date().getFullYear());</script> Tất cả các quyền được bảo lưu | Mẫu này được
                làm với <i class="fa fa-heart-o" aria-hidden="true"></i> bởi <a href="https://colorlib.com"
                    target="_blank">Colorlib</a>
            </p>
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    @if(Session::has('success'))
        Swal.fire('Thành công!', '{{ Session::get('success') }}', 'success');
    @elseif(Session::has('error'))
        Swal.fire('Lỗi!', '{{ Session::get('error') }}', 'error');
    @endif
</script>
<script src="{{ asset('js/vendor/jquery-2.2.4.min.js') }}"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
    integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
    crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
<script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('js/jquery.sticky.js') }}"></script>
<script src="{{ asset('js/nouislider.min.js') }}"></script>
<script src="{{ asset('js/countdown.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
<script src="{{ asset('js/gmaps.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
</body>

</html>