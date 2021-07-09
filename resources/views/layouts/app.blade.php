<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | Test técnico</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="icon" href="https://global-uploads.webflow.com/5e2f2362e479664d4e15718a/5e4ebf541795662930788d46_aivo-favicon.png">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img style="width: 120px" src="{{ asset('img\aivoTubeLogo.png') }}" alt="">
                    <h4 class="ml-3">Display up to 10 results from a search on YouTube!</h4>
                </a>
               <!-- <img style="width: 90px" src="{{ asset('img/5576.jpg') }}" alt=""> imagen opcional -->
                <a class="btn btn-outline-danger white mx-2" href="{{ route('home') }}">Normal</a>
                <a class="btn btn-outline-primary " href="{{ route('jsonSearch') }}">JSON {;}</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')

        </main>
    </div>

</body>

</html>
