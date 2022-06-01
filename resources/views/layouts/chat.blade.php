<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Outlets') }}</title>


    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('chats/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('chats/css/mdb.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('chats/css/custom.css') }}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
</head>

<body>
    <main>
        @include('layouts.inc.chatsf.nav')
        @yield('content')
        @include('layouts.inc.chatsf.footer')
    </main>
    <script src="{{ asset('chats/js/mdb.min.js') }}"></script>
    <script src="{{ asset('chats/js/custom.js') }}"></script>


    @yield('scripts')
</body>

</html>
