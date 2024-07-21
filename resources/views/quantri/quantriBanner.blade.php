@extends('layout_admin')
@section('noidung')
<div id="container_ad">

    <h3 class="title-page">Banner</h3>
    <div class="d-flex justify-content-end">
        <a href="{{ url('/admin/banner/them')}}" class="btn btn-primary mb-2">Thêm sản phẩm</a>
    </div>
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Images</th>
                <th>Link</th>
                <th>Mô tả ngắn</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($Banner as $Ba)
                <tr>
                    <td>{{ $Ba->id }}</td>
                    <td>{{ $Ba->ten }}</td>
                    <td><img src="{{ asset('img/banner/' . $Ba->img) }}" alt="{{ $Ba->tensp }}" width="100"></td>
                    <td>{{ $Ba->link }}</td>
                    <td>{{ Str::limit($Ba->motangan, 50) }}</td>


                    <td>
                        @if(!$Ba->trashed())
                            <a href="{{ url('/admin/banner/sua/' . $Ba->id) }}" class="btn btn-primary btn-sm">Sửa</a>
                            <a href="{{ url('/admin/banner/chan/' . $Ba->id) }}" class="btn btn-danger btn-sm">Ẩn</a>
                        @else
                            <a href="{{ url('/admin/banner/bochan/' . $Ba->id) }}" class="btn btn-success btn-sm">Bỏ Ẩn</a>
                            <a href="{{ url('/admin/banner/xoa/' . $Ba->id) }}" class="btn btn-danger btn-sm">Xóa</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Images</th>
                <th>Link</th>
                <th>Mô tả ngắn</th>
                <th>Actions</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection