<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    <title>{{ $title ?? env('APP_NAME') }}</title>
</head>
<body>
    @if(Route::is('invitation'))
        <livewire:components.navigation />
    @endif
    <main>
        @yield('content')
    </main>
    @if(Route::is('invitation'))
        <livewire:components.scroll-up />
        <livewire:components.footer />
    @endif
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</body>
</html>
