<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="/" data-template="vertical-menu-template-free">
	<head>
		@include('components.partials.home-head')
	</head>
	<body>
		@if(env('APP_DEMO') == 'true')
			<div 
				style="z-index: 2040"
				class="alert px-lg-5 py-4 bg-primary rounded-0 text-white position-fixed bottom-0 mb-0 w-100 alert-dismissible fade show">
				<h5 class="text-white mb-2">Selamat Datang</h5>
				<p class="mb-0">Sistem ini merupakan <b><i>demo app</i></b> sehingga data yang ditampilkan merupakan <i>data dummy</i> atau data yang tidak sesuai dengan aslinya</p>

				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		@endif

        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
        </div>

        @include('components.partials.home-navbar')

        {{ $slot }}

		@include('components.partials.home-script')
	</body>
</html>