<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"/>
    <link href="{{ asset("bootstrap/css/bootstrap.min.css") }}" rel="stylesheet">
    <link href="{{ asset("css/apps.css") }}" rel="stylesheet">

    <title>Apps Control</title>
</head>
<body>
    
    @yield('content')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset("bootstrap/js/bootstrap.bundle.min.js") }}"></script>
</body>
</html>