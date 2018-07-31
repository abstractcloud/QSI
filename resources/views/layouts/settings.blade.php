<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>QSI MESSANGER PROFILE</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('vendor/components/font-awesome/css/fontawesome-all.min.css') }}">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>
<body>
    <div id="app">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ env('APP_URL') . ':3000/socket.io/socket.io.js' }}"></script>
    <script src="{{ asset('js/profile.js') }}"></script>
</body>
</html>