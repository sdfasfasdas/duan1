@extends('layout_admin')
@section('noidung')

<div class="container mt-5">
    <h2 class="text-center mb-4">Sửa Banner</h2>
    <form action="{{ url('/admin/anhtc/sua/' .  $AnhTc->id) }}" method="post" enctype="multipart/form-data" class="col-7 m-auto">
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
            <label for="tenanh" class="form-label">Hình Ảnh</label>
            <input type="file" class="form-control" id="tenanh" name="tenanh">
        </div>

        <div class="mb-3">
            <label for="link" class="form-label">Link</label>
            <input type="text" class="form-control" id="link" name="link" placeholder="Link" value="{{ $AnhTc->link }}">
        </div>
        
       
        <button type="submit" class="btn btn-primary">Sửa</button>
    </form>
</div>
@endsection