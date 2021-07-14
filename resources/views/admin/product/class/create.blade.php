@extends('layouts.app')

@section('page-title','類型新增')
@section('css')

@endsection

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ asset('/admin/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ asset('/admin/product/class') }}">類型管理</a></li>
            <li class="breadcrumb-item"><a href="{{ asset('/admin/product/class/create') }}">類型新增</a></li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h2>類型新增</h2></div>
                <div class="card-body">
                    <form action="{{ asset('/admin/product/class/create/store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="name">種類類型名稱</label>
                                <input type="text" class="form-control" id="name" name="type_class_name">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">新增</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection
