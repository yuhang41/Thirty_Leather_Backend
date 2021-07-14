@extends('layouts.FontTemplate')
@section('title','填寫訂購資料')

@section('css')
    <link rel="stylesheet" href={{ asset('css/shopping-step2.css') }}>
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
        <form action="{{ asset('/front/shoppingstep2/check') }}" method="POST" id="shopping-step2-order" class="shopping-container">
            @csrf
            <div class="web-title">
                <p>填寫資料</p>
            </div>
            <div class="shopping-order">
                <div class="shopping-information">
                    <div class="shopping-title order-total" data-toggle="collapse"
                        data-target="#multiCollapseExample2" aria-expanded="true"
                        aria-controls="multiCollapseExample2">
                        <div class="total-price">合計:${{ $Calc_All['cost'] + $Calc_All['shipping'] }}</div>
                        購物車({{ count($list) }}件)
                    </div>
                    <div class="commodity-content collapse show" id="multiCollapseExample2">
                        <div class="commidity-information">
                            @foreach ($list as $item)
                            @php
                                $original_price = round($item->price / $item->attributes->discount);
                                $subtotal = $item->quantity * $item->price;
                            @endphp
                                <div class="shopping-cart">
                                    <ul>
                                        <li class="order-cart img-content">
                                            <img src='{{ asset($item->attributes->photo) }}' alt="">
                                            <div class="cart-content">
                                                <div class="cart-title">
                                                    <p>{{ $item->attributes->nickname }}</p>
                                                    <p>{{ $item->name }}</p>
                                                </div>
                                                <div class="cart-text">
                                                    <p>
                                                        @foreach ($item->attributes->color as $cart_color)
                                                            @foreach ($colors as $key=>$color)
                                                                @if ($color == $cart_color)
                                                                    {{ $key }},
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    </p>
                                                    @foreach ($item->attributes->size as $cart_size)
                                                        @foreach ($sizes as $size)
                                                            @if ($size == $cart_size)
                                                                {{ $size }},
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </div>
                                            </div>
                                        </li>
                                        <li class="order-cart amount-price">
                                            <div class="amount">數量 {{ $item->quantity }}</div>
                                            <div class="price">小計 {{ $subtotal }}</div>
                                        </li>
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                        <div class="shipping">
                            <div class="shipping-content">
                                <div class="shipping-text">運費</div>
                                <div class="shipping-price">${{ $Calc_All['shipping'] }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="receipt">
                    <div class="receipt-title">索取發票</div>
                    <div class="receipt-method">
                        <div class="receipt-type">
                            <div class="type-title">發票類型</div>
                            <select name="">
                                <option value="">雲端發票</option>
                            </select>
                        </div>
                        <div class="vehicle-type">
                            <div class="type-title">載具類型</div>
                            <select name="">
                                <option value="">會員載具(發票資訊會寄到您的電話)</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="order-remarks">
                    <div class="remarks-title">訂單備註</div>
                    <div class="remarks-textarea">
                        <textarea name="remark" id="" cols="30" rows="10" placeholder="有什麼想告訴賣家的嗎?"></textarea>
                    </div>
                    <div class="checkbox">
                        <input type="checkbox" name="agreement" id="agreement" class="checkmark" value="agreement">
                        <label for="agreement">我同意&nbsp;網站服務條款及隱私政策</label>
                    </div>
                </div>
            </div>
            <div class="customer-info">
                <div class="orderer-info">
                    <div class="orderer-container">
                        <div class="orderer-title">訂購人資訊</div>
                        <div class="orderer-name">
                            <label for="orderer-name">姓名</label><br>
                            <input type="text" id="orderer-name" name="name" placeholder="林土木">
                        </div>
                        <div class="orderer-phone">
                            <label for="orderer-phone">行動電話</label><br>
                            <input type="text" id="orderer-phone" name="phone" placeholder="0900 - 123456">
                        </div>
                        <div class="orderer-email">
                            <label for="orderer-email">信箱</label><br>
                            <input type="text" id="orderer-email" name="email" placeholder="123@gmail.com">
                        </div>
                    </div>
                </div>
                <div class="addressee">
                    <div class="addressee-title">收件人資訊</div>
                    <div class="shipping-type">
                        <p>已選擇的送貨方式 : 7-11取貨付款</p>
                    </div>
                    <div class="addressee-info">
                        <div class="addressee-check">
                            <input type="checkbox" id="addressee-check" class="checkmark"
                                onclick="copyInformation()">
                            <label for="addressee-check">收件人資料與訂購人資料相同</label>
                        </div>
                        <div class="addressee-name">
                            <label for="addressee-name">收件人姓名</label><br>
                            <input type="text" id="addressee-name" placeholder="林土木" name="receive_name">
                            <p>請填入收件人真實姓名，以確保順利收件</p>
                        </div>
                        <div class="addressee-phone">
                            <label for="addressee-phone">收件人電話號碼</label><br>
                            <input type="text" id="addressee-phone" placeholder="0900 - 123456" name="receive_phone">
                        </div>
                    </div>
                    <div class="shipping-info">
                        <div class="store-number">
                            <span>已選門市店號</span>
                            <span>131375</span>
                        </div>
                        <div class="store-name">
                            <span>已選門市名稱</span>
                            <span>彰永門市</span>
                        </div>
                        <div class="store-address">
                            <span>門市地址</span>
                            <span>彰化縣彰化市永安街338號1樓</span>
                        </div>
                    </div>
                    <button>更改</button>
                </div>
                <div class="payment">
                    <div class="payment-title">付款資料</div>
                    <div class="payment-type">
                        <p>已選擇的付款方式 : 7-11取貨付款</p>
                    </div>
                </div>
            </div>
        </form>
        <div class="other-amount">
            <button herf="#" class="back-button"><<返回購物車 </button>
            <div class="amount">
                <div class="free-ship">
                    <p>已享用之優惠</p>
                    優惠促銷 : 滿千免運
                </div>
                <div class="total">
                    <div class="price-total">
                        <p>小計</p>
                        <p class="subtotal-total">${{ $Calc_All['cost'] }}</p>
                    </div>
                    <div class="price-total">
                        <p>商品總金額</p>
                        <p class="shipping-total">${{ $Calc_All['cost'] }}</p>
                    </div>
                    <div class="order-total-button">
                        <div class="order-total">
                            <p>總金額</p>
                            <p class="order-total-price">${{ $Calc_All['cost'] + $Calc_All['shipping'] }}</p>
                        </div>
                        <button class="next-button">提交訂單<i
                                class="fas fa-long-arrow-alt-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src={{ asset('js/shopping-step2.js') }}></script>
@endsection
