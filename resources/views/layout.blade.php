<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="Интернет кафе">
	<meta name="theme-color" content="#292929"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Рандеву</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="" type="image/x-icon">
    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
{{--    <link rel="stylesheet" href="build/assets/{{ $style }}">--}}
    @vite('resources/sass/app.scss')
    @vite('resources/js/app.js')
</head>

<body id="app">
    <div class="wrapper">
        <header class="header container-fluid" style="flex-shrink: 0">
            <div class="header-row row">
                <div class="header-left col-3" v-if="">
                    <div class="header-logo" style="background-image: url('{{ asset('storage/logo/logo.webp') }}');"></div>
                </div>
                <div class="header-middle col-7">
                    <header-button-group :categories="{{ $categories }}"></header-button-group>
                </div>
                <div class="header-right col-2">
                    <shopping-card></shopping-card>
                </div>
            </div>
        </header>

        @yield('content')
    </div>
</body>
</html>


