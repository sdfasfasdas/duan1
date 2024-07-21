@extends('layout_admin')
@section('noidung')
<div id="container_ad">

    <h3 class="title-page">Ảnh TC</h3>
  
    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                
                <th>Images</th>
                <th>Link</th>
                
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
           
            @foreach ($AnhTc as $Ba)
                <tr>
                    <td>{{ $Ba->id }}</td>
                    <td><img src="{{ asset('img/category/' . $Ba->tenanh) }}" alt="{{ $Ba->tensp }}" width="100"></td>
                    <td>{{ $Ba->link }}</td>
                   


                    <td>
                        <a href="{{url('/admin/anhtc/sua/' . $Ba->id)}}" class="btn btn-warning btn-sm">Sửa</a>
                       
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Name</th>
               
                <th>Link</th>
                
                <th>Actions</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection