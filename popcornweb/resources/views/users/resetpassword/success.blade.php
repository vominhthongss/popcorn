
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
                            <span class="sign__text">Bạn đã đặt lại mật khẩu thành công </span>
                            <span class="sign__text">Bấm vào <a href="{{ route('signin') }}"> đây </a> để đăng nhập ! </span>


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
