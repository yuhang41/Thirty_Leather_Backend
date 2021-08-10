@extends('layouts.app')

@section('page-title','產品顏色')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
<style>
    .colors{
        width: 20px;
        height: 20px;
        display: inline-block;
        border: 1px solid black;
    }
</style>
@endsection

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ asset('/admin/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ asset('/admin/product/color') }}">產品顏色</a></li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>產品顏色</h2></div>
                <div class="card-body">
                    <a href="{{ asset('/admin/product/color/create') }}" class="btn btn-success">新增</a>
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>color_name</th>
                                <th>color</th>
                                <th>photo_count</th>
                                <th>Operating</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $item)
                                <tr>
                                    <td>{{ $item->color_name }}</td>
                                    <td>
                                        <div class="colors" style="background:{{ $item->color }};"></div>,
                                    </td>
                                    <td>{{ $item->color_photos->count() }}</td>
                                    <td>
                                        <a href="{{ asset('/admin/product/color/edit') }}/{{ $item->id }}" class="btn btn-primary">編輯顏色與新增圖片</a>
                                        <form style="display:inline-block;" action="/admin/product/color/delete/{{ $item->id }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" type="submit">刪除</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>color_name</th>
                                <th>color</th>
                                <th>photo_count</th>
                                <th>Operating</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
@endsection
