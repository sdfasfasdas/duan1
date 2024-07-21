@extends('layout_admin')
@section('noidung')

<div class="container mt-5">
    <h2 class="text-center mb-4">Sửa Loai Mới</h2>
    <form action="/admin/loai/sua/{{$LoaiSp->id}}" method="post" enctype="multipart/form-data" class="col-7 m-auto">
        @csrf
        

        <div class="mb-3">
            <label for="tenloai" class="form-label">Tên Hãng</label>
            <input type="text" class="form-control" id="tenloai" value="{{$LoaiSp->tenloai}}" name="tenloai" placeholder="Tên Hãng">
        </div>
        
        
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
</div>
@endsection