@extends('layouts.FontTemplate')

@section('title','三十革')
@section('css')
    <link rel="stylesheet" href={{ asset('css/index.css') }}>
@endsection

@section('content')
<div class="main-container">
    <!-- 輪播圖 -->
    <div class="swiper1">
        <div class="swiper-container myswiper1">
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="background-image: url({{ asset('img/banner.jpg') }});"></div>
                <div class="swiper-slide" style="background-color: rgb(128,128,128);"></div>
                <div class="swiper-slide" style="background-color: rgb(169,169,169);"></div>
                <div class="swiper-slide" style="background-color: rgb(169,169,169);"></div>
                <div class="swiper-slide" style="background-color: rgb(169,169,169);"></div>
            </div>
        </div>
        <div class="swiper-pagination1"></div>
    </div>
    <!-- 聯絡客服 -->
    <div class="chatbot">
        <button class="more-button" aria-label="Menu Button">
            <img src={{ asset('img/chat-icon.png') }} alt="">
        </button>
        <ul class="more-button-list">
            <li class="more-button-list-item">
                <img src={{ asset('img/emoji.png') }} alt="">
                <div class="option">
                    <div class="more d-flex">
                        <div class="dot"></div>
                    </div>
                    <div class="close">
                        <div class="line"></div>
                    </div>
                </div>
            </li>
            <li class="more-button-list-item">
                <p>與三十革手工真皮鞋客服聯絡</p>
                <p>平均回覆時間 : 一小時內</p>
                <p>線上客服時間 : 每週一至日下午14:00至晚間20:00</p>
            </li>
            <li class="more-button-list-item">
                <div class="facebook-button">
                    <div class="facebook-icon">
                        <i class="fab fa-facebook-f"></i>
                    </div>
                    <p>到Messenger與我們聯繫</p>
                </div>
                <div class="line-button">
                    <div class="line-icon">
                        <span>LINE</span>
                    </div>
                    <p>到LINE與我們聯繫</p>
                </div>
            </li>
        </ul>
    </div>
    <!-- 品牌理念 -->
    <div class="we-story">
        <div class="story-content">
            <img src={{ asset('img/story-img.jpg') }} alt="">
            <!-- <img src="img/scissors.svg" alt=""> -->
            <svg id="scissors" data-name="圖層 1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1000.33 843.84">
                <g class="cls-2">
                    <path class="scissors"
                        d="M266,177.3s-2.06,7.84,5.8,7.94S407,140.7,430,345.43c0,0,11.43,29.63-4.83,72.68,0,0-69.06,20.77-97.48-66.07,0,0,.17-13.76-32.93-39.72S103.89,170.4,94.09,168.31s-44.87-28.07-66.88,3.11-48.06,72.15,2.15,145.5S173.14,454.33,228.15,457s90.68-20.51,98.47-14.52,16.8-12.64,76.08,48.12c1.94,2,42.93,26.08,64.45,34.21s46.89,24.16,81.93,52.11S893.67,850.45,927.18,843c0,0,9.78,4,19.85-15.48,0,0,10-11.67-11.45-27.66S793.78,660.5,793.78,660.5,591.44,489,574,465.15c0,0-74.06-52-87.56-73.81S458.21,292.7,425.71,217.6s51.76-52.44-17.51-175.18c0,0-83.45-87.52-145.35-9.65,0,0-27.86,27.18,6.8,86.59C269.65,119.36,290.91,149.1,266,177.3Z" />
                    <path class="scissors"
                        d="M359.23,28.06S332,4.14,296.29,31.22s-19,107.89,51.47,130.38S433.49,64.36,359.23,28.06Z" />
                    <ellipse class="scissors-mind" cx="536.43" cy="486.31" rx="15.73" ry="17.69"
                        transform="translate(43.57 1016.73) rotate(-89.3)" />
                    <path class="scissors"
                        d="M556.72,515A36.89,36.89,0,0,1,535,521.68c-20.08-.25-36.17-16.29-35.93-35.83s16.72-35.18,36.8-34.93,36.17,16.29,35.93,35.83a34.71,34.71,0,0,1-8.58,22.4l-5.4-4.88-6,5.82Z" />
                    <path class="scissors"
                        d="M81.88,201.58s-27.27-20-47.27,7.28S14.11,277.42,91.8,355s164.14,80.65,193.93,55.46,10.55-58.85-32.45-79S81.88,201.58,81.88,201.58Z" />
                    <path class="scissors" d="M425.17,422s-10.34,41.15-.63,51.1,72,55.93,81.73,67.84" />
                    <path class="scissors"
                        d="M576.05,461.24S953.21,644.76,978.42,672.59c0,0,21.5,10.1,21.41,18s-4.3,29.43-4.3,29.43-4,3.89-5.89-.07-2,3.91-7.84-2.06-2,5.87-15.68-4.12-2,5.87-17.64-4.15-11.79-.15-23.51-6.19l-7.79-6s-11.82,1.82-15.7-2.16l-7.82-4-7.86-.09-11.72-6-5.87-2s-7.86-.1-13.71-4.1-9.78-4.06-9.78-4.06l-11.8-.14-11.69-8-9.83-.12-13.66-8-1.83,4.09" />
                    <path class="scissors"
                        d="M480.59,391.26l-51.81,56.38s-9.87,3.81,13.5,21.79,103.18,81.86,110.9,93.75S899.84,828.9,915.54,831.06" />
                    <path class="scissors" d="M945.19,817.66s-5.8-7.94-13.74-2.14-10,13.64-15.87,11.6" />
                    <path class="scissors"
                        d="M18.41,248s-15-61.12,30.35-70.4S218.17,309.41,265.17,323.75s50.6,41.9,36.48,71.22" />
                    <path class="scissors" d="M156,408.9s99.68,46.44,139.45,9.58,20.67-82.31,20.67-82.31" />
                    <path class="scissors"
                        d="M311.26,412.78s-2.09,9.8,23.39,16,66.33,42.1,74,55.95,25.31,20,25.31,20" />
                    <path class="scissors"
                        d="M276.46,44.74S294.63,5.64,331.91,12s64.57,24.38,77.82,65.83.91,86.5-50.27,91.77S248.44,85.68,276.46,44.74Z" />
                    <path class="scissors"
                        d="M270.94,174.41s-4.08,11.75,19.63,2.21,62.85,4.7,72.56,14.65,33.19,18.1,42.66,47.71,36.5,69.25,31.84,128.17-10.47,53-10.47,53" />
                    <path class="scissors-mind"
                        d="M531,448.89s-27.49-2.3-35.72,27.09,4.79,53.11,38.64,55.51c33.39,2.38,49.67-42.63,38.12-62.43" />
                    <path class="scissors-mind"
                        d="M548,504.15l1.84,9.85s-15.87,11.6-33.41-.41-21.12-41.54,4.63-57l5.77,9.9s-11.93,11.41-12,19.52C514.57,505.7,534.17,509.87,548,504.15Z" />
                    <path class="scissors-mind" d="M538.35,490.27l-3.91-2-8,7.77s9.73,8,17.69.21Z" />
                    <path class="scissors"
                        d="M749.08,618.67s9.68,11.91,23.44,12.08,21.46,14,31.31,12.18,7.81,4,19.58,6.14,9.83.12,13.71,4.1,9.8,2.08,13.71,4.1,13.66,8,21.55,6.16c0,0,3.93.05,9.78,4.05s7.81,4,15.68,4.12,11.67,10,17.59,8.08,19.53,10.07,27.42,8.2,13.64,10,21.52,8.13,19.56,8.11,25.51,4.25c0,0,4-1.92,5.89.07" />
                </g>
                <g>
                    <g class="cls-4">
                        <use transform="translate(-2711.4 65) scale(1.5)" xlink:href="#image" />
                    </g>
                    <g class="cls-5">
                        <use transform="translate(-2775.01 63) scale(1.5)" xlink:href="#image" />
                    </g>
                    <g class="cls-6">
                        <use transform="translate(-2826.62 65) scale(1.5)" xlink:href="#image" />
                    </g>
                </g>
            </svg>
            <div class="story-discript">
                <div class="subtitle" data-aos="fade-up">
                    WE STORY .
                </div>
                <div class="title" data-aos="fade-up">
                    分享自己喜歡的生活質感<br>
                    遇見眼光相似的妳(你)我.
                </div>
                <div class="content" data-aos="fade-up">
                    <div class="preamble">
                        三十革 因鞋而生<br>
                        抱著分享好鞋的初衷<br>
                        柔和老傳統的注入新創意<br>
                        傳承志鞋一甲子師傅的精湛工藝
                    </div>
                    <div class="main-body">
                        融入新世代的創新與設計於鞋子中<br>
                        激盪出新時代x舊工藝的時尚鞋履<br>
                        延續台灣 鞋業王國 的美譽
                    </div>
                    <div class="ending">
                        手作每一雙舒適、經典的鞋履與大家分享
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 製鞋文章 -->
    <div class="shoemaking d-flex">
        <div class="container mx-auto">
            <div class="shoes-card">
                <div class="chose-shoes" data-aos="fade-up" data-aos-duration="400">
                    <img src="https://dummyimage.com/400x400" alt="">
                    <div class="text">
                        <span>購鞋怎麼選</span><br>
                        <span>How to choose</span>
                    </div>
                </div>
                <div class="shoes-introduction" data-aos="fade-up" data-aos-duration="800">
                    <img src="https://dummyimage.com/400x400" alt="">
                    <div class="text">
                        <span>系列鞋款介紹</span><br>
                        <span>Series Introduction</span>
                    </div>
                </div>
                <div class="shoemaking-story" data-aos="fade-up" data-aos-duration="1200">
                    <img src="https://dummyimage.com/400x400" alt="">
                    <div class="text">
                        <span>製作過程</span><br>
                        <span>Making a story</span>
                    </div>
                </div>
            </div>
            <div class="see-more-button">
                <button class="see-more">觀看更多</button>
            </div>
        </div>
        <!-- 縫鞋的svg -->
        <div class="sew-img">
            <!-- <img src="img/sew.svg" alt=""> -->
            <svg id="hand-line" data-name="hand-line" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1239.26 1816.77">
                <g>
                    <path class="background-line" d="M671.11,496.47C496.83,559.58,332.74,664.31,353,833c41.78,347.63,470.85-22.09,487.14,183.69C889.2,1636.49.1,1816.28.1,1816.28"/>
                    <g>
                        <path class="background-hand" d="M1078.18.28s-23.58,34.78-51.66,39.56-50,41.76-83,53.66-108.64,34.33-111.13,85.83S789.6,266.15,786,284.23s10.27,10.28,13.7,6.85,12.07-43.27,17.69-55.19"/>
                        <path class="background-hand" d="M839.5,443.12C864.64,415.28,899,375.51,912,361c2.33-2.6,16.17-24.1,34.81-31.22s76.59-63.38,98.65-87.61,5.38-71.64,5.38-71.64"/>
                        <path class="background-hand" d="M714.2,481.79c7.29,12.62,32.82,24.11,55.3,13.37,0,0,31.92-11.08,56.18-37,4.06-4.34,8.76-9.47,13.82-15.08"/>
                        <path class="background-hand" d="M780.69,294.23s-11.8,27.66-1,34.1c0,0-35.36,41.9-44.4,50.39s-28.1,59.57-25.51,68.74-.28,15.62,2.59,29.73a15.55,15.55,0,0,0,1.81,4.6"/>
                        <path class="background-hand" d="M1015.65,477.6s17.38,28.9,61.49,21.53,42.46-2.72,84.38-22.16,57.27-30.93,77.28-75"/>
                        <path class="background-hand" d="M990.89,76.81s-12.61,19.72-24.66,28.75S949.92,130.62,934.3,144s-58.11,64.07-66.74,69.68-43.16,41.76-50.29,57.37-32.9,52-35.23,54.64"/>
                        <path class="background-hand" d="M810.63,283.29s-5.56,11.49-10.36,10.81l-1.92-.28"/>
                        <path class="background-hand" d="M734.74,430.49s17.54-20,29.59-8.48,24.5,40.69,28.47,40.28-17.82,28.76-22.89,30-22.33,12.45-40.95-1S711,466.23,717.75,453.49A108.82,108.82,0,0,1,734.74,430.49Z"/>
                        <path class="background-hand" d="M919.14,345.38s-27.81,2.86-46.29-11.53-31.62-38.78-31.62-38.78"/>
                        <path class="background-hand" d="M1049.58,240.79s2.74,8.22-14.12,23.41-19,16.84-19,16.84-5.89-6.71-7.81,6.71-36.72,24.09-67.28,59.83-24.94,17-46.87,47.09c0,0-14.65,6.71-22.06,17.39s-10.55,5.34-19.59,20.67c0,0,13.81,53.84,69.28,55.92s88.48-3,171-73.34c0,0,31.66-29.71,44.81-39.57s8.37-31.09,13.71-41.08"/>
                        <path class="background-hand" d="M1015.87,284.88s6.29,31.23,10.39,36.71a9.47,9.47,0,0,1,.41,10.82s-9.31-3.29-10-12.19c0,0-4,.41-4.24-11.37,0,0-2.74-1.37-3.42-10.28,0,0-1.91-7.12.28-8.76"/>
                        <path class="background-hand" d="M1024.34,321.32s-1.09.82-6.71-1"/>
                        <path class="background-hand" d="M1021.06,310.08l-6.71-1"/>
                        <path class="background-hand" d="M1010.25,296.79s4.93,6.58,8.62,8.09"/>
                        <path class="background-hand" d="M699.87,486.05c7-7.22,11.91-12.29,11.91-12.29L711,455l-3.62,2.91s-67.14,72.57-76.87,79c0,0-6.71-1-7.81,6.71s6.16,11.64,9.31,10.14-1.23-5.07,1.78-5.62,13.7-6.84,20.69-14.64c4.8-5.37,30.09-31.55,45.44-47.41"/>
                        <path class="background-hand" d="M621.55,544.4s-2.6,4.52-3.7,5.34-36.85,25-61.1,30.38c0,0-3.29,2.47,5.61,1.78s56.83-20,67.19-27.94C629.55,554,621.41,552.21,621.55,544.4Z"/>
                        <path class="background-hand" d="M557,578.2s-12.32-9.59-37.53,2.45-63.43,33-86.86,60c0,0-2.19,1.64-.69,4.79s1,7,7.4,3,15.21-24.24,61-50,44.52-10.25,57.94-8.33,10.83-7.25,7.81-6.71-3.83-.55-3.83-.55"/>
                        <path class="background-hand" d="M414.81,662.52s18.78-21.78,21.1-17.53-13.43,11.78-30.56,35.74S372.44,767,356,772.48l-3.42-3.43s8.63,1.24,31.67-57.1C400.13,671.73,414.81,662.52,414.81,662.52Z"/>
                        <path class="background-hand" d="M1016.26,323.09s-5.07,8.08,9.17,11.1l-1.09,7.67s8.62,1.24,4.8-13"/>
                        <path class="background-hand" d="M1017.9,332.13s-20.33,128.2,27.46,170.27,70.39,20.85,77,22.77.14-7.81-19.32-1.79-105.19-10.18-78.67-181.52V335Z"/>
                    </g>
                </g>
            </svg>
        </div>
    </div>
    <!-- 影片 -->
    <div class="shoes-video">
        <img src="https://dummyimage.com/1161x658" alt="">
        <!-- <img src="img/Leather knife.svg" alt=""> -->
        <img src="https://dummyimage.com/567x707" alt="">
        <svg id="knife" data-name="knife" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 918.56 829.41">
            <g>
                <path class="knife-line" d="M481.83,547.14,772.72,828.67,917.87,649.48,697.23,458.75s-58-43.32-132.51-6.63L110.59.8S91.06-7.89,18.77,69c0,0-24,21.62-17,50.89l470,428.19S474.43,553.05,481.83,547.14Z"/>
                <line class="knife-line" x1="483.63" y1="543.24" x2="556.68" y2="458.84"/>
                <path class="knife-line" d="M399.67,476.12s76.31-80.21,82.38-92.73"/>
            </g>
        </svg>
    </div>
    <!-- 新品上市 -->
    <div class="new-product">
        <div class="product-title">
            <div class="text">
                <span>新品上市</span><br>
                <span>New product</span>
            </div>
        </div>
        <div class="container">
            <div class="product-item">
                @for ($i = 0; $i < 4; $i++)
                @php
                    $discount = round($products[$i]->price * $products[$i]->discount)
                @endphp
                    <div class="product-card">
                        <img src={{ asset($products[$i]->photo) }} alt="">
                        <div class="content">
                            <div class="text">
                                <p>{{ $products[$i]->product_nickname }}</p>
                                <p>{{ $products[$i]->product_name }}</p>
                            </div>
                            <div class="price">
                                <span>${{ $products[$i]->price }}</span>
                                <span>${{ $discount }}</span>
                            </div>
                        </div>
                        <a href="{{ asset('/front/product/detail') }}/{{ $products[$i]->id }}">了解此商品</a>
                    </div>
                @endfor
            </div>
            <div class="see-more-button">
                <a href="{{ asset('front/product/') }}" class="more-product">更多商品</a>
            </div>
        </div>
        <div class="parallelogram"></div>
    </div>
    <!-- 照片牆 -->
    <div class="photo-wall">
        <div class="photo-title">
            <div class="text">
                <span>#30leather</span>
                <span>Share the quality of life you like X Meet each other with similar good sense.</span>
            </div>
        </div>
        <!-- Swiper -->
        <div class="swiper2">
            <div class="swiper-container mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">Slide 1</div>
                    <div class="swiper-slide">Slide 2</div>
                    <div class="swiper-slide">Slide 3</div>
                    <div class="swiper-slide">Slide 4</div>
                    <div class="swiper-slide">Slide 5</div>
                    <div class="swiper-slide">Slide 6</div>
                    <div class="swiper-slide">Slide 7</div>
                    <div class="swiper-slide">Slide 8</div>
                    <div class="swiper-slide">Slide 9</div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="plus-button">
                <div class="plus"></div>
            </div>
        </div>

    </div>
    <!-- 試穿資訊 -->
    <div class="studio-information d-flex">
        <div class="studio-photo col-md-5">
            <img src={{ asset('img/studio-photo.jpg') }}>
        </div>

        <div class="col-md-9 mt-5">
            <div class="col-md-12 d-flex">
                <div class="try-on-infor col-md-2">
                    <ul class="list-unstyled">
                        <li class="try-on">試穿</li>

                        <li class="detail">Details</li>

                        <li class="infor">資訊</li>
                    </ul>
                </div>

                <div class="contact-head mt-1 col-md-3">
                    <ul class="list-unstyled pl-4">
                        <li>電話</li>

                        <li class="mt-4">營業時間</li>

                        <li class="mt-4">地址</li>

                        <li class="mt-4">注意</li>
                    </ul>
                </div>

                <div class="contact-text mt-1 col-md-6">
                    <ul class="list-unstyled">
                        <li class="phone mt-0">02 - 27751930</li>

                        <li class="business-time mt-4">週一至週六 1400 - 2000</li>

                        <li>週日 1400 - 1800</li>

                        <li class="address mt-2">臺北市大安區忠孝東路四段142號9樓</li>

                        <li>出電梯左邊第3間904室(才是三十革工作室)</li>

                        <li class="note mt-2">不是電梯對面第一間 x 不要走錯 x 不要買錯</li>
                    </ul>
                </div>
            </div>

            <div class="shop-map mt-4 " data-aos="fade-down">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3614.7867787660603!2d121.5472019150064!3d25.041309083968848!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442abda8f963d3f%3A0xce8d3baae8551e2b!2z5LiJ5Y2B6Z2p!5e0!3m2!1szh-TW!2stw!4v1625462398880!5m2!1szh-TW!2stw"
                    width="864" height="432" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src={{ asset('js/index.js') }}></script>
@endsection
