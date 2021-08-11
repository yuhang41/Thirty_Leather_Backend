@extends('layouts.app')
@section('page-title','尺寸編輯')
@section('css')

@endsection

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ asset('/admin/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ asset('/admin/product/size') }}">尺寸管理</a></li>
            <li class="breadcrumb-item"><a href="{{ asset('/admin/product/size/edit') }}/{{ $edit->id }}">尺寸編輯</a></li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h2>尺寸編輯</h2></div>
                <div class="card-body">
                    <form action="{{ asset('/admin/product/size/edit/update') }}/{{ $edit->id }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="cm">台灣 Cm:</label>
                                <input type="text" class="form-control" id="cm" name="cm" value="{{ $edit->cm }}">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="us">美碼 Us :</label>
                                <input type="text" class="form-control" id="us" name="us" value="{{ $edit->us }}">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="uk">英碼 Uk :</label>
                                <input type="text" class="form-control" id="uk" name="uk" value="{{ $edit->uk }}">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="eu">歐碼 Eu :</label>
                                <input type="text" class="form-control" id="eu" name="eu" value="{{ $edit->eu }}">
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
