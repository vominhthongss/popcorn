
<!DOCTYPE html>
<html lang="en">
<head>
@include('admin.elements.head')

</head>
<body>

	<!-- header -->
    @include('admin.elements.header')
	<!-- end header -->
    <!-- sidebar -->
    @include('admin.elements.sidebar')
    <!-- end sidebar -->
	<!-- main content -->

    @yield('content')
	<!-- end main content -->

	<!-- JS -->
    @include('admin.elements.script')
</body>
</html>
