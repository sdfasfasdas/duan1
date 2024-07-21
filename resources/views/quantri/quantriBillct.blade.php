@extends('layout_admin')
@section('noidung')
<div id="container_ad">

    <h3 class="title-page">Đơn Hàng Chi Tiết</h3>

    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>STT</th>
                <th>ID SP</th>
                <th>Images</th>
                <th>Giá</th>
                <th>Name</th>
                <th>Số Lượng</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Billct as $index => $san)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $san->idsp }}</td>
                    <td><img src="{{ asset('img/product/' . $san->img) }}" alt="{{ $san->name }}" width="50"></td>
                    <td>{{ number_format($san->price) }} đ</td>
                    <td>{{ $san->name }}</td>
                    <td>{{ $san->soluong }} Chiếc</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>STT</th>
                <th>ID SP</th>
                <th>Images</th>
                <th>Giá</th>
                <th>Name</th>
                <th>Số Lượng</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection