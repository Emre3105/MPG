<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MPP</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.18/vue.min.js"></script>
        <script src="https://kit.fontawesome.com/032109fd0c.js" crossorigin="anonymous"></script>
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
    </head>
    <body class="dark">
        @if(Auth::check())
            @include('header')
        @endif
        <div id="app" class="min-h-screen bg-white dark:bg-gray-darkest text-gray-darkest dark:text-white py-8 px-4">
            @yield('content')
        </div>
        @include('footer')