<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Pixel Todo') }}</title>

  <!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Scripts -->
	@vite(['resources/sass/app.scss', 'resources/js/app.js'])
	<link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
	<script src="{{ secure_asset('js/actions.js') }}"></script>
	<script type="module" src="{{ secure_asset('js/main.js') }}"></script>
</head>

<body>
  <div id="app">
		{{-- Navbar --}}
    <nav class="navbar navbar-expand-md navbar-dark shadow-sm bg-pixel position-sticky fixed-top">
      <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
          {{ config('app.name', 'Pixel Todo') }}
        </a>
      </div>
    </nav>

		{{-- Page content --}}
    <main class="p-3">
			@yield('content')
    </main>
  </div>
</body>

</html>
