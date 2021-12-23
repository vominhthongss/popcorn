@extends('users.main')
@section('content')
@php
$goiXemPhim=session('goixemphim');
@endphp
	<!-- page title -->
	<section class="section section--first section--bg" data-bg="{{ asset('asset/img/section/section.jpg') }}">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section__wrap">
						<!-- section title -->
						<h2 class="section__title">Mua gói</h2>
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
	<!-- pricing -->
    @include('users.elements.alertpayment')
	<div class="section">
		<div class="container">
			<div class="row">
                @foreach ($loaigoi as $item)
                    <!-- price -->
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="price price--premium">
                                <div class="price__item price__item--first"><span>{{$item->LOAIGOI_TEN}}</span>
                                    @foreach ($giaGoi as $item2)
                                        @if ($item2->SOTHANG_DIENGIAI==$item->SOTHANG_DIENGIAI && $item2->CHATLUONG_DIENGIAI==$item->CHATLUONG_DIENGIAI)
                                            <span>{{number_format($item2->GIAGOI, 0, '', ',')}} VNĐ</span>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="price__item"><span>{{$item->SOTHANG_DIENGIAI}} tháng</span></div>
                                <div class="price__item"><span>{{$item->CHATLUONG_DIENGIAI}}p độ phân giải</span></div>

                                    @if ($item->CHATLUONG_DIENGIAI=="480")
                                    <div class="price__item"><span>Giới hạn phim</span></div>
                                    @else
                                    <div class="price__item"><span>Không giới hạn phim</span></div>
                                    @endif
                                <div class="price__item"><span>{{$item->LOAIGOI_THONGTIN}}</span></div>
                                    @if ($item->CHATLUONG_DIENGIAI=="480")
                                        <div class="price__item"><span>Giới hạn hỗ trợ</span></div>
                                    @else
                                        <div class="price__item"><span>Hỗ trợ 24/7</span></div>
                                    @endif
                                    <form action="{{ route('payment') }}" method="GET" class="col-12 col-md-6 col-lg-12">

                                    <input type="hidden" value="{{$item->LOAIGOI_ID}}" name="id">
                                    @foreach ($giaGoi as $item2)
                                        @if ($item2->SOTHANG_DIENGIAI==$item->SOTHANG_DIENGIAI && $item2->CHATLUONG_DIENGIAI==$item->CHATLUONG_DIENGIAI)
                                        <input type="hidden" value="{{$item2->GIAGOI}}" name="amount">
                                        @endif
                                    @endforeach
                                    @if(Cookie::get('id'))
                                        @if ($goiXemPhim==1 && $item->CHATLUONG_DIENGIAI=="480")
                                        <a href="{{ route('info') }}" class="price__btn2">Bạn đang sử dụng</a>
                                        @elseif ($goiXemPhim==2 && $item->CHATLUONG_DIENGIAI=="720")
                                        <a href="{{ route('info') }}" class="price__btn2">Bạn đang sử dụng</a>
                                        @elseif ($goiXemPhim==3 && $item->CHATLUONG_DIENGIAI=="1080")
                                        <a href="{{ route('info') }}" class="price__btn2">Bạn đang sử dụng</a>
                                        @else
                                            @if ($goiXemPhim!=0)
                                                @if ($goiXemPhim==1 && $item->CHATLUONG_DIENGIAI=="720" || $item->CHATLUONG_DIENGIAI=="1080")
                                                    <button type="submit()" class="price__btn">Nâng cấp</button>
                                                @elseif ($goiXemPhim==2 && $item->CHATLUONG_DIENGIAI=="1080")
                                                    <button type="submit()" class="price__btn">Nâng cấp</button>
                                                @endif

                                            @else
                                                <button type="submit()" class="price__btn">Chọn gói</button>
                                            @endif

                                        @endif
                                    @else
                                        <a href="{{ route('signin') }}" class="price__btn">Chọn gói</a>
                                    @endif
                                </form>
                        </div>
                    </div>
                    <!-- end price -->
                @endforeach
			</div>
		</div>
	</div>
	<!-- end pricing -->
	<!-- features -->
	<section class="section section--dark">
		<div class="container">
			<div class="row">
				<!-- section title -->
				<div class="col-12">
					<h2 class="section__title section__title--no-margin">Tính năng của PopCorn</h2>
				</div>
				<!-- end section title -->
				<!-- feature -->
				<div class="col-12 col-md-6 col-lg-4">
					<div class="feature">
						<i class="icon ion-ios-tv feature__icon"></i>
						<h3 class="feature__title">Full HD</h3>
						<p class="feature__text">
                            Full HD (hay còn gọi là FHD) là một chỉ số độ phân giải màn hình thông dụng trên các sản phẩm công nghệ như tivi, laptop, điện thoại. HD được viết tắt từ High Definition, thể hiện sự sắc nét, hiện thị cao.
                        </p>
					</div>
				</div>
				<!-- end feature -->
				<!-- feature -->
				<div class="col-12 col-md-6 col-lg-4">
					<div class="feature">
						<i class="icon ion-ios-film feature__icon"></i>
						<h3 class="feature__title">Film</h3>
						<p class="feature__text">Tất cả các bộ phim của chúng tôi đều được cấp phép bản quyền, nên bạn có thể tâm về vấn đề bản quyền</p>
					</div>
				</div>
				<!-- end feature -->
                <!-- feature -->
				<div class="col-12 col-md-6 col-lg-4">
					<div class="feature">
						<i class="icon ion-ios-globe feature__icon"></i>
						<h3 class="feature__title">Phụ đề </h3>
						<p class="feature__text">Đa dạng phụ đề với nhiều ngôn ngữ khác nhau, phụ hợp với các bạn có thể học thêm ngoại ngữ</p>
					</div>
				</div>
				<!-- end feature -->
			</div>
		</div>
	</section>
	<!-- end features -->
@endsection
