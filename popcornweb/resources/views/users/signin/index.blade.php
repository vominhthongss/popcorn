<!DOCTYPE html>
<html lang="en">

<head>
@include('users.elements.head')
</head>
<body class="body">
    @include('users.elements.alertsignin')
	<div class="sign section--bg" data-bg="{{ asset('asset/img/section/section.jpg') }}">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="sign__content">
						<!-- authorization form -->
						<form action="{{ route('auth') }}" class="sign__form" method="POST">
                            @csrf
							<a href="{{ route('home') }}" class="sign__logo">
								<img src="{{ asset('asset/img/logo.svg') }}" alt="">
							</a>

							<div class="sign__group">
								<input type="text" name="email" class="sign__input" placeholder="Email">
							</div>

							<div class="sign__group">
								<input type="password" name="matkhau" class="sign__input" placeholder="Mật khẩu">
							</div>

							<div class="sign__group sign__group--checkbox">
								<input id="remember" name="remember" type="checkbox" checked="checked">
								<label for="remember">Ghi nhớ đăng nhập</label>
							</div>

							<button class="sign__btn" type="submit()">Đăng nhập</button>

							<span class="sign__text">Bạn không có tài khoản? <a href="{{ route('signup') }}">Đăng ký!</a></span>

							<span class="sign__text"><a href="{{ route('forgot') }}">Bạn quên mật khẩu?</a></span>
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
