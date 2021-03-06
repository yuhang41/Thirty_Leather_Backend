<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- web-cion -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}" >
    <title>@yield('title')</title>
    <!-- fontawsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- swiper css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.8.4/swiper-bundle.min.css"
        integrity="sha512-aMup4I6BUl0dG4IBb0/f32270a5XP7H1xplAJ80uVKP6ejYCgZWcBudljdsointfHxn5o302Jbnq1FXsBaMuoQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Source code pro -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@300;400;500;700&display=swap"
        rel="stylesheet">
    <!-- aos-css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href={{ asset('css/nav.css') }}>
    <link rel="stylesheet" href={{ asset('css/footer.css') }}>
    @yield('css')
</head>

<body>
    @php
        use App\TypeClass;
        $class =  TypeClass::get();
    @endphp
    <nav id="navbar">
        <a href={{ asset('/front') }} class="go-home-logo"><img class="logo" src={{ asset('img/30leather_logo.svg') }} alt=""></a>
        <nav class="navbar navbar-expand-custom navbar-light">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <div class="stick-container">
                <div class="stick stick-1"></div>
                <div class="stick stick-2"></div>
                <div class="stick stick-3"></div>
            </div>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <!-- ???????????? -->
              <li class="nav-item active single-commidity">
                <a class="nav-link" href={{ asset('/front/product') }}>????????????<span class="sr-only">(current)</span></a>
              </li>
              <!-- ???????????????????????? -->
              <li class="nav-item dropdown all-commidity">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  ????????????
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="{{ asset('/front/product') }}">??????</a>
                    @foreach ($class as $item)
                        @if ($item->id == 1)
                            @foreach ($item->types as $type)
                                <a class="dropdown-item" href="{{ asset('/front/product') }}?type_id={{ $type->id }}">{{ $type->product_type }}</a>
                            @endforeach
                        @endif
                    @endforeach
                </div>
              </li>
              <!-- ?????? -->
              <li class="nav-item dropdown female-shoes">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  ??????
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                @foreach ($class as $item)
                    @if ($item->id == 1)
                        @foreach ($item->types as $type)
                            <a class="dropdown-item" href="{{ asset('/front/product') }}?type_id={{ $type->id }}">{{ $type->product_type }}</a>
                        @endforeach
                    @endif
                @endforeach
                </div>
              </li>
              <!-- ???????????? -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  ????????????
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    @foreach ($class as $item)
                        @if ($item->id == 3)
                            @foreach ($item->types as $type)
                                <a class="dropdown-item" href="{{ asset('/front/product') }}?type_id={{ $type->id }}">{{ $type->product_type }}</a>
                            @endforeach
                        @endif
                    @endforeach
                </div>
              </li>
              <!-- ?????? -->
              <li class="nav-item dropdown more-option">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  ??????
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">??????</a>
                  <a class="dropdown-item dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    ????????????
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href={{ asset('/front/shose') }}>???????????????</a>
                    <a class="dropdown-item" href="#">??????????????????</a>
                    <a class="dropdown-item" href="#">????????????</a>
                  </div>
                  <a class="dropdown-item" href="#">????????????</a>
                </div>
              </li>
              <!-- ?????? -->
              <li class="nav-item">
                <a class="nav-link" href="#">??????</a>
              </li>
              <!-- ???????????? -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  ????????????
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href={{ asset('/front/shose') }}>???????????????</a>
                  <a class="dropdown-item" href="#">??????????????????</a>
                  <a class="dropdown-item" href="#">????????????</a>
                </div>
              </li>
              <!-- ???????????? -->
              <li class="nav-item">
                <a class="nav-link" href="#">????????????</a>
              </li>
              <!-- TWD -->
              <li class="nav-item twd-lang-item">
                <a class="nav-link" href="#">TWD</a>
              </li>
              <!-- ???????????? -->
              <li class="nav-item twd-lang-item">
                <a class="nav-link" href="#">????????????</a>
              </li>
            </ul>
          </div>
        </nav>
        <div class="personal-item">
          <div class="input-cart d-flex">
            <form class="search d-flex my-2">
                <input id="search-input" class=" search-input mr-sm-2" type="search" placeholder="????????????...">
                <label for="search-input"><i class="fas fa-search mr-2"></i></label>
            </form>
            @guest
                <a href={{ asset('/front/login') }}><i class="fas fa-user m-2"></i></a>
            @else
                {{-- <a href={{ asset('/front/user') }}><i class="fas fa-user m-2" style="color:#000"></i></a> --}}
                <i class="member fas fa-user p-2" style="color:#000">
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href={{ asset('/front/user') }}>????????????</a>
                        <a class="dropdown-item" href={{ asset('/front/user/follow') }}>????????????</a>
                        <form action={{ asset('/front/user/logout') }} method="POST" class="dropdown-item">
                            @csrf
                            <button type="submit" class="user-logout">????????????</button>
                        </form>
                    </div>
                </i>
            @endguest
            <div class="cart">
                @guest
                    <a href={{ asset('/front/login') }}><i class="fas fa-shopping-cart m-2"></i></a>
                @else
                    <a href={{ asset('/front/shoppingstep1') }}><i class="fas fa-shopping-cart m-2"></i></a>
                @endguest
                {{-- <div class="cart-number">1</div> --}}
            </div>
          </div>
          <div class="twd-lang d-flex">
            <div class="twd dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">TWD
              </a>
            </div>
            <div class="lang dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">????????????
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

                <div class="footer-icons d-flex justify-content-center">
                    <a class="line" href="https://page.line.me/igt6497i?openQrModal=true" target="_blank">
                        <img src="{{ asset('img/line.svg') }}" alt="">
                    </a>

                    <a class="facebook" href="https://www.facebook.com/30leather" target="_blank">
                        <img src="{{ asset('img/facebook.svg') }}" alt="">
                    </a>

                    <a class="instagram" href="https://www.instagram.com/30leather/" target="_blank">
                        <img src="{{ asset('img/instagram.svg') }}" alt="">
                    </a>
                </div>

                <div class="footer-links d-flex justify-content-center">
                    <div class="block d-flex">
                        <ul class="block1 list-unstyled d-flex">
                            <li class="common-problem list">????????????</li>

                            <li class="sale list">?????????????????????</li>

                            <li class="pay list">????????????</li>
                        </ul>

                        <ul class="block2 list-unstyled d-flex">
                            <li class="send list">????????????</li>

                            <li class="refund list">????????????</li>

                            <li class="invoice list">????????????</li>

                            <li class="privacy">?????????</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="copyright d-flex align-items-center justify-content-center">Copyright &copy;<span>??????????????? All
                Rights Reserved</span></div>
        </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.8.4/swiper-bundle.min.js"
        integrity="sha512-BABFxitBmYt44N6n1NIJkGOsNaVaCs/GpaJwDktrfkWIBFnMD6p5l9m+Kc/4SLJSJ4mYf+cstX98NYrsG/M9ag=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- aos-js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="./js/nav.js"></script>
    @yield('js')
</body>

</html>
