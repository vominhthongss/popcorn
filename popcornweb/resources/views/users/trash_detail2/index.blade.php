@extends('users.main')
@section('content')

	<!-- details -->
	<section class="section details">
        <!-- details background -->
		<div class="details__bg" data-bg="{{ asset('asset/img/home/home__bg.jpg') }}"></div>
		<!-- end details background -->

		<!-- details content -->
		<div class="container">
			<div class="row">
				<!-- title -->
				<div class="col-12">
					<h1 class="details__title">I Dream in Another Language</h1>
				</div>
				<!-- end title -->

				<!-- content -->
				<div class="col-12 col-xl-6">
					<div class="card card--details card--series">
						<div class="row">
							<!-- card cover -->
							<div class="col-12 col-sm-4 col-md-4 col-lg-3 col-xl-5">
								<div class="card__cover">
									<img src="{{ asset('asset/img/covers/cover.jpg') }}" alt="">
								</div>
							</div>
							<!-- end card cover -->

							<!-- card content -->
							<div class="col-12 col-sm-8 col-md-8 col-lg-9 col-xl-7">
								<div class="card__content">
									<div class="card__wrap">
										<span class="card__rate"><i class="icon ion-ios-star"></i>8.4</span>

										<ul class="card__list">
											<li>HD</li>
											<li>16+</li>
										</ul>
									</div>

									<ul class="card__meta">
										<li><span>Genre:</span> <a href="#">Action</a>
										<a href="#">Triler</a></li>
										<li><span>Release year:</span> 2017</li>
										<li><span>Running time:</span> 120 min</li>
										<li><span>Country:</span> <a href="#">USA</a> </li>
									</ul>

									<div class="card__description card__description--details">
								        Một thực tế đã được thiết lập từ lâu rằng người đọc sẽ bị phân tâm bởi nội dung có thể đọc được của một trang khi nhìn vào bố cục của nó.
                                        Điểm đáng chú ý của việc sử dụng Lorem Ipsum là nó có sự phân bố các chữ cái bình thường ít nhiều,
                                        trái ngược với việc sử dụng 'Nội dung ở đây, nội dung ở đây', khiến nó trông giống như tiếng Anh có thể đọc được.
                                        Nhiều gói xuất bản trên máy tính để bàn và trình chỉnh sửa trang web hiện sử dụng video làm văn bản mô hình mặc định của họ và tìm kiếm 'video' sẽ phát hiện ra nhiều trang web vẫn còn sơ khai. Nhiều phiên bản khác nhau đã phát triển trong nhiều năm, đôi khi là do tình cờ, đôi khi là có chủ đích (thêm vào đó là sự hài hước và những thứ tương tự).
                                    </div>
								</div>
							</div>
							<!-- end card content -->
						</div>
					</div>
				</div>
				<!-- end content -->

				<!-- player -->
				<div class="col-12 col-xl-6">
					<video controls crossorigin playsinline poster="../../../cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.jpg" id="player">
						<!-- Video files -->
						<source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4" type="video/mp4" size="576">
						<source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-720p.mp4" type="video/mp4" size="720">
						<source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-1080p.mp4" type="video/mp4" size="1080">
						<source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-1440p.mp4" type="video/mp4" size="1440">

						<!-- Caption files -->
						<track kind="captions" label="English" srclang="en" src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.en.vtt"
						    default>
						<track kind="captions" label="Français" srclang="fr" src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.fr.vtt">

						<!-- Fallback for browsers that don't support the <video> element -->
						<a href="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4" download>Download</a>
					</video>
				</div>
				<!-- end player -->

                {{--  phân trang  --}}
                <div class="col-12">
                    <div class="card__content">
                        <h1 style="color: white">Số tập: 31 tập</h1>

                    </div>
                    <ul class="card-header" >


                        <li style="float: left" class="paginator__item  paginator__item--active"><a href="#">1</a></li>
                        <li style="float: left" class="paginator__item"><a href="#">2</a></li>
                        <li style="float: left" class="paginator__item"><a href="#">3</a></li>
                        <li style="float: left" class="paginator__item"><a href="#">4</a></li>
                        <li style="float: left" class="paginator__item"><a href="#">5</a></li>
                        <li style="float: left" class="paginator__item"><a href="#">6</a></li>
                        <li style="float: left" class="paginator__item"><a href="#">7</a></li>
                        <li style="float: left" class="paginator__item"><a href="#">8</a></li>
                        <li style="float: left" class="paginator__item"><a href="#">9</a></li>
                        <li style="float: left" class="paginator__item"><a href="#">10</a></li>
                        <li style="float: left" class="paginator__item"><a href="#">11</a></li>
                        <li style="float: left" class="paginator__item"><a href="#">12</a></li>
                        <li style="float: left" class="paginator__item"><a href="#">13</a></li>
                        <li style="float: left" class="paginator__item"><a href="#">14</a></li>
                        <li style="float: left" class="paginator__item"><a href="#">15</a></li>
                        <li style="float: left" class="paginator__item"><a href="#">16</a></li>
                        <li style="float: left" class="paginator__item"><a href="#">17</a></li>
                        <li style="float: left" class="paginator__item"><a href="#">18</a></li>
                        <li style="float: left" class="paginator__item"><a href="#">19</a></li>
                        <li style="float: left" class="paginator__item"><a href="#">20</a></li>
                        <li style="float: left" class="paginator__item"><a href="#">21</a></li>
                        <li style="float: left" class="paginator__item"><a href="#">22</a></li>
                        <li style="float: left" class="paginator__item"><a href="#">23</a></li>
                        <li style="float: left" class="paginator__item"><a href="#">24</a></li>
                        <li style="float: left" class="paginator__item"><a href="#">25</a></li>
                        <li style="float: left" class="paginator__item"><a href="#">26</a></li>
                        <li style="float: left" class="paginator__item"><a href="#">27</a></li>
                        <li style="float: left" class="paginator__item"><a href="#">28</a></li>
                        <li style="float: left" class="paginator__item"><a href="#">29</a></li>
                        <li style="float: left" class="paginator__item"><a href="#">30</a></li>
                        <li style="float: left" class="paginator__item"><a href="#">31</a></li>


                    </ul>
                </div>
                {{-- end phân trang  --}}

				<!-- end accordion -->

			</div>
		</div>
		<!-- end details content -->
	</section>
	<!-- end details -->

	<!-- content -->
    @include('users.elements.content-detail')
	<!-- end content -->
@endsection
@include('users.elements.photodetail')
