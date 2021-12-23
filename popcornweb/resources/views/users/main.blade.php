<!DOCTYPE html>
<html lang="en">

<head>
@include('users.elements.head')
</head>
<body class="body">

	<!-- header -->

	@include('users.elements.header')
	<!-- end header -->

    @yield('content')

	<!-- footer -->
	@include('users.elements.footer')
	<!-- end footer -->

	<!-- JS -->
    @include('users.elements.script')
</body>

</html>
