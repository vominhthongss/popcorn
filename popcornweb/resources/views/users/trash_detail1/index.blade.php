@extends('users.main')
@section('content')
<!-- details -->
<section class="section details">
    <!-- details background -->
    @foreach ($thongTinPhim as $item)
    <div class="details__bg" data-bg="{{ asset($item->PHIM_URLPOSTER) }}"></div>
    @endforeach
    <!-- end details background -->

    <!-- details content -->
    <div class="container">
        <div class="row">

            <!-- title -->
            <div class="col-12">
                @foreach ($thongTinPhim as $item)
                <h1 class="details__title">{{$item->PHIM_TEN}}</h1>
                @endforeach
            </div>
            <!-- end title -->

            <!-- content -->
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
                                    <span class="card__rate"><i class="icon ion-ios-star"></i>
                                        {{$item->PHIM_DIEMIMDB}}
                                    </span>

                                    <ul class="card__list">
                                        <li>HD</li>
                                        {{--3  độ tuổi  --}}
                                        <li>{{$item->DOTUOI}}</li>
                                    </ul>
                                </div>

                                <ul class="card__meta">
                                    <li><span>Thể loại:</span>
                                        {{--4  thể loại  --}}
                                        @foreach ($theLoaiPhim as $item2)
                                            @if ($item2->PHIM_ID==$item->PHIM_ID)
                                                <a href="#">{{$item2->THELOAI}}</a>
                                            @endif
                                        @endforeach
                                    </li>
                                    {{--5  năm  --}}
                                    <li><span>Năm:</span>
                                        {{$item->NAM}}
                                    </li>
                                    {{--6  thời lượng  --}}
                                    <li><span>Thời lượng:</span>
                                        {{$item->PHIM_THOILUONG}}
                                    </li>
                                    {{--7  Quốc gia  --}}
                                    <li><span>Quốc gia:</span> <a href="#">
                                        {{$item->QUOCGIA}}
                                    </a> </li>
                                    <li><span>Diễn viên:</span>
                                        {{--8 diễn viên  --}}
                                        @foreach ($dienVien as $item3)
                                            @if ($item3->PHIM_ID==$item->PHIM_ID)
                                                <a href="#">{{$item3->DIENVIEN}}</a>
                                            @endif
                                        @endforeach

                                    </li>
                                    {{--9  đạo diễn --}}
                                    <li><span>Đạo diễn:</span>
                                    @foreach ($daoDien as $item4)
                                        @if ($item4->PHIM_ID==$item->PHIM_ID)
                                            <a href="#">{{$item4->DAODIEN}}</a>
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

            <!-- end content -->

            <!-- player -->
            <div class="col-12 col-xl-6">
                <video controls crossorigin playsinline poster="../../../cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.jpg" id="player">
                    <!-- Video files -->
                    @foreach ($tapPhim as $item)


                    {{--11 video 480 720 1080  --}}
                    <source src="{{ asset($item->TAP_URL) }}" type="video/mp4" size="{{$item->CHATLUONG}}">

                    @endforeach

                    <!-- Caption files -->
                    {{--12phụ đề 1  --}}
                    <track kind="captions" label="English" srclang="en" src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.en.vtt" default>
                    {{--13 phụ đề 2  --}}
                    <track kind="captions" label="Français" srclang="fr" src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.fr.vtt">

                    <!-- Fallback for browsers that don't support the <video> element -->
                    {{--  Tải xuống  --}}
                    <a href="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4" download>Download</a>
                </video>

                <button onclick="playFullVid()" type="button">Full Video</button><br>

            </div>
            <!-- end player -->


        </div>
        <section class="content"">
            {{--  paginator  --}}
            @if ($tapPhim->total()/3>1)
            <div class="col-12">
                <div class="card__content">
                    <h1 style="color: white">Số tập: {{$tapPhim->total()/3}}</h1>
                </div>
                <ul class="card-header" >
                @for ($i=0;$i<$tapPhim->total()/3;$i++)
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
    </div>

    <!-- end details -->




<!-- content -->
@include('users.elements.content-detail')
<!-- end content -->

@endsection
