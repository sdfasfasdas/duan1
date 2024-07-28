@extends('layout_admin')
@section('noidung')

<div class="container mt-5">
    <h2 class="text-center mb-4">Sửa Sản Phẩm</h2>
    <form action="{{url('/admin/sanpham/sua/'.$sanPham->id)}}" method="post" enctype="multipart/form-data" class="col-7 m-auto">
        @csrf
        <div class="mb-3">
            <label for="tensp" class="form-label">Tên Sản Phẩm</label>
            <input type="text" class="form-control" id="tensp" name="tensp" placeholder="Tên Sản Phẩm" value="{{$sanPham->tensp}}">
        </div>
        <div class="mb-3">
            <label for="hinhanh" class="form-label">Hình Ảnh</label>
            <input type="file" class="form-control" id="hinhanh" name="hinhanh">
        </div>
        <div class="mb-3">
            <label for="view" class="form-label">Lượt Xem</label>
            <input type="number" class="form-control" id="view" name="view" placeholder="Lượt Xem" value="{{$sanPham->view}}">
        </div>
        <div class="mb-3">
            <label for="bestseller" class="form-label">Sản Phẩm Bán Chạy</label>
            <input type="number" class="form-control" id="bestseller" name="bestseller" placeholder="Sản Phẩm Bán Chạy" value="{{$sanPham->bestseller*100}}">
        </div>
        <div class="mb-3">
            <label for="giaban" class="form-label">Giá Bán</label>
            <input type="text" class="form-control" id="giaban" name="giaban" placeholder="Giá Bán" value="{{$sanPham->giaban}}">
        </div>
        <div class="mb-3">
            <label for="mota" class="form-label">Mô Tả</label>
            <textarea class="form-control" id="mota" name="mota" rows="4" placeholder="Mô Tả">{{$sanPham->mota}}</textarea>
        </div>
        <div class="mb-3">
            <label for="trangthai" class="form-label">Trạng Thái</label>
            <select class="form-control" id="trangthai" name="trangthai">
                <option value="1" {{$sanPham->trangthai == 1 ? 'selected' : ''}}>Kích Hoạt</option>
                <option value="0" {{$sanPham->trangthai == 0 ? 'selected' : ''}}>Không Kích Hoạt</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="idloaisp" class="form-label">Loại Sản Phẩm</label>
            <select class="form-control" id="idloaisp" name="idloaisp">
                @foreach($LoaiSp as $loai)
                    <option value="{{ $loai->id }}" {{$sanPham->idloaisp == $loai->id ? 'selected' : ''}}>{{ $loai->tenloai }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="sizemax" class="form-label">Kích Thước Lớn Nhất</label>
            <input type="text" class="form-control" id="sizemax" name="sizemax" placeholder="Kích Thước Lớn Nhất" value="{{$sanPham->sizemax}}">
        </div>
        <div class="mb-3">
            <label for="sizemin" class="form-label">Kích Thước Nhỏ Nhất</label>
            <input type="text" class="form-control" id="sizemin" name="sizemin" placeholder="Kích Thước Nhỏ Nhất" value="{{$sanPham->sizemin}}">
        </div>
        <button type="submit" class="btn btn-primary">Sửa</button>
    </form>
</div>
@endsection