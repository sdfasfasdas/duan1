<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/8c204d0fdf.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css.css') }}">
    <title>Document</title>
</head>

<body>
    <div class="container-fluid main-page">

        <div class="app-main">
            <nav class="sidebar bg-primary">
                <ul>
                    <li>
                        <a href="{{url('admin/')}}"><i class="fa-solid fa-house ico-side"></i>Trang thống kê</a>
                    </li>
                    <li>
                        <a href="{{url('admin/donhang')}}"><i class="fa-solid fa-cart-shopping ico-side"></i>Quản lí đơn hàng</a>
                    </li>
                    <li>
                        <a href="{{url('admin/hang')}}"><i class="fa-solid fa-folder-open ico-side"></i>Quản lí Hãng</a>
                    </li>
                    <li>
                        <a href="{{url('admin/sanpham')}}"><i class="fa-solid fa-mug-hot ico-side"></i>Quản lí sản
                            phẩm</a>
                    </li>
                    <li>
                        <a href="{{url('admin/kh')}}"><i class="fa-solid fa-user ico-side"></i>Quản lí thành viên</a>
                    </li>
                    <li>
                        <a href="{{url('admin/bn')}}"><i class="fa-solid fa-at ico-side"></i>Quản lí Banner</a>
                    </li>
                    <li>
                        <a href="{{url('admin/anhtc')}}"><i class="fa-solid fa-at ico-side"></i>Quản lí Anh TC</a>
                    </li>
                    <li>
                        <a href="{{url('admin/Thungrac')}}"><i class="fa-solid fa-at ico-side"></i>Quản lí Thùng Rác</a>
                    </li>
                    <li>
                        <a href=""><i class="fa-solid fa-right-from-bracket ico-side"></i>Đăng Xuất</a>
                    </li>
                </ul>
            </nav>
            <div class="main-content">
                <a href="javascript:void(0);" class="back-button" onclick="goBack()">Quay lại</a>
                @yield('noidung')
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        new DataTable('#example');
        function goBack() {
            window.history.back();
        }
    </script>
    <script>
        // Kích hoạt CKEditor cho textarea có id là 'noiDung'
        CKEDITOR.replace('mota');
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    @if(Session::has('success'))
        Swal.fire('Thành công!', '{{ Session::get('success') }}', 'success');
    @elseif(Session::has('error'))
        Swal.fire('Lỗi!', '{{ Session::get('error') }}', 'error');
    @endif
</script>
</body>

</html>