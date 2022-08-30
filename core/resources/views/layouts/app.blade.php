<html>

<head>
    <title>Leaseweb ERP - @yield('title')</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('scripts')
    <script>
        var APP_URL = {!! json_encode(url('/')) !!}
    </script>
</head>

<body>
<div class="container">
    @yield('content')
</div>
</body>

</html>
