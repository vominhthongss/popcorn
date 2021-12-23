<!DOCTYPE html>
<html lang="en">

<head>
	@include('users.elements.head')

</head>
<body class="body">

	<!-- page 404 -->
	<div class="page-404 section--bg" data-bg="{{ asset('asset/img/section/section.jpg') }}">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="page-404__wrap">
						<div class="page-404__content">
							<h1 class="page-404__title">404</h1>
							<p class="page-404__text">Trang bạn tìm kiếm không tồn tại!</p>
							<a href="{{ route('home')}}" class="page-404__btn">Trở lại</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end page 404 -->

	<!-- JS -->
	@include('users.elements.script')
</body>

</html>
