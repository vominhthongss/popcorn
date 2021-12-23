<!DOCTYPE html>
<html lang="en">

<head>
@include('admin.elements.head')

</head>
<body class="body">
    @include('admin.elements.alertsignup')
	<div class="sign section--bg" data-bg="{{ asset('asset/img/section/section.jpg') }}">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="sign__content">
						<!-- registration form -->
						<form action="{{ route('admincreate') }}" class="sign__form" method="POST">
                            @csrf
							<a href="{{ route('admindashboard') }}" class="sign__logo">
								<img src="{{ asset('asset/img/logo.svg') }}" alt="">
							</a>
                            <div class="sign__group">
								<input type="text" name="email" class="sign__input" placeholder="Email (Vui lòng nhập chính xác)"
                                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                                title="Email không hợp lệ !"
                                required
                                >
							</div>
                            <div class="sign__group">
								<input type="text" name="sodienthoai" class="sign__input" placeholder="Số điện thoại" minlength="10" maxlength="10" pattern="[0-9]{10}"
                                title="Số điện thoại không hợp lệ ! Chỉ số và độ dài là 10 !"
                                required >
							</div>
                            <div class="sign__group">
								<input type="text" name="hoten" class="sign__input" placeholder="Họ tên" required >
							</div>

							<div class="sign__group">
								<input type="password" name="matkhau" class="sign__input" placeholder="Mật khẩu"
                                minlength="8" maxlength="100"
                                required="required"
                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                title="Bao gồm ít nhất 1 chữ số, 1 chữ thường và 1 chữ in hoa, ít nhất 8 ký tự"
                                >
							</div>
{{--
							<div class="sign__group sign__group--checkbox">
								<input id="remember" name="remember" type="checkbox" checked="checked">
								<label for="remember">Tôi đồng ý <a href="#"> Các điều khoản</a></label>
							</div> --}}

							<button class="sign__btn" type="submit()">
                               Tạo
                            </button>

							<span class="sign__text">Trở về  <a href="{{ route('admindashboard') }}">dashboard</a></span>

                        </form>
						<!-- registration form -->
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- JS -->
	@include('admin.elements.script')
</body>

</html>
