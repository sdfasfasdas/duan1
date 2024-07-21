@extends('layout_admin')
@section('noidung')
<div id="container_ad">

    <h3 class="title-page">Quản Lý Hãng</h3>
    <div class="d-flex justify-content-end">
        <a href="{{url('/admin/loai/them')}}" class="btn btn-primary mb-2">Thêm sản phẩm</a>
    </div>
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($LoaiSp as $loai)
                <tr>
                    <td>{{ $loai->id }}</td>
                    <td>{{ $loai->tenloai }}</td>

                    <td>
                        @if ($loai->sanphams->isNotEmpty())
                            <a href="{{url('/admin/loai/sua/' . $loai->id)}}" class="btn btn-warning btn-sm">Sửa</a>

                        @else
                            <a href="{{url('/admin/loai/sua/' . $loai->id)}}" class="btn btn-warning btn-sm">Sửa</a>
                            <a href="{{url('/admin/loai/xoa/' . $loai->id)}}" class="btn btn-danger btn-sm">Xóa</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tfoot>
    </table>
</div>
@endsection