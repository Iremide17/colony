<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta property="description" content="@yield('description')" />
	<meta property="keywords" content="@yield('keywords')" />

        {{-- facebook Meta --}}
	<meta property="og:description" content="@yield('description')" />
	<meta property="og:image" content="@yield('metaImage')" />
	<meta property="og:image:type" content="image/jpeg" />


        {{-- twitter Meta --}}
	<meta property="twitter:card" content="@yield('summary_large_image')" />
	<meta property="twitter:site" content="{{ config('services.twitter.handle') }}" />
	<meta property="twitter:image" content="@yield('metaImage')" />
	<meta property="twitter:description" content="@yield('description')" />
	<meta property="twitter:title" content="@yield('title')" />
	<meta name="theme-color" content="#6777ef"/>
	
	<title>@yield('title', ''.application('name'))</title>

	<link rel="shortcut icon" href="{{ asset('storage/'.application('image')) }}" type="image/x-icon">
	<link rel="icon" href="{{ asset('storage/'.application('image')) }}" type="image/x-icon">
	<link rel="apple-touch-icon" href="{{ asset('storage/'.application('image')) }}">

		<link rel="stylesheet" href="{{ mix('css/app.css') }}">

	    <!-- Select2 -->
	<link rel="stylesheet" href="{{ asset('css/plugins/select2/css/select2.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/choices.css') }}">
	<link href='https://api.mapbox.com/mapbox-gl-js/v2.8.0/mapbox-gl.css' rel='stylesheet' />

	
		<!-- Custom CSS -->
	<link href="{{ asset('css/styles.css') }}" rel="stylesheet">
	
	@stack('styles')
	
	<script src="{{ mix('js/app.js') }}" defer></script>
	
	@bukStyles(true)

	@livewireStyles
	@livewireScripts
		
</head>