@include('menusp')
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Shop Category page</h1>
                <nav class="d-flex align-items-center">
                    <a href="/">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="">Shop<span class="lnr lnr-arrow-right"></span></a>

                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->
<div class="container">
    <div class="row p-5">
        <div class="col-xl-3 col-lg-4 col-md-5">
            <div class="sidebar-categories">
                <div class="head">Hãng Giày</div>
                <ul class="main-categories">

                    <li class="main-nav-list {{ $id_nhasx == 0 ? 'active' : '' }}"><a href="/sptnsx/0"><span
                                class="lnr lnr-arrow-right"></span>ALL<span class="number">(1000)</span></a>
                    </li>
                    @yield('danhmuc')

                </ul>
            </div>
            <div class="sidebar-categories p-2">
                <div class="head">Tìm Theo Giá</div>
                <ul class="main-categories">
                    <li class="main-nav-list {{ $id_nhasx == 0 ? 'active' : '' }}"><a href="/sptnsx/0"><span
                                class="lnr lnr-arrow-right"></span>ALL<span class="number">(1000)</span></a>
                    </li>
                    <li class="main-nav-list {{ $min_price == 500000 ? 'active' : '' }}">
                        <a href="{{ url('sptnsx/' . $id_nhasx . '/500000/1000000') }}">
                            <span class="lnr lnr-arrow-right"></span> 500,000 - 1,000,000
                        </a>
                    </li>
                    <li class="main-nav-list {{ $min_price == 1000000 ? 'active' : '' }}">
                        <a href="{{ url('sptnsx/' . $id_nhasx . '/1000000/3000000') }}">
                            <span class="lnr lnr-arrow-right"></span> 1,000,000 - 3,000,000
                        </a>
                    </li>
                    <li class="main-nav-list {{ $min_price == 3000000 ? 'active' : '' }}">
                        <a href="{{ url('sptnsx/' . $id_nhasx . '/3000000/8000000') }}">
                            <span class="lnr lnr-arrow-right"></span> 3,000,000 - 8,000,000
                        </a>
                    </li>
                    <li class="main-nav-list {{ $min_price == 8000000 ? 'active' : '' }}">
                        <a href="{{ url('sptnsx/' . $id_nhasx . '/8000000/15000000') }}">
                            <span class="lnr lnr-arrow-right"></span> 8,000,000 - 15,000,000
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-xl-9 col-lg-8 col-md-7">
            <!-- Start Filter Bar -->


            <div class="d-flex p-2 bg-primary">
                @yield('phantrang')
            </div>

            <!-- End Filter Bar -->
            <!-- Start Best Seller -->
            <section class="lattest-product-area pb-40 category-list">
                <div class="row">


                    @yield('sanpham')

                </div>
            </section>
            <!-- End Best Seller -->
            <!-- Start Filter Bar -->
            <div class="d-flex p-2 bg-primary">
                @yield('phantrang')
            </div>
            <!-- End Filter Bar -->
        </div>
    </div>
</div>

<!-- Start related-product Area -->
<section class="related-product-area section_gap">
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
                        <img class="img-fluid d-block mx-auto" src="{{ asset('img/category/c5.jpg')}}" alt="">
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