@extends('layouts.FontTemplate')
@section('title','會員中心')

@section('css')
<link rel="stylesheet" href={{ asset('css/login.css') }}>
@endsection

@section('content')
<div class="member-page">
    <div class="page-title text-center">會員中心首頁</div>

    <div class="member-lists d-flex justify-content-center mx-auto">

        <form action={{ route('user_logout') }} method="POST" class="list-group text-center font-weight-bold" id="list-tab" role="tablist">
            @csrf
            <a class="list-group-item list-group-item-action active font-weight-bold" href="{{ asset('/front/user/') }}">會員<span>中心</span></a>

            <a class="list-group-item list-group-item-action" id="list-profile-list"
                href={{ asset('/front/user/passwordModify') }}>密碼<span>修改</span>
            </a>
            <a class="list-group-item list-group-item-action" id="list-profile-list" href={{ asset('/front/user/follow') }}>追蹤<span>清單</span></a>
            <button type="submit" id="list-profile-list" class="list-group-item list-group-item-action">會員<span>登出</span></button>
            @can('admin')
                <a class="list-group-item list-group-item-action" id="list-profile-list" href={{ asset('/admin/home') }}>管理者</a>
            @endcan
        </form>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="list-memberCenter" role="tabpanel"
                aria-labelledby="list-memberCenter-list">
                <div class="member-data">
                    <div class="member-container mx-auto">
                        <div class="data-block1 d-flex justify-content-center mt-4">
                            <i class="fas fa-user"></i>

                            <div class="user-id font-weight-bold">{{ $user->name }}</div>

                            <div class="general-member d-flex align-items-center justify-content-center">
                                一般會員
                            </div>
                        </div>

                        <div class="data-block2 d-flex justify-content-center mt-2">
                            <i class="fas fa-pen mr-1"></i>

                            <div class="user-edit ml-1">編輯會員資料</div>
                        </div>

                        <form action={{ asset('/front/user/update') }} method="POST">
                            @csrf
                            <div class="data-block3">
                                <div class="input-data">
                                    <div class="input-left">
                                        <div class="input1 input-name">
                                            <label class="title font-weight-bold">姓名</label>
                                            <input type="text" class="content content-edit" value="{{ $user->name }}" placeholder="林土木" name="name" readonly>
                                        </div>

                                        <div class="input1 input-email">
                                            <label class="title title1 font-weight-bold">信箱</label>
                                            <input type="email" class="content content-edit" value="{{ $user->email }}" placeholder="test123@gmail.com" name="email" readonly>
                                        </div>

                                        <div class="input1 input-phone">
                                            <label class="title title1 font-weight-bold">行動電話</label>
                                            <input type="text" class="content content-edit" value="{{ $user->phone }}" placeholder="0900 - 123456" name="phone" readonly>
                                        </div>

                                        <div class="input1 input-date">
                                            <label class="title title1 font-weight-bold">出生日期</label>
                                            <input type="date" class="content content-edit" value="{{ $user->date }}" placeholder="1995 / 01 / 24" name="date" readonly>

                                        </div>
                                    </div>

                                    <div class="input-right d-flex flex-column justify-content-between mt-1">
                                        <div class="contact d-flex">
                                            <label class="title5 font-weight-bold">聯絡地址</label>

                                            <div class="address-data city-selector-set">
                                                <div class="city-block">
                                                    <select class="county">&#xf042;</select>

                                                    <select class="district"></select>

                                                    <input class="zipcode text-center" type="text" size="3"
                                                        readonly placeholder="郵遞區號">
                                                </div>

                                                <input class="detail-address mt-2 content-edit" type="text"
                                                    placeholder="詳細的地址" value="{{ $user->address }}" readonly>
                                            </div>
                                        </div>

                                        <div class="subscribe">
                                            <label class="title6 font-weight-bold">訂閱電子報
                                                <input type="checkbox" checked="checked">

                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="data-block4 mb-4">
                                <div class="btn-groups">
                                    <button type="button"
                                        class="btn cancel d-flex align-items-center font-weight-bold mr-1">取消</button>

                                    <button type="submit"
                                        class="btn d-flex align-items-center font-weight-bold ml-1">儲存變更</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="data-block5">
                        <div class="order-title text-center">訂單前五筆</div>
                    </div>

                    <div class="data-block6">
                        <div class="order-content mb-3">
                            <div class="order-lists text-center">
                                <div class="list-block1 d-flex">
                                    <ul class="block1-l d-flex pl-0 mb-0">
                                        <li class="order-number">訂單編號</li>
                                        <li class="order-date">訂購日期</li>
                                        <li class="order-status">訂單狀態</li>
                                        <li class="pickUp-method">收貨方式</li>
                                    </ul>

                                    <ul class="block1-r d-flex pl-0 mb-0">
                                        <li class="delivery-way">寄送方式</li>
                                        <li class="process-time">處理進度</li>
                                        <li class="payable-amount">應付金額</li>
                                        <li class="check-invoice">發票</li>
                                        <li class="return-service">退貨服務</li>
                                    </ul>
                                </div>
                                @foreach ($list_order as $key=>$order)
                                    <div class="list-block d-flex">
                                        <ul class="block-l d-flex mb-0">
                                            <li>
                                                <div class="number">{{ $order->order_no }}</div>
                                            </li>

                                            <li class="date">{{ $order->date }}</li>
                                            <li class="status">已出貨</li>
                                            <li class="method">全家超商取貨</li>
                                        </ul>

                                        <ul class="block-r d-flex mb-0">
                                            <li class="way">全家店配</li>
                                            <li class="time">已配送</li>
                                            <li class="amount">{{ $order->price }}</li>

                                            <li>
                                                <div class="invoice">檢視發票</div>
                                            </li>

                                            <li>
                                                <div class="information">退貨資訊</div>
                                            </li>
                                        </ul>

                                        <div class="ttz">
                                            <div class="click-toggle">
                                                <ul class="top order-detail-click d-flex collapsed" data-toggle="collapse" data-target="#collapse{{ $key }}" aria-expanded=false aria-controls="collapse{{ $key }}">
                                                    <li class="plus">+</li>
                                                    <li class="minus">-</li>
                                                    <li class="order-detail font-weight-bold">訂單明細</li>
                                                </ul>

                                                <div class="square collapse" id="collapse{{ $key }}">
                                                    <ul class="mid d-flex">
                                                        <li>寄送方式</li>
                                                        <li>處理進度</li>
                                                        <li>應付金額</li>
                                                        <li>發票</li>
                                                        <li>退貨服務</li>
                                                    </ul>

                                                    <ul class="bot d-flex">
                                                        <li>全家店配</li>
                                                        <li>已配送</li>
                                                        <li>{{ $order->price }}</li>
                                                        <li>
                                                            <div class="invoice1">檢視發票</div>
                                                        </li>
                                                        <li>
                                                            <div class="information1">退貨資訊</div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="data-block7 d-flex justify-content-center mb-3">
                        <button class="fas fa-caret-left"></button>

                        <span class="px-2 icon-number">1</span>

                        <button class="fas fa-caret-right"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src={{ asset('js/tw-city-selector.js') }}></script>
    <script src={{ asset('js/address.js') }}></script>
    <script src={{ asset('js/login.js') }}></script>
@endsection
