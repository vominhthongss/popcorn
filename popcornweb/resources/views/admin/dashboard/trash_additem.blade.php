@extends('admin.main')
@section('content')
	<!-- main content -->
	<main class="main">
		<div class="container-fluid">
			<div class="row">
				<!-- main title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Thêm phim mới</h2>
					</div>
				</div>
				<!-- end main title -->

				<!-- form -->
				<div class="col-12">
					<form action="{{ route('adminaddnew') }}" class="form" method="POST">
                        @csrf
						<div class="row">
							<div class="col-12 col-md-5 form__cover">
								<div class="row">
									<div class="col-12 col-sm-6 col-md-12">
										<div class="form__img">
                                            <!-- Poster -->
											<label for="form__img-upload">Tải poster (270 x 400)</label>
											<input id="form__img-upload" name="form__img-upload" type="file" accept=".png, .jpg, .jpeg">
											<img id="form__img" src="#" alt=" ">
										</div>

									</div>
								</div>
							</div>

							<div class="col-12 col-md-7 form__content">
								<div class="row">
									<div class="col-12">
                                        <!-- Tên phim -->
										<input type="text" class="form__input" placeholder="Tên phim">
									</div>

									<div class="col-12">
                                        <!-- Tóm tắt -->
										<textarea id="text" name="text" class="form__textarea" placeholder="Tóm tắt"></textarea>
									</div>

									<div class="col-12 col-lg-6">
                                        <!-- Thời lượng -->
										<input type="text" class="form__input" placeholder="Thời lượng phim">
									</div>
                                    <div class="col-12 col-lg-6">
                                        <!-- Năm sản xuất -->
										<select class="form__input" id="year" >
                                            <option value="" disabled selected>Năm</option>
											<option value="2000">2000</option>
											<option value="2021">2021</option>
										</select>
									</div>


									<div class="col-12 col-lg-6">
                                        <!-- Độ tuổi -->
										<select class="form__input" id="age" >
                                            <option value="" disabled selected>Độ tuổi</option>
											<option value="16+">16+</option>
											<option value="18+">18+</option>
										</select>
									</div>
                                    {{--  <div class="col-12 col-lg-6">
										<select class="js-example-basic-single" id="quality">
											<option value="" disabled selected>Chất lượng</option>
											<option value="FullHD">FullHD</option>
											<option value="HD">HD</option>
										</select>
									</div>  --}}
                                    <!-- Quốc gia -->
									<div class="col-12 col-lg-6">
										<select class="js-example-basic-single" id="country">
                                            <option value="" disabled selected>Quốc gia</option>
											<option value="Afghanistan">Afghanistan</option>
											<option value="Åland Islands">Åland Islands</option>
											<option value="Albania">Albania</option>
											<option value="Algeria">Algeria</option>
											<option value="American Samoa">American Samoa</option>

										</select>
									</div>

                                    <!-- Thể loại -->
                                    <div class="col-12">
										<select class="js-example-basic-multiple" name="genre[]" id="genre" multiple="multiple">
											<option value="Action">Action</option>
											<option value="Animation">Animation</option>
											<option value="Comedy">Comedy</option>
											<option value="Crime">Crime</option>
											<option value="Drama">Drama</option>
											<option value="Fantasy">Fantasy</option>
											<option value="Historical">Historical</option>
											<option value="Horror">Horror</option>
											<option value="Romance">Romance</option>
											<option value="Science-fiction">Science-fiction</option>
											<option value="Thriller">Thriller</option>
											<option value="Western">Western</option>
											<option value="Otheer">Otheer</option>
										</select>
									</div>
                                    <!-- Diễn viên -->
                                    <div class="col-12">
										<select class="js-example-basic-multiple" name="cast[]" id="cast" multiple="multiple">
											<option value="Action">Action</option>
											<option value="Animation">Animation</option>
											<option value="Comedy">Comedy</option>
											<option value="Crime">Crime</option>
											<option value="Drama">Drama</option>
											<option value="Fantasy">Fantasy</option>
											<option value="Historical">Historical</option>
											<option value="Horror">Horror</option>
											<option value="Romance">Romance</option>
											<option value="Science-fiction">Science-fiction</option>
											<option value="Thriller">Thriller</option>
											<option value="Western">Western</option>
											<option value="Otheer">Otheer</option>
										</select>
									</div>
                                    <!-- Đạo diễn -->
                                    <div class="col-12">
										<select class="js-example-basic-multiple" name="director[]" id="director" multiple="multiple">
											<option value="Action">Action</option>
											<option value="Animation">Animation</option>
											<option value="Comedy">Comedy</option>
											<option value="Crime">Crime</option>
											<option value="Drama">Drama</option>
											<option value="Fantasy">Fantasy</option>
											<option value="Historical">Historical</option>
											<option value="Horror">Horror</option>
											<option value="Romance">Romance</option>
											<option value="Science-fiction">Science-fiction</option>
											<option value="Thriller">Thriller</option>
											<option value="Western">Western</option>
											<option value="Otheer">Otheer</option>
										</select>
									</div>
                                    {{--  <!-- Phân loại phim -->
                                    <div class="col-12 col-lg-6">
                                        <select class="js-example-basic-single" id="type" >
                                            <option value="" disabled selected>Phân loại phim</option>
                                            <option value="Phim điện ảnh">Phim điện ảnh</option>
                                            <option value="Phim truyền hình" onClick="alert('hai')"  >Phim truyền hình</option>

                                        </select>
                                    </div>  --}}

								</div>
							</div>

							<div class="col-12">

								<ul class="form__radio">
									<li>
										<span>Phân loại phim:</span>

									</li>
									<li>
										<input id="type1" type="radio" name="type" data-toggle="collapse" data-target=".multi-collapse" checked="">
										<label for="type1">Phim điện ảnh</label>
									</li>
									<li>

										<input id="type2" type="radio" name="type" data-toggle="collapse" data-target=".multi-collapse">
										<label for="type2">Phim truyền hình</label>

									</li>

								</ul>
							</div>

							<div class="col-12">
								<div class="row">
									<!-- movie -->
									<div class="col-12">
										<div class="collapse show multi-collapse" id="multiCollapseExample1">
                                            @for ($i=1;$i<=1;$i++)
                                            <div class="form__video">
												<label id="movie{{$i}}" for="form__video-upload{{$i}}">Tải phim 480p</label>
												<input data-name="#movie{{$i}}" id="form__video-upload{{$i}}" name="movie{{$i}}" class="form__video-upload" type="file" accept="video/mp4,video/x-m4v,video/*">
											</div>
                                            <div class="form__video">
												<label id="movie{{$i+1}}" for="form__video-upload{{$i+1}}">Tải phim 720p</label>
												<input data-name="#movie{{$i+1}}" id="form__video-upload{{$i+1}}" name="movie{{$i+1}}" class="form__video-upload" type="file" accept="video/mp4,video/x-m4v,video/*">
											</div>
                                            <div class="form__video">
												<label id="movie{{$i+2}}" for="form__video-upload{{$i+2}}">Tải phim 1080p</label>
												<input data-name="#movie{{$i+2}}" id="form__video-upload{{$i+2}}" name="movie{{$i+2}}" class="form__video-upload" type="file" accept="video/mp4,video/x-m4v,video/*">
											</div>
                                            @endfor

										</div>
									</div>

									<!-- end movie -->
									<!-- episode -->

									<div class="col-12">

										<div class="collapse multi-collapse" id="multiCollapseExample2">

                                            @for ($i=1;$i<=5;$i++)
                                            <span class="form__title">Tập {{$i-3 +3}}</span>
                                            <div class="form__video">
												<label id="movie{{$i+3}}" for="form__video-upload{{$i+3}}">Tải phim 480p</label>
												<input data-name="#movie{{$i+3}}" id="form__video-upload{{$i+3}}" name="movie{{$i+3}}" class="form__video-upload" type="file" accept="video/mp4,video/x-m4v,video/*">
											</div>
                                            <div class="form__video">
												<label id="movie{{$i+3+1}}" for="form__video-upload{{$i+3+1}}">Tải phim 720p</label>
												<input data-name="#movie{{$i+3+1}}" id="form__video-upload{{$i+3+1}}" name="movie{{$i+3+1}}" class="form__video-upload" type="file" accept="video/mp4,video/x-m4v,video/*">
											</div>
                                            <div class="form__video">
												<label id="movie{{$i+3+2}}" for="form__video-upload{{$i+3+2}}">Tải phim 1080p</label>
												<input data-name="#movie{{$i+2}}" id="form__video-upload{{$i+3+2}}" name="movie{{$i+3+2}}" class="form__video-upload" type="file" accept="video/mp4,video/x-m4v,video/*">
											</div>
                                            @endfor



										</div>


									</div>



									<!-- end episode -->

									<div class="col-12">
										<button type="submit()" class="form__btn" >publish</button>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
				<!-- end form -->
			</div>
		</div>
        <!-- modal status -->
        <div id="episode" class="zoom-anim-dialog mfp-hide modal">
            <h6 class="modal__title">Số tập</h6>

            <input type="text" class="form__input" placeholder="Số tập">

            <div class="modal__btns">
                <a class="modal__btn modal__btn--apply" type="button" href="{{ route('admindashboard') }}">Thêm</a>
                <button class="modal__btn modal__btn--dismiss" type="button">Không</button>
            </div>
        </div>
        <!-- end modal status -->
	</main>
	<!-- end main content -->
@endsection
