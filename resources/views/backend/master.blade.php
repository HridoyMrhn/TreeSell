@include('backend.partials.header')
@include('backend.partials.topbar')
@include('backend.partials.rightsidebar')
@include('backend.partials.leftsidebar')

	<div class="main-container">
		<div class="pd-ltr-20">
            @yield('content')


		</div>
	</div>

@include('backend.partials.footer')
