<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
@if(session()->has('thongbao'))
    <div class="alert alert-info mt-5 p-5 col-8 h5 mx-auto text-center shadow-lg">
        {!! session('thongbao') !!}
    </div>
    <div class="text-center mt-3">
        <a href="/" class="btn btn-primary">Quay lại trang chủ</a>
    </div>
    
@endif