@extends('layoutuser')
@section('content')
<div class="container">
    <h1 class="mt-4">Hồ sơ</h1>


    <form method="POST" action="{{ route('profile.update') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Tên</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="diachi" class="form-label">Địa chỉ</label>
            <input type="text" class="form-control" id="diachi" name="diachi" value="{{ old('diachi', $user->diachi) }}">
            @error('diachi')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="sdt" class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" id="sdt" name="sdt" value="{{ old('sdt', $user->sdt) }}">
            @error('sdt')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="gioi" class="form-label">Giới tính</label>
            <select class="form-select" id="gioi" name="gioi" required>
                <option value="0" {{ old('gioi', $user->gioi) == 0 ? 'selected' : '' }}>Nam</option>
                <option value="1" {{ old('gioi', $user->gioi) == 1 ? 'selected' : '' }}>Nữ</option>
            </select>
            @error('gioi')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu (để trống nếu không thay đổi)</label>
            <input type="password" class="form-control" id="password" name="password">
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Xác nhận mật khẩu</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
@endsection