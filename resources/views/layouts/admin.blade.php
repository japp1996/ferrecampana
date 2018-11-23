<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0, minimum-scale=1" name="viewport">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }} ">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.png') }}">
        <title>@yield('title') | Ferretería la campana</title>
        <meta name="keywords" content="" />
        <meta name="description" content="Ferretería la Campana es una ferretería que vende productos y artículos de trabajo desde jardinería, material de construcción y del hogar. " />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('css/components/layout.css') }}">
        <script type="text/javascript" src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/functions.js')}}"></script>
        
        <!-- Fonts -->
        <!--link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css"-->
       <style>
            header {
              min-height: 60px;
            }
            .generalContent {
              padding-top: 40px;
            }
            #footer {
              margin-top: 20px;
            }
       </style>
    </head>
    <body ">
    <div id="loader"></div>
    @include('layouts.header')
    <div class="generalContent" id="app">
        @yield('content')
        
        @include('footer')
    </div>
    @yield('script')
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript">
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
  </script>
    </body>
</html>
