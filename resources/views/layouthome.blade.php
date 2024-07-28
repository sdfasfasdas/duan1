@include('menusp')
<!-- End Header Area -->

<!-- start banner Area -->
<section class="banner-area">
    <div class="container">
        <div class="row fullscreen align-items-center justify-content-start">
            <div id="demo" class="carousel slide" data-bs-ride="carousel">

                <!-- Indicators/dots -->
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
                </div>

                <!-- The slideshow/carousel -->
                <div class="carousel-inner">
                    @yield('banner')
                </div>

                <!-- Left and right controls/icons -->
                <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- start features Area -->
<section class="features-area section_gap">
    <div class="container">
        <div class="row features-inner">
            <!-- single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-features">
                    <div class="f-icon">
                        <img src="img/features/f-icon1.png" alt="">
                    </div>
                    <h6>Free Delivery</h6>
                    <p>Free Shipping on all order</p>
                </div>
            </div>
            <!-- single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-features">
                    <div class="f-icon">
                        <img src="img/features/f-icon2.png" alt="">
                    </div>
                    <h6></h6>
                    <p>Free Shipping on all order</p>
                </div>
            </div>
            <!-- single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-features">
                    <div class="f-icon">
                        <img src="img/features/f-icon3.png" alt="">
                    </div>
                    <h6>24/7 Support</h6>
                    <p>Free Shipping on all order</p>
                </div>
            </div>
            <!-- single features -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-features">
                    <div class="f-icon">
                        <img src="img/features/f-icon4.png" alt="">
                    </div>
                    <h6>Secure Payment</h6>
                    <p>Free Shipping on all order</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end features Area -->

<!-- Start category Area -->
<section class="category-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12">
                <div class="row">

                    @yield('anhtc')
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-deal">
                    <div class="overlay"></div>
                    <img class="img-fluid w-100" src="img/category/c5.jpg" alt="">
                    <a href="img/category/c5.jpg" class="img-pop-up" target="_blank">
                        <div class="deal-details">
                            <h6 class="deal-title">Shocking Discount</h6>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End category Area -->

<!-- start product Area -->
<section class="owl-carousel active-product-area section_gap">
    <!-- single product slide -->
    <div class="single-product-slider">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Explore our Most Viewed Products</h1>
                        <p>Discover the hottest trends and must-have items from our collection of top-viewed
                            products. From stylish apparel to cutting-edge accessories, find your next favorite
                            here.</p>
                    </div>
                </div>
            </div>
            <div class="row">


                @yield('sanphamnhieuview')



            </div>
        </div>
    </div>
    <!-- single product slide -->
    <div class="single-product-slider">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>New Products</h1>
                        <p>Explore our latest additions to the collection. From trendy fashion to innovative
                            accessories, find the newest arrivals here.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @yield('sanphamnhieumoi')
            </div>
        </div>
    </div>
</section>
<!-- End exclusive deal Area -->

<!-- Start brand Area -->
<section class="brand-area section_gap">
    <div class="container">
        <div class="row">
            <a class="col single-img" href="#">
                <img class="img-fluid d-block mx-auto" src="img/brand/1.png" alt="">
            </a>
            <a class="col single-img" href="#">
                <img class="img-fluid d-block mx-auto" src="img/brand/2.png" alt="">
            </a>
            <a class="col single-img" href="#">
                <img class="img-fluid d-block mx-auto" src="img/brand/3.png" alt="">
            </a>
            <a class="col single-img" href="#">
                <img class="img-fluid d-block mx-auto" src="img/brand/4.png" alt="">
            </a>
            <a class="col single-img" href="#">
                <img class="img-fluid d-block mx-auto" src="img/brand/5.png" alt="">
            </a>
        </div>
    </div>
</section>
<!-- End brand Area -->

<!-- Start related-product Area -->
<section class="related-product-area section_gap_bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h1>Super discounted products</h1>
                    <p>"Explore the super sale collection! This is a great opportunity to get your favorite products
                        at
                        unbelievable prices. From fashion apparel to stylish accessories, it's all here , waiting
                        for
                        you to discover. Choose now, before stock runs out!"</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    @yield('sanphamsale')
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ctg-right">
                    <a href="#" target="_blank">
                        <img class="img-fluid d-block mx-auto" src="img/category/c5.jpg" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@include('footer')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    @if(Session::has('success'))
        Swal.fire('Thành công!', '{{ Session::get('success') }}', 'success');
    @elseif(Session::has('error'))
        Swal.fire('Lỗi!', '{{ Session::get('error') }}', 'error');
    @endif
        < script src = "{{ asset('js/vendor/jquery-2.2.4.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
    integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
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