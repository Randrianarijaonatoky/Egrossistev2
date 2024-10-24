<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy"
        content="connect-src 'self' https://api.stripe.com https://errors.stripe.com https://r.stripe.com https://ppm.stripe.com https://merchant-ui-api.stripe.com;">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.0.0-web/css/all.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.2.1-dist/bootstrap-5.2.1-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AOS/dist/aos.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.1/css/bootstrap.min.css">






    <title>Dashboard</title>
</head>

<body>
    <main class="dashboard-contenair">

        <figure class="dashboard-Content">
            @include('Admin.layouts.header')

            <main class="dashboard-Content-contenair">
                <nav class="dashboard-Content-contenair-nav">
                    <p>Tableau de bord</p>
                    <ul class="dashboard-Content-contenair-nav-listes">
                        <li>
                            <a href="{{ url('/notificationAdmin') }}"
                                class="dashboard-Content-contenair-nav-listes-liste">
                                <i class="fa-solid fa-bell dashboard-Content-contenair-nav-listes-liste-icon"></i>
                                <p class="dashboard-Content-contenair-nav-listes-liste-point"></p>

                            </a>
                        </li>
                        <li>
                            <a href="" class="dashboard-Content-contenair-nav-listes-liste">
                                <i class="fa-regular fa-envelope dashboard-Content-contenair-nav-listes-liste-icon"></i>
                                <p class="dashboard-Content-contenair-nav-listes-liste-point"></p>

                            </a>
                        </li>
                    </ul>
                </nav>

                @yield('contenue')
            </main>


        </figure>
    </main>
    @extends('Admin.layouts.footer')

    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    <script src="{{ asset('bootstrap-5.2.1-dist/bootstrap-5.2.1-dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('javaScript/nav.js') }}"></script>
    <script src="{{ asset('javaScript/amdin.js') }}"></script>
    <script src="{{ asset('javaScript/fiche.js') }}"></script>
    <script src="{{ asset('AOS/dist/aos.js') }}"></script>
    <script>
        AOS.init();
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.1/js/bootstrap.min.js"></script>



</body>

</html>
