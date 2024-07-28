@extends('layout_admin')
@section('noidung')
<div id="container_ad">

    <h3 class="title-page">Quản Lý Đơn Hàng</h3>
  
    <table id="example" class="table table-striped" style="width:100%">
        <thead>

            <tr>
                <th>Mã HD</th>
                <th>ID KH</th>
                <th>Name</th>
                <th>Dial only</th>
                <th>Phone</th>
                <th>Email</th>
                <th>
                    Payment methods
                </th>
                <th>Voucher</th>
                <th>Tổng Tiền</th>
                <th>Trạng Thái</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($Bill as $B)
                <tr>
                    <td><a class="nav-link" href="/admin/donhangct/{{$B->id}}">{{ $B->mahd }}</a></td>
                    <td>{{ $B->iduser }}</td>
                 
                    <td>{{ $B->ten }}</td>
                    <td>{{ $B->diachi }}</td>
                    <td>{{ $B->dienthoai }}</td>
                    <td>{{ $B->email }}</td>
                    <td>{{ $B->pttt }}</td>
                    <td>{{ $B->voucher }}</td>
                    <td>{{ number_format($B->tongthanhtoan) }}</td>
                    <td>{{ $B->trangthai }}</td>
                    <td>
                        <a href="/admin/donhang/sua/{{$B->id}}" class="btn btn-warning btn-sm">Sửa</a>
                       
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <th>Mã HD</th>
            <th>ID KH</th>
            <th>Name</th>
            <th>Dial only</th>
            <th>Phone</th>
            <th>Email</th>
            <th>
                Payment methods
            </th>
            <th>Voucher</th>
            <th>Tổng Tiền</th>
            <th>Trạng Thái</th>
            <th>Actions</th>
        </tfoot>
    </table>
</div>
@endsection