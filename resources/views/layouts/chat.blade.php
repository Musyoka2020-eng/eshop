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
    <script src="{{ asset('chats/js/jquery-3.6.0.min.js') }}" ></script>

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
</head>

<body>
    <main>
        @include('layouts.inc.chatsf.nav')
        @yield('content')
        @include('layouts.inc.chatsf.footer')
    </main>
    <script src="{{ asset('chats/js/mdb.min.js') }}" async defer></script>

    <script src="{{ asset('chats/js/custom.js') }}"></script>
    <!-- MDB -->
    {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.1.0/mdb.min.js"></script> --}}

    @yield('scripts')
</body>

</html>
