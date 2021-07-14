@extends('layouts.app')
@section('page-title','會員管理-編輯')
@section('css')
    <style>
        .product_img{
            position: relative;
        }
        .close_btn{
            position: absolute;
            right: 0;
            top: 0;
            transform: translate(50%,-50%);
            width: 10px;
            height: 10px;
            background: red;
            border-radius:5px;
            cursor: pointer;
            z-index: 10;
        }
        .close_btn::before{
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            transform: translate(-50%,0%);
            width: 1px;
            height: 100%;
            background: white;
            transform: rotate(45deg);
        }
        .close_btn::after{
            content: '';
            position: absolute;
            position: absolute;
            top: 0;
            right: 50%;
            transform: translate(50%,0%);
            width: 1px;
            height: 100%;
            background: white;
            transform: rotate(-45deg);
        }
    </style>
@endsection

@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ asset('/admin/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ asset('/admin/product') }}">產品管理</a></li>
            <li class="breadcrumb-item"><a href="{{ asset('/admin/product/edit') }}/{{ $edit->id }}">編輯</a></li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h2>會員管理-編輯</h2></div>
                <div class="card-body">
                    <form action="{{ asset('/admin/product/edit/update') }}/{{ $edit->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="product_type_id">種類</label>
                                <select class="form-control" id="product_type_id" name="product_type_id">
                                    {{-- <select name="product_type_id" 這裡 name 傳的值是在 <option value='xxx' 抓 xxx 的值 --}}
                                    @foreach ($type as $item)
                                        <option
                                            value='{{ $item->id }}'
                                            @if ($item->id === $edit->product_type_id)
                                                selected
                                            @endif>
                                                {{ $item->product_type}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="product_name">產品名稱</label>
                                <input type="text" class="form-control" id="product_name" name="product_name" value="{{ $edit->product_name }}">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="product_nickname">產品暱稱稱</label>
                                <input type="text" class="form-control" id="product_nickname" name="product_nickname" value="{{ $edit->product_nickname }}">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="price">產品價格</label>
                                <input type="number" min='100' max='50000' step="1" class="form-control" id="price" name="price" value="{{ $edit->price }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="discount">產品折扣</label>
                                <input type="number" min='0' max='1' step="0.01" class="form-control" id="discount" name="discount" value="{{ $edit->discount }}" placeholder="0.00 ~ 1.00">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="quantity">產品總量</label>
                                <input type="number" min='1' max='10000' step="1" class="form-control" id="quantity" name="product_quantity" value="{{ $edit->product_quantity }}">
                            </div>
                            <hr>
                            <div class="form-group col-md-12">
                                <label for="">產品的主要圖片</label>
                                <div class="d-flex justify-content-start">
                                    <div class="product_img">
                                        <img style="width:100px" src="{{ asset($edit->photo) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="photo">修改產品的主要圖片</label>
                                <input type="file" class="form-control" id="photo" name="photo">
                            </div>
                            <hr>
                            <div class="form-group col-md-12">
                                <label for="">產品的其他圖片</label>
                                <div class="d-flex justify-content-start flex-wrap">
                                    @foreach ($edit->photos as $item)
                                    <div class="product_img mx-1">
                                        <div class="close_btn" data-id='{{ $item->id }}'></div>
                                        <img style="width:100px" src="{{ asset($item->photos) }}">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="photos">新增產品的其他圖片</label>
                                <input type="file" multiple class="form-control" id="photos" name="photos[]">
                            </div>
                            <hr>
                            @php
                                $check = $edit->size;
                            @endphp
                            <h4>尺寸:</h4>
                            <div class="form-group col-md-12 d-flex mb-3 flex-wrap">
                                @foreach ($sizes as $key => $item)
                                    <div class="mr-3">
                                        <input type="checkbox" id="size{{ $key }}" name="size[]" value="{{ $item }}"
                                            @foreach ($check as $checked)
                                                @if ($item == $checked)
                                                    checked
                                                @endif
                                            @endforeach
                                        >
                                        <label for="size{{ $key }}">{{ $item }}</label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group col-md-12">
                                <label for="color">產品顏色</label>
                                @foreach ($edit->color as $color)
                                    <input type="color" name="color[]" id="color" value="{{ $color }}">
                                @endforeach
                                <button type="button" class="btn btn-outline-dark d-block create_button">新增顏色</button>
                                <div class="my_color">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="content">產品描述</label>
                                <textarea class="form-control" id="content" rows="3" name='content'>{{ $edit->content }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">更新</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    //新增顏色
    let create_btn = document.querySelector('.create_button');
        let my_color = document.querySelector('.my_color');
        let input;
        function NewColor(){
            // my_color.innerHTML += `<input type="color" name="color[]" class="mr-3">`;
            input = document.createElement('input');
            input.type = "color";
            input.name = "color[]";
            input.className = "mr-3";
            my_color.appendChild(input);
        }
        create_btn.addEventListener('click',NewColor);

    //刪除其他圖片
    let close_btn = document.querySelectorAll('.close_btn');

    function closeHandler(e){
        let id = this.dataset.id;
        let patent = e.target.parentElement;
        let formdata= new FormData();//用來request給後端
        // console.log();
        formdata.append('id',id);
        formdata.append('_token','{{ csrf_token() }}')
        if(confirm('你要刪除此資料嗎?')){
            fetch('/admin/product/deleteimg',{
                'method':'post',
                'body':formdata
            }).then((rep)=>{

            }).then((res)=>{
                alert('刪除成功')
                patent.remove();
            });
        }
    }
    close_btn.forEach(btn=>{
        btn.addEventListener('click',closeHandler);
    })
</script>
@endsection
