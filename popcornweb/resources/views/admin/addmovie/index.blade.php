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
					<form action="{{ route('adminuploadmovie') }}" class="form" method="POST"  enctype="multipart/form-data">
                        @csrf
						<div class="row">
							<div class="col-12 col-md-5 form__cover">
								<div class="row">
									<div class="col-12 col-sm-6 col-md-12">
										<div class="form__img">
                                            <!-- Poster -->
											<label for="form__img-upload">Tải poster (270 x 400)</label>
											<input id="form__img-upload" name="poster" type="file" accept=".png, .jpg, .jpeg" required="required">
											<img id="form__img" src="#" alt=" ">
										</div>

									</div>
								</div>
							</div>

							<div class="col-12 col-md-7 form__content">
								<div class="row">
									<div class="col-12">
                                        <!-- Tên phim -->
										<input type="text" name="title"  class="form__input" placeholder="Tên phim" required="required">
									</div>

									<div class="col-12">
                                        <!-- Tóm tắt -->
										<textarea maxlength="500" id="text" name="summary" class="form__textarea" placeholder="Tóm tắt" required="required" pattern="[A-Za-z0-9]{1,20}"></textarea>
									</div>
                                    <div class="col-12 col-lg-6">
                                        <!-- Điểm IMDB -->
										<input type="number" min="1" max="10"  name="imdb" step="0.1"  class="form__input" placeholder="Điểm IMDB"  required="required" pattern="[A-Za-z0-9]{1,20}">
									</div>
									<div class="col-12 col-lg-6">
                                        <!-- Thời lượng -->
										<input type="text"  name="time"  class="form__input" placeholder="Thời lượng"  required="required">
									</div>
                                    <!-- Thể loại -->
                                    <div class="col-12">
										<select class="js-example-basic-multiple" name="genre[]" id="genre" multiple="multiple" required="required" pattern="[A-Za-z0-9]{1,20}">
											@foreach ($theLoai as $i)
                                            <option value="{{$i->THELOAI_ID}}">{{$i->THELOAI_TEN}}</option>
                                            @endforeach
										</select>
									</div>
                                    <!-- Diễn viên -->
                                    <div class="col-12">
										<select class="js-example-basic-multiple" name="cast[]" id="cast" multiple="multiple" required="required" pattern="[A-Za-z0-9]{1,20}">
											@foreach ($dienVien as $i)
                                            <option value="{{$i->DIENVIEN_ID}}">{{$i->DIENVIEN_TEN}}</option>
                                            @endforeach
										</select>
									</div>
                                    <!-- Đạo diễn -->
                                    <div class="col-12">
										<select class="js-example-basic-multiple" name="director[]" id="director" multiple="multiple" required="required" pattern="[A-Za-z0-9]{1,20}">
											@foreach ($daoDien as $i)
                                            <option value="{{$i->DAODIEN_ID}}">{{$i->DAODIEN_TEN}}</option>
                                            @endforeach
										</select>
									</div>

                                    <div class="col-12 col-lg-6">
                                        <!-- Năm sản xuất -->
										<select class="form__input" name="year"  id="year" placeholder="Năm sản xuất" required="required">
                                            <option value="" disabled selected>Năm</option>
                                            @foreach ($nam as $i)
                                            <option value="{{$i->NAM_ID}}">{{$i->NAM_TEN}}</option>
                                            @endforeach
										</select>
									</div>

									<div class="col-12 col-lg-6">
                                        <!-- Độ tuổi -->
										<select class="form__input" name="age"  id="age" required="required">
                                            <option value="" disabled selected>Độ tuổi</option>

                                            @foreach ($doTuoi as $i)
                                            <option value="{{$i->DOTUOI_ID}}">{{$i->DOTUOI_TEN}}</option>
                                            @endforeach
										</select>
									</div>
                                    <!-- Quốc gia -->
									<div class="col-12 col-lg-6">
										<select class="js-example-basic-single" name="country" id="country" required="required">
                                            <option value="" disabled selected>Quốc gia</option>
                                            @foreach ($quocGia as $i)
                                            <option value="{{$i->QUOCGIA_ID}}">{{$i->QUOCGIA_TEN}}</option>
                                            @endforeach

										</select>
									</div>
                                    <!-- Trạng thái -->
									<div class="col-12 col-lg-6">
										<select class="js-example-basic-single" name="status" id="status" required="required">
                                            <option value="" disabled selected>Trạng thái</option>

                                            <option value="Đã ra mắt">Đã ra mắt</option>
                                            <option value="Sắp ra mắt">Sắp ra mắt</option>


										</select>
									</div>

								</div>
							</div>


							<div class="col-12">
								<div class="row">
									<!-- movie -->
									<div class="col-12">
										<div class="collapse show multi-collapse" id="multiCollapseExample1">
                                            @for ($i=1;$i<=1;$i++)
                                            <div class="form__video">
												<label id="caption" for="form__caption">Tải phụ đề</label>
												<input data-name="#caption" id="form__caption" name="caption" class="form__video-upload" type="file" accept=".vtt" required="required">
											</div>

                                            <div class="form__video">
												<label id="movie{{$i}}" for="form__video-upload{{$i}}">Tải phim 480p</label>
												<input data-name="#movie{{$i}}" id="form__video-upload{{$i}}" name="movie[]" class="form__video-upload" type="file" accept="video/mp4,video/x-m4v,video/*" required="required">
											</div>
                                            <div class="form__video">
												<label id="movie{{$i+1}}" for="form__video-upload{{$i+1}}">Tải phim 720p</label>
												<input data-name="#movie{{$i+1}}" id="form__video-upload{{$i+1}}" name="movie[]" class="form__video-upload" type="file" accept="video/mp4,video/x-m4v,video/*" required="required">
											</div>
                                            <div class="form__video">
												<label id="movie{{$i+2}}" for="form__video-upload{{$i+2}}">Tải phim 1080p</label>
												<input data-name="#movie{{$i+2}}" id="form__video-upload{{$i+2}}" name="movie[]" class="form__video-upload" type="file" accept="video/mp4,video/x-m4v,video/*" required="required">
											</div>
                                            @endfor

										</div>
									</div>

									<!-- end movie -->


									<div class="col-12">
										<button type="submit()" class="form__btn">Đăng tải</button>

									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
				<!-- end form -->
			</div>
		</div>

	</main>
	<!-- end main content -->
@endsection
