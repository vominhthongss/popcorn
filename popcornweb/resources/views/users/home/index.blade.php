@extends('users.main')
@section('content')
<!-- home -->
<section class="home">
    <!-- home bg -->
    <div class="owl-carousel home__bg">
        <div class="item home__cover" data-bg="{{ asset('asset/img/home/home__bg.jpg') }}"></div>
        <div class="item home__cover" data-bg="{{ asset('asset/img/home/home__bg2.jpg') }}"></div>
        <div class="item home__cover" data-bg="{{ asset('asset/img/home/home__bg3.jpg') }}"></div>
        <div class="item home__cover" data-bg="{{ asset('asset/img/home/home__bg4.jpg') }}"></div>
    </div>
    <!-- end home bg -->

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="home__title" name="top"><b>PHIM NỔI BẬT</b> CỦA THÁNG</h1>

                <button class="home__nav home__nav--prev" type="button">
                    <i class="icon ion-ios-arrow-round-back"></i>
                </button>
                <button class="home__nav home__nav--next" type="button">
                    <i class="icon ion-ios-arrow-round-forward"></i>
                </button>
            </div>

            <div class="col-12">
                <div class="owl-carousel home__carousel">
                    @foreach ($phimNoiBat as $item)
                    <div class="item">

                        <!-- card -->



                        <div class="card card--big">
                            <div class="card__cover">
                                {{--  poster  --}}
                                <img src="{{ asset($item->PHIM_URLPOSTER) }}" alt="">
                                <a href="{{ route('detail', ['phim_id'=>$item->PHIM_ID]) }}" class="card__play">
                                    <i class="icon ion-ios-play"></i>
                                </a>

                            </div>
                            <div class="card__content">
                                <h3 class="card__title">
                                    <a href="{{ route('detail', ['phim_id'=>$item->PHIM_ID]) }}">
                                        {{--  tên film  --}}
                                        {{$item->PHIM_TEN}}
                                    </a>
                                </h3>
                                <span class="card__category">
                                    {{--  thể loại  --}}
                                    @foreach ($theLoaiPhim as $item2)
                                        @if ($item2->PHIM_ID==$item->PHIM_ID)
                                        <a href="{{ route('filter', ['genre'=>$item2->THELOAI_TEN]) }}">{{$item2->THELOAI_TEN}}</a>
                                        @endif

                                    @endforeach


                                </span>
                                <div class="card__wrap">

                                    <span class="card__rate">
                                        <img class="imdb" src="{{ asset('asset/img/imdb.png') }}" alt="">
                                        <b>{{$item->PHIM_DIEMIMDB}}</b>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- end card -->
                    </div>
                    @endforeach
                    {{--  <div class="item">
                        <!-- card -->
                        <div class="card card--big">
                            <div class="card__cover">
                                <img src="{{ asset('asset/img/covers/cover.jpg') }}" alt="">
                                <a href="{{ route('detail2') }}"" class="card__play">
                                    <i class="icon ion-ios-play"></i>
                                </a>
                            </div>
                            <div class="card__content">
                                <h3 class="card__title"><a href="{{ route('detail2') }}">Tôi mơ với một ngôn ngữ khác</a></h3>
                                <span class="card__category">
                                    <a href="#">Hành động</a>
                                    <a href="#">Kịch tính</a>
                                </span>
                                <span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>

                    <div class="item">
                        <!-- card -->
                        <div class="card card--big">
                            <div class="card__cover">
                                <img src="{{ asset('asset/img/covers/cover2.jpg') }}" alt="">
                                <a href="#" class="card__play">
                                    <i class="icon ion-ios-play"></i>
                                </a>
                            </div>
                            <div class="card__content">
                                <h3 class="card__title"><a href="#">Ghế dài</a></h3>
                                <span class="card__category">
                                    <a href="#">Hài hước</a>
                                </span>
                                <span class="card__rate"><i class="icon ion-ios-star"></i>7.1</span>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>

                    <div class="item">
                        <!-- card -->
                        <div class="card card--big">
                            <div class="card__cover">
                                <img src="{{ asset('asset/img/covers/cover3.jpg') }}" alt="">
                                <a href="#" class="card__play">
                                    <i class="icon ion-ios-play"></i>
                                </a>
                            </div>
                            <div class="card__content">
                                <h3 class="card__title"><a href="#">Whitney</a></h3>
                                <span class="card__category">
                                    <a href="#">Lãng mạn</a>
                                    <a href="#">Chính kịch</a>
                                </span>
                                <span class="card__rate"><i class="icon ion-ios-star"></i>6.3</span>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>

                    <div class="item">
                        <!-- card -->
                        <div class="card card--big">
                            <div class="card__cover">
                                <img src="{{ asset('asset/img/covers/cover4.jpg') }}" alt="">
                                <a href="#" class="card__play">
                                    <i class="icon ion-ios-play"></i>
                                </a>
                            </div>
                            <div class="card__content">
                                <h3 class="card__title"><a href="#">Sự mù quáng</a></h3>
                                <span class="card__category">
                                    <a href="#">Hài hước</a>
                                    <a href="#">Chính kịch</a>
                                </span>
                                <span class="card__rate"><i class="icon ion-ios-star"></i>7.9</span>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>  --}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end home -->

<!-- content -->
<section class="content">
    <div class="content__head">
        <div class="container">
            <div class="row">

                <div class="col-12">
                    <!-- content title -->
                    <h2 class="content__title">Phim mới</h2>
                    <!-- end content title -->

                    <!-- content tabs nav -->
                    <ul class="nav nav-tabs content__tabs" id="content__tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">ĐÃ RA MẮT</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">PHIM ĐIỆN ẢNH</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">PHIM TRUYỀN HÌNH</a>
                        </li>

                    </ul>
                    <!-- end content tabs nav -->

                    <!-- content mobile tabs nav -->
                    <div class="content__mobile-tabs" id="content__mobile-tabs">
                        <div class="content__mobile-tabs-btn dropdown-toggle" role="navigation" id="mobile-tabs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <input type="button" value="Đã ra mắt">
                            <span></span>
                        </div>

                        <div class="content__mobile-tabs-menu dropdown-menu" aria-labelledby="mobile-tabs">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"><a class="nav-link active" id="1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Đã ra mắt</a></li>

                                <li class="nav-item"><a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Phim điện ảnh</a></li>

                                <li class="nav-item"><a class="nav-link" id="3-tab" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Phim truyền hình</a></li>

                            </ul>
                        </div>
                    </div>
                    <!-- end content mobile tabs nav -->
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- content tabs -->
        <div class="tab-content" id="myTabContent">
            {{--  tab1  --}}
            <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
                <div class="row">
                    {{-- <!-- card -->
                    @foreach ($phimDaRaMat as $item)
                    <div class="col-6 col-sm-12 col-lg-6">
                        <div class="card card--list">
                            <div class="row">
                                <div class="col-12 col-sm-4">
                                    <div class="card__cover">
                                        <img src="{{ $item->PHIM_URLPOSTER }}" alt="">
                                        <a href="{{ route('detail', ['phim_id'=>$item->PHIM_ID]) }}" class="card__play">
                                            <i class="icon ion-ios-play"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-8">
                                    <div class="card__content">
                                        <h3 class="card__title"><a href="{{ route('detail', ['phim_id'=>$item->PHIM_ID]) }}">{{$item->PHIM_TEN}}</a></h3>
                                        <span class="card__category">
                                                @foreach ($theLoaiPhim as $item2)
                                                    @if ($item2->PHIM_ID==$item->PHIM_ID)
                                                    <a href="{{ route('filter', ['genre'=>$item2->THELOAI_TEN]) }}">{{$item2->THELOAI_TEN}}</a>
                                                    @endif
                                                @endforeach
                                        </span>
                                        <div class="card__wrap">
                                            <img class="imdb" src="{{ asset('asset/img/imdb.png') }}" alt="">
                                            <span class="card__rate">
                                                <b>{{$item->PHIM_DIEMIMDB}}</b>

                                            </span>

                                            <ul class="card__list">

                                                <li>{{$item->DOTUOI_TEN}}</li>
                                            </ul>
                                        </div>

                                        <div class="card__description">
                                            <p>
                                                {{$item->PHIM_TOMTAT}}
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    @endforeach
                    <!-- end card --> --}}
                    @foreach ($phimDaRaMat as $item)
                    <!-- card -->
                    <div class="col-6 col-sm-12 col-lg-12">
                        <div class="card card--list">
                            <div class="row">
                                <div class="col-12 col-sm-2">
                                    <div class="card__cover">
                                        <img src="{{ asset($item->PHIM_URLPOSTER) }}" alt="">
                                        <a href="{{ route('detail', ['phim_id'=>$item->PHIM_ID]) }}" class="card__play">
                                            <i class="icon ion-ios-play"></i>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-10">
                                    <div class="card__content">
                                        <h3 class="card__title">
                                            <a href="{{ route('detail', ['phim_id'=>$item->PHIM_ID]) }}">
                                                {{$item->PHIM_TEN}}
                                            </a>
                                        </h3>
                                        <span class="card__category">
                                            @foreach ($theLoaiPhim as $item2)
                                                @if ($item2->PHIM_ID==$item->PHIM_ID)
                                                    <a href="#">{{$item2->THELOAI_TEN}}</a>
                                                @endif
                                             @endforeach
                                        </span>

                                        <div class="card__wrap">
                                            <img class="imdb" src="{{ asset('asset/img/imdb.png') }}" alt="">
                                            <span class="card__rate">
                                                <b>{{$item->PHIM_DIEMIMDB}}</b>

                                            </span>

                                            <ul class="card__list">
                                                <li>HD</li>
                                                <li>{{$item->DOTUOI_TEN}}</li>
                                            </ul>
                                        </div>

                                        <div class="card__description">
                                            <p>
                                            {{$item->PHIM_TOMTAT}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                    @endforeach
                </div>
            </div>
            {{--  tab2  --}}
            <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="2-tab">
                <div class="row">
                    <!-- card -->
                    @foreach ($phimDienAnh as $item)
                    <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                        <div class="card">
                            <div class="card__cover">
                                <img src="{{ $item->PHIM_URLPOSTER}}" alt="">
                                <a href="{{ route('detail', ['phim_id'=>$item->PHIM_ID]) }}" class="card__play">
                                    <i class="icon ion-ios-play"></i>
                                </a>
                            </div>
                            <div class="card__content">
                                <h3 class="card__title"><a href="{{ route('detail', ['phim_id'=>$item->PHIM_ID]) }}">{{$item->PHIM_TEN}}</a></h3>
                                <span class="card__category">
                                    @foreach ($theLoaiPhim as $item2)
                                        @if ($item2->PHIM_ID==$item->PHIM_ID)
                                        <a href="{{ route('filter', ['genre'=>$item2->THELOAI_TEN]) }}">{{$item2->THELOAI_TEN}}</a>
                                        @endif
                                    @endforeach
                                </span>
                                <img class="imdb" src="{{ asset('asset/img/imdb.png') }}" alt="">
                                    <span class="card__rate">
                                        <b>{{$item->PHIM_DIEMIMDB}}</b>

                                    </span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- end card -->

                </div>
            </div>
            {{--  tab3  --}}
            <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="3-tab">
                <div class="row">
                    <!-- card -->
                    @foreach ($phimTruyenHinh as $item)
                    <div class="col-6 col-sm-4 col-lg-3 col-xl-2">
                        <div class="card">
                            <div class="card__cover">
                                <img src="{{ $item->PHIM_URLPOSTER}}" alt="">
                                <a href="{{ route('detail', ['phim_id'=>$item->PHIM_ID]) }}" class="card__play">
                                    <i class="icon ion-ios-play"></i>
                                </a>
                            </div>
                            <div class="card__content">
                                <h3 class="card__title"><a href="{{ route('detail', ['phim_id'=>$item->PHIM_ID]) }}">{{$item->PHIM_TEN}}</a></h3>
                                <span class="card__category">
                                    @foreach ($theLoaiPhim as $item2)
                                        @if ($item2->PHIM_ID==$item->PHIM_ID)
                                        <a href="{{ route('filter', ['genre'=>$item2->THELOAI_TEN]) }}">{{$item2->THELOAI_TEN}}</a>
                                        @endif
                                    @endforeach
                                </span>
                                <img class="imdb" src="{{ asset('asset/img/imdb.png') }}" alt="">
                                    <span class="card__rate">
                                        <b>{{$item->PHIM_DIEMIMDB}}</b>

                                    </span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- end card -->

                </div>
            </div>
        </div>
        <!-- end content tabs -->
    </div>
</section>
<!-- end content -->

<!-- expected premiere -->
@include('users.elements.premiere')
<!-- end expected premiere -->


@endsection
