@extends('layouts.FontTemplate')
@section('title','追蹤清單')

@section('css')
<link rel="stylesheet" href={{ asset('css/trace-lists.css') }}>
@endsection

@section('content')

<div class="trace-page">
    @if (Session::has('message'))
        <div class="alert alert-success text-center" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif
    <div class="trace-title text-center">追蹤清單</div>

    <div class="trace-lists d-flex justify-content-center mx-auto">
        <form action={{ route('user_logout') }} method="POST" class="list-group text-center font-weight-bold" id="list-tab" role="tablist">
            @csrf
            <a class="list-group-item list-group-item-action font-weight-bold" href="{{ asset('/front/user/') }}">會員<span>中心</span>
            </a>

            <a class="list-group-item list-group-item-action" id="list-profile-list"
                href={{ asset('/front/user/passwordModify') }}>密碼<span>修改</span>
            </a>
            <a class="list-group-item list-group-item-action active" id="list-profile-list" href={{ asset('/front/user/follow') }}>追蹤<span>清單</span></a>
            <button type="submit" id="list-profile-list" class="list-group-item list-group-item-action">會員<span>登出</span></button>
            @can('admin')
                <a class="list-group-item list-group-item-action" id="list-profile-list" href={{ asset('/admin/home') }}>管理者</a>
            @endcan
        </form>

        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="list-traceLists" role="tabpanel"
                aria-labelledby="list-traceLists-list">
                <div class="trace-data">
                    <div class="trace-container mx-auto">
                        <div class="data-block1 font-weight-bold mt-5">
                            <ul class="d-flex">
                                <li class="product-img">
                                    <div class="img">商品圖</div>
                                </li>

                                <li class="product-information">
                                    <div class="information d-flex">
                                        <div class="goods">商品</div>

                                        <div class="data">資訊</div>
                                    </div>
                                </li>

                                <li class="product-price">
                                    <div class="price text-center">價格</div>
                                </li>

                                <li class="buy-status">
                                    <ul class="status d-flex justify-content-center">
                                        <li class="purchase">購買</li>

                                        <li class="situation">狀態</li>
                                    </ul>
                                </li>

                                <li class="product-delete">
                                    <div class="delete text-center">刪除</div>
                                </li>
                            </ul>
                        </div>
                        <div class="data-block2 py-4">
                            @if (!$list->isEmpty())
                                @foreach ($list as $item)
                                    <div class="block2-order d-flex align-items-center mt-3">
                                        <div class="order-img">
                                            <img src='{{ asset($item->photo) }}'>
                                        </div>

                                        <div class="order-title">
                                            <ul class="d-flex heading2">
                                                <li class="England">【{{ $item->name }}】</li>

                                                <li class="cowhide">{{ $item->nickname }}</li>
                                            </ul>

                                            <li class="fourfifty">
                                                <div class="ffz-price">
                                                    <div class="ffz-delete">${{ $item->price }}</div>
                                                    <div class="ffz-modify">${{ round($item->price * $item->discount) }}</div>
                                                </div>

                                                <img class="ffz-cart" src="/img/shopping-cart.svg" style="width: 20px; height: 20px;">
                                                <img class="ffz-can" src="/img/trashcan.svg" style="width: 20px; height: 20px;">
                                            </li>
                                        </div>

                                        <div class="order-price pt-3 text-center">
                                            <ul>
                                                <li class="delete-price2">${{ $item->price }}</li>
                                                <li class="modify-price2 font-weight-bold">${{ round($item->price * $item->discount) }}</li>
                                            </ul>
                                        </div>
                                        @if ($item->product->product_quantity >= 1)
                                            <div class="order-status d-flex justify-content-center">
                                                <button class="btn add-shoppingCart"
                                                data-id={{ $item->product_id }}
                                                data-size={{ $item->size }}
                                                data-color={{ $item->color }}
                                                data-color_id={{ $item->color_id }}
                                                data-bool='true'
                                                >
                                                    加入購物車
                                                    <i class="fas fa-check"></i>
                                                </button>

                                                <img src={{ asset('img/shopping-cart.svg') }} alt="">
                                            </div>
                                        @else
                                            <div class="replenishment pt-3">
                                                <ul class="d-flex justify-content-center status1">
                                                    <li class="subscribed">已訂閱</li>

                                                    <li class="goods-inform">補貨通知</li>

                                                    <li>
                                                        <img src="/img/shopping-cart.svg" alt="">
                                                    </li>
                                                </ul>
                                            </div>
                                        @endif

                                        <form class="order-delete text-center" action="{{ asset('/front/user/delete') }}/{{ $item->id }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="delete-cart" >
                                                <img src={{ asset('img/trashcan.svg') }} alt="" >
                                            </button>
                                        </form>
                                    </div>
                                @endforeach
                            @else
                                <div class="list-null">
                                    無追蹤清單
                                </div>
                            @endif
                        </div>

                        <div class="data-block3 mt-5">
                            <button class="btn all-delete">全部刪除</button>
                        </div>

                        <div class="data-block4 d-flex justify-content-center mt-3 mb-4">
                            <button class="fas fa-caret-left"></button>

                            <span class="px-2 icon-number">1</span>

                            <button class="fas fa-caret-right"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src={{ asset('js/trace-lists.js') }}></script>
@endsection
