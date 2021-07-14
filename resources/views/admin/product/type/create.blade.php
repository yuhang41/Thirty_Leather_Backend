@extends('layouts.app')

@section('page-title','種類新增')
@section('css')

@endsection

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ asset('/admin/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ asset('/admin/product/type') }}">種類管理</a></li>
            <li class="breadcrumb-item"><a href="{{ asset('/admin/product/type/create') }}">種類新增</a></li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h2>種類新增</h2></div>
                <div class="card-body">
                    <form action="{{ asset('/admin/product/type/create/store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="type_class_id">種類類型</label>
                                <select class="form-control" id="type_class_id" name="type_class_id">
                                    {{-- <select name="product_type_id" 這裡 name 傳的值是在 <option value='xxx' 抓 xxx 的值 --}}
                                    @foreach ($class as $item)
                                        <option value='{{ $item->id }}'>{{ $item->type_class_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="name">種類名稱</label>
                                <input type="text" class="form-control" id="name" name="product_type">
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
