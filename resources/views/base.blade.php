<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name')}} - @yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./assets/css/tailwind.output.css" />
        <script
        src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"defe></script>

      {{-- <link rel="stylesheet"href="{{asset('assets3/lib/bootstrap/css/bootstrap.css')}}"> --}}

    </head>
    <body class="antialiased">

        @include('navbar/navbar')

        @yield('content')

    </body>

</html>
