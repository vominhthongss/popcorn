
<!DOCTYPE html>
<html lang="en">
<head>
@include('users.elements.head')

</head>
<body class="body">
    <div class="banner_alert">
        @if ($message = Session::get('unsuccess'))
        <div class="alert alert-warning alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong class="failed_alert">Không đúng email </strong>
        </div>
        @endif
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong class="success_alert">Thành công ! Vui lòng kiểm tra email !
                    </strong>

        </div>
        @endif
    </div>
	<div class="sign section--bg" data-bg="{{ asset('asset/img/section/section.jpg') }}">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="sign__content">
						<!-- authorization form -->
						<form action="{{ route('sendmail') }}" class="sign__form" method="POST">
                            @csrf
							<a href="{{ route('home') }}" class="sign__logo">
								<img src="{{ asset('asset/img/logo.svg') }}" alt="">
							</a>

							<div class="sign__group">
								<input type="text" name="thanhvien_email" class="sign__input" placeholder="Email">
							</div>



							<button class="sign__btn" type="submit">Gửi xác nhận</button>

							<span class="sign__text">Chúng tôi sẽ gửi xác nhận đến email của bạn</span>
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
