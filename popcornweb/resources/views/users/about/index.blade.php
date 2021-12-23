@extends('users.main')
@section('content')
	<!-- page title -->
	<section class="section section--first section--bg" data-bg="{{ asset('asset/img/section/section.jpg') }}">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section__wrap">
						<!-- section title -->
						<h2 class="section__title">Thông tin thêm</h2>
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

	<!-- about -->
	<section class="section">
		<div class="container">
			<div class="row">
				<!-- section title -->
				<div class="col-12">
					<h2 class="section__title"><b>POPCORN</b> – Nơi tốt cho các bộ phim tốt nhất</h2>
				</div>
				<!-- end section title -->

				<!-- section text -->
				<div class="col-12">
					<p class="section__text">
                        Một thực tế đã có từ lâu rằng người đọc sẽ bị phân tâm bởi nội dung có thể đọc được của một trang khi nhìn vào bố cục của nó. Điểm của việc sử dụng video là nó có sự phân bố các chữ cái bình thường ít nhiều, trái ngược với việc sử dụng.
                    </p>

					<p class="section__text section__text--last-with-margin">
                        'Nội dung ở đây, nội dung ở đây', làm cho nó giống như tiếng Anh có thể đọc được. Nhiều gói xuất bản dành cho máy tính để bàn và trình chỉnh sửa trang web hiện sử dụng video làm văn bản mẫu mặc định của họ và việc tìm kiếm video sẽ phát hiện ra nhiều trang web vẫn còn sơ khai. Nhiều phiên bản khác nhau đã phát triển trong nhiều năm, đôi khi là do tình cờ, đôi khi là có chủ đích (thêm vào đó là sự hài hước và những thứ tương tự).
                    </p>
				</div>
				<!-- end section text -->

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
	<!-- end about -->

	<!-- how it works -->
	<section class="section section--dark">
		<div class="container">
			<div class="row">
				<!-- section title -->
				<div class="col-12">
					<h2 class="section__title section__title--no-margin">Làm thế nào để thưởng thức các bộ phim bạn muốn xem?</h2>
				</div>
				<!-- end section title -->

				<!-- how box -->
				<div class="col-12 col-md-6 col-lg-4">
					<div class="how">
						<span class="how__number">01</span>
						<h3 class="how__title">Tạo tài khoản</h3>
						<p class="how__text">Không mất nhiều thời gian và đặt biệt có thể lưu lại các bộ phim bạn thích.</p>
					</div>
				</div>
				<!-- ebd how box -->

				<!-- how box -->
				<div class="col-12 col-md-6 col-lg-4">
					<div class="how">
						<span class="how__number">02</span>
						<h3 class="how__title">Chọn gói xem phim</h3>
						<p class="how__text">Có nhiều gói để bạn lựa chọn và đáng cân nhắc</p>
					</div>
				</div>
				<!-- ebd how box -->

				<!-- how box -->
				<div class="col-12 col-md-6 col-lg-4">
					<div class="how">
						<span class="how__number">03</span>
						<h3 class="how__title">Tận hưởng phim cùng PopCorn</h3>
						<p class="how__text">Thoải mái cùng những bộ phim mà không lo nghĩ</p>
					</div>
				</div>
				<!-- ebd how box -->
			</div>
		</div>
	</section>
	<!-- end how it works -->


@endsection
