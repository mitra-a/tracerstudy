<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
	<div class="app-brand demo">
		<a href="/" class="app-brand-link">
			<span class="app-brand-logo demo mb-2 me-2">
				<img src="{{ asset('logo.png') }}" height="45px">
			</span>
			<span 
				class="app-brand-text demo menu-text fw-bolder ms-2 mb-2" 
				style="font-size: 20px; text-transform: none">Tracer Study <br /> <span class="text-primary">JTIK UNM</span> </span>
		</a>
		<a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
			<i class="bx bx-chevron-left bx-sm align-middle"></i>
		</a>
	</div>
	<div class="menu-inner-shadow"></div>
	<ul class="menu-inner py-1">
		@foreach (config('sidebar') as $sidebar)
			@if(auth()->user()->role == $sidebar['role'])
				@if(isset($sidebar['title-menu']))
					<li class="menu-header small text-uppercase">
						<span class="menu-header-text">{{ $sidebar['title-menu'] }}</span>
					</li>
				@else
					<li class="menu-item {{ $sidebar['active'] ? Route::is($sidebar['active']) ? 'active' : '' : '' }}">
						<a href="{{ $sidebar['route'] ? route($sidebar['route']) : '' }}" class="menu-link">
							<i class="menu-icon tf-icons {{ $sidebar['icon'] }}"></i>
							<div data-i18n="Analytics">{{ $sidebar['title'] }}</div>
						</a>
					</li>
				@endif
			@endif
		@endforeach
	</ul>
</aside>