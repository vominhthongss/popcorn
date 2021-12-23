<header class="header">
    <div class="header__wrap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="header__content">
                        <!-- header logo -->
                        <a href="{{ route('home') }}" class="header__logo">
                            <img src="{{ asset('asset/img/logo.svg') }}" alt="">
                        </a>
                        <!-- end header logo -->

                        <!-- header nav -->
                        <ul class="header__nav">

                            <li class="header__nav-item">
                                <a href="{{ route('home') }}" class="header__nav-link">Trang chủ</a>
                            </li>

                            <li class="header__nav-item">
                                <a href="{{ route('catalog') }}" class="header__nav-link">Danh mục phim</a>
                            </li>
                            <li class="header__nav-item">
                                <a href="{{ route('pricing') }}" class="header__nav-link">Mua gói</a>
                            </li>

                            <li class="header__nav-item">
                                <a href="{{ route('faq') }}" class="header__nav-link">FAQ</a>
                            </li>

                            <!-- dropdown -->
                            <li class="dropdown header__nav-item">
                                <a class="dropdown-toggle header__nav-link header__nav-link--more" href="#" role="button" id="dropdownMenuMore" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon ion-ios-more"></i></a>

                                <ul class="dropdown-menu header__dropdown-menu" aria-labelledby="dropdownMenuMore">
                                    <li><a href="{{ route('about') }}">Thông tin thêm</a></li>
                                    {{--  <li><a href="{{ route('signin') }}">Đăng nhập</a></li>  --}}
                                    <li><a href="{{ route('signup') }}">Đăng ký</a></li>
                                    {{--  <li><a href="{{ route('404') }}">404 Page</a></li>  --}}
                                </ul>
                            </li>
                            <!-- end dropdown -->
                        </ul>
                        <!-- end header nav -->

                        <!-- header auth -->
                        <div class="header__auth">

                            <button class="header__search-btn" type="button">
                                <i class="icon ion-ios-search"></i>
                            </button>
                            @if (Cookie::get('hoten'))
                                @include('users.elements.loginname')
                            @else
                                <a href="{{ route('signin') }}" class="header__sign-in">
                                    <i class="icon ion-ios-log-in"></i>
                                    <span>ĐĂNG NHẬP</span>
                                </a>
                            @endif



                        </div>


                        <!-- end header auth -->

                        <!-- header menu btn -->
                        <button class="header__btn" type="button">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                        <!-- end header menu btn -->
                    </div>


                </div>
            </div>
        </div>
    </div>

    <!-- header search -->
    <form action="{{ route('search') }}" class="header__search" method="GET">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="header__search-content">
                        <input type="text" name="keyword" placeholder="Tìm phim điện ảnh, phim truyền hình mà bạn đang muốn xem">

                        <button type="submit()">tìm</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- end header search -->
</header>
