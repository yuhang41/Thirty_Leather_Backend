@extends('layouts.FontTemplate')
@section('title','鞋文章')

@section('css')
<link rel="stylesheet" href={{ asset('css/index-shoes.css') }}>
@endsection

@section('content')
<div class="main-container">
    <div class="content-container">
        <div class="shoes-article">
            <div class="article-container">
                <div class="article-title">
                    <p>三十革選鞋指南 :&nbsp;</p>
                    <p>給第一次選購三十革的新手</p>
                </div>
                <div class="article-content">
                    <div class="paragraph-first">
                        <p>
                            在對的場合穿對的鞋，與自己的服裝做最恰到好處的搭配，不論是在職場中或是社交場合都是重要的，在職場裡穿的得體，能夠增加客戶的信任感;社交場合穿對除了增加自信，更可能讓你成為矚目焦點。
                        </p>
                    </div>
                    <div class="paragraph-second">
                        <p>
                            第一次挑選皮鞋嗎?你要穿著這皮鞋去哪裡呢?別擔心，找到你的主要目的，三十革就能幫你找到最適合你的那雙鞋。
                        </p>
                    </div>
                </div>
            </div>
            <div class="decoration-line">
                <svg id="decoration-line" data-name="圖層 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 903.2 468.66">
                    <path class="curve" d="M0,4.42S517.76-39.85,618.76,169.15,903,468.21,903,468.21" />
                </svg>
            </div>
        </div>
        <div class="shoes-img-display">
            <div class="shoes-article-swiper">
                <div class="inner-content">
                    <div class="development-process-content">
                        <div class="swiper-container mySwiper3">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="development-process-title">
                                        <p>文章</p>
                                        <h2>鞋底層皮的細節質感</h2>
                                    </div>
                                    <div class="development-process-list">
                                        <p>#為什麼有些鞋看起來很有手工感</p>
                                        <p>#認識鞋跟</p>
                                        <p>#頭層皮跟二層皮到底啥是層皮?</p>
                                    </div>
                                    <div class="development-process-text">
                                        <button>深入閱讀</button>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="development-process-title">
                                        <p>文章</p>
                                        <h2>怎樣的楦頭線條才稱作流暢</h2>
                                    </div>
                                    <div class="development-process-list">
                                        <p>#鞋楦是一雙鞋的靈魂一點也不為過</p>
                                        <p>#鞋跟高度的影響是整個鞋楦都要重新開模</p>
                                        <p>#以三十革孟克鞋比較各種錯誤鞋楦</p>
                                    </div>
                                    <div class="development-process-text">
                                        <button>深入閱讀</button>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="development-process-title">
                                        <p>文章</p>
                                        <h2>腳跟類型影響掉跟情況</h2>
                                    </div>
                                    <div class="development-process-list">
                                        <p>#找到適合自己的鞋款</p>
                                        <p>#每個人腳跟弧度不同</p>
                                        <p>#深口與淺口鞋</p>
                                    </div>
                                    <div class="development-process-text">
                                        <button>深入閱讀</button>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="development-process-title">
                                        <p>文章</p>
                                        <h2>後跟內裏的皮料有時是毛面</h2>
                                    </div>
                                    <div class="development-process-list">
                                        <p>#因為台灣腳型很多沒有後腳跟</p>
                                        <p>#目的是增加腳後跟止滑度</p>
                                        <p>#避免後跟太滑而導致掉腳的狀況</p>
                                    </div>
                                    <div class="development-process-text">
                                        <button>深入閱讀</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="shoes-sketch">
                            <img src={{ asset('img/shoes-sketch.svg') }} alt="">
                        </div>
                    </div>
                    <div class="development-process-swiper">
                        <div class="swiper-container mySwiper4">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src={{ asset('img/index-shoes-img.jpg') }}>
                                </div>
                                <div class="swiper-slide">
                                    <img src={{ asset('img/index-shoes-img2.jpg') }}>
                                </div>
                                <div class="swiper-slide">
                                    <img src={{ asset('img/index-shoes-img3.jpg') }}>
                                </div>
                                <div class="swiper-slide">
                                    <img src={{ asset('img/index-shoes-img4.jpg') }}>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-step">
                            <div class="swiper-step-button">
                                <div class="pagination-next"></div>
                                <div class="button-next"><i class="fas fa-chevron-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src={{ asset('js/index-shoes.js') }}></script>
@endsection
