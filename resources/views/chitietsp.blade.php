@extends('layoutsanphamct')

@section('sanphamct')
<div class="col-lg-6">
    <div class="s_Product_carousel">
        <div class="single-prd-item">
            <img class="img-fluid" src="{{ asset('img/product/' . $sanpham->hinhanh) }}" alt="">
        </div>
        <div class="single-prd-item">
            <img class="img-fluid" src="{{ asset('img/product/' . $sanpham->hinhanh) }}" alt="">
        </div>
        <div class="single-prd-item">
            <img class="img-fluid" src="{{ asset('img/product/' . $sanpham->hinhanh) }}" alt="">
        </div>
    </div>
</div>
<div class="col-lg-5 offset-lg-1">
    <div class="s_product_text">
        <h3>{{ $sanpham->tensp }}</h3>
        <h3 class="l-through"><del>{{ number_format($sanpham->giaban) }} VNĐ</del></h3>
        <h3>{{ number_format($sanpham->giaban-($sanpham->giaban * $sanpham->bestseller)) }} VNĐ</h3>
        <ul class="list">
            <li><a class="active" href="#"><span>Category</span> : Household</a></li>
            <li><a href="#"><span>Availability</span> : In Stock</a></li>
        </ul>
        <p>Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking
            for
            something that can make your interior look awesome, and at the same time give you the pleasant
            warm feeling
            during the winter.</p>

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="qty">Quantity:</label>
                    <div class="input-group">
                        <input type="text" name="qty" id="sst" min="1" maxlength="12" value="1" title="Quantity:"
                            class="form-control">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary increase" type="button"
                                onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;">
                                <i class="lnr lnr-chevron-up"></i>
                            </button>
                            <button class="btn btn-outline-secondary reduced" type="button"
                                onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) && sst > 0 ) result.value--;return false;">
                                <i class="lnr lnr-chevron-down"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="size">Size:</label>
                    <div class="input-group">
                        <select name="size" id="size" class="form-control">
                            @for ($size = $sanpham->sizemin; $size <= $sanpham->sizemax; $size++)
                                <option value="{{ $size }}">{{ $size }}</option>
                            @endfor
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="card_area d-flex align-items-center">
            <a class="primary-btn" href="{{ route('products.addToCart', $sanpham->id) }}">Add to Cart</a>
            <a class="icon_btn" href="#"><i class="lnr lnr-diamond"></i></a>
            <a class="icon_btn" href="#"><i class="lnr lnr-heart"></i></a>
        </div>
    </div>
</div>
@endsection

@section('sanphams')
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