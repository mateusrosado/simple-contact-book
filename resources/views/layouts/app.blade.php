<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }} " data-theme="{{ auth()->user()?->theme ?? 'dark' }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Styles / Scripts -->
        <link href="{{asset('css/theme.css')}}" rel="stylesheet" />
        <link href="{{asset('css/app.css')}}" rel="stylesheet" />

        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('/site.webmanifest') }}">
        
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
