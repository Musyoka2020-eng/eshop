<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
    </title>

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/90799b4287.js" crossorigin="anonymous"></script>
    <!-- CSS Files -->
    <link href="{{ asset('frontend/css/bootstrap5.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/owl.theme.default.min.css') }}" rel="stylesheet">

    <script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script>
    <style>
        a {
            text-decoration: none !important;
            color: black;
        }
    </style>

</head>

<body>

    <div class="content">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <script src="{{ asset('frontend/js/checkout.js') }}"></script>

    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>


    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script>
        var availableTags = [];
          $.ajax({
              type: "GET",
              url: "/product-list",
              success: function (response) {
                //   console.log(response);
                  startAutoComplete(response);
              }
          });

          function startAutoComplete(availableTags){
            $( "#search_product" ).autocomplete({
            source: availableTags
          });
          }

    </script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if (session('status'))
    <script>
        swal("{{session('status')}}");
    </script>
    @endif
    @yield('scripts')
</body>

</html>

