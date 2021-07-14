@extends('layouts.app')

@section('page-title','種類類型')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
@endsection

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ asset('/admin/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ asset('/admin/product/class') }}">種類類型</a></li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>種類類型</h2></div>
                <div class="card-body">
                    <a href="{{ asset('/admin/product/class/create') }}" class="btn btn-success">新增</a>
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>class_name</th>
                                <th>product_type_count</th>
                                <th>Operating</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $item)
                                <tr>
                                    <td>{{ $item->type_class_name }}</td>
                                    <td>{{ $item->types->count() }}</td>
                                    <td>
                                        <a href="{{ asset('/admin/product/class/edit') }}/{{ $item->id }}" class="btn btn-primary">編輯</a>
                                        <form style="display:inline-block;" action="/admin/product/class/delete/{{ $item->id }}" method="POST">
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
                                <th>class_name</th>
                                <th>product_type_count</th>
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
