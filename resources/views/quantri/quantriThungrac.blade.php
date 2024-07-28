@extends('layout_admin')
@section('noidung')
<div id="container_ad">

    <h3 class="title-page">Quản Lý Sản Phẩm</h3>
    
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Images</th>
                <th>View</th>
                <th>SELL</th>
                <th>Price</th>
                <th>Description</th>
                <th>Status</th>
                <th>Category</th>
                <th>Size Max</th>
                <th>Size Min</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sanPham as $san)
                <tr>
                    <td>{{ $san->id }}</td>
                    <td>{{ $san->tensp }}</td>
                    <td><img src="{{ asset('img/product/' . $san->hinhanh) }}" alt="{{ $san->tensp }}" width="50"></td>
                    <td>{{ $san->view }}</td>
                    <td>{{ $san->bestseller * 100 }}%</td>
                    <td>{{ number_format($san->giaban) }}</td>
                    <td>{{ Str::limit($san->mota, 50) }}</td>
                    <td>{{ $san->trangthai == 1 ? 'Kích hoạt' : 'Không kích hoạt' }}</td>
                    <td>{{ $san->idloaisp }}</td>
                    <td>{{ $san->sizemax }}</td>
                    <td>{{ $san->sizemin }}</td>
                    <td>
                        <a href="{{url('/admin/sanpham/khoiphuc/' . $san->id)}}" class="btn btn-success btn-sm">Khôi Phục</a>
                        <a href="{{url('/admin/sanpham/xoavv/' . $san->id)}}" class="btn btn-danger btn-sm">Xóa Luôn</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <th>ID</th>
            <th>Name</th>
            <th>Images</th>
            <th>View</th>
            <th>SELL</th>
            <th>Price</th>
            <th>Description</th>
            <th>Status</th>
            <th>Category</th>
            <th>Size Max</th>
            <th>Size Min</th>
            <th>Actions</th>
        </tfoot>
    </table>
</div>
@endsection