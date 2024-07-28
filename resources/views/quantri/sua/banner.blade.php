@extends('layout_admin')
@section('noidung')

<div class="container mt-5">
    <h2 class="text-center mb-4">Sửa Banner</h2>
    <form action="{{ url('/admin/banner/sua/' . $Banner->id) }}" method="post" enctype="multipart/form-data" class="col-7 m-auto">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="mb-3">
            <label for="ten" class="form-label">Chọn Sản Phẩm</label>
            <select class="form-select" id="ten" name="ten">
                <option selected disabled>Chọn sản phẩm</option>
                @foreach($SanPham as $sp)
                    <option value="{{ $sp->tensp }}" {{ $sp->id == $Banner->ten ? 'selected' : '' }}>{{ $sp->id }}-{{ $sp->tensp }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="img" class="form-label">Hình Ảnh</label>
            <input type="file" class="form-control" id="img" name="img">
        </div>

        <div class="mb-3">
            <label for="link" class="form-label">Link</label>
            <input type="text" class="form-control" id="link" name="link" placeholder="Link" value="{{ $Banner->link }}">
        </div>
        
        <div class="mb-3">
            <label for="motangan" class="form-label">Mô Tả Ngắn</label>
            <textarea class="form-control" id="motangan" name="motangan" rows="4" placeholder="Mô Tả Ngắn">{{ $Banner->motangan }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Sửa</button>
    </form>
</div>
@endsection