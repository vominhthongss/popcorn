
<!DOCTYPE html>
<html lang="en">
<head>
@include('admin.elements.head')

</head>
<body>

	<div class="sign section--bg" data-bg="{{ asset('asset/img/section/section.jpg') }}">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="sign__content">
						<!-- authorization form -->
						<form action="#" class="sign__form">
							<a href="{{ route('admindashboard') }}" class="sign__logo">
								<img src="{{ asset('asset/img/logo.svg') }}" alt="">
							</a>

							<div class="sign__group">
								<input type="text" class="sign__input" placeholder="Email">
							</div>

							<div class="sign__group sign__group--checkbox">
								<input id="remember" name="remember" type="checkbox" checked="checked">
								<label for="remember">I agree to the <a href="privacy.html">Privacy Policy</a></label>
							</div>

							<button class="sign__btn" type="button">Sign in</button>

							<span class="sign__text">We will send a password to your Email</span>
						</form>
						<!-- end authorization form -->
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- JS -->
@include('admin.elements.script')
</body>
</html>
