@extends('layouts.FontTemplate')
@section('title','產品')

@section('css')
    <link rel="stylesheet" href={{ asset('css/product-index.css') }}>
@endsection

@section('content')
<div class="main-container">
    <!-- 左邊白色區塊的欄位 -->
    <div class="commodity-menu">
        <div class="all-commodity">
            <div class="commodity-menu-title AllCommodity" data-toggle="collapse" data-target="#multiCollapseExample1" aria-expanded="true" aria-controls="multiCollapseExample1">
                所有商品
            </div>
            <ul class="commodity-menu-options collapse show" id="multiCollapseExample1">
                <li><a href="{{ asset('/front/product/') }}">全部</a></li>
                @foreach ($class as $item)
                    @if ($item->id == 1)
                        @foreach ($item->types as $type)
                            <li><a href="{{ asset('/front/product') }}?type_id={{ $type->id }}">{{ $type->product_type }}</a></li>
                        @endforeach
                    @endif
                @endforeach
            </ul>
            <div class="commodity-menu-title Snowshoe collapsed" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">
                訂製雪靴
            </div>
            <ul class="commodity-menu-options collapse" id="multiCollapseExample2">
                @foreach ($class as $item)
                    @if ($item->id == 3)
                        @foreach ($item->types as $type)
                            <li><a href="{{ asset('/front/product') }}?type_id={{ $type->id }}">{{ $type->product_type }}</a></li>
                        @endforeach
                    @endif
                @endforeach
                {{-- <li><a href="#">迷你筒(16cm-18cm)</a></li>
                <li><a href="#">低筒(22cm-24cm)</a></li>
                <li><a href="#">中筒(26cm-28cm)</a></li>
                <li><a href="#">高筒(30cm-33cm)</a></li> --}}
            </ul>
            <div class="commodity-other">
                配件
            </div>
        </div>
    </div>
    <!-- 所有產品 -->
    <div class="product-container">
        @if (Session::has('message'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif
        <div class="product-container-title">
            <div class="product-container-lable">
                <a href="#">首頁</a>
                >
                <a href="#">所有商品</a>
            </div>
            <div class="product-container-sort">
                <p>排序</p>
                <p>進階篩選</p>
            </div>
        </div>
        @if (!$products->isEmpty())
            <div class="product-container-card">
                @foreach ($products as $product)
                    <div class="product-card-spacing">
                        <div class="product-card">
                            <img src={{ asset($product->photo) }} alt="">
                            <div class="content">
                                <div class="text">
                                    <p>{{ $product->product_nickname }}</p>
                                    <p>{{ $product->product_name }}</p>
                                </div>
                                <div class="price">
                                    <span>${{ $product->price }}</span>
                                    <span>${{ $dicount = round($product->price * $product->discount) }}</span>
                                </div>
                            </div>
                            <a href="{{ asset('/front/product/detail') }}/{{ $product->id }}">
                            <button>了解此商品</button>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <h3 class="null-product">目前無商品</h3>
        @endif
        <div class="pagination">
            <ul>
                <li><a href="#"><i class="fas fa-caret-left"></i></a></li>
                <li><a href="#" class="page-number">1</a></li>
                <li><a href="#"><i class="fas fa-caret-right"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="back-top">
        <a href="#web-top">
            <i class="a-anchor fas fa-angle-double-up"></i>
        </a>
    </div>
</div>
@endsection

@section('js')

@endsection
