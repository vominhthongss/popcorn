@extends('users.main')
@section('content')
@php
$soPhanTuTrongTrang=config('allparameters.soPhanTuTrongTrang')
@endphp
	<!-- page title -->
	<section class="section section--first section--bg" data-bg="{{ asset('asset/img/section/section.jpg') }}">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section__wrap">
						<!-- section title -->
						<h2 class="section__title">Danh mục phim</h2>
						<!-- end section title -->

						<!-- breadcrumb -->
						<ul class="breadcrumb">
							<li class="breadcrumb__item breadcrumb__item--active"><a href="{{ route('home') }}">Trở về trang chủ</a></li>
						</ul>
						<!-- end breadcrumb -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end page title -->

	<!-- filter -->
	@include('users.elements.filter')
	<!-- end filter -->

	<!-- catalog -->
	<div class="catalog">
		<div class="container">
            {{--  số phần tử trong trang  --}}

            {{--  dạng gridview  --}}
			<div id="gridview" class="row">
				<!-- card -->
                @foreach ($catalogPhim as $item)

				<div class="col-6 col-sm-4 col-lg-3 col-xl-2">
					<div class="card">
						<div class="card__cover">
							<img src="{{ asset($item->PHIM_URLPOSTER) }}" alt="">
							<a href="{{ route('detail', ['phim_id'=>$item->PHIM_ID]) }}" class="card__play">
								<i class="icon ion-ios-play"></i>
							</a>
						</div>
						<div class="card__content">
							<h3 class="card__title">
                                <a href="{{ route('detail', ['phim_id'=>$item->PHIM_ID]) }}">
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
							<img class="imdb" src="{{ asset('asset/img/imdb.png') }}" alt="">
                            <span class="card__rate">
                                <b>{{$item->PHIM_DIEMIMDB}}</b>
                            </span>
						</div>
					</div>
				</div>
				<!-- end card -->
                @endforeach

                @if ($catalogPhim->total()>$soPhanTuTrongTrang)
                {{-- phân trang gridview  --}}
                <!-- paginator -->
                <div class="col-12">

                    <ul class="paginator">
                        <li class="paginator__item paginator__item--prev">
                            @if ($catalogPhim->currentPage()==1)
                            <a><i class="icon ion-ios-arrow-back"></i></a>

                            @else
                            <a href="{{$catalogPhim->appends(request()->input())->previousPageUrl()}}"><i class="icon ion-ios-arrow-back"></i></a>

                            @endif

                        </li>
                        @for ($i=0;$i<ceil($catalogPhim->total()/$soPhanTuTrongTrang);$i++)
                            @if ($catalogPhim->currentPage()==$i+1)
                            <li class="paginator__item paginator__item--active"">
                                <a href="#">{{$i+1}}</a>
                            </li>
                            @else
                            <li class="paginator__item">
                                <a href="{{$catalogPhim->appends(request()->input())->url($i+1)}}"> {{$i+1}} </a>
                            </li>
                            @endif
                        @endfor
                        <li class="paginator__item paginator__item--next">
                            @if ($catalogPhim->currentPage()==ceil($catalogPhim->total()/$soPhanTuTrongTrang))
                            <a><i class="icon ion-ios-arrow-forward"></i></a>

                            @else
                            <a href="{{$catalogPhim->appends(request()->input())->nextPageUrl()}}"><i class="icon ion-ios-arrow-forward"></i></a>

                            @endif
                        </li>
                    </ul>
                </div>
                <!-- end paginator -->
                 {{-- end phân trang gridview  --}}
                @endif

            </div>
            {{--  dạng listview  --}}
            <div id="listview" class="row"  style="display: none">

                @foreach ($catalogPhim as $item)
                <!-- card -->
				<div class="col-6 col-sm-12 col-lg-6">
					<div class="card card--list">
						<div class="row">
							<div class="col-12 col-sm-4">
								<div class="card__cover">
									<img src="{{ asset($item->PHIM_URLPOSTER) }}" alt="">
									<a href="{{ route('detail', ['phim_id'=>$item->PHIM_ID]) }}" class="card__play">
                                        <i class="icon ion-ios-play"></i>
                                    </a>
								</div>
							</div>

							<div class="col-12 col-sm-8">
								<div class="card__content" style="overflow: auto;">
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
                                        <p >
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

                @if ($catalogPhim->total()>$soPhanTuTrongTrang)
                {{--  phân trang listview  --}}
                <!-- paginator -->
                <div class="col-12">

                    <ul class="paginator">
                        <li class="paginator__item paginator__item--prev">
                            @if ($catalogPhim->currentPage()==1)
                            <a><i class="icon ion-ios-arrow-back"></i></a>

                            @else
                            <a href="{{$catalogPhim->appends(request()->input())->previousPageUrl()}}"><i class="icon ion-ios-arrow-back"></i></a>

                            @endif


                        </li>
                        @for ($i=0;$i<ceil($catalogPhim->total()/$soPhanTuTrongTrang);$i++)
                            @if ($catalogPhim->currentPage()==$i+1)
                            <li class="paginator__item paginator__item--active"">
                                <a href="#">{{$i+1}}</a>
                            </li>
                            @else
                            <li class="paginator__item">
                                <a href="{{$catalogPhim->appends(request()->input())->url($i+1)}}"> {{$i+1}} </a>
                            </li>
                            @endif
                        @endfor
                        <li class="paginator__item paginator__item--next">
                            @if ($catalogPhim->currentPage()==ceil($catalogPhim->total()/$soPhanTuTrongTrang))
                            <a><i class="icon ion-ios-arrow-forward"></i></a>

                            @else
                            <a href="{{$catalogPhim->appends(request()->input())->nextPageUrl()}}"><i class="icon ion-ios-arrow-forward"></i></a>

                            @endif
                        </li>
                    </ul>
                </div>
                <!-- end paginator -->
                {{-- end phân trang listview  --}}
                @endif

            </div>
		</div>
	</div>
	<!-- end catalog -->


@endsection
