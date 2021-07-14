@extends('layouts.FontTemplate')
@section('title','確認清單')

@section('css')
    <link rel="stylesheet" href={{ asset('css/shopping-step1.css') }}>
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
              <p>購物車</p>
            </div>
            <div class="shopping-order">
                <div class="order-title">
                    <ul>
                        <li class="title">商品圖</li>
                        <li class="title">商品資訊</li>
                        <li class="title">價格</li>
                        <li class="title">數量</li>
                        <li class="title">小計</li>
                        <li class="title">刪除</li>
                        <li class="title">放入追蹤清單</li>
                    </ul>
                </div>
                @foreach ($list as $item)
                @php
                    $original_price = round($item->price / $item->attributes->discount);
                @endphp
                    <div class="shopping-cart">
                        <ul>
                            <li class="order-cart img">
                                <img src='{{ asset($item->attributes->photo) }}'>
                            </li>
                            <li class="order-cart content">
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
                            <li class="order-cart price">
                                <div class="discount">
                                    <p>$<span class="discount-price" data-discount={{ $item->price }}>{{ $item->price }}</span></p>
                                    <p>$<span class="original-price" data-original={{ $original_price }}>{{ $original_price }}</span></p>
                                </div>
                            </li>
                            <li class="order-cart count">
                                <div class="less">-</div>
                                <input type="number" min="1" max="1000" step="1" name="product_quantity" data-id={{ $item->id }} value="{{ $item->quantity }}">
                                <div class="plus">+</div>
                            </li>
                            <li class="order-cart subtotal"><p>$<span class="subtotal-price" data-subtotal={{ $item->price }}>{{ $item->price }}</span></p></li>
                            <li class="order-cart delete-cart">
                                <form action="" method="" class="delete">
                                    <div class="delete-button"><i class="fas fa-times"></i></div>
                                </form>
                            </li>
                            <li class="order-cart favorite">
                                <i class="fas fa-star"></i>
                            </li>
                        </ul>
                    </div>
                @endforeach
                {{-- <div class="shopping-cart">
                    <ul>
                        <li class="order-cart img">
                            <img src="https://placeholder.pics/svg/100x100">
                        </li>
                        <li class="order-cart content">
                            <div class="cart-content">
                                <div class="cart-title">
                                    <p>{牽手一起長大}</p>
                                    <p>內外全真皮低跟小木根魚骨手工編織羅馬涼鞋五色</p>
                                </div>
                                <div class="cart-text">
                                    <p>干邑白蘭地</p>
                                    22cm
                                </div>
                            </div>
                        </li>
                        <li class="order-cart price">
                            <div class="discount">
                                <p>$2480</p>
                                <p>$4280</p>
                            </div>
                        </li>
                        <li class="order-cart count">
                            <div class="less">-</div>
                            <input type="number" min="1" max="1000" step="1" name="">
                            <div class="plus">+</div>
                        </li>
                        <li class="order-cart subtotal"><p>$2480</p></li>
                        <li class="order-cart delete-cart">
                            <form action="" method="" class="delete">
                                <div class="delete-button"><i class="fas fa-times"></i></div>
                            </form>
                        </li>
                        <li class="order-cart favorite">
                            <i class="fas fa-star"></i>
                        </li>
                    </ul>
                </div>
                <div class="shopping-cart">
                    <ul>
                        <li class="order-cart img">
                            <img src="https://placeholder.pics/svg/100x100">
                        </li>
                        <li class="order-cart content">
                            <div class="cart-content">
                                <div class="cart-title">
                                    <p>{牽手一起長大}</p>
                                    <p>內外全真皮低跟小木根魚骨手工編織羅馬涼鞋五色</p>
                                </div>
                                <div class="cart-text">
                                    <p>干邑白蘭地</p>
                                    22cm
                                </div>
                            </div>
                        </li>
                        <li class="order-cart price">
                            <div class="discount">
                                <p>$2480</p>
                                <p>$4280</p>
                            </div>
                        </li>
                        <li class="order-cart count">
                            <div class="less">-</div>
                            <input type="number" min="1" max="1000" step="1" name="">
                            <div class="plus">+</div>
                        </li>
                        <li class="order-cart subtotal"><p>$2480</p></li>
                        <li class="order-cart delete-cart">
                            <form action="" method="" class="delete">
                                <div class="delete-button"><i class="fas fa-times"></i></div>
                            </form>
                        </li>
                        <li class="order-cart favorite">
                            <i class="fas fa-star"></i>
                        </li>
                    </ul>
                </div> --}}
            </div>
            <div class="payment-shipping">
                <h3>付款方式 & 配送方式</h3>
                <div class="shipping">
                    <div class="shipping-select county">
                        <h5>配送區域</h5>
                        <select name="">
                            <option value="">台灣及離島</option>
                        </select>
                    </div>
                    <div class="shipping-select payment">
                        <h5>付款方式</h5>
                        <select name="">
                            <option value="">信用卡線上刷卡</option>
                        </select>
                    </div>
                    <div class="shipping-select transport">
                        <h5>送貨方式</h5>
                        <select name="">
                            <option value="">7-11超商取貨付款</option>
                        </select>
                    </div>
                    <div class="business">
                        尚未選擇門市
                    </div>
                    <div class="choose">
                        <button class="choose-button">選擇門市</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="other-amount">
            <div class="other-discount">
                <div class="other-tital">
                    <p>+</p>以優惠價加購商品
                </div>
                <div class="other-card">
                    @for ($j = 0; $j < 4; $j++)
                        <div class="commodity">
                            <div class="photo">
                                <img src='{{ asset($product_type->products[$j]->photo) }}'>
                            </div>
                            <div class="commodity-content">
                                <div class="title">
                                    {{ $product_type->products[$j]->product_name }}
                                </div>
                                <div class="content-buttone">
                                    <p>{{ $product_type->products[$j]->price }}</p>
                                    <button class="push-cart">加入購物車</button>
                                </div>
                            </div>
                        </div>
                    @endfor

                    {{-- <div class="commodity">
                        <div class="photo">
                            <img src="https://placeholder.pics/svg/100x100">
                        </div>
                        <div class="commodity-content">
                            <div class="title">
                                {皮雅客PALC}西班亞進口皮革皮包皮衣保養油
                            </div>
                            <div class="content-buttone">
                                <p>$180</p>
                                <button class="push-cart">加入購物車</button>
                            </div>
                        </div>
                    </div>
                    <div class="commodity">
                        <div class="photo">
                            <img src="https://placeholder.pics/svg/100x100">
                        </div>
                        <div class="commodity-content">
                            <div class="title">
                                {皮雅客PALC}西班亞進口皮革皮包皮衣保養油
                            </div>
                            <div class="content-buttone">
                                <p>$180</p>
                                <button class="push-cart">加入購物車</button>
                            </div>
                        </div>
                    </div>
                    <div class="commodity">
                        <div class="photo">
                            <img src="https://placeholder.pics/svg/100x100">
                        </div>
                        <div class="commodity-content">
                            <div class="title">
                                {皮雅客PALC}西班亞進口皮革皮包皮衣保養油
                            </div>
                            <div class="content-buttone">
                                <p>$180</p>
                                <button class="push-cart">加入購物車</button>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="amount">
                <div class="free-ship">
                    <p>免運費</p>
                    只差$<span class="difference">xxx</span>可享滿$1000免運
                </div>
                <div class="total">
                    <div class="price-total">
                        <p>小計</p>
                        <p class="subtotal-total">$9920</p>
                    </div>
                    <div class="price-total">
                        <p>運費</p>
                        <p class="shipping-total">$0</p>
                    </div>
                    <div class="order-total-button">
                        <div class="order-total">
                            <p>總金額</p>
                            <p class="order-total-price">$9920</p>
                        </div>
                        <a href="{{ asset('/front/shoppingstep2') }}" class="next-button">前往結帳<i class="fas fa-long-arrow-alt-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src={{ asset('js/shopping-step1.js') }}></script>
@endsection
