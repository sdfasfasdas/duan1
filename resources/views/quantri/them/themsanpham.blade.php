@extends('layout_admin')
@section('noidung')

<div class="container mt-5">
    <h2 class="text-center mb-4">Thêm Sản Phẩm Mới</h2>
    <form action="/admin/sanpham/them" method="post" enctype="multipart/form-data" class="col-7 m-auto">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @csrf
        <div class="mb-3">
            <label for="tensp" class="form-label">Tên Sản Phẩm</label>
            <input type="text" class="form-control @error('tensp') is-invalid @enderror" id="tensp" name="tensp" placeholder="Tên Sản Phẩm" value="{{ old('tensp') }}">
            @error('tensp')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="hinhanh" class="form-label">Hình Ảnh</label>
            <input type="file" class="form-control @error('hinhanh') is-invalid @enderror" id="hinhanh" name="hinhanh">
            @error('hinhanh')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="view" class="form-label">Lượt Xem</label>
            <input type="number" class="form-control @error('view') is-invalid @enderror" id="view" name="view" placeholder="Lượt Xem" value="{{ old('view') }}">
            @error('view')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="bestseller" class="form-label">Sản Phẩm Bán Chạy</label>
            <input type="number" class="form-control @error('bestseller') is-invalid @enderror" id="bestseller" name="bestseller" placeholder="Sản Phẩm Bán Chạy" value="{{ old('bestseller') }}">
            @error('bestseller')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="giaban" class="form-label">Giá Bán</label>
            <input type="text" class="form-control @error('giaban') is-invalid @enderror" id="giaban" name="giaban" placeholder="Giá Bán" value="{{ old('giaban') }}">
            @error('giaban')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="mota" class="form-label">Mô Tả</label>
            <textarea class="form-control @error('mota') is-invalid @enderror" id="mota" name="mota" rows="4" placeholder="Mô Tả">{{ old('mota') }}</textarea>
            @error('mota')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="trangthai" class="form-label">Trạng Thái</label>
            <select class="form-control @error('trangthai') is-invalid @enderror" id="trangthai" name="trangthai">
                <option value="1" {{ old('trangthai') == '1' ? 'selected' : '' }}>Kích Hoạt</option>
                <option value="0" {{ old('trangthai') == '0' ? 'selected' : '' }}>Không Kích Hoạt</option>
            </select>
            @error('trangthai')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="idloaisp" class="form-label">Loại Sản Phẩm</label>
            <select class="form-control @error('idloaisp') is-invalid @enderror" id="idloaisp" name="idloaisp">
                @foreach($LoaiSp as $loai)
                    <option value="{{ $loai->id }}" {{ old('idloaisp') == $loai->id ? 'selected' : '' }}>{{ $loai->tenloai }}</option>
                @endforeach
            </select>
            @error('idloaisp')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="sizemax" class="form-label">Kích Thước Lớn Nhất</label>
            <input type="text" class="form-control @error('sizemax') is-invalid @enderror" id="sizemax" name="sizemax" placeholder="Kích Thước Lớn Nhất" value="{{ old('sizemax') }}">
            @error('sizemax')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="sizemin" class="form-label">Kích Thước Nhỏ Nhất</label>
            <input type="text" class="form-control @error('sizemin') is-invalid @enderror" id="sizemin" name="sizemin" placeholder="Kích Thước Nhỏ Nhất" value="{{ old('sizemin') }}">
            @error('sizemin')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
</div>

@endsection