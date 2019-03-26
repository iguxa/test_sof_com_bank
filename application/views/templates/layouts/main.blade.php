<!doctype html>
<html lang="en">
@section('head')
	@include('templates.includes.head')
@show
<body>
@yield('content')
@section('footer_scripts')
	@include('templates.includes.footer_scripts')
@show
</body>
</html>