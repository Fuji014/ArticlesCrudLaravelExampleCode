<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
	@yield('stylesheets')
	@yield('meta')
</head>
<body>
	{{-- navbar --}}
	@include('includes/navbar')
	{{-- end of navbar --}}

	{{-- container start --}}
	<div class="container">
	@yield('content')
	</div>
	{{-- container end --}}
</body>
	@yield('javascript')
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</html>