@php
$soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang2')
@endphp
<section class="content" id="focusme">
    <div class="content__head">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <!-- content title -->
                    <h2 class="content__title">Bình luận và đánh giá phim</h2>
                    <!-- end content title -->
                    {{--  @include('users.elements.alertreview')  --}}
                    @php
                        $count=0
                    @endphp
                    @if (Cookie::get('id'))
                        @if($soDanhGia>0)
                            @foreach ($danhGia as $item)
                                @if(Cookie::get('id')==$item->THANHVIEN_ID)
                                    @php
                                    $count=$count+1
                                    @endphp
                                    <span class="card__category">
                                        <a href="#review2" class=" open-modal"> Xem đánh giá của bạn</a>
                                    </span>
                                    <div id="review2" class="zoom-anim-dialog mfp-hide modal">
                                    <h6 class="modal__title"> Đánh giá của bạn </h6>

                                        {{--===========================================QUAN TRỌNG===================================--}}
                                        <form action="{{ route('editreview') }}" class="form" method="POST">
                                        {{--===========================================QUAN TRỌNG===================================--}}
                                            @csrf
                                            <div class="rating">
                                                @if($item->DANHGIA_SOSAO==5.0)
                                                    <input type="radio" name="rating" value="5" id="5" checked>
                                                    <label for="5">☆</label>
                                                    <input type="radio" name="rating" value="4" id="4">
                                                    <label for="4">☆</label>
                                                    <input type="radio" name="rating" value="3" id="3">
                                                    <label for="3">☆</label>
                                                    <input type="radio" name="rating" value="2" id="2">
                                                    <label for="2">☆</label>
                                                    <input type="radio" name="rating" value="1" id="1" required>
                                                    <label for="1">☆</label>
                                                @elseif ($item->DANHGIA_SOSAO==4.0)
                                                    <input type="radio" name="rating" value="5" id="5">
                                                    <label for="5">☆</label>
                                                    <input type="radio" name="rating" value="4" id="4" checked>
                                                    <label for="4">☆</label>
                                                    <input type="radio" name="rating" value="3" id="3">
                                                    <label for="3">☆</label>
                                                    <input type="radio" name="rating" value="2" id="2">
                                                    <label for="2">☆</label>
                                                    <input type="radio" name="rating" value="1" id="1" required>
                                                    <label for="1">☆</label>
                                                @elseif ($item->DANHGIA_SOSAO==3.0)
                                                    <input type="radio" name="rating" value="5" id="5">
                                                    <label for="5">☆</label>
                                                    <input type="radio" name="rating" value="4" id="4">
                                                    <label for="4">☆</label>
                                                    <input type="radio" name="rating" value="3" id="3" checked>
                                                    <label for="3">☆</label>
                                                    <input type="radio" name="rating" value="2" id="2">
                                                    <label for="2">☆</label>
                                                    <input type="radio" name="rating" value="1" id="1" required>
                                                    <label for="1">☆</label>
                                                @elseif ($item->DANHGIA_SOSAO==2.0)
                                                    <input type="radio" name="rating" value="5" id="5">
                                                    <label for="5">☆</label>
                                                    <input type="radio" name="rating" value="4" id="4">
                                                    <label for="4">☆</label>
                                                    <input type="radio" name="rating" value="3" id="3">
                                                    <label for="3">☆</label>
                                                    <input type="radio" name="rating" value="2" id="2" checked>
                                                    <label for="2">☆</label>
                                                    <input type="radio" name="rating" value="1" id="1" required>
                                                    <label for="1">☆</label>
                                                @else
                                                    <input type="radio" name="rating" value="5" id="5">
                                                    <label for="5">☆</label>
                                                    <input type="radio" name="rating" value="4" id="4">
                                                    <label for="4">☆</label>
                                                    <input type="radio" name="rating" value="3" id="3">
                                                    <label for="3">☆</label>
                                                    <input type="radio" name="rating" value="2" id="2">
                                                    <label for="2">☆</label>
                                                    <input type="radio" name="rating" value="1" id="1" checked required>
                                                    <label for="1">☆</label>
                                                @endif
                                            </div>
                                            <textarea class="form__textarea" name="review" placeholder="Hãy cho PopCorn biết ý kiến của bạn về phim này :D" required>{{$item->DANHGIA_NOIDUNG}}</textarea>

                                            <input type="hidden" name="userid" value="{{Cookie::get('id')}}">

                                            @foreach ($thongTinPhim as $item)
                                            <input type="hidden" name="filmid" value="{{$item->PHIM_ID}}">
                                            @endforeach
                                            <div class="modal__btns">
                                                <button class="modal__btn modal__btn--apply" type="submit()" >Đánh giá</button>
                                                <button class="modal__btn modal__btn--dismiss" type="button">Đóng</button>
                                            </div>
                                        </form>
                                        <form action="{{ route('deletereview') }}" class="form" method="POST">
                                            @csrf
                                            <input type="hidden" name="userid" value="{{Cookie::get('id')}}">
                                            @foreach ($thongTinPhim as $item)
                                            <input type="hidden" name="filmid" value="{{$item->PHIM_ID}}">
                                            @endforeach
                                            <button type="submit()" class="infodelete"><i class="icon ion-ios-trash">
                                            </i> Xóa đánh giá</button >
                                        </form>

                                        {{--===========================================QUAN TRỌNG===================================--}}
                                    </div>
                                    @break

                                @endif

                            @endforeach
                            @if($count==0 && $goiXemPhim>0)
                                <span class="card__category">
                                <a href="#review" class=" open-modal">Viết đánh giá của bạn</a>
                                </span>
                            @endif
                        @elseif($goiXemPhim>0)
                        <span class="card__category">
                        <a href="#review" class=" open-modal">Hãy là người đánh giá đầu tiên</a>
                        </span>
                        @endif
                    @else
                    <span class="card__category">
                    <a href="{{ route('signin') }}">Hãy đăng nhập để đánh giá</a>
                    </span>
                    @endif

                    <!-- modal writing review -->
                    @include('users.elements.writingreview')
                    <!-- end modal writing review -->

                    <!-- content tabs nav -->
                    <ul class="nav nav-tabs content__tabs" id="content__tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">
                                Tất cả
                                (
                                @if ($soDanhGia_TatCa>0)
                                    {{$soDanhGia_TatCa}}
                                @else
                                0
                                @endif
                                )
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">5 sao
                                    (
                                    @if ($soDanhGia_5sao>0)
                                        {{$soDanhGia_5sao}}
                                    @else
                                    0
                                    @endif
                                    )
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">4 sao
                                    (
                                    @if ($soDanhGia_4sao>0)
                                        {{$soDanhGia_4sao}}
                                    @else
                                    0
                                    @endif
                                    )

                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-4" role="tab" aria-controls="tab-4" aria-selected="false">3 sao
                                    (
                                    @if ($soDanhGia_3sao>0)
                                        {{$soDanhGia_3sao}}
                                    @else
                                    0
                                    @endif
                                    )

                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-5" role="tab" aria-controls="tab-5" aria-selected="false">2 sao
                                    (
                                    @if ($soDanhGia_2sao>0)
                                        {{$soDanhGia_2sao}}
                                    @else
                                    0
                                    @endif
                                    )

                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-6" role="tab" aria-controls="tab-6" aria-selected="false">1 sao
                                    (
                                    @if ($soDanhGia_1sao>0)
                                        {{$soDanhGia_1sao}}
                                    @else
                                    0
                                    @endif
                                    )

                            </a>
                        </li>




                    </ul>
                    <!-- end content tabs nav -->
                    <!-- content mobile tabs nav -->
                    <div class="content__mobile-tabs" id="content__mobile-tabs">
                        <div class="content__mobile-tabs-btn dropdown-toggle" role="navigation" id="mobile-tabs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span></span>
                        </div>

                        <div class="content__mobile-tabs-menu dropdown-menu" aria-labelledby="mobile-tabs">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item"><a class="nav-link active" id="1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">
                                    Tất cả
                                </a>
                                </li>

                                <li class="nav-item"><a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">
                                    5 sao
                                </a>
                                </li>

                                <li class="nav-item"><a class="nav-link" id="3-tab" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">
                                    4 sao
                                </a>
                                </li>
                                <li class="nav-item"><a class="nav-link" id="4-tab" data-toggle="tab" href="#tab-4" role="tab" aria-controls="tab-3" aria-selected="false">
                                    3 sao
                                </a>
                                </li>
                                <li class="nav-item"><a class="nav-link" id="5-tab" data-toggle="tab" href="#tab-5" role="tab" aria-controls="tab-3" aria-selected="false">
                                    2 sao
                                </a>
                                </li>
                                <li class="nav-item"><a class="nav-link" id="6-tab" data-toggle="tab" href="#tab-6" role="tab" aria-controls="tab-3" aria-selected="false">
                                    1 sao
                                </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- end content mobile tabs nav -->

                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8 col-xl-8">
                @php
                    $chuaCoDanhGia="Chưa có đánh giá nào"

                @endphp

                <!-- content tabs -->
                <div class="tab-content" id="myTabContent">
                    {{--================================TAB1=================TẤT CẢ  --}}
                    <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
                        <div class="row">
                            <!-- reviews -->
                            <div class="col-12">
                                <div class="reviews">
                                    <ul class="reviews__list">

                                        @if ($soDanhGia_TatCa>0)
                                            @foreach ($danhGia_TatCa as $item)

                                                <li class="reviews__item">
                                                    <div class="reviews__autor">
                                                        {{--1  Ảnh đại diện  --}}
                                                        <img class="reviews__avatar" src="{{ asset($item->THANHVIEN_ANHDAIDIEN) }}" alt="">
                                                        {{--  2 Họ tên  --}}
                                                        <span class="reviews__name">{{$item->THANHVIEN_HOTEN}}</span>

                                                        {{--  3 Thời gian  --}}
                                                        <span class="reviews__time">
                                                            {{--  {{$item->DANHGIA_NGAYGIO}}  --}}
                                                            Được đánh giá vào ngày {{date('d/m/Y H:i:s', strtotime($item->DANHGIA_NGAYGIO))}}
                                                        </span>


                                                        {{--  4 số sao --}}
                                                        <span class="reviews__rating"><i class="icon ion-ios-star"></i>{{$item->DANHGIA_SOSAO}}</span>

                                                    </div>

                                                    <p class="reviews__text">
                                                        {{--  5 nội dung đánh giá  --}}
                                                        {{$item->DANHGIA_NOIDUNG}}

                                                    </p>
                                                    @include('users.elements.reportreview')
                                                </li>


                                            @endforeach
                                        @else
                                        <h2 class="content__title">{{$chuaCoDanhGia}}</h2>
                                        @endif

                                    </ul>


                                    {{-- phân trang tất cả --}}
                                        @if ($danhGia_TatCa->total()>$soPhanTuTrongTrang)
                                        <!-- paginator -->
                                        <div class="col-12">

                                            <ul class="paginator">
                                                <li class="paginator__item paginator__item--prev">
                                                    @if ($danhGia_TatCa->currentPage()==1)
                                                    <a><i class="icon ion-ios-arrow-back"></i></a>

                                                    @else
                                                    <a href="{{$danhGia_TatCa->appends(request()->input())->previousPageUrl()}}"><i class="icon ion-ios-arrow-back"></i></a>

                                                    @endif

                                                </li>
                                                @for ($i=0;$i<round($danhGia_TatCa->total()/$soPhanTuTrongTrang);$i++)
                                                    @if ($danhGia_TatCa->currentPage()==$i+1)
                                                    <li class="paginator__item paginator__item--active"">
                                                        <a href="#">{{$i+1}}</a>
                                                    </li>
                                                    @else
                                                    <li class="paginator__item">
                                                        <a href="{{$danhGia_TatCa->appends(request()->input())->url($i+1)}}"> {{$i+1}} </a>
                                                    </li>
                                                    @endif
                                                @endfor
                                                <li class="paginator__item paginator__item--next">
                                                    @if ($danhGia_TatCa->currentPage()==round($danhGia_TatCa->total()/$soPhanTuTrongTrang))
                                                    <a><i class="icon ion-ios-arrow-forward"></i></a>

                                                    @else
                                                    <a href="{{$danhGia_TatCa->appends(request()->input())->nextPageUrl()}}"><i class="icon ion-ios-arrow-forward"></i></a>

                                                    @endif
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- end paginator -->

                                        @endif
                                    {{-- end phân trang tất cả  --}}

                                </div>
                            </div>
                            <!-- end reviews -->
                        </div>
                    </div>
                    {{--================================TAB2=================5 SAO  --}}
                    <div class="tab-pane fade show" id="tab-2" role="tabpanel" aria-labelledby="2-tab">
                        <div class="row">
                            <!-- reviews -->
                            <div class="col-12">
                                <div class="reviews">
                                    <ul class="reviews__list">

                                        @if ($soDanhGia_5sao>0)
                                            @foreach ($danhGia_5sao as $item)
                                                <li class="reviews__item">
                                                    <div class="reviews__autor">
                                                        {{--1  Ảnh đại diện  --}}
                                                        <img class="reviews__avatar" src="{{ asset($item->THANHVIEN_ANHDAIDIEN) }}" alt="">
                                                        {{--  2 Họ tên  --}}
                                                        <span class="reviews__name">{{$item->THANHVIEN_HOTEN}}</span>
                                                        {{--  3 Thời gian  --}}
                                                        <span class="reviews__time">
                                                        Được đánh giá vào ngày {{date('d/m/Y H:i:s', strtotime($item->DANHGIA_NGAYGIO))}}
                                                        </span>
                                                        {{--  4 số sao --}}
                                                        <span class="reviews__rating"><i class="icon ion-ios-star"></i>{{$item->DANHGIA_SOSAO}}</span>
                                                    </div>
                                                    <p class="reviews__text">
                                                        {{--  5 nội dung đánh giá  --}}
                                                        {{$item->DANHGIA_NOIDUNG}}
                                                    </p>
                                                    @include('users.elements.reportreview')
                                                </li>
                                            @endforeach
                                        @else
                                        <h2 class="content__title">{{$chuaCoDanhGia}}</h2>
                                        @endif

                                    </ul>
                                {{-- phân trang 5 sao --}}
                                    @if ($danhGia_5sao->total()>$soPhanTuTrongTrang)
                                    <!-- paginator -->
                                    <div class="col-12">

                                        <ul class="paginator">
                                            <li class="paginator__item paginator__item--prev">
                                                @if ($danhGia_5sao->currentPage()==1)
                                                <a><i class="icon ion-ios-arrow-back"></i></a>

                                                @else
                                                <a href="{{$danhGia_5sao->appends(request()->input())->previousPageUrl()}}"><i class="icon ion-ios-arrow-back"></i></a>

                                                @endif

                                            </li>
                                            @for ($i=0;$i<round($danhGia_5sao->total()/$soPhanTuTrongTrang);$i++)
                                                @if ($danhGia_5sao->currentPage()==$i+1)
                                                <li class="paginator__item paginator__item--active"">
                                                    <a href="#">{{$i+1}}</a>
                                                </li>
                                                @else
                                                <li class="paginator__item">
                                                    <a href="{{$danhGia_5sao->appends(request()->input())->url($i+1)}}"> {{$i+1}} </a>
                                                </li>
                                                @endif
                                            @endfor
                                            <li class="paginator__item paginator__item--next">
                                                @if ($danhGia_5sao->currentPage()==round($danhGia_5sao->total()/$soPhanTuTrongTrang))
                                                <a><i class="icon ion-ios-arrow-forward"></i></a>

                                                @else
                                                <a href="{{$danhGia_5sao->appends(request()->input())->nextPageUrl()}}"><i class="icon ion-ios-arrow-forward"></i></a>

                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- end paginator -->

                                    @endif
                                {{-- end phân trang 5 sao  --}}
                                </div>
                            </div>
                            <!-- end reviews -->
                        </div>
                    </div>
                    {{--================================TAB3================= 4 SAO --}}
                    <div class="tab-pane fade show" id="tab-3" role="tabpanel" aria-labelledby="3-tab">
                        <div class="row">
                            <!-- reviews -->
                            <div class="col-12">
                                <div class="reviews">
                                    <ul class="reviews__list">

                                        @if ($soDanhGia_4sao>0)
                                            @foreach ($danhGia_4sao as $item)
                                                <li class="reviews__item">
                                                    <div class="reviews__autor">
                                                        {{--1  Ảnh đại diện  --}}
                                                        <img class="reviews__avatar" src="{{ asset($item->THANHVIEN_ANHDAIDIEN) }}" alt="">
                                                        {{--  2 Họ tên  --}}
                                                        <span class="reviews__name">{{$item->THANHVIEN_HOTEN}}</span>
                                                        {{--  3 Thời gian  --}}
                                                        <span class="reviews__time">
                                                            Được đánh giá vào ngày {{date('d/m/Y H:i:s', strtotime($item->DANHGIA_NGAYGIO))}}
                                                            </span>
                                                        {{--  4 số sao --}}
                                                        <span class="reviews__rating"><i class="icon ion-ios-star"></i>{{$item->DANHGIA_SOSAO}}</span>
                                                    </div>
                                                    <p class="reviews__text">
                                                        {{--  5 nội dung đánh giá  --}}
                                                        {{$item->DANHGIA_NOIDUNG}}
                                                    </p>
                                                    @include('users.elements.reportreview')
                                                </li>
                                            @endforeach
                                        @else
                                            <h2 class="content__title">{{$chuaCoDanhGia}}</h2>
                                        @endif

                                    </ul>
                                {{-- phân trang 4 sao --}}
                                    @if ($danhGia_4sao->total()>$soPhanTuTrongTrang)
                                    <!-- paginator -->
                                    <div class="col-12">

                                        <ul class="paginator">
                                            <li class="paginator__item paginator__item--prev">
                                                @if ($danhGia_4sao->currentPage()==1)
                                                <a><i class="icon ion-ios-arrow-back"></i></a>

                                                @else
                                                <a href="{{$danhGia_4sao->appends(request()->input())->previousPageUrl()}}"><i class="icon ion-ios-arrow-back"></i></a>

                                                @endif

                                            </li>
                                            @for ($i=0;$i<round($danhGia_4sao->total()/$soPhanTuTrongTrang);$i++)
                                                @if ($danhGia_4sao->currentPage()==$i+1)
                                                <li class="paginator__item paginator__item--active"">
                                                    <a href="#">{{$i+1}}</a>
                                                </li>
                                                @else
                                                <li class="paginator__item">
                                                    <a href="{{$danhGia_4sao->appends(request()->input())->url($i+1)}}"> {{$i+1}} </a>
                                                </li>
                                                @endif
                                            @endfor
                                            <li class="paginator__item paginator__item--next">
                                                @if ($danhGia_4sao->currentPage()==round($danhGia_4sao->total()/$soPhanTuTrongTrang))
                                                <a><i class="icon ion-ios-arrow-forward"></i></a>

                                                @else
                                                <a href="{{$danhGia_4sao->appends(request()->input())->nextPageUrl()}}"><i class="icon ion-ios-arrow-forward"></i></a>

                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- end paginator -->

                                    @endif
                                {{-- end phân trang 4 sao  --}}
                                </div>
                            </div>
                            <!-- end reviews -->
                        </div>
                    </div>
                    {{--================================TAB4================= 3 SAO --}}
                    <div class="tab-pane fade show" id="tab-4" role="tabpanel" aria-labelledby="4-tab">
                        <div class="row">
                            <!-- reviews -->
                            <div class="col-12">
                                <div class="reviews">
                                    <ul class="reviews__list">

                                        @if ($soDanhGia_3sao>0)
                                            @foreach ($danhGia_3sao as $item)
                                                <li class="reviews__item">
                                                    <div class="reviews__autor">
                                                        {{--1  Ảnh đại diện  --}}
                                                        <img class="reviews__avatar" src="{{ asset($item->THANHVIEN_ANHDAIDIEN) }}" alt="">
                                                        {{--  2 Họ tên  --}}
                                                        <span class="reviews__name">{{$item->THANHVIEN_HOTEN}}</span>
                                                        {{--  3 Thời gian  --}}
                                                        <span class="reviews__time">
                                                            Được đánh giá vào ngày {{date('d/m/Y H:i:s', strtotime($item->DANHGIA_NGAYGIO))}}
                                                            </span>
                                                        {{--  4 số sao --}}
                                                        <span class="reviews__rating"><i class="icon ion-ios-star"></i>{{$item->DANHGIA_SOSAO}}</span>
                                                    </div>
                                                    <p class="reviews__text">
                                                        {{--  5 nội dung đánh giá  --}}
                                                        {{$item->DANHGIA_NOIDUNG}}
                                                    </p>
                                                    @include('users.elements.reportreview')
                                                </li>
                                            @endforeach
                                        @else
                                            <h2 class="content__title">{{$chuaCoDanhGia}}</h2>
                                        @endif
                                    </ul>

                                {{-- phân trang 3 sao --}}
                                    @if ($danhGia_3sao->total()>$soPhanTuTrongTrang)
                                    <!-- paginator -->
                                    <div class="col-12">

                                        <ul class="paginator">
                                            <li class="paginator__item paginator__item--prev">
                                                @if ($danhGia_3sao->currentPage()==1)
                                                <a><i class="icon ion-ios-arrow-back"></i></a>

                                                @else
                                                <a href="{{$danhGia_3sao->appends(request()->input())->previousPageUrl()}}"><i class="icon ion-ios-arrow-back"></i></a>

                                                @endif

                                            </li>
                                            @for ($i=0;$i<round($danhGia_3sao->total()/$soPhanTuTrongTrang);$i++)
                                                @if ($danhGia_3sao->currentPage()==$i+1)
                                                <li class="paginator__item paginator__item--active"">
                                                    <a href="#">{{$i+1}}</a>
                                                </li>
                                                @else
                                                <li class="paginator__item">
                                                    <a href="{{$danhGia_3sao->appends(request()->input())->url($i+1)}}"> {{$i+1}} </a>
                                                </li>
                                                @endif
                                            @endfor
                                            <li class="paginator__item paginator__item--next">
                                                @if ($danhGia_3sao->currentPage()==round($danhGia_4sao->total()/$soPhanTuTrongTrang))
                                                <a><i class="icon ion-ios-arrow-forward"></i></a>

                                                @else
                                                <a href="{{$danhGia_3sao->appends(request()->input())->nextPageUrl()}}"><i class="icon ion-ios-arrow-forward"></i></a>

                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- end paginator -->

                                    @endif
                                {{-- end phân trang 3 sao  --}}
                                </div>
                            </div>
                            <!-- end reviews -->
                        </div>
                    </div>
                    {{--================================TAB5================= 2 SAO --}}
                    <div class="tab-pane fade show" id="tab-5" role="tabpanel" aria-labelledby="5-tab">
                        <div class="row">
                            <!-- reviews -->
                            <div class="col-12">
                                <div class="reviews">
                                    <ul class="reviews__list">

                                        @if ($soDanhGia_2sao>0)
                                            @foreach ($danhGia_2sao as $item)
                                                <li class="reviews__item">
                                                    <div class="reviews__autor">
                                                        {{--1  Ảnh đại diện  --}}
                                                        <img class="reviews__avatar" src="{{ asset($item->THANHVIEN_ANHDAIDIEN) }}" alt="">
                                                        {{--  2 Họ tên  --}}
                                                        <span class="reviews__name">{{$item->THANHVIEN_HOTEN}}</span>
                                                        {{--  3 Thời gian  --}}
                                                        <span class="reviews__time">
                                                            Được đánh giá vào ngày {{date('d/m/Y H:i:s', strtotime($item->DANHGIA_NGAYGIO))}}
                                                            </span>
                                                        {{--  4 số sao --}}
                                                        <span class="reviews__rating"><i class="icon ion-ios-star"></i>{{$item->DANHGIA_SOSAO}}</span>
                                                    </div>
                                                    <p class="reviews__text">
                                                        {{--  5 nội dung đánh giá  --}}
                                                        {{$item->DANHGIA_NOIDUNG}}
                                                    </p>
                                                    @include('users.elements.reportreview')
                                                </li>
                                            @endforeach
                                        @else
                                            <h2 class="content__title">{{$chuaCoDanhGia}}</h2>
                                        @endif

                                    </ul>
                                {{-- phân trang 2 sao --}}
                                    @if ($danhGia_2sao->total()>$soPhanTuTrongTrang)
                                    <!-- paginator -->
                                    <div class="col-12">

                                        <ul class="paginator">
                                            <li class="paginator__item paginator__item--prev">
                                                @if ($danhGia_2sao->currentPage()==1)
                                                <a><i class="icon ion-ios-arrow-back"></i></a>

                                                @else
                                                <a href="{{$danhGia_2sao->appends(request()->input())->previousPageUrl()}}"><i class="icon ion-ios-arrow-back"></i></a>

                                                @endif

                                            </li>
                                            @for ($i=0;$i<round($danhGia_2sao->total()/$soPhanTuTrongTrang);$i++)
                                                @if ($danhGia_2sao->currentPage()==$i+1)
                                                <li class="paginator__item paginator__item--active"">
                                                    <a href="#">{{$i+1}}</a>
                                                </li>
                                                @else
                                                <li class="paginator__item">
                                                    <a href="{{$danhGia_2sao->appends(request()->input())->url($i+1)}}"> {{$i+1}} </a>
                                                </li>
                                                @endif
                                            @endfor
                                            <li class="paginator__item paginator__item--next">
                                                @if ($danhGia_2sao->currentPage()==round($danhGia_4sao->total()/$soPhanTuTrongTrang))
                                                <a><i class="icon ion-ios-arrow-forward"></i></a>

                                                @else
                                                <a href="{{$danhGia_2sao->appends(request()->input())->nextPageUrl()}}"><i class="icon ion-ios-arrow-forward"></i></a>

                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- end paginator -->

                                    @endif
                                {{-- end phân trang 2 sao  --}}
                                </div>
                            </div>
                            <!-- end reviews -->
                        </div>
                    </div>
                    {{--================================TAB6================= 1 SAO  --}}
                    <div class="tab-pane fade show" id="tab-6" role="tabpanel" aria-labelledby="6-tab">
                        <div class="row">
                            <!-- reviews -->
                            <div class="col-12">
                                <div class="reviews">
                                    <ul class="reviews__list">

                                        @if ($soDanhGia_1sao>0)
                                            @foreach ($danhGia_1sao as $item)
                                                <li class="reviews__item">
                                                    <div class="reviews__autor">
                                                        {{--1  Ảnh đại diện  --}}
                                                        <img class="reviews__avatar" src="{{ asset($item->THANHVIEN_ANHDAIDIEN) }}" alt="">
                                                        {{--  2 Họ tên  --}}
                                                        <span class="reviews__name">{{$item->THANHVIEN_HOTEN}}</span>
                                                        {{--  3 Thời gian  --}}
                                                        <span class="reviews__time">
                                                            Được đánh giá vào ngày {{date('d/m/Y H:i:s', strtotime($item->DANHGIA_NGAYGIO))}}
                                                            </span>
                                                        {{--  4 số sao --}}
                                                        <span class="reviews__rating"><i class="icon ion-ios-star"></i>{{$item->DANHGIA_SOSAO}}</span>
                                                    </div>
                                                    <p class="reviews__text">
                                                        {{--  5 nội dung đánh giá  --}}
                                                        {{$item->DANHGIA_NOIDUNG}}
                                                    </p>
                                                    @include('users.elements.reportreview')
                                                </li>
                                            @endforeach
                                        @else
                                            <h2 class="content__title">{{$chuaCoDanhGia}}</h2>
                                        @endif

                                    </ul>
                                {{-- phân trang 1 sao --}}
                                    @if ($danhGia_1sao->total()>$soPhanTuTrongTrang)
                                    <!-- paginator -->
                                    <div class="col-12">

                                        <ul class="paginator">
                                            <li class="paginator__item paginator__item--prev">
                                                @if ($danhGia_1sao->currentPage()==1)
                                                <a><i class="icon ion-ios-arrow-back"></i></a>

                                                @else
                                                <a href="{{$danhGia_1sao->appends(request()->input())->previousPageUrl()}}"><i class="icon ion-ios-arrow-back"></i></a>

                                                @endif

                                            </li>
                                            @for ($i=0;$i<round($danhGia_1sao->total()/$soPhanTuTrongTrang);$i++)
                                                @if ($danhGia_1sao->currentPage()==$i+1)
                                                <li class="paginator__item paginator__item--active"">
                                                    <a href="#">{{$i+1}}</a>
                                                </li>
                                                @else
                                                <li class="paginator__item">
                                                    <a href="{{$danhGia_1sao->appends(request()->input())->url($i+1)}}"> {{$i+1}} </a>
                                                </li>
                                                @endif
                                            @endfor
                                            <li class="paginator__item paginator__item--next">
                                                @if ($danhGia_1sao->currentPage()==round($danhGia_4sao->total()/$soPhanTuTrongTrang))
                                                <a><i class="icon ion-ios-arrow-forward"></i></a>

                                                @else
                                                <a href="{{$danhGia_1sao->appends(request()->input())->nextPageUrl()}}"><i class="icon ion-ios-arrow-forward"></i></a>

                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- end paginator -->

                                    @endif
                                {{-- end phân trang 1 sao  --}}
                                </div>
                            </div>
                            <!-- end reviews -->
                        </div>
                    </div>

                </div>
                <!-- end content tabs -->
            </div>

            {{--  Gợi ý các bộ phim có thể người dùng thích  --}}
            <!-- sidebar -->
            @include('users.elements.sidebar')
            <!-- end sidebar -->
        </div>
    </div>
</section>
