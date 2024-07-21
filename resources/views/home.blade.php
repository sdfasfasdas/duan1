@extends('layouthome')
@section('tieude')
Home
@endsection
@section('banner')
@foreach($banner as $bn)

    <div class="carousel-item {{ $bn->id == 1 ? 'active' : '' }}">
        <img src="img/banner/{{$bn->img}}" alt="{{$bn->ten}}" class="d-block" style="width:60%">
        <div class="carousel-caption">
            <h3>{{$bn->ten}}</h3>
            <p>{{$bn->motangan}}</p>
            <a href="{{ $bn->link }}" class="btn btn-primary">Xem thêm</a>
        </div>
    </div>

@endforeach
@endsection
@section('anhtc')
@foreach($anhTc as $anh)
    <div class="col-lg-6 col-md-6">
        <div class="single-deal">
            <div class="overlay"></div>
            <img class="img-fluid w-100" style="height:190px" src="img/category/{{$anh->tenanh}}" alt="">
            <a href="img/category/{{$anh->tenanh}}" class="img-pop-up" target="_blank">
                <div class="deal-details">
                    <h6 class="deal-title">Shocking Discount</h6>
                </div>
            </a>
        </div>
    </div>
@endforeach
@endsection
@section('sanphamnhieuview')
@foreach($productsByView as $product)
    <div class="col-lg-3 col-md-6">
        <div class="single-product">
            <img class="img-fluid" src="{{ asset('img/product/' . $product->hinhanh) }}" alt="{{ $product->tensp }}">
            <div class="product-details">
                <h6>{{ $product->tensp }}</h6>
                <div class="price">
                    <h6 class="l-through">{{ number_format($product->giaban) }} VNĐ</h6>
                    <h6>{{ number_format($product->giaban - ($product->giaban * $product->bestseller)) }} VNĐ</h6>
                </div>
                <div class="prd-bottom">
                    <a href="{{ route('products.addToCart', $product->id) }}" class="social-info">
                        <span class="ti-bag"></span>
                        <p class="hover-text">add to bag</p>
                    </a>
                    <a href="#" class="social-info">
                        <span class="lnr lnr-heart"></span>
                        <p class="hover-text">Wishlist</p>
                    </a>
                    <a href="#" class="social-info">
                        <span class="lnr lnr-sync"></span>
                        <p class="hover-text">compare</p>
                    </a>
                    <a href="/ct/{{$product->id}}" class="social-info">
                        <span class="lnr lnr-move"></span>
                        <p class="hover-text">view more</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endforeach

@endsection
@section('sanphamnhieumoi')
@foreach($productsById as $product)
    <div class="col-lg-3 col-md-6">
        <div class="single-product">
            <img class="img-fluid" src="{{ asset('img/product/' . $product->hinhanh) }}" alt="{{ $product->tensp }}">
            <div class="product-details">
                <h6>{{ $product->tensp }}</h6>
                <div class="price">
                    <h6 class="l-through">{{ number_format($product->giaban) }} VNĐ</h6>
                    <h6>{{ number_format($product->giaban - ($product->giaban * $product->bestseller)) }} VNĐ</h6>
                </div>
                <div class="prd-bottom">
                    <a href="{{ route('products.addToCart', $product->id) }}" class="social-info">
                        <span class="ti-bag"></span>
                        <p class="hover-text">add to bag</p>
                    </a>
                    <a href="#" class="social-info">
                        <span class="lnr lnr-heart"></span>
                        <p class="hover-text">Wishlist</p>
                    </a>
                    <a href="#" class="social-info">
                        <span class="lnr lnr-sync"></span>
                        <p class="hover-text">compare</p>
                    </a>
                    <a href="#" class="social-info">
                        <span class="lnr lnr-move"></span>
                        <p class="hover-text">view more</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endforeach

@endsection
@section('sanphamsale')

@foreach($productsByBestseller as $product)
    <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
        <div class="single-related-product d-flex flex-column align-items-center">
            <a href="/ct/{{$product->id}}">
                <img src="{{ asset('img/product/' . $product->hinhanh) }}" alt="{{ $product->tensp }}"
                    style="width: 100px; height: 100px;">
            </a>
            <div class="desc text-center mt-2">
                <a href="/ct/{{$product->id}}" class="title">{{ $product->tensp }}</a>
                <div class="price">
                    <h6 class="l-through">{{ number_format($product->giaban) }} VNĐ</h6>
                    <h6>{{ number_format($product->giaban - ($product->giaban * $product->bestseller)) }} VNĐ</h6>
                </div>
            </div>
        </div>
    </div>


@endforeach

@endsection