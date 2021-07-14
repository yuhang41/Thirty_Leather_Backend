<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- fontawsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- swiper css -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />
    <!-- aos-css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href={{ asset('css/nav.css') }}>
    <link rel="stylesheet" href={{ asset('css/footer.css') }}>
    @yield('css')
</head>

<body>
    <nav>
        <img class="logo" src={{ asset('img/30leather_logo.svg') }} alt="">
        <nav class="navbar navbar-expand-custom navbar-light">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <!-- 所有商品 -->
              <li class="nav-item active single-commidity">
                <a class="nav-link" href={{ asset('/front/product') }}>所有商品<span class="sr-only">(current)</span></a>
              </li>
              <!-- 下拉式的所有商品 -->
              <li class="nav-item dropdown all-commidity">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  所有商品
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">女鞋</a>
                  <a class="dropdown-item" href="#">小白鞋</a>
                  <a class="dropdown-item" href="#">紳士鞋</a>
                  <a class="dropdown-item" href="#">休閒鞋</a>
                  <a class="dropdown-item" href="#">平底鞋</a>
                  <a class="dropdown-item" href="#">跟鞋</a>
                  <a class="dropdown-item" href="#">涼鞋</a>
                  <a class="dropdown-item" href="#">娃娃鞋</a>
                  <a class="dropdown-item" href="#">靴款</a>
                  <a class="dropdown-item" href="#">防水系列</a>
                </div>
              </li>
              <!-- 女鞋 -->
              <li class="nav-item dropdown female-shoes">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  女鞋
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">小白鞋</a>
                            <a class="dropdown-item" href="#">紳士鞋</a>
                            <a class="dropdown-item" href="#">休閒鞋</a>
                            <a class="dropdown-item" href="#">平底鞋</a>
                            <a class="dropdown-item" href="#">跟鞋</a>
                            <a class="dropdown-item" href="#">涼鞋</a>
                            <a class="dropdown-item" href="#">娃娃鞋</a>
                            <a class="dropdown-item" href="#">靴款</a>
                            <a class="dropdown-item" href="#">防水系列</a>
                </div>
              </li>
              <!-- 訂製雪靴 -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  訂製雪靴
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">迷你筒(16cm-18cm)</a>
                  <a class="dropdown-item" href="#">低筒(22cm-24cm)</a>
                  <a class="dropdown-item" href="#">中筒(26cm-28cm)</a>
                  <a class="dropdown-item" href="#">高筒(30cm-33cm)</a>
                </div>
              </li>
              <!-- 更多 -->
              <li class="nav-item dropdown more-option">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  更多
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">配件</a>
                  <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    購鞋文章
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">購鞋怎麼選</a>
                    <a class="dropdown-item" href="#">系列鞋款介紹</a>
                    <a class="dropdown-item" href="#">製成故事</a>
                  </div>
                  <a class="dropdown-item" href="#">試穿服務</a>
                </div>
              </li>
              <!-- 配件 -->
              <li class="nav-item">
                <a class="nav-link" href="#">配件</a>
              </li>
              <!-- 購鞋文章 -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  購鞋文章
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">購鞋怎麼選</a>
                  <a class="dropdown-item" href="#">系列鞋款介紹</a>
                  <a class="dropdown-item" href="#">製成故事</a>
                </div>
              </li>
              <!-- 試穿服務 -->
              <li class="nav-item">
                <a class="nav-link" href="#">試穿服務</a>
              </li>
              <!-- TWD -->
              <li class="nav-item twd-lang-item">
                <a class="nav-link" href="#">TWD</a>
              </li>
              <!-- 繁體中文 -->
              <li class="nav-item twd-lang-item">
                <a class="nav-link" href="#">繁體中文</a>
              </li>
            </ul>
          </div>
        </nav>
        <div class="personal-item">
          <div class="input-cart d-flex">
            <form class="search d-flex my-2 my-lg-0">
                <input id="search-input" class=" search-input mr-sm-2" type="search" placeholder="尋找商品...">
                <label for="search-input"><i class="fas fa-search mr-2"></i></label>
            </form>
            <a href={{ asset('/front/user') }}><i class="fas fa-user m-2"></i></a>
            <div class="cart">
                <a href={{ asset('/front/shoppingstep1') }}><i class="fas fa-shopping-cart m-2"></i></a>
                <div class="cart-number">1</div>
            </div>
          </div>
          <div class="twd-lang d-flex">
            <div class="twd dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">TWD
              </a>
            </div>
            <div class="lang dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">繁體中文
              </a>
            </div>
          </div>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
    <footer>
        <div class="site-footer">
            <div class="container">
                <div class="footer-logo">
                    <img src={{ asset('img/30leather_logo.svg') }}>
                </div>

                <hr>

                <div class="col-md-12">
                    <ul class="social-icons mb-0 row list-unstyled justify-content-center">
                        <li><a class="line d-inline-block" href=""></a></li>

                        <li><a class="facebook d-inline-block" href="https://www.facebook.com/30leather" target="_blank"></a></li>

                        <li><a class="instagram d-inline-block" href="https://www.instagram.com/30leather/" target="_blank"></a></li>
                    </ul>

                    <div class="return-nav d-flex justify-content-end">
                        <a href=""><i class="footer-arrow fas fa-sort-up" aria-hidden="true">
                                <div class="footer-arrow-text">TOP</div>
                            </i></a>
                    </div>

                    <div class="common-problems row col-lg-12 col-md-3 col-sm-4 col-5">
                        <ul class="row m-auto list-unstyled">
                            <li class="list common-problem">常見問題</li>

                            <li><a href="#" class="lists"></a>售前與售後服務</li>

                            <li><a href="#" class="lists"></a>付款方式</li>

                            <li><a href="#" class="lists"></a>寄送方式</li>

                            <li><a href="#" class="lists"></a>退款流程</li>

                            <li><a href="#" class="lists"></a>發票折讓</li>

                            <li class="list"><a href="#" class="lists"></a>隱私權保護</li>
                        </ul>
                    </div>
                </div>
            </div>

            <hr>

            <div class="copyright-space d-inline-block"></div>

            <div class="copyright d-flex align-items-center justify-content-center">Copyright &copy; 三十革-臺灣手工鞋 All
                Rights Reserved</div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
        integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF"
        crossorigin="anonymous"></script>
    <!-- swiper js -->
    <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
    <!-- aos-js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    @yield('js')
</body>

</html>
