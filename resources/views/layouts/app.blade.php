<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Styles / Scripts -->
        <link href="{{asset('css/theme.css')}}" rel="stylesheet" />
        <link href="{{asset('css/app.css')}}" rel="stylesheet" />
        
        <script src="https://kit.fontawesome.com/5e0f39ce85.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <x-header />
            </div>
        </div>
        <div class="container">
            <div class="content">
                @yield('content')
            </div>
        </div>
        <div class="container">
            <div class="content">
                <x-footer />
            </div>
        </div>
        @stack('scripts')
    </body>
</html>
