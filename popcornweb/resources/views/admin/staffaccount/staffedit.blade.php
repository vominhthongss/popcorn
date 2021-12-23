@extends('admin.main')
@section('content')

	<!-- main content -->
	<main class="main">
        <div class="banner_alert">
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong class="success_alert">Thành công ! bấm vào
                        <a href="{{ route('admindashboard') }}">đây</a>
                        để về dashboard !
                        </strong>

            </div>
            @endif
            @if ($message = Session::get('unsuccess'))
            <div class="alert alert-warning alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong class="failed_alert">Không thành công ! Hai mật khẩu không trùng nhau !</strong>
            </div>
            @endif

        </div>

		<div class="container-fluid">
			<div class="row">
				<!-- main title -->
				<div class="col-12">
					<div class="main__title">
						<h2>Chỉnh sửa thông tin nhân viên</h2>
					</div>
				</div>
				<!-- end main title -->
				<div class="col-12">
					<div class="row">


								<!-- details form -->
								<div class="col-12 col-lg-6">
                                    {{-- route chỉnh sửa nhân viên --}}
									<form action="{{ route('adminstaffedited') }}" class="profile__form" method="POST">
                                        @csrf
                                    @foreach ($nhanVien as $item)
										<div class="row">
											<div class="col-12">
												<h4 class="profile__title">Thông tin chi tiết</h4>
											</div>
											<div class="col-12 col-md-6 col-lg-12 col-xl-6">
												<div class="profile__group">
													<label class="profile__label" for="quantri_hoten">Họ tên</label>
													<input id="username" type="text" name="quantri_hoten" class="profile__input" value="{{$item->QUANTRI_HOTEN}}" required>
												</div>
											</div>
											<div class="col-12 col-md-6 col-lg-12 col-xl-6">
												<div class="profile__group">
													<label class="profile__label" for="quantri_email">Email</label>
													<input id="email" type="text" name="quantri_email" class="profile__input" value="{{$item->QUANTRI_EMAIL}}"
                                                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                                                    title="Email không hợp lệ !"
                                                    required
                                                    >
												</div>
											</div>

											<div class="col-12 col-md-6 col-lg-12 col-xl-6">
												<div class="profile__group">
													<label class="profile__label" for="quantri_sodienthoai">Số điện thoại</label>
													<input id="sodienthoai" type="number" name="quantri_sodienthoai" class="profile__input" value="{{$item->QUANTRI_SODIENTHOAI}}" required>
												</div>
											</div>
											<div class="col-12 col-md-6 col-lg-12 col-xl-6">
												<div class="profile__group">
													<label class="profile__label" for="quantri_vaitro">Vai trò</label>
													<select class="js-example-basic-single" name="quantri_vaitro" id="role" value="{{$item->QUANTRI_VAITRO}}">
                                                        @if($item->QUANTRI_VAITRO=='Admin')
                                                        <option value="{{$item->QUANTRI_VAITRO}}">{{$item->QUANTRI_VAITRO}}</option>
                                                        <option value="Nhân viên">Nhân viên</option>
                                                        @else
                                                        <option value="{{$item->QUANTRI_VAITRO}}">{{$item->QUANTRI_VAITRO}}</option>
                                                        <option value="Admin">Admin</option>
                                                        @endif
													</select>
												</div>
											</div>
                                            <input type="hidden" name="quantri_id" value="{{$item->QUANTRI_ID}}">
											<div class="col-12">
												<button class="profile__btn" type="submit()">Lưu</button>
											</div>
										</div>
                                    @endforeach
									</form>
								</div>
								<!-- end details form -->
								<!-- password form -->
								<div class="col-12 col-lg-6">
                                    {{-- route đổi mật khẩu nhân viên --}}
									<form action="{{ route('adminstaffchangepass') }}" class="profile__form" method="POST">
                                        @csrf
										<div class="row">
											<div class="col-12">
												<h4 class="profile__title">Đổi mật khẩu</h4>
											</div>
											<div class="col-12 col-md-6 col-lg-12 col-xl-6">
												<div class="profile__group">
													<label class="profile__label" for="quantri_matkhau">Mật khẩu mới</label>
													<input id="newpass" type="password" name="quantri_matkhau" class="profile__input"
                                                    minlength="8" maxlength="100"
                                                    required="required"
                                                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                                    title="Bao gồm ít nhất 1 chữ số, 1 chữ thường và 1 chữ in hoa, ít nhất 8 ký tự"
                                                    >
												</div>
											</div>
											<div class="col-12 col-md-6 col-lg-12 col-xl-6">
												<div class="profile__group">
													<label class="profile__label" for="quantri_matkhau2">Xác nhận mật khẩu</label>
													<input id="confirmpass" type="password" name="quantri_matkhau2" class="profile__input"
                                                    minlength="8" maxlength="100"
                                                    required="required"
                                                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                                    title="Bao gồm ít nhất  1 chữ số, 1 chữ thường và 1 chữ in hoa, ít nhất 8 ký tự"
                                                    >
												</div>

											</div>
                                            <input type="hidden" name="quantri_id" value="{{$item->QUANTRI_ID}}">
											<div class="col-12">
												<button class="profile__btn" type="submit()">Đổi</button>
											</div>
										</div>
									</form>
								</div>
								<!-- end password form -->

					</div>
				</div>
			</div>
		</div>
	</main>
	<!-- end main content -->


@endsection
