<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{config('app.name')}} | @yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- @vite(['resources/css/app.scss', 'resources/js/app.js']) --}}
        @vite(['resources/js/app.js'])
        @section('styles')
        @show

        <link rel="icon" href="/favicon.ico">

    </head>
    <!--
    `body` tag options:

        Apply one or more of the following classes to to the body tag
        to get the desired effect

        * sidebar-collapse
        * sidebar-mini
    -->
    <body class="sidebar-mini control-sidebar-slide-open layout-navbar-fixed layout-footer-fixed">

        <div class="wrapper">
            @section('body_content')
            @show
        </div>
    <!-- ./wrapper -->

    
    <script src="/jscustom/moment/moment.min.js"></script>    
    
    @section('scripts')
    @show
    </body>
</html>
