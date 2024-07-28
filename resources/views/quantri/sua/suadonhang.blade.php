@extends('layout_admin')
@section('noidung')

<div class="container mt-5">
    <h2 class="text-center mb-4">Sửa Đơn Hàng</h2>
    <form action="{{url('/admin/donhang/sua/' . $Bill->id)}}" method="post" enctype="multipart/form-data"
        class="col-7 m-auto">
        @csrf

        <div class="mb-3">
            <label for="ten" class="form-label">Lượt Xem</label>
            <input type="text" class="form-control" id="ten" name="ten" placeholder="Lượt Xem" value="{{$Bill->ten}}">
        </div>
        <div class="mb-3">
            <label for="diachi" class="form-label">Sản Phẩm Bán Chạy</label>
            <input type="text" class="form-control" id="diachi" name="diachi" placeholder="Sản Phẩm Bán Chạy"
                value="{{$Bill->diachi}}">
        </div>
        <div class="mb-3">
            <label for="dienthoai" class="form-label">Giá Bán</label>
            <input type="text" class="form-control" id="dienthoai" name="dienthoai" placeholder="Giá Bán"
                value="{{$Bill->dienthoai}}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Giá Bán</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Giá Bán"
                value="{{$Bill->email}}">
        </div>

        <div class="mb-3">
            <label for="trangthai" class="form-label">Trạng Thái</label>
            <select class="form-control" id="trangthai" name="trangthai">
                <option value="Đã Hủy" {{ $Bill->trangthai == 'Đã Hủy' ? 'selected' : '' }}>Đã Hủy</option>
                <option value="Chờ Duyệt" {{ $Bill->trangthai == 'Chờ Duyệt' ? 'selected' : '' }}>Chờ Duyệt</option>
                <option value="Đang Giao Hàng" {{ $Bill->trangthai == 'Đang Giao Hàng' ? 'selected' : '' }}>Đang Giao Hàng</option>
                <option value="Đã Giao" {{ $Bill->trangthai == 'Đã Giao' ? 'selected' : '' }}>Đã Giao</option>
                <option value="Hoàn Thành" {{ $Bill->trangthai == 'Hoàn Thành' ? 'selected' : '' }}>Hoàn Thành</option>
                <option value="Trả Hàng" {{ $Bill->trangthai == 'Trả Hàng' ? 'selected' : '' }}>Trả Hàng</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Sửa</button>
    </form>
</div>
@endsection