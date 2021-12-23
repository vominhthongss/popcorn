<section class="section section--bg" >
    {{-- data-bg="{{ asset('asset/img/section/section.jpg') }}" --}}
    <div class="container">
        <div class="row">
            <!-- section title -->
            <div class="col-12">
                <h2 class="section__title">Sắp ra mắt</h2>
            </div>
            <!-- end section title -->

            <!-- card -->
            @foreach ($phimSapRaMat as $item)
            <!-- card -->
            <div class="col-6 col-sm-12 col-lg-12">
                <div class="card card--list">
                    <div class="row">
                        <div class="col-12 col-sm-2">
                            <div class="card__cover">
                                <img src="{{ asset($item->PHIM_URLPOSTER) }}" alt="">
                                <a>
                                    <i ></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-12 col-sm-10">
                            <div class="card__content">
                                <h3 class="card__title">
                                    <a >
                                        {{$item->PHIM_TEN}}
                                    </a>
                                </h3>
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
            <!-- end card -->


            <!-- section btn -->
            <div class="col-12">
                <a href="#top" class="section__btn">Lên đầu trang</a>
            </div>
            <!-- end section btn -->
        </div>
    </div>
</section>
