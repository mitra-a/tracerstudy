<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="/" data-template="vertical-menu-template-free">
	<head>
		@include('components.partials.head')

		<link rel="stylesheet" href="{{ asset('vendor/css/pages/page-auth.css') }}" />
	</head>
	<body>
        {{ $slot }}

		@include('components.partials.script')
	</body>
</html>