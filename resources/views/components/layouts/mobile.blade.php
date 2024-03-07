<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="/" data-template="vertical-menu-template-free">
	<head>
		@include('components.partials.head')
	</head>
	<body>
        <div class="container mt-3">
            {{ $slot }}
        </div>

		@include('components.partials.script')
	</body>
</html>