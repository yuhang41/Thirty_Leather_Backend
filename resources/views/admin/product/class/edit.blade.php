@extends('layouts.app')
@section('page-title','類型編輯')
@section('css')

@endsection

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ asset('/admin/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ asset('/admin/product/class') }}">類型管理</a></li>
            <li class="breadcrumb-item"><a href="{{ asset('/admin/product/class/edit') }}/{{ $edit->id }}">編輯</a></li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>類型編輯</h2></div>
                <div class="card-body">
                    <form action="{{ asset('/admin/product/class/edit/update') }}/{{ $edit->id }}" method="POST" >
                        @csrf

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="name">產品名稱</label>
                                <input type="text" class="form-control" id="name" name="type_class_name" value="{{ $edit->type_class_name }}">
                            </div>
                        </div>
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                更新
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection
