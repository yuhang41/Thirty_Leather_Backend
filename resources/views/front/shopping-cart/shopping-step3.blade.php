@extends('layouts.FontTemplate')
@section('title','訂單完成')

@section('css')
    <link rel="stylesheet" href={{ asset('css/shopping-step3.css') }}>
@endsection

@section('content')
<div class="main-container">
    <div class="container my-container">
        <div class="steps">
            <div class="step">
                <div class="step-content">
                    <div class="text">
                        <p>01</p>
                        <div class="text-content">
                            <p>確認清單 & 選擇付款方式</p>
                            <p>Cart & Check out</p>
                        </div>
                    </div>
                </div>
                <div class="step-right-line"></div>
            </div>
            <div class="step">
                <div class="step-left-line"></div>
                <div class="step-content">
                    <div class="text">
                        <p>02</p>
                        <div class="text-content">
                            <p>填寫訂購資料</p>
                            <p>Shipping & Billing info</p>
                        </div>
                    </div>
                </div>
                <div class="step-right-line"></div>
            </div>
            <div class="step">
                <div class="step-left-line"></div>
                <div class="step-content">
                    <div class="text">
                        <p>03</p>
                        <div class="text-content">
                            <p>確認清單 & 選擇付款方式</p>
                            <p>Order cmopleted</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shopping-container">
            <div class="web-title">
                <p>完成訂單</p>
            </div>
            <div class="shopping-order">
                <div class="order-container">
                    <div class="order-total" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="true" aria-controls="multiCollapseExample2">
                        <p>合計:${{ $order->price }}</p>
                        購物車({{ count($order->detail) }}件)
                    </div>
                    <div class="order-commodity">
                        <div class="order-commodity-content collapse show" id="multiCollapseExample2">
                            @foreach ($order->detail as $item)
                                @php
                                    // $original_price = round($item->price / $item->attributes->discount);
                                    $subtotal = $item->quantity * $item->price;
                                    $detail_color = json_decode($item->color);
                                    $detail_size = json_decode($item->size);
                                    // dd($detail_color);
                                @endphp
                                <div class="commodity">
                                    <div class="photo">
                                        <img src="{{ asset($item->product->photo) }}">
                                    </div>
                                    <div class="commodity-content">
                                        <div class="commodity-title">
                                            <p>{{ $item->product->product_nickname }}</p>
                                            <p>{{ $item->product->product_name }}</p>
                                        </div>
                                        <div class="commodity-size">
                                            <p>
                                                @foreach ($detail_color as $cart_color)
                                                    @foreach ($colors as $key=>$color)
                                                        @if ($color == $cart_color)
                                                            {{ $key }},
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </p>
                                            <p>
                                                @foreach ($detail_size as $cart_size)
                                                    {{-- @foreach ($sizes as $size)
                                                        @if ($size == $cart_size)
                                                            {{ $size }},
                                                        @endif
                                                    @endforeach --}}
                                                    {{ $cart_size }}
                                                @endforeach
                                            </p>
                                        </div>
                                    </div>
                                    <div class="commodity-subtotal">
                                        <div class="quantity-subtotal">
                                            <p>數量 {{ $item->quantity }}</p>
                                            <p>小計 ${{ $order->price }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="order-commodity-shipping">
                                <div class="order-commodity-shipping-price">
                                    <p>運費</p>
                                    <h4>${{ $order->shipping_fee }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="order-complete">
                        <div class="photo-svg">
                            <img src="https://placeholder.pics/svg/100x100">
                        </div>
                        <div class="complete-message">
                            <h3>謝謝您!您的訂單已經成立</h3>
                            <p>訂單號碼{{ $order->order_no }}</p>
                            <p>訂單確認信件已經發送到您的電子信箱:</p>
                            <p>{{ $order->email }}</p>
                        </div>
                    </div>
                    <div class="information">
                        <div class="order-customer-information">
                            <div class="information-both">
                                <h4>訂單資訊</h4>
                                <div class="information-content">
                                    <p>訂單日期</p>
                                    <p>{{ $date }}</p>
                                </div>
                                <div class="information-content">
                                    <p>訂單狀態</p>
                                    <p>訂單處理中</p>
                                </div>
                            </div>
                            <div class="information-both">
                                <h4>顧客資訊</h4>
                                <div class="information-content">
                                    <p>名稱</p>
                                    <p>{{ $order->name }}</p>
                                </div>
                                <div class="information-content">
                                    <p>電話</p>
                                    <p>{{ $order->phone }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="shipping-information">
                            <h4>送貨資訊</h4>
                            <div class="shipping-information-content">
                                <ul>
                                    <li>
                                        <div class="shipping-information-name">
                                            <h5>收件人中文全名</h5>
                                            <p>需與身分證姓名相同</p>
                                        </div>
                                        <p>{{ $receive_name }}</p>
                                    </li>
                                    <li>
                                        <h5>送貨方式</h5>
                                        <p>7-11取貨付款</p>
                                        <div class="order-track">7-11物流追蹤</div>
                                    </li>
                                    <li>
                                        <h5>送貨狀態</h5>
                                        <p>備貨中</p>
                                    </li>
                                </ul>
                                <ul>
                                    <li class="store-code-address">
                                        <div class="store-information">
                                            <h5>7-11店號</h5>
                                            <p>1313175</p>
                                        </div>
                                        <div class="store-information">
                                            <h5>7-11門市名稱</h5>
                                            <p>台中門市</p>
                                        </div>
                                    </li>
                                    <li class="store-code-address">
                                        <div class="code-address">
                                            <h5>收件人電話號碼</h5>
                                            <p>{{ $receive_phone }}</p>
                                        </div>
                                        <div class="code-address">
                                            <h5>配送編碼</h5>
                                            <p>{{ $order->order_no }}</p>
                                        </div>
                                        <div class="code-address">
                                            <h5>門市地址</h5>
                                            <p>台中縣台中市XX區XX里XX街X段XX號</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="payment-information">
                            <h4>付款資訊</h4>
                            <ul class="payment-information-content">
                                <li>
                                    <div class="payment-invoice">
                                        <h5>付款方式</h5>
                                        <p>7-11取貨付款</p>
                                    </div>
                                    <div class="payment-invoice">
                                        <h5>付款狀態</h5>
                                        <p>未付款</p>
                                    </div>
                                    <div class="payment-invoice">
                                        <h5>發票狀態</h5>
                                        <p>處理中</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="payment-invoice">
                                        <h5>發票申請類型</h5>
                                        <p>雲端發票</p>
                                    </div>
                                    <div class="payment-invoice">
                                        <h5>發票聯式</h5>
                                        <p>二聯式發票</p>
                                    </div>
                                    <div class="payment-invoice">
                                        <h5>發票載具類型</h5>
                                        <p>會員載具({{ $order->email }})</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="message-and-button">
                <div class="customer-service-message">
                    <h4>賣家和顧客訂單通訊</h4>
                    <div class="message">
                        <div class="customer-message"></div>
                    </div>
                    <textarea name="message" class="input-text" cols="30" rows="1" placeholder="有什麼想告訴賣家的嗎?"></textarea>
                    <div class="input-photo-button">
                        <input type="button" class="photo" value="加入圖片">
                        <input type="button" value="傳送">
                    </div>
                </div>
                <div class="go-home-button">
                    <button class="home-button">回首頁<i class="fas fa-long-arrow-alt-right"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src={{ asset('js/shopping-step3.js') }}></script>
@endsection
