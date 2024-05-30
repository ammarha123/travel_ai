<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <meta name="description" content="@yield('meta_description')">
    <meta name="keywords" content="@yield('meta_keyword')">
    <meta name="author" content="Ammar Hawari">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />

   

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <!-- Combined Google Maps API Script with Places Library and Map Initialization -->
    {{-- <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBARuBB969frhWxwEYAk17aIXxR2C7gZ7s&callback=initMap&libraries=places&v=weekly&solution_channel=GMP_CCS_placedetails_v1"
    defer
  ></script> --}}
</head>

<body>
    <div id="app">
        @include('layout.inc.frontend.navbar')

        <main class="">
            @yield('content')
        </main>

        @if(!isset($hideFooter) || !$hideFooter)
            @include('layout.inc.frontend.footer')
        @endif
    </div>
    @yield('script')
      <!-- jQuery -->
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
      <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
   


    @stack('script')
</body>

</html>
