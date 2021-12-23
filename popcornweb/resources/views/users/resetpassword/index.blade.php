
<!DOCTYPE html>
<html lang="en">
<head>
@include('users.elements.head')

</head>
<body>

	<div class="sign section--bg" data-bg="{{ asset('asset/img/section/section.jpg') }}">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="sign__content">
						<!-- authorization form -->
						<form action="{{ route('resetpassword') }}" class="sign__form" method="POST">
                            @csrf
							<a href="{{ route('home') }}" class="sign__logo">
								<img src="{{ asset('asset/img/logo.svg') }}" alt="">
							</a>

                            <input type="hidden" name="thanhvien_email" class="sign__input" value="{{$thanhvien_email}}">



							<div class="sign__group">
								{{--  <input type="password" name="thanhvien_matkhau" class="sign__input" placeholder="Mật khẩu mới">  --}}

                                <input type="password" name="thanhvien_matkhau" class="sign__input" placeholder="Mật khẩu mới"
                                minlength="8" maxlength="100"
                                required="required"
                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                title="Bao gồm ít nhất 1 chữ số, 1 chữ thường và 1 chữ in hoa, ít nhất 8 ký tự"
                                >
							</div>
                            <div class="sign__group">
								{{--  <input type="password" name="thanhvien_matkhau2" class="sign__input" placeholder="Nhập lại mật khẩu">  --}}
                                <input type="password" name="thanhvien_matkhau2" class="sign__input" placeholder="Nhập lại mật khẩu"
                                minlength="8" maxlength="100"
                                required="required"
                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                title="Bao gồm ít nhất 1 chữ số, 1 chữ thường và 1 chữ in hoa, ít nhất 8 ký tự"
                                >
							</div>




							<button class="sign__btn" type="submit">Gửi xác nhận</button>

						</form>
						<!-- end authorization form -->
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- JS -->
@include('users.elements.script')
</body>
</html>
