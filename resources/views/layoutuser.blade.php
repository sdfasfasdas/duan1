@include('menusp')
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Profile User</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.html">User<span class="lnr lnr-arrow-right"></span></a>
                    <a href="category.html">Profile</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<div class="container mt-4 p-5">
    @yield('content')
</div>
@include('footer')
