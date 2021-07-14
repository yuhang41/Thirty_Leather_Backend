@extends('layouts.app')

@section('page-title','產品種類')
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
            <li class="breadcrumb-item"><a href="{{ asset('/admin/product/type') }}">產品種類</a></li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h2>產品種類</h2></div>
                <div class="card-body">
                    <a href="{{ asset('/admin/product/create') }}" class="btn btn-success">新增</a>
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>product_type</th>
                                <th>product_name</th>
                                <th>product_nickname</th>
                                <th>price</th>
                                <th>Main_photo</th>
                                <th>color</th>
                                <th>Operating</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $item)
                                <tr>
                                    <td>{{ $item->type->product_type }}</td>
                                    <td>{{ $item->product_name }}</td>
                                    <td>{{ $item->product_nickname }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>
                                        <img style="width:50px" src="{{ asset($item->photo) }}">
                                    </td>
                                    {{-- <td>
                                        @foreach ($item->photos as $img)
                                            <img style="width:50px" src="{{ asset($img->photos) }}">
                                        @endforeach
                                    </td> --}}
                                    <td>
                                        @foreach ($item->color as $color)
                                            <div class="colors" style="background:{{ $color }};"></div>,
                                        @endforeach
                                    </td>
                                    <td class="d-flex">
                                        <a href="{{ asset('/admin/product/edit') }}/{{ $item->id }}" class="btn btn-primary">編輯</a>
                                        <form style="display:inline-block;" action="/admin/product/delete/{{ $item->id }}" method="POST">
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
                                <th>product_type</th>
                                <th>product_name</th>
                                <th>product_nickname</th>
                                <th>price</th>
                                <th>Main_photo</th>
                                <th>color</th>
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
