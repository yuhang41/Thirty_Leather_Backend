@extends('layouts.FontTemplate')
@section('title','鞋文章')

@section('css')
<link rel="stylesheet" href={{ asset('css/index-shoes.css') }}>
@endsection

@section('content')
<div class="main-container">
    <div class="shoes-sketch">
        <img src="./img/shoes-sketch.svg" alt="">
    </div>
    <div class="main-container">
        <div class="shoes-article">
            <div class="article-container">
                <div class="article-title">
                    <p>三十革選鞋指南 : 給第一次選購三十革的新手</p>
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
                <img src="./img/index-shoes-line.svg" alt="">
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
                                    <h2>鞋底層皮的細節質感2</h2>
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
                                    <h2>鞋底層皮的細節質感3</h2>
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
                                    <h2>鞋底層皮的細節質感4</h2>
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
                        </div>
                    </div>
                </div>
                <div class="development-process-swiper">
                    <div class="swiper-container mySwiper4">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">Slide 1</div>
                            <div class="swiper-slide">Slide 2</div>
                            <div class="swiper-slide">Slide 3</div>
                            <div class="swiper-slide">Slide 4</div>
                        </div>
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
@endsection

@section('js')
<script src={{ asset('js/index-shoes.js') }}></script>
@endsection
