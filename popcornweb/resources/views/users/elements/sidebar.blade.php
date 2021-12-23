<div class="col-12 col-lg-4 col-xl-4">
    <div class="row">
        <!-- section title -->
        <div class="col-12">
            <h2 class="section__title section__title--sidebar">Có thể bạn sẽ thích...</h2>
        </div>
        <!-- end section title -->

        <!-- card -->
        @foreach ($phimDeXuat as $item)
        <div class="col-6 col-sm-4 col-lg-6">
            <div class="card">
                <div class="card__cover">
                    <img src="{{ asset($item->PHIM_URLPOSTER) }}" alt="">
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
