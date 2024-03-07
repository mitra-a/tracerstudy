<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.partials.home-head')
</head>

<body>
    @include('components.partials.home-navbar')
	
	{{ $slot }}

    @include('components.partials.home-footer')

	<div id="preloader"></div>
	<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    @include('components.partials.home-script')
</body>

</html>