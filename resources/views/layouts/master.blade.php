<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/png" href="{{ asset('images/phoneLogo.png') }}">
    {{-- <link rel="stylesheet" href="{{asset('bootstrap-5.2.1-dist/bootstrap-5.2.1-dist/css/bootstrap.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.0.0-web/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AOS/dist/aos.css') }}">
    {{-- <link href="{{ mix('css/app.css') }}" rel="stylesheet"> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{ asset('owl.carousel/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('owl.carousel/dist/assets/owl.theme.default.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    {{-- anim js  --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slider.css') }}"> --}}


    <title>E-Grossiste/ @yield('titre')</title>
</head>

<body>
    @include('layouts.header')
    @yield('contenu')
    @extends('layouts.footer')






</body>
{{-- <script src="{{ asset('bootstrap-5.2.1-dist/bootstrap-5.2.1-dist/js/bootstrap.min.js')}}"></script> --}}
<script src="{{ asset('javaScript/user.js') }}"></script>
<script src="{{ asset('javaScript/panier.js') }}"></script>
<script src="{{ asset('javaScript/nav.js') }}"></script>
<script src="{{ asset('javaScript/prodiut.js') }}"></script>
<script src="{{ asset('javaScript/showProfile.js') }}"></script>
<script src="{{ asset('AOS/dist/aos.js') }}"></script>
<script src="https://cdn.lordicon.com/lordicon.js"></script>

<script src="{{ asset('javaScript/jquery-3.7.1.min.js') }}"></script>

<script src="{{ asset('owl.carousel/dist/owl.carousel.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="{{ asset('javaScript/swipper-reponsive.js') }}"></script>


{{-- Swipper --}}
<script src="{{ asset('javaScript/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('javaScript/swiper-element-bundle.min.js') }}"></script>


{{-- anim js  --}}
{{-- <script src="{{asset('javaScript/demo.js')}}"></script>
<script src="{{asset('javaScript/pieces.min.js')}}"></script>
<script src="{{asset('javaScript/anime.min.js')}}"></script> --}}



{{-- Jquery --}}

<script>
    AOS.init();
</script>

<script src="{{ mix('js/app.js') }}"></script>

</html>
