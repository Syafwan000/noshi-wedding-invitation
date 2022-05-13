<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet"/>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="{{ asset("bootstrap/css/bootstrap.min.css") }}" rel="stylesheet">
    <link href="{{ asset("css/init.css") }}" rel="stylesheet">
    <link href="{{ asset("css/navbar.css") }}" rel="stylesheet">
    <link href="{{ asset("css/content.css") }}" rel="stylesheet">
    <link href="{{ asset("css/footer.css") }}" rel="stylesheet">
    @livewireStyles

    <title>Nobita & Shizuka's Wedding Invitation</title>
</head>
<body>

    @include("partials.navbar.navbar")

    @yield("content")

    @include("partials.footer.footer")

    <div x-data="{ scrollTop: true }">
        <button 
            id="scrollUp"
            :class="{ 'scrolled' : !scrollTop }"
            @scroll.window="scrollTop = (window.pageYOffset > 0) ? false : true"
            @click="window.scrollTo({ top: 0, behavior: 'smooth' })">
            <i class="fas fa-arrow-up"></i>
        </button>
    </div>

    @livewireScripts
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset("bootstrap/js/bootstrap.bundle.min.js") }}"></script>
    <script>
        AOS.init({
            once: true
        });
    </script>
</body>
</html>