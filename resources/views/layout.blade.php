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
    @vite('resources/sass/app.scss')
    @vite('resources/js/app.js')
</head>

<body id="app">
    <div class="wrapper">
        <header class="header container-fluid" style="flex-shrink: 0">
            <div class="header-row row">
                <div class="header-top">
                    <div class="header-row-left">
                        <div class="header-label">
                            <i class="fas fa-coffee"></i>
                        </div>
                        <div class="header-title">
                            Рандеву
                        </div>
                    </div>
                    <div class="header-row-right">
                        <div class="header-about">
                            Как мы работаем
                        </div>
                        <shopping-card></shopping-card>
                    </div>
                </div>
                <div class="header-row-bottom">
{{--                    отправляем внутрь все категории из контроллера IndexController -> invoke--}}
                    <header-button-group :categories="{{ $categories }}"></header-button-group>
                </div>
            </div>
        </header>

        @yield('content')
    </div>
</body>
</html>


