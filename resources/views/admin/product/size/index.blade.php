@extends('layouts.app')

@section('page-title','產品尺寸')
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
            <li class="breadcrumb-item"><a href="{{ asset('/admin/product/color') }}">產品尺寸</a></li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>產品尺寸</h2></div>
                <div class="card-body">
                    <a href="{{ asset('/admin/product/size/create') }}" class="btn btn-success">新增</a>
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>cm</th>
                                <th>us</th>
                                <th>uk</th>
                                <th>eu</th>
                                <th>Operating</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $item)
                                <tr>
                                    <td>{{ $item->cm }}</td>
                                    <td>{{ $item->us }}</td>
                                    <td>{{ $item->uk }}</td>
                                    <td>{{ $item->eu }}</td>
                                    <td>
                                        <a href="{{ asset('/admin/product/size/edit') }}/{{ $item->id }}" class="btn btn-primary">編輯尺寸</a>
                                        <form style="display:inline-block;" action="/admin/product/size/delete/{{ $item->id }}" method="POST">
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
                                <th>cm</th>
                                <th>us</th>
                                <th>uk</th>
                                <th>eu</th>
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
