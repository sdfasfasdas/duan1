<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Meta Charset -->
    <meta charset="UTF-8">
    <!-- Meta Viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('img/fav.png') }}">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="Description of the page goes here">
    <!-- Meta Keyword -->
    <meta name="keywords" content="keyword1, keyword2, keyword3">
    <!-- Site Title -->
    <title>@yield('tieude')</title>
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ion.rangeSlider.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ion.rangeSlider.skinFlat.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header class="header_area sticky-header">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light main_box">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="/"><img src="{{ asset('img/logo.png')}}" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item {{ $avt == 1 ? 'active' : '' }}">
                                <a class="nav-link" href="/">Home</a>
                            </li>
                            <li class="nav-item {{ $avt == 2 ? 'active' : '' }}">
                                <a href="/sptnsx" class="nav-link">Shop</a>
                            </li>
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">Blog</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
                                    <li class="nav-item"><a class="nav-link" href="single-blog.html">Blog Details</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item submenu dropdown">
                                <a href="#" class="nav-link dropdown-toggle {{ $avt == 5 ? 'active' : '' }}"
                                    data-toggle="dropdown" role="button" aria-haspopup="true"
                                    aria-expanded="false">User</a>
                                <ul class="dropdown-menu">
                                    @if (Route::has('login'))
                                        <nav class="-mx-3 flex flex-1 justify-end">
                                            @auth
                                                <li class="nav-item"> <a href="{{ url('/logout') }}" class="nav-link">
                                                        logout
                                                    </a></li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ route('profile.show') }}">Profile</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="/orders">Xem đơn hàng</a>
                                                </li>
                                            @else
                                                <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">
                                                        Log in
                                                    </a></li>

                                                @if (Route::has('register'))
                                                    <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">
                                                            Register
                                                        </a></li>
                                                @endif
                                            @endauth
                                        </nav>
                                    @endif
                                </ul>

                            </li>
                            <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="nav-item {{ $avt == 4 ? 'active' : '' }}""><a href=" /cart" class="cart"><span
                                    class="ti-bag"></span></a></li>
                            <li class="nav-item">
                                <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container">
                <div class="container">
                    <form class="d-flex justify-content-between" method="GET"
                        action="{{ url('sptnsx/' . $id_nhasx . '/' . $min_price . '/' . $max_price) }}">
                        <input type="text" class="form-control" id="search_input" name="search"
                            placeholder="Search Here" value="{{ $searchTerm }}">
                        <button type="submit">Search</button>
                        <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
                    </form>
                </div>
            </div>
        </div>
    </header>