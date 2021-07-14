@extends('layouts.FontTemplate')
@section('title','產品詳細介紹')

@section('css')
<link rel="stylesheet" href={{ asset('css/product-detail.css') }}>
@endsection

@section('content')
<div class="main-container">
    <!-- 左邊白色區塊的欄位 -->
    <div class="commodity-menu">
        <div class="all-commodity">
            <div class="commodity-menu-title AllCommodity" data-toggle="collapse"
                data-target="#multiCollapseExample1" aria-expanded="true" aria-controls="multiCollapseExample1">
                所有商品
            </div>
            <ul class="commodity-menu-options collapse show" id="multiCollapseExample1">
                <li><a href="#">女鞋</a></li>
                <li><a href="#">小白鞋</a></li>
                <li><a href="#">紳士鞋</a></li>
                <li><a href="#">休閒鞋</a></li>
                <li><a href="#">平底鞋</a></li>
                <li><a href="#">跟鞋</a></li>
                <li><a href="#">涼鞋</a></li>
                <li><a href="#">娃娃鞋</a></li>
                <li><a href="#">鞋款</a></li>
                <li><a href="#">防水系列</a></li>
            </ul>
            <div class="commodity-menu-title Snowshoe" data-toggle="collapse" data-target="#multiCollapseExample2"
                aria-expanded="false" aria-controls="multiCollapseExample2">
                訂製雪靴
            </div>
            <ul class="commodity-menu-options collapse" id="multiCollapseExample2">
                <li><a href="#">迷你筒(16cm-18cm)</a></li>
                <li><a href="#">低筒(22cm-24cm)</a></li>
                <li><a href="#">中筒(26cm-28cm)</a></li>
                <li><a href="#">高筒(30cm-33cm)</a></li>
            </ul>
            <div class="commodity-other">
                配件
            </div>
        </div>
    </div>
    <!-- 右邊商品資訊 -->
    <div class="product-container">
        <!-- 商品資訊 -->
        <div class="productshop-container">
            <div class="breadcrumbs">
                <div class="bread-label">
                    <a href="#">首頁</a>
                    >
                    <a href="#">女鞋</a>
                    >
                    <a href="#">涼鞋</a>
                </div>
            </div>
            <div class="commidity-container">
                <div class="swiper">
                    <!-- Swiper -->
                    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                        class="swiper-container mySwiper2">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src={{ asset($product->photo) }} />
                            </div>
                            @foreach ($product->photos as $photo)
                                <div class="swiper-slide">
                                    <img src={{ asset($photo->photos) }} />
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div thumbsSlider="" class="swiper-container mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src={{ asset($product->photo) }} />
                            </div>
                            @foreach ($product->photos as $photo)
                                <div class="swiper-slide">
                                    <img src={{ asset($photo->photos) }} />
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="order-detail">
                    <div class="odrer-info">
                        <div class="order-discript">
                            <div class="discript-title">
                                <p>&nbsp;{&nbsp;&nbsp;{{ $product->product_name }}&nbsp;&nbsp;}</p>
                                <p>{{ $product->product_nickname }}</p>
                            </div>
                            <div class="evaluation">
                                <div class="star-eval">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="other-eavl">
                                    <p>5.0分</p>
                                    <p><a href="#eval">1個評價</a></p>
                                    <p><i class="fas fa-heart"></i>收藏</p>
                                </div>
                            </div>
                            <div class="content">
                                <div class="order-text">
                                    <i class="fas fa-circle"></i>
                                    <p>酒紅色是植鞣羊皮。黑、焦糖、裸麥、白色這四色是牛皮<br>，白色皮料有做防汙處理，較不易髒。</p>
                                </div>
                                <div class="order-text">
                                    <i class="fas fa-circle"></i>
                                    <p>跟高約2.5cm。吸汗透氣豚皮內裡(腳墊)。包覆5mm高密<br>度發泡鞋墊。L型90度立體導角真皮沿條。懶人S鈎扣，<br>有三孔可以調整鬆緊。</p>
                                </div>
                            </div>
                        </div>
                        <div class="order-color">
                            <div class="color-title">
                                <span>顏色</span>
                                <span>經典黑</span>
                            </div>
                            <div class="color-style">
                                @foreach ($product->color as $key=>$color)
                                    <input type="checkbox" class="color-checkbox" name="color[]" id="{{ $key }}" value='{{ $color }}'>
                                    <label for="{{ $key }}" class="brown color-button" style="--color:{{ $color }}; border: 10px solid {{ $color }};"></label>
                                @endforeach
                            </div>
                        </div>
                        <div class="order-size">
                            <div class="size-title">
                                <span>尺寸</span>
                                <span>35</span>
                            </div>
                            <div class="size-deatil">
                                <div class="small-size">
                                    @foreach ($product->size as $size)
                                        <input type="checkbox" name="size[]" class="size-checkbox" id="{{ $size }}" value="{{ $size }}">
                                        <label for="{{ $size }}" class="size-button" style="--sizeColor:#9e9e9e;">{{ $size }}</label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="order-shipping">
                        <div class="order-button">
                            <button class="putcart" data-id="{{ $product->id }}">加入購物車</button>
                            <button class="pre-order">預購</button>
                            <div class="order-amount">
                                <button class="minus">-</button>
                                <input type="number" id="quantity" value="1">
                                <button class="plus">+</button>
                            </div>
                        </div>
                        <div class="order-price">
                            <p>${{ $product->price }}</p>
                            <p>${{ $discount = round($product->price * $product->discount) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- 商品詳細描述/開發過程/尺碼建議 -->
        <div class="productdetail-container">
            <div class="detail-container">
                <div class="tabs">
                    <div class="tab active">商品描述</div>
                    <div class="tab">開發過程</div>
                    <div class="tab">尺碼建議</div>
                </div>
                <div class="tabs-contents">
                    <!-- 商品描述-內容-->
                    <div class="tab-c  active product-description">
                        <div class="inner-content">
                            <div class="paragraph-first">
                                <p>類似這樣的編織涼鞋流傳了一整個世紀，每個人的童年都有一雙似曾相似的魚骨編織涼鞋，小時候或稱這款式的涼鞋為空氣鞋，印象中我也幫我爹買過這樣的涼鞋，從童鞋、女鞋、男鞋都有類似款式，可以說是一款男、女、老、少都能駕馭的涼鞋款式。
                                </p>
                            </div>
                            <div class="paragraph-second">
                                <p>編織涼鞋的精髓在於不變的真皮，條條交疊，但細節各有不同，有的有沿條、有的沒沿條、有的低跟、有的平底、有的厚底 . . .
                                    各有千秋。而今年編織的風格有別於以往相同寬度的編織線條，今年以
                                    粗、細、大、小不同的真皮線條交疊出更有層次的復古風格，這款的編織鞋面在皮料上剪裁出斜線切割，交疊出看似大小不一、卻又整齊有規律的編織紋路。</p>
                            </div>
                            <div class="shoes-detail">
                                <div class="main-shoes">
                                    <div class="bg-square layer" data-speed="5"></div>
                                    <div class="click-function">
                                        <div class="click-first">
                                            <div class="click-button"></div>
                                            <div class="content-first">
                                                <img src="../img/shoes-introduction-one.png" alt="">
                                                <div class="content-text ">
                                                    <p>S型懶人古銅鉤扣</p>
                                                    <p>懶人勾扣，有三節可條鬆緊</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="click-second">
                                            <div class="click-button"></div>
                                            <div class="content-second">
                                                <img src="../img/shoes-introduction-second.png" alt="">
                                                <div class="content-text">
                                                    <p>L型沿條壓馬克縫線</p>
                                                    <p>有90度立體導角與一般平的沿條工藝不同</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="click-third">
                                            <div class="click-button"></div>
                                            <div class="content-third">
                                                <img src="../img/shoes-introduction-third.png" alt="">
                                                <div class="content-text">
                                                    <p>吸汗透氣豚皮內裡</p>
                                                    <p>獨家研發包覆5mm高密度發泡層</p>
                                                    <p>擁有強大支撐效果，耐久站、久走</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="click-fourth">
                                            <div class="click-button"></div>
                                            <div class="content-fourth">
                                                <div class="content-fourth-one">
                                                    <img src="../img/shoes-introduction-fourth-2.png" alt="">
                                                    <div class="content-text">
                                                        <p>第一層 : 真皮沿條</p>
                                                        <p>第二層 : 5mm發泡緩衝夾層</p>
                                                        <p>第三層 : 鞋底橡膠層</p>
                                                        <p>第四層 : 木跟</p>
                                                        <p>第五層 : 橡膠天皮</p>
                                                    </div>
                                                </div>
                                                <div class="content-fourth-two">
                                                    <img src="../img/shoes-introduction-fourth-1.png" alt="">
                                                    <div class="content-text">
                                                        <p>止滑橡膠大底</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="click-fifth">
                                            <div class="click-button"></div>
                                            <div class="content-fifth">
                                                <img src="../img/shoes-introduction-fifth.png" alt="">
                                                <div class="content-text">
                                                    <p>防磨乳膠後跟，毛面真皮後跟內裡</p>
                                                    <p>增加摩擦力，減少穿鞋腳跟滑落不便</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <img class="main-photo" src="../img/shoes-first.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 開發過程-內容 -->
                    <div class="tab-c development-process">
                        <div class="inner-content">
                            <div class="development-process-content">
                                <div class="swiper-container mySwiper3">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="development-process-title">
                                                <p>初登場</p>
                                                <h2>打樣的初版至三版</h2>
                                            </div>
                                            <div class="development-process-list">
                                                <p><i class="fas fa-circle"></i>從第一次樣板曝光就瘋狂被詢問，越多粉絲求這雙，我們的開發工作越是不能掉以輕心，每個細節都需要仔細試樣。</p>
                                            </div>
                                            <div class="development-process-text">
                                                <p>目前橫帶間距過大，邊縫隙太大小指頭會不小心就岔出來，一定有人穿涼鞋有過這窘境，小指頭從縫隙岔出來真的非常尷尬，開發的時候若求快、不認真試版就會有各種狀況，之前因為楦頭還不夠標準，即使先調整縫隙間距也無法精確，只好繼續打第四版調縫隙。</p>
                                                <p>再調整橫帶間距及鞋面線條微調，應該就可以開始量產了，同時間請鞋底廠開始生產鞋底，也請皮廠先染製皮料，縮短打版完成之後等待材料的時間，開發很繁瑣，除了設計、製作 . . . 每個細節都得顧到，最大工程是得找齊所有配件、材料，整合所有材料商才能完成一款鞋。</p>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="development-process-title">
                                                <p>開發</p>
                                                <h2>打樣的四版至六版</h2>
                                            </div>
                                            <div class="development-process-list">
                                                <p><i class="fas fa-circle"></i>第四版橫條左右對稱中會不太順。</p>
                                                <p><i class="fas fa-circle"></i>第五版小指頭安全藏好，橫條分內外腰比較順多花一組刀模費。</p>
                                            </div>
                                            <div class="development-process-text">
                                                <p>無法露腳趾的人真的很需要這款涼鞋，本來以為改好側邊縫隙距離就可以了，結果又發現一個不是很嚴重的小細節！</p>
                                                <p>師傅開版的橫帶是左右對稱，對稱的話橫帶就可以不分左右腳，左腳、右腳就能共用刀模，能省幾把刀模費用，但實際穿起來橫帶是內側偏短一點、外側偏長一點，結果腳背中間橫帶就有點卡卡不太順，鞋面看起來稍歪，最後又改了一次版，橫帶分內外腰，內腰橫帶較短外腰較長，這樣就必須分左右腳，無法左右共刀，又多了幾把刀模的費用！</p>
                                                <p>這雙涼鞋給你們看到第5版，但實際後來又修改了2次鞋面線條還微調了1次楦頭，師傅將楦頭腳背處再削過一次，線條更流暢了!</p>
                                                <p>跟師傅一邊開發，一邊參考各家品牌的類似鞋款，將我們認為不足的地方再更加優化，我隨口念了句如果用木跟應該更有質感，隔天一支換了木跟的鞋底就出現了，原來師傅也同意我的想法，立馬請鞋底廠師傅再改了一支鞋底過來試樣，默默給了我一個大驚喜，小木跟的質感簡直讓這雙涼鞋更加完整了！</p>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="development-process-title">
                                                <p>合作廠商</p>
                                                <h2>疫情衝擊之下的供料商</h2>
                                            </div>
                                            <div class="development-process-list">
                                                <p><i class="fas fa-circle"></i>疫情打亂了大家的日常，訂單量直線下滑，鞋廠師傅做一天休一天。</p>
                                            </div>
                                            <div class="development-process-text">
                                                <p>今天撞見鞋底廠老闆上門，他說他那邊的專櫃單都停了，現在底廠幾乎沒訂單。</p>
                                                <p>這底廠老闆一直都很nice，不管我們訂單多難做，他從沒抱怨過，總是很有耐心的一，次次幫我們打樣品、試材料，照片新款涼鞋上的L型皮沿條，也是底廠老闆力挺幫我們做的開發，老闆問我，我們開發的新款會不會也跟著喊停，底廠老闆其實已經跟同事問過好幾次，今天又再次問了我，可見他真的很擔心，我請他不要擔心，已經下單的，請老闆都正常進行備料不會改變，也不會喊停雖然我們網路正常出貨，但工作室目前現場營業額也是，直接歸零。</p>
                                                <p>不過跟很多撐不過去的商家比，此刻還有網路訂單能出貨的我們真的也沒啥好抱怨的，我其實也擔心目前未知的疫情狀況會影響後續補單不如預期說，但我更不希望鞋底廠撐不下去，那誰以後幫我們開發鞋底。</p>
                                                <p>全台北我也挖不出來另一家手工鞋底廠了，沒人開發鞋底，那你們以後穿甚麼阿，這鞋底廠老闆真的幫我們做了很多別人不願意做的開發，別人不願意開發的，難做的，他都幫我們做了，心裡希望平常幫過我們很多忙的底廠老闆也能一起撐過去，大家接下來還能一起做鞋呀。</p>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="development-process-title">
                                                <p>結語</p>
                                                <h2>品質打磨與開發的漫長之路</h2>
                                            </div>
                                            <div class="development-process-list">
                                                <p><i class="fas fa-circle"></i>鞋款從無到有的開發時間少則半年、多則一年、甚至更久。</p>
                                            </div>
                                            <div class="development-process-text">
                                                <p>之前粉專更新開發樣給大家看到第五版我就不敢更新了，每天不斷傳來敲碗上架的私訊，如小山堆積在一旁的樣品跟鞋底，打了不止十次樣板，防疫期間一點也沒鬆懈，開發、備料、生產 . . . 如火如荼在進行，終於準時在6月底前上架。</p>
                                                <p>如果不把開發抓在手上做，那麼鞋墊就做不到我們要求的舒適度，鞋底的緩震回彈效果也就也達不到我們的標準，一個鞋款從無到有非常繁複，但你們穿上所給予的回饋，每次都讓我有無比的成就感，這是讓我願意無限輪迴在開發鞋款的深淵裡而不可自拔的主要動力來源，耗費這麼多精力、時間研發，目的就是要讓穿的人覺得鞋子是可以既好看又好穿兩者同時並存的。</p>
                                                <p>謝謝不吝嗇給予回饋的粉絲讓我們能量滿滿，也謝謝一路上願意陪我們走開發製程的工廠及師傅們，製鞋期間其實遇到不少不願意走開發製程的工廠，因為繁瑣、許多人都敬而遠之，工廠希望我們單純下單採購對工廠來說這是最簡單、快速能看到訂單的途徑，鞋款從無到有的開發時間少則半年、多則一年、甚至更久。</p>
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
                    <!-- 尺碼建議-內容 -->
                    <div class="tab-c size-recommendation">
                        <div class="inner-content">
                            <div class="announcement">
                                <p>工作室提供全部尺碼試穿，每個尺碼都可以在工作試試穿到唷，如現場缺貨也可以現場預購，到貨免運幫您寄出唷
                                </p>
                            </div>
                            <div class="size-discript">
                                <div class="discript-content">
                                    <div class="title">
                                        尺碼正常
                                    </div>
                                    <div class="content">
                                        楦頭算寬很能容腳，瘦腳、寬腳都可以拿正常尺碼，腳板寬厚有肉的建議拿大半號，如果平常本來就習慣穿啷一點也可以直接拿大半號，腳踝有帶子，大半號會啷不至於掉腳。
                                    </div>
                                </div>
                                <div class="tryon-experience">
                                    <div class="staff staff-one">
                                        <div class="staff-name">
                                            | 闆娘 |
                                        </div>
                                        <div class="staff-exp">
                                            37(23.5)瘦薄腳板，平常都穿37(23.5)<br>這雙穿23.5(37)剛好，穿38(24)有點啷。
                                        </div>
                                    </div>
                                    <div class="staff staff-two">
                                        <div class="staff-name">
                                            | 小幫手A |
                                        </div>
                                        <div class="staff-exp">
                                            37(23.5)寬厚、肉肉腳板，平常穿37(23.5)或38(24)<br>這雙穿37(23.5)較包覆合腳，穿38(24)舒適比較剛好。
                                        </div>
                                    </div>
                                    <div class="staff staff-three">
                                        <div class="staff-name">
                                            | 小幫手B |
                                        </div>
                                        <div class="staff-exp">
                                            25.5(41)寬腳板、不肉，平常穿41(25.5)或42(26)<br>這雙穿41(25.5)剛好，穿42(26)略寬鬆但也不會掉腳。
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- 顧客評價&相關產品 -->
        <div class="productother-container">
            <div class="other-container">
                <div class="customer-eval">
                    <div class="eval-title" id="eval">顧客評價</div>
                    <div class="different-eval">
                        <div class="star-eval">
                            <p>1個評價</p>
                            <div class="star-img">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                        <div class="score">
                            <p>5.0分</p>
                        </div>
                        <div class="bar-graph">
                            <ul>
                                <li>
                                    <p>5分</p>
                                    <div class="graph-line"></div>
                                    <p>100%</p>
                                </li>
                                <li>
                                    <p>4分</p>
                                    <div class="graph-line"></div>
                                    <p>0%</p>
                                </li>
                                <li>
                                    <p>3分</p>
                                    <div class="graph-line"></div>
                                    <p>0%</p>
                                </li>
                                <li>
                                    <p>2分</p>
                                    <div class="graph-line"></div>
                                    <p>0%</p>
                                </li>
                                <li>
                                    <p>1分</p>
                                    <div class="graph-line"></div>
                                    <p>0%</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="customer-comment">
                        <div class="shopping-cart">
                            <ul>
                                <li class="order-cart img-content">
                                    <img src="https://placeholder.pics/svg/100x100" alt="">
                                    <div class="cart-content">
                                        <div class="cart-title">
                                            <p>品質不輸專櫃!!</p>
                                            <div class="star-eval">
                                                <div class="star-img">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <p>5.0分</p>
                                            </div>
                                        </div>
                                        <div class="cart-text">
                                            <p>超棒 超好穿 感受到老闆製鞋的用心</p>
                                            <p>經典黑-24.5</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="order-cart eval-custoemr">
                                    <div class="eval-name">林土木</div>
                                    <div class="eval-date">2021.07.07</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="related-commid">
                    <div class="commid-title">相關用品</div>
                    <div class="commidity">
                        <div class="product-item">
                            <div class="product-first">
                                <img src="../img/shoes-first.png" alt="">
                                <div class="content">
                                    <div class="text">
                                        <p>魚骨手工編織羅馬涼鞋</p>
                                        <p>| 牽手一起長大 |</p>
                                    </div>
                                    <div class="price">
                                        <span>$4,280</span>
                                        <span>$2,480</span>
                                    </div>
                                </div>
                                <button>加入購物車</button>
                            </div>
                            <div class="product-second">
                                <img src="../img/shoes-second.png" alt="">
                                <div class="content">
                                    <div class="text">
                                        <p>繞帶坡跟魔鬼氈涼鞋</p>
                                        <p>| 微醺六月 |</p>
                                    </div>
                                    <div class="price">
                                        <span>$3,980</span>
                                        <span>$2,280</span>
                                    </div>
                                </div>
                                <button>加入購物車</button>
                            </div>
                            <div class="product-third">
                                <img src="../img/shoes-third.png" alt="">
                                <div class="content">
                                    <div class="text">
                                        <p>幾何普普風尖頭平底鞋</p>
                                        <p>| 幾何萬花筒 |</p>
                                    </div>
                                    <div class="price">
                                        <span>$2,680</span>
                                        <span>$1,980</span>
                                    </div>
                                </div>
                                <button>加入購物車</button>
                            </div>
                            <div class="product-fourth">
                                <img src="../img/shoes-fourth.png" alt="">
                                <div class="content">
                                    <div class="text">
                                        <p>寬帶二字平底軟涼鞋</p>
                                        <p>| 簡單卻不簡單 |</p>
                                    </div>
                                    <div class="price">
                                        <span>$3,280</span>
                                        <span>$1,980</span>
                                    </div>
                                </div>
                                <button>加入購物車</button>
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
    <script src={{ asset('js/product-detail.js') }}></script>
    <script src={{ asset('js/product-navbar.js') }}></script>
@endsection
