<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="{{ asset("bootstrap/css/bootstrap.min.css") }}" rel="stylesheet">
    <link href="{{ asset("css/invitation.css") }}" rel="stylesheet">

    <title>{{ $title }}</title>
</head>
<body>
    
    <div class="invitation container-fluid">
        <h1>Hello, {{ $name }}</h1>
        <p>You're invited to Nobita & Shizuka's Wedding</p>
        {!! QrCode::size(150)->generate($uniqid) !!}
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset("bootstrap/js/bootstrap.bundle.min.js") }}"></script>
    <script>
        AOS.init({
            once: true
        });
    </script>
</body>
</html>