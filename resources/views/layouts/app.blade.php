<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="{{ URL::asset('js/customScript.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('\css\customStyle.css') }}" rel="stylesheet" type="text/css" >

</head>
<body>


    <div id="app">
        @include('tools.navbar')
        {{--        <p id="special">something</p>--}}
        <main class="py-4 blacktest">
{{--            <p class="special">something</p>--}}
            @yield('content')
            <p class="special">something</p>
            <p class="special">something</p>
        </main>
    </div>
</body>
</html>
