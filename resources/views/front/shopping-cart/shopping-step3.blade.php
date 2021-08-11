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
                                    $subtotal = $item->quantity * $item->price;
                                    // $detail_size = json_decode($item->size);
                                @endphp
                                <div class="commodity">
                                    <div class="photo-content">
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
                                                    {{ $item->color }}
                                                </p>
                                                <p>
                                                    cm:{{ $item->size }}
                                                </p>
                                            </div>
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
                            <svg id="order-complete" data-name="圖層 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 68.4 77.73">
                                <g>
                                    <path class="finish" d="M53.27,55.31A25.52,25.52,0,1,1,42.72,28.06l2.06-2.22a28.5,28.5,0,1,0,11.68,29Z"/>
                                    <g>
                                      <path class="finish" d="M42.68,57.72c-.78,0-1.56,0-2.35,0a.66.66,0,0,0-.76.49,3.64,3.64,0,0,1-2.85,2.34c-3.3.82-6.59,1.72-9.88,2.59-.9.24-1.37,0-1.61-.89C24.13,58.17,23.05,54.11,22,50L18.6,37.39c-.36-1.34-.17-1.66,1.16-2,3.38-.9,6.75-1.82,10.13-2.7a3.1,3.1,0,0,1,3.06.71.64.64,0,0,0,.92.09A37.59,37.59,0,0,0,40.18,29a21.15,21.15,0,0,0,3.51-3.93,9.38,9.38,0,0,0,1.24-8.37,4.31,4.31,0,0,1,1.82-4.86,4.4,4.4,0,0,1,5.14.19,6.09,6.09,0,0,1,2,3.53,30,30,0,0,1,1.19,7.58A15.09,15.09,0,0,1,55,25.47c-.06.52.18.5.52.41l4-1.06c1.2-.31,2.4-.66,3.62-.93A4.28,4.28,0,0,1,67.8,26a4.34,4.34,0,0,1-.42,5c-.24.29-.61.54-.7.87s.39.55.58.84c1.13,1.76.84,4.5-.74,5.68-.49.35-.17.67,0,1a4.27,4.27,0,0,1,1,2.79A4.43,4.43,0,0,1,66,45.42c-.28.27-.3.35-.05.66A4.43,4.43,0,0,1,64.69,53a18.2,18.2,0,0,1-3.58,1L50.58,56.82A30.91,30.91,0,0,1,42.68,57.72Zm-.23-2.37a27,27,0,0,0,6.48-.56c4.77-1,9.44-2.46,14.17-3.65a2,2,0,0,0,1.58-1.58A2.13,2.13,0,0,0,61.88,47c-1,.25-2.06.55-3.11.78A1,1,0,0,1,57.5,47a1,1,0,0,1,.69-1.34c.44-.17.89-.28,1.34-.41,1.42-.38,2.87-.68,4.25-1.16a2.11,2.11,0,0,0-1.33-4c-1,.24-2,.53-3,.77A1.07,1.07,0,0,1,57.94,40a1.13,1.13,0,0,1,.9-1.34c1.63-.46,3.26-.9,4.9-1.34a2.55,2.55,0,0,0,1.51-.92,2.11,2.11,0,0,0-.1-2.56,2.15,2.15,0,0,0-2.35-.7c-1,.27-2.1.57-3.17.81a1,1,0,0,1-1.25-.83,1,1,0,0,1,.62-1.3,7.16,7.16,0,0,1,.82-.27c1.53-.41,3.06-.8,4.59-1.22A2.26,2.26,0,0,0,66,28.08a2.16,2.16,0,0,0-2.94-1.84c-4.43,1.2-8.87,2.37-13.3,3.54A1.18,1.18,0,0,1,48.17,29c-.17-.64.25-1.21,1.07-1.43L52,26.84c.35-.09.59-.23.61-.66,0-.75.18-1.51.19-2.26a28.09,28.09,0,0,0-1.47-8.86,2,2,0,0,0-.53-.92,2.11,2.11,0,0,0-2.63-.38,2.08,2.08,0,0,0-1,2.48,12,12,0,0,1,.57,4.42A14.46,14.46,0,0,1,43.59,29a34.37,34.37,0,0,1-8.74,6.64.79.79,0,0,0-.46,1c.86,3.11,1.68,6.24,2.51,9.36.78,2.92,1.57,5.85,2.33,8.78a.66.66,0,0,0,.77.59C40.83,55.38,41.65,55.4,42.45,55.35ZM37.4,56.94c0-.17-.08-.39-.13-.61L34.56,46.21c-.88-3.33-1.75-6.67-2.66-10-.36-1.33-.68-1.48-2-1.13l-7.94,2.1c-.95.25-.95.25-.7,1.21l4.3,16.12Q26.27,57.26,27,60c.12.49.28.73.86.52.75-.27,1.54-.42,2.32-.63l6.19-1.64A1.28,1.28,0,0,0,37.4,56.94Z"/>
                                      <path class="finish" d="M45.46,0a1.11,1.11,0,0,1,1,.81c.42,1.66.89,3.31,1.32,5A1,1,0,0,1,47,7.1a1.05,1.05,0,0,1-1.4-.69C45.11,4.7,44.65,3,44.23,1.26,44.07.59,44.66,0,45.46,0Z"/>
                                      <path class="finish" d="M42.49,10a1.12,1.12,0,0,1-1.62,1.18c-1.35-.7-2.66-1.47-3.95-2.26a1.14,1.14,0,0,1-.39-1.59,1.16,1.16,0,0,1,1.53-.41c1.31.72,2.59,1.49,3.87,2.26A1.2,1.2,0,0,1,42.49,10Z"/>
                                      <path class="finish" d="M53.39,8.05a1.09,1.09,0,0,1-1.1-1.58,43.08,43.08,0,0,1,2.37-4,1,1,0,0,1,1.4-.32,1.08,1.08,0,0,1,.54,1.47c-.73,1.35-1.51,2.68-2.3,4A1,1,0,0,1,53.39,8.05Z"/>
                                      <path class="finish" d="M57.51,13.4a1.11,1.11,0,0,1-1.22-1A1.08,1.08,0,0,1,57,11.17c1.47-.44,3-.82,4.45-1.19a1.06,1.06,0,0,1,1.29.88,1.14,1.14,0,0,1-.91,1.41c-1.08.3-2.16.57-3.24.83A4.7,4.7,0,0,1,57.51,13.4Z"/>
                                      <path class="finish" d="M36.43,19c-.84,0-1.25-.33-1.36-.93a1.14,1.14,0,0,1,.79-1.31c1.46-.4,2.92-.8,4.39-1.16a1,1,0,0,1,1.25.74A1,1,0,0,1,41,17.74C39.44,18.23,37.82,18.65,36.43,19Z"/>
                                      <path class="finish" d="M30.86,43.82a1.08,1.08,0,0,1,1.17.9c.74,2.79,1.48,5.58,2.2,8.38a1.09,1.09,0,0,1-.82,1.49,1.12,1.12,0,0,1-1.4-.9c-.76-2.83-1.51-5.67-2.25-8.5A1.16,1.16,0,0,1,30.86,43.82Z"/>
                                      <path class="finish" d="M29.69,41.88a1.08,1.08,0,0,1-1.07-1.13,1.24,1.24,0,0,1,1.15-1.18,1.3,1.3,0,0,1,1.16,1.17A1.22,1.22,0,0,1,29.69,41.88Z"/>
                                    </g>
                                  </g>
                            </svg>
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
                                        <div class="order-track">
                                            <p>7-11取貨付款</p>
                                            <p>7-11物流追蹤</p>
                                        </div>
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
                    <a href={{ asset('/front') }} class="home-button">回首頁<i class="fas fa-long-arrow-alt-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src={{ asset('js/shopping-step3.js') }}></script>
@endsection
