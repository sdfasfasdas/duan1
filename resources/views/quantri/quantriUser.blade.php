@extends('layout_admin')
@section('noidung')
<div id="container_ad">
    <h3 class="title-page">Quản Lý Khách Hàng</h3>
    
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Address</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($User as $u)
                <tr>
                    <td>{{ $u->id }}</td>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>
                    <td>******</td>
                    <td>{{ $u->diachi }}</td>
                    <td>
                        @if($u->gioi == 0)
                            Nam
                        @elseif($u->gioi == 1)
                            Nữ
                        @else
                            Khác
                        @endif
                    </td>
                    <td>{{ substr($u->sdt, 0, 4) . '.' . substr($u->sdt, 4, 3) . '.' . substr($u->sdt, 7) }}</td>
                    <td>
                        @if($u->idgroup == 0)
                            Thành viên
                        @elseif($u->idgroup == 1)
                            Admin
                        @endif
                    </td>
                    <td>
                        @if(!$u->trashed())
                            <a href="{{ url('/admin/Kh/sua/' . $u->id) }}" class="btn btn-primary btn-sm">Sửa</a>
                            <a href="{{ url('/admin/Kh/chan/' . $u->id) }}" class="btn btn-danger btn-sm">Chặn</a>
                        @else
                            <a href="{{ url('/admin/Kh/bochan/' . $u->id) }}" class="btn btn-success btn-sm">Bỏ Chặn</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Address</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection