@extends('layouts.app')

@section('page-title','尺寸新增')
@section('css')

@endsection

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ asset('/admin/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ asset('/admin/product/size') }}">尺寸管理</a></li>
            <li class="breadcrumb-item"><a href="{{ asset('/admin/product/size/create') }}">尺寸新增</a></li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h2>尺寸新增</h2></div>
                <div class="card-body">
                    <form action="{{ asset('/admin/product/size/create/store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="cm">台灣 Cm :</label>
                                <input type="text" class="form-control" id="cm" name="cm">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="us">美碼 Us :</label>
                                <input type="text" class="form-control" id="us" name="us">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="uk">英碼 Uk :</label>
                                <input type="text" class="form-control" id="uk" name="uk">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="eu">歐碼 Eu :</label>
                                <input type="text" class="form-control" id="eu" name="eu">
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
