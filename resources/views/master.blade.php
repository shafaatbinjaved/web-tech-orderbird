<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Orderbird Web tech Challenge - @yield('title')</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css')  }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css')  }}">

</head>
<body>
    <div class="container">
        @yield('content')
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    @yield('scripts')
</body>
</html>