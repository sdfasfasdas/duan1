@extends('layout_admin')
@section('noidung')

<div class="container mt-5">
    <h2 class="text-center mb-4">Sửa User</h2>
    <form action="{{ url('/admin/Kh/sua/' . $User->id) }}" method="post" enctype="multipart/form-data" class="col-7 m-auto">
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
            <label for="name" class="form-label">Tên Khách Hàng</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Tên Khách Hàng" value="{{ $User->name }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ $User->email }}">
        </div>

        <div class="mb-3">
            <label for="diachi" class="form-label">Địa Chỉ</label>
            <input type="text" class="form-control" id="diachi" name="diachi" placeholder="Địa Chỉ" value="{{ $User->diachi }}">
        </div>

        <div class="mb-3">
            <label for="sdt" class="form-label">Số Điện Thoại</label>
            <input type="text" class="form-control" id="sdt" name="sdt" placeholder="Số Điện Thoại" value="{{ $User->sdt }}">
        </div>

        <div class="mb-3">
            <label for="idgroup" class="form-label">Role</label>
            <select class="form-control" id="idgroup" name="idgroup">
                <option value="1" {{ $User->idgroup == 1 ? 'selected' : '' }}>Admin</option>
                <option value="0" {{ $User->idgroup == 0 ? 'selected' : '' }}>Thành Viên</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="gioi" class="form-label">Giới Tính</label>
            <select class="form-control" id="gioi" name="gioi">
                <option value="1" {{$User->gioi == 1 ? 'selected' : ''}}>Nữ</option>
                <option value="0" {{$User->gioi == 0 ? 'selected' : ''}}>Nam</option>
                <option value="2" {{$User->gioi == 2 ? 'selected' : ''}}>Khác</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Sửa</button>
    </form>
</div>

@endsection