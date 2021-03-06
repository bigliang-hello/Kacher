<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('favicon.ico')}}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Kacher') - 卡车儿</title>
    <meta name="description" content="@yield('description', '卡车儿 社区')" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
</head>

<body>
<div id="app" class="{{ route_class() }}-page">

    @include('common._header')

    <div class="container">

        @include('common.message')

        @yield('content')

    </div>

    @include('common._footer')
</div>
@if (app()->isLocal())
    @include('sudosu::user-selector')
@endif
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')
</body>
</html>