@extends('admin.main')
@section('content')
	<!-- main content -->
	<main class="main">
		<div class="container-fluid">
			<div class="row">
				<!-- main title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Chỉnh sửa thông tin phim</h2>
					</div>
				</div>
				<!-- end main title -->

				<!-- form -->
				<div class="col-12">

					<form action="{{ route('admincatalogedited') }}" class="form" method="POST"  enctype="multipart/form-data">
                        @csrf
                        @foreach ($phim as $item)

						<div class="row">
							<div class="col-12 col-md-5 form__cover">
								<div class="row">
									<div class="col-12 col-sm-6 col-md-12">

										<div class="form__img">
                                            <!-- Poster -->
											<img id="form__img" src="{{ asset($item->PHIM_URLPOSTER) }}" alt=" ">
										</div>
                                        <a href="#modal-changeposter" class="section__btn open-modal">Đổi poster</a>

									</div>
								</div>
							</div>

							<div class="col-12 col-md-7 form__content">
								<div class="row">
                                    <input type="hidden" name="phim_id" value="{{$item->PHIM_ID}}">
									<div class="col-12">
                                        <!-- Tên phim -->
										<input type="text" name="title"  class="form__input" placeholder="Tên phim" required="required" value="{{$item->PHIM_TEN}}">
									</div>

									<div class="col-12">
                                        <!-- Tóm tắt -->
										<textarea maxlength="500" id="text" name="summary" class="form__textarea" placeholder="Tóm tắt" required="required" pattern="[A-Za-z0-9]{1,20}">{{$item->PHIM_TOMTAT}}</textarea>
									</div>
                                    <div class="col-12 col-lg-6">
                                        <!-- Điểm IMDB -->
										<input type="number" min="1" max="10"  name="imdb" step="0.1"  class="form__input" placeholder="Điểm IMDB"  required="required" value="{{$item->PHIM_DIEMIMDB}}" pattern="[A-Za-z0-9]{1,20}">
									</div>
									<div class="col-12 col-lg-6">
                                        <!-- Thời lượng -->
										<input type="text"  name="time"  class="form__input" placeholder="Thời lượng"  required="required"  value="{{$item->PHIM_THOILUONG}}">
									</div>
                                    <!-- Thể loại -->
                                    <div class="col-12">
										<select class="js-example-basic-multiple" name="genre[]" id="genre" multiple="multiple" required="required" pattern="[A-Za-z0-9]{1,20}">
										{{--  @foreach ($theLoaiPhim as $j)
                                            @foreach ($theLoai as $i)
                                                @if ($j->THELOAI_ID==$i->THELOAI_ID)
                                                <option value="{{$i->THELOAI_ID}}" selected>{{$i->THELOAI_TEN}}1</option>
                                                @else
                                                <option value="{{$i->THELOAI_ID}}">{{$i->THELOAI_TEN}}1</option>
                                                @endif
                                            @endforeach
                                        @endforeach  --}}

                                        @foreach ($theLoai as $i)
                                            @php
                                            $count=0
                                            @endphp
                                            @foreach ($theLoaiPhim as $j)
                                                @if ($j->THELOAI_ID==$i->THELOAI_ID)
                                                <option value="{{$i->THELOAI_ID}}" selected>{{$i->THELOAI_TEN}}</option>
                                                @break
                                                {{--  @else
                                                <option value="{{$i->THELOAI_ID}}">{{$i->THELOAI_TEN}}</option>  --}}
                                                @endif
                                                @if ($j->THELOAI_ID!=$i->THELOAI_ID)
                                                    @php
                                                    $count=$count+1
                                                    @endphp
                                                @endif
                                            @endforeach
                                            @if($count==2)
                                            <option value="{{$i->THELOAI_ID}}">{{$i->THELOAI_TEN}}</option>
                                            @endif
                                            @php
                                            $count=0
                                            @endphp
                                        @endforeach
										</select>
									</div>
                                    <!-- Diễn viên -->
                                    <div class="col-12">
										<select class="js-example-basic-multiple" name="cast[]" id="cast" multiple="multiple" required="required" pattern="[A-Za-z0-9]{1,20}">
                                        @foreach ($thamGia as $j)
                                            @foreach ($dienVien as $i)
                                                @if ($j->DIENVIEN_ID==$i->DIENVIEN_ID)
                                                <option value="{{$i->DIENVIEN_ID}}" selected>{{$i->DIENVIEN_TEN}}</option>
                                                @else
                                                <option value="{{$i->DIENVIEN_ID}}">{{$i->DIENVIEN_TEN}}</option>
                                                @endif

                                            @endforeach
                                        @endforeach
										</select>
									</div>

                                    <!-- Đạo diễn -->
                                    <div class="col-12">
										<select class="js-example-basic-multiple" name="director[]" id="director" multiple="multiple" required="required" pattern="[A-Za-z0-9]{1,20}">
                                        @foreach ($daoDienThamGia as $j)
                                            @foreach ($daoDien as $i)
                                                @if ($j->DAODIEN_ID==$i->DAODIEN_ID)
                                                    <option value="{{$i->DAODIEN_ID}}" selected>{{$i->DAODIEN_TEN}}</option>
                                                @else
                                                <option value="{{$i->DAODIEN_ID}}">{{$i->DAODIEN_TEN}}</option>
                                                @endif
                                            @endforeach
                                        @endforeach
										</select>
									</div>

                                    <div class="col-12 col-lg-6">
                                        <!-- Năm sản xuất -->
										<select class="form__input" name="year"  id="year" placeholder="Năm sản xuất" required="required">
                                            <option value="" disabled selected>Năm</option>
                                            @foreach ($nam as $i)
                                                @if ($item->NAM_ID==$i->NAM_ID)
                                                    <option value="{{$i->NAM_ID}}" selected>{{$i->NAM_TEN}}</option>
                                                @else
                                                    <option value="{{$i->NAM_ID}}">{{$i->NAM_TEN}}</option>
                                                @endif

                                            @endforeach
										</select>
									</div>

									<div class="col-12 col-lg-6">
                                        <!-- Độ tuổi -->
										<select class="form__input" name="age"  id="age" required="required">
                                            <option value="" disabled selected>Độ tuổi</option>

                                            @foreach ($doTuoi as $i)
                                                @if ($item->DOTUOI_ID==$i->DOTUOI_ID)
                                                    <option value="{{$i->DOTUOI_ID}}" selected>{{$i->DOTUOI_TEN}}</option>
                                                @else
                                                    <option value="{{$i->DOTUOI_ID}}">{{$i->DOTUOI_TEN}}</option>
                                                @endif
                                            @endforeach
										</select>
									</div>
                                    <!-- Quốc gia -->
									<div class="col-12 col-lg-6">
										<select class="js-example-basic-single" name="country" id="country" required="required">
                                            <option value="" disabled selected>Quốc gia</option>
                                            @foreach ($quocGia as $i)
                                                @if ($item->QUOCGIA_ID==$i->QUOCGIA_ID)
                                                <option value="{{$i->QUOCGIA_ID}}" selected>{{$i->QUOCGIA_TEN}}</option>
                                                @else
                                                <option value="{{$i->QUOCGIA_ID}}">{{$i->QUOCGIA_TEN}}</option>
                                                @endif
                                            @endforeach

										</select>
									</div>
                                    <!-- Trạng thái -->
									<div class="col-12 col-lg-6">
										<select class="js-example-basic-single" name="status" id="status" required="required">
                                            <option value="" disabled selected>Trạng thái</option>
                                            @if ($item->PHIM_TRANGTHAI=="Đã ra mắt")
                                                <option value="Đã ra mắt" selected >Đã ra mắt</option>
                                                <option value="Sắp ra mắt">Sắp ra mắt</option>
                                            @else
                                                <option value="Sắp ra mắt" selected >Sắp ra mắt</option>
                                                <option value="Đã ra mắt">Đã ra mắt</option>
                                            @endif
										</select>
									</div>
                                    <div class="col-12">
										<button type="submit()" class="form__btn">Cập nhật</button>

									</div>
								</div>
							</div>
						</div>

                        @endforeach
					</form>
				</div>
				<!-- end form -->
			</div>
		</div>
        <!-- modal poster -->
        <div id="modal-changeposter" class="zoom-anim-dialog mfp-hide modal">
            <h6 class="modal__title">Đổi ảnh poster</h6>
                <div class="row">
                        <div class="col-12 col-sm-6 col-md-12">
                            {{--  Cập nhật ảnh poster  --}}
                            <form action="{{ route('adminchangeposter') }}" method="POST"  enctype="multipart/form-data">
                                @csrf
                                @foreach ($phim as $item)
                                    <input type="hidden" name="phim_id" value="{{$item->PHIM_ID}}">
                                    <input type="hidden" name="title" value="{{$item->PHIM_TEN}}">
                                @endforeach
                                <div class="form__img">
                                    <!-- poster -->
                                    <label for="form__img-upload">Thay ảnh 270 x 400</label>
                                    <input id="form__img-upload" name="poster" type="file" accept=".png, .jpg, .jpeg" required="required">
                                    @foreach ($phim as $item)

                                    <img id="form__img" src="{{ asset($item->PHIM_URLPOSTER) }}" alt=" " class="avatar">
                                    @endforeach
                                </div>
                                <div class="col-12">
                                    <button id="uploadAvtButton" type="submit()" class="section__btn" style="display: none" >Lưu</button>
                                </div>

                            </form>

                            {{--  end cập nhật ảnh poster  --}}
                        </div>
                </div>
        </div>
        <!-- end modal changeavatar  -->

	</main>
	<!-- end main content -->
@endsection
