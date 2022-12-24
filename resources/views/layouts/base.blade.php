<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

        <title>Simple Laravel VueJS CRUD</title>

        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <!--==================== UNICONS ====================-->
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">


        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

        @vite('resources/css/app.css')
    </head>
    <body>

        <div id="app"></div>




        @yield('content')

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        @vite('resources/js/app.js')
    </body>
</html>
