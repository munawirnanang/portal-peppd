{{-- author  : Muhamad Munawir Amin
Email        : muhamadmunawiramin@gmail.com
Last Update  : 3 Februari 2021 --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0"
    />
    
    <meta name="description" content="PEPPD BAPPENAS">

    <title>@yield('title')</title>

    <!-- Font-Awesome -->
    <link 
      rel="stylesheet" 
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <!-- CSS -->
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <link
      href="{{ asset('css/materializecss/materialize.css') }}"
      type="text/css"
      rel="stylesheet"
      media="screen,projection"
    />
    <link
      href="{{ asset('css/materializecss/style.css') }}"
      type="text/css"
      rel="stylesheet"
      media="screen,projection"
    />
    
    <style>
      html {
        scroll-behavior: smooth;
      }
    </style>

    <style>
      .image-background {
        position: fixed; 
        width: 70%; 
        margin-left: 8%; 
        padding-left: 12%; 
        opacity: 15%; 
        mix-blend-mode: darken;
      }
    </style>
    
    {{-- import css from component --}}
    @stack('style')

  </head>
  <body style="background-color: #EFEFEF;">
    @include('pages.layouts.navigation')

    @yield('content')

    @include('pages.layouts.footer')
    
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('js/materializecss/materialize.js') }}"></script>
    <script src="{{ asset('js/materializecss/init.js') }}"></script>

    {{-- import javascript from component --}}
    @stack('script')
    
  </body>
</html>
