@extends('layouts.app')

@section('page-title','產品新增')
@section('css')

@endsection

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ asset('/admin/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ asset('/admin/product') }}">產品管理</a></li>
            <li class="breadcrumb-item"><a href="{{ asset('/admin/product/create') }}">產品新增</a></li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h2>產品新增</h2></div>
                <div class="card-body">
                    <form action="{{ asset('/admin/product/create/store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="product_type_id">種類</label>
                                <select class="form-control" id="product_type_id" name="product_type_id">
                                    {{-- <select name="product_type_id" 這裡 name 傳的值是在 <option value='xxx' 抓 xxx 的值 --}}
                                    @foreach ($type as $item)
                                        <option value='{{ $item->id }}'>{{ $item->product_type}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="product_name">產品名稱</label>
                                <input type="text" class="form-control" id="product_name" name="product_name">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="product_nickname">產品別稱</label>
                                <input type="text" class="form-control" id="product_nickname" name="product_nickname">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="price">產品價格</label>
                                <input type="number" min='100' max='50000' step="1" class="form-control" id="price" name="price">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="discount">產品折扣</label>
                                <input type="number" min='0' max='1' step="0.01" class="form-control" id="discount" name="discount" placeholder="0.00 ~ 1.00">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="quantity">產品總量</label>
                                <input type="number" min='1' max='10000' step="1" class="form-control" id="quantity" name="product_quantity">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="photo">產品主要圖片</label>
                                <input type="file" class="form-control" id="photo" name="photo">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="photos">產品其他圖片</label>
                                <input type="file" multiple class="form-control" id="photos" name="photos[]">
                            </div>
                            <div class="form-group col-md-12">
                                <h4>尺寸:</h4>
                            </div>
                            <div class="form-group col-md-12 d-flex mb-3 flex-wrap">
                                @foreach ($sizes as $key => $item)
                                    <div class="mr-3">
                                        <input type="checkbox" id="size{{ $key }}" name="size[]" value="{{ $item }}">
                                        <label for="size{{ $key }}">{{ $item }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group col-md-12">
                                <h4 >產品顏色</h4>
                            </div>
                            <div class="form-group col-md-12 d-flex align-item-center mb-3">
                                    @foreach ($color as $key => $item)
                                    <div class="mr-3 d-flex align-items-center">
                                        <input type="checkbox" id="color{{ $key }}" name="color[]" value="{{ $item }}">
                                        <label for="color{{ $key }}" class="d-flex align-items-center m-0">{{ $key }} <div style="background:{{ $item }}; height:10px; width:20px"></div></label>
                                    </div>
                                    @endforeach
                                <button type="button" class="btn btn-outline-dark create_button">新增顏色</button>
                                <div class="my_color">
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="content">產品描述</label>
                                <textarea class="form-control" id="content" rows="3" name='content'></textarea>
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
<script>
    let create_btn = document.querySelector('.create_button');
    let my_color = document.querySelector('.my_color');
    let input;
    function NewColor(e){
        // my_color.innerHTML += `<input type="color" name="color[]" class="mr-3">`;
        input = document.createElement('input');
        input.type = "color";
        input.name = "color[]";
        input.className = "mr-3";
        my_color.appendChild(input);
    }
    create_btn.addEventListener('click',NewColor);
</script>
@endsection
