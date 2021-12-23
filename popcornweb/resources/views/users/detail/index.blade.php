@extends('users.main')
@section('content')
@php
#$goiXemPhim=Cookie::get('goixemphim');
$goiXemPhim=session('goixemphim');
@endphp
<!-- details -->

<section class="section details">



    <!-- details content -->

    <div class="container">
        @include('users.elements.alertreview')
        <div id="columninfo" class="row">
            <!-- title -->
            <div class="col-12">
                @foreach ($thongTinPhim as $item)
                <h1 class="details__title">{{$item->PHIM_TEN}}</h1>
                @endforeach


                @if (Cookie::get('id'))
                    @php
                        $flag=0
                    @endphp
                    @foreach ($danhSachYeuThich as $i)
                        @foreach ($thongTinPhim as $item)
                        @if ($i->THANHVIEN_ID==Cookie::get('id') && $item->PHIM_ID==$i->PHIM_ID)
                            @php
                                $flag=1
                            @endphp
                            <form action="{{ route('unlove') }}" method="POST">
                                @csrf
                                <input type="hidden" name="userid" value="{{Cookie::get('id')}}">

                                <input type="hidden" name="filmid" value="{{$item->PHIM_ID}}">

                                <div>
                                    <p>
                                        <button onclick="submit()" title="Hãy yêu thích để có thể tìm lại nhanh hơn" class="btn btn-counter active"><span>&#x2764;</span> Đã yêu thích !</button>
                                    </p>
                                </div>
                            </form>
                        @endif
                        @endforeach
                    @endforeach
                    @if ($flag==0)
                        <form action="{{ route('love') }}" method="POST">
                            @csrf
                            <input type="hidden" name="userid" value="{{Cookie::get('id')}}">
                            @foreach ($thongTinPhim as $item)
                            <input type="hidden" name="filmid" value="{{$item->PHIM_ID}}">
                            @endforeach
                            <div>
                                <p>
                                    <button onclick="submit()" title="Hãy yêu thích để có thể tìm lại nhanh hơn" class="btn btn-counter"><span>&#x2764;</span> Yêu thích !</button>
                                </p>
                            </div>
                        </form>
                    @endif

                @endif
            </div>
            <!-- end title -->


            <!-- content -->
            {{--  dạng cột  --}}
            <div class="col-12 col-xl-6">
                <div class="card card--details">
                    <div class="row">

                        @foreach ($thongTinPhim as $item)
                        <!-- card cover -->
                        <div class="col-12 col-sm-4 col-md-4 col-lg-3 col-xl-5">
                            <div class="card__cover">
                                {{--1  poster  --}}
                                <img src="{{ asset($item->PHIM_URLPOSTER) }}" alt="">
                            </div>
                        </div>
                        <!-- end card cover -->

                        <!-- card content -->
                        <div class="col-12 col-sm-8 col-md-8 col-lg-9 col-xl-7">
                            <div class="card__content">
                                <div class="card__wrap">
                                    {{-- 2 imdb  --}}
                                    <img class="imdb" src="{{ asset('asset/img/imdb.png') }}" alt="">
                                    <span class="card__rate">
                                        <b>{{$item->PHIM_DIEMIMDB}}</b>

                                    </span>

                                    <ul class="card__list">
                                        <li>HD</li>
                                        {{--3  độ tuổi  --}}
                                        <li>{{$item->DOTUOI_TEN}}</li>
                                    </ul>
                                </div>

                                <ul class="card__meta">
                                    <li><span>Thể loại:</span>
                                        {{--4  thể loại  --}}
                                        @foreach ($theLoaiPhim as $item2)
                                            @if ($item2->PHIM_ID==$item->PHIM_ID)
                                            <a href="{{ route('filter', ['genre'=>$item2->THELOAI_TEN]) }}">{{$item2->THELOAI_TEN}}</a>
                                            @endif
                                        @endforeach
                                    </li>
                                    {{--5  năm  --}}
                                    <li><span>Năm:</span>
                                        {{$item->NAM_TEN}}
                                    </li>
                                    {{--6  thời lượng  --}}
                                    <li><span>Thời lượng:</span>
                                        {{$item->PHIM_THOILUONG}}
                                    </li>
                                    {{--7  Quốc gia  --}}
                                    <li><span>Quốc gia:</span> <a href="#">
                                        {{$item->QUOCGIA_TEN}}
                                    </a> </li>
                                    <li><span>Diễn viên:</span>
                                        {{--8 diễn viên  --}}
                                        @foreach ($dienVien as $item3)
                                            @if ($item3->PHIM_ID==$item->PHIM_ID)
                                                <a href="http://www.google.com/search?q={{$item3->DIENVIEN_TEN}}">{{$item3->DIENVIEN_TEN}}</a>
                                            @endif
                                        @endforeach

                                    </li>
                                    {{--9  đạo diễn --}}
                                    <li><span>Đạo diễn:</span>
                                    @foreach ($daoDien as $item4)
                                        @if ($item4->PHIM_ID==$item->PHIM_ID)
                                            <a href="http://www.google.com/search?q={{$item4->DAODIEN_TEN}}">{{$item4->DAODIEN_TEN}}</a>
                                        @endif
                                    @endforeach
                                    </li>
                                </ul>
                                <div class="card__description card__description--details">
                                        {{--10 tóm tắt  --}}
                                    {{$item->PHIM_TOMTAT}}
                                </div>
                            </div>
                        </div>

                        <!-- end card content -->
                        @endforeach
                    </div>
                </div>

            </div>
            {{--  dạng cột  --}}

            <!-- end content -->

            <!-- player -->

            {{--  CHỖ NÀY SẼ THÊM ĐIỀU KIỆN ĐÃ ĐĂNG NHẬP VÀ MUA GÓI CHƯA =========================================================================================================== --}}
            @if(Cookie::get('hoten') && $goiXemPhim>0)

            <div class="col-12 col-xl-6">
                <video controls crossorigin playsinline id="player">
                    <!-- Video files -->
                    @php
                        $dem=0;
                    @endphp
                    @foreach ($tapPhim as $item)
                    {{$dem+=1}}
                    {{--11 video 480 720 1080  --}}
                    <source src="{{ asset($item->TAP_URL) }}" type="video/mp4" size="
                        @if ($item->CHATLUONG_ID==1)
                            480
                        @endif
                        @if ($item->CHATLUONG_ID==2)
                            720
                        @endif
                        @if ($item->CHATLUONG_ID==3)
                            1080
                        @endif
                        ">
                    @endforeach


                    <!-- Caption files -->

                    @foreach ($tapPhim as $item)
                    <track kind="captions" label="Vietnamese" srclang="vi" src="{{ asset($item->TAP_PHUDE) }}" default>
                    @endforeach
                    <!-- End Caption files -->

                    <!-- Fallback for browsers that don't support the <video> element -->
                    {{--  Tải xuống  --}}
                    <a href="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4" download>Download</a>
                </video>

                {{--  <button onclick="playFullVid()" type="button">Full Video</button><br>  --}}
                <!-- Tải xuống -->
                <li class="dropdown header__nav-item">
                    <a class="dropdown-toggle header__nav-link header__nav-link--more" href="#" role="button" id="dropdownMenuMore" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon ion-ios-more"></i></a>

                    <ul class="dropdown-menu header__dropdown-menu" aria-labelledby="dropdownMenuMore">
                        @php
                            $count=0
                        @endphp
                        @foreach ($tapPhim as $item)
                            @if($count==$goiXemPhim)
                                {{$count=0}}
                            @endif
                            @if ($count==0)
                            <li><a href="{{ asset($item->TAP_URL) }}">Tải phim 480p</a></li>
                            @endif
                            @if ($count==1)
                            <li><a href="{{ asset($item->TAP_URL) }}">Tải phim 720p</a></li>
                            @endif
                            @if ($count==2)
                            <li><a href="{{ asset($item->TAP_URL) }}">Tải phim 1080p</a></li>
                            @endif
                            @php
                                $count++
                            @endphp

                        @endforeach
                    </ul>
                </li>
                <!-- end tải xuống-->

            </div>
            @else
            <!-- suggest -->
            <div class="col-12 col-xl-6">
                <div >
                    <div class="price__item price__item--first">
                        <span>Bạn chưa thể xem phim này, hãy mua gói xem để thưởng thức: </span>

                    </div>
                    <div class="price__item "><span>Chất lượng</span> <span>480p, 720p, 1080p</span></div>
                    <div class="price__item"><span>Loại phim</span> <span>Phim điện ảnh, phim truyền hình</span></div>
                    <div class="price__item"><span>Hỗ trợ</span> <span>24/7</span></div>
                    <a href="{{ route('pricing') }}" class="price__btn">Mua gói xem phim</a>
                </div>
            </div>
            <!-- end suggest  -->
            @endif
            {{--  CHỖ NÀY SẼ THÊM ĐIỀU KIỆN ĐÃ ĐĂNG NHẬP VÀ MUA GÓI CHƯA ============================================================================================ --}}
            <!-- end player -->

        </div>
        @if($goiXemPhim>0)
        <section class="content"">
            {{--  paginator  --}}
            @if ($tapPhim->total()/$goiXemPhim>1)
            <div class="col-12">
                <div class="card__content">
                    <h1 style="color: white">Số tập: {{$tapPhim->total()/$goiXemPhim}}</h1>
                </div>
                <ul class="card-header" >
                @for ($i=0;$i<$tapPhim->total()/$goiXemPhim;$i++)
                    @if ($tapPhim->currentPage()==$i+1)
                    <li style="float: left" class="paginator__item paginator__item--active"">
                        <a href="
                        {{$tapPhim->url($i+1)}}

                        ">
                        {{$i+1}}</a>
                    </li>
                    @else
                    <li style="float: left" class="paginator__item">
                        <a href="
                        {{$tapPhim->url($i+1)}}

                        ">
                        {{$i+1}}</a>
                    </li>
                    @endif
                @endfor
                </ul>
            </div>
            {{-- end paginator --}}

            @endif
            </section>
            <!-- end details content -->
        </section>
        @endif

    </div>

    <!-- end details -->




<!-- content -->
@include('users.elements.content-detail')
<!-- end content -->

@endsection
