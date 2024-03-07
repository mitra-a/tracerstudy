<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="/" data-template="vertical-menu-template-free">
	<head>
		@include('components.partials.head')
	</head>
	<body>
		<div class="layout-wrapper layout-content-navbar">
			<div class="layout-container">
		        @include('components.partials.sidebar')
				
                <div class="layout-page">
					@include('components.partials.navbar')

					<div class="container-xxl flex-grow-1 container-p-y">
						{{ $slot }}
					</div>

					<div class="content-backdrop fade"></div>
				</div>
			</div>
		</div>

		<div class="layout-overlay layout-menu-toggle"></div>
		@include('components.partials.script')
	</body>
</html>