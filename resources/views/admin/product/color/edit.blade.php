@extends('layouts.app')
@section('page-title','種類編輯')
@section('css')

@endsection

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ asset('/admin/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ asset('/admin/product/color') }}">顏色管理</a></li>
            <li class="breadcrumb-item"><a href="{{ asset('/admin/product/color/edit') }}/{{ $color->id }}">編輯</a></li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>顏色編輯</h2></div>
                <div class="card-body">
                    <form action="{{ asset('/admin/product/color/edit/update') }}/{{ $color->id }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="name">顏色名稱</label>
                                <input type="text" class="form-control" id="name" name="color_name" value="{{ $color->color_name }}">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="color">顏色</label>
                                <input type="color" class="form-control" id="color" name="color" value="{{ $color->color }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="product_id">擁有此顏色的產品種類</label>
                                <select class="form-control" id="product_id" name="product_id">
                                    {{-- <select name="product_type_id" 這裡 name 傳的值是在 <option value='xxx' 抓 xxx 的值 --}}
                                    @foreach ($color->product as $item)
                                        <option
                                            value='{{ $item->product->id }}'>
                                                {{ $item->product->product_name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="photos">產品顏色圖片</label>
                                <input type="file" multiple class="form-control" id="photos" name="photos[]">
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
