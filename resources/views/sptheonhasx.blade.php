@extends('layoutsanpham')
@section('tieude')
Shop
@endsection
@section('danhmuc')
@foreach($listhang as $dm)

    <li class="main-nav-list {{ $id_nhasx == $dm->id ? 'active' : '' }}"><a  href="/sptnsx/{{$dm->id}}" ><span class="lnr lnr-arrow-right"></span>{{$dm->tenloai}}<span
                class="number">({{$dm->sanphams_count}})</span></a>
    </li>
@endforeach
@endsection
@section('sanpham')
@foreach($products as $product)
    <div class="col-lg-4 col-md-6">
        <div class="single-product">
            <img class="img-fluid" src="{{ asset('img/product/' . $product->hinhanh) }}" alt="{{ $product->tensp }}">
            <div class="product-details">
                <h6>{{ $product->tensp }}</h6>
                <div class="price">
                    <h6 class="l-through">{{ number_format($product->giaban) }} VNĐ</h6>
                    <h6>{{ number_format($product->giaban-($product->giaban * $product->bestseller)) }} VNĐ</h6>
                </div>
                <div class="prd-bottom">

                    <a href="{{ route('products.addToCart', $product->id) }}" class="social-info">
                        <span class="ti-bag"></span>
                        <p class="hover-text">add to bag</p>
                    </a>
                    <a href="" class="social-info">
                        <span class="lnr lnr-heart"></span>
                        <p class="hover-text">Wishlist</p>
                    </a>
                    <a href="" class="social-info">
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
                    <h6>{{ number_format($product->giaban-($product->giaban * $product->bestseller)) }} VNĐ</h6>
                </div>
            </div>
        </div>
    </div>


@endforeach

@endsection
@section('phantrang')
    {{ $products->appends(['search' => $searchTerm, 'min_price' => $min_price, 'max_price' => $max_price])->links() }}
@endsection