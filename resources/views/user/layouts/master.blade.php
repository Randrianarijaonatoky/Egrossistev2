<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{asset('images/phoneLogo.png')}}">
    {{-- <link rel="stylesheet" href="{{asset('bootstrap-5.2.1-dist/bootstrap-5.2.1-dist/css/bootstrap.min.css') }}"> --}}
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome-free-6.0.0-web/css/all.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="{{asset('AOS/dist/aos.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap-5.2.1-dist/bootstrap-5.2.1-dist/css/bootstrap.min.css') }}">
    <title>Grossiste Storage/espace utilisateur</title>
</head>
<body>

    <main class="dashboard-contenair">


        <figure class="dashboard-Content">
            @include('user.layouts.header')

            <div class="dashboard-Content-contenue">
                <nav class="navUser">
                    <h1 class="navUser-title">@yield('titre')</h1>
                    <div class="navUser-icons">
                        <a href="{{url('/showNotifUser')}}" class="navUser-icons-notifs">
                            {{-- <i class="fa-solid fa-bell"></i> --}}



                            <lord-icon
                                src="https://cdn.lordicon.com/lznlxwtc.json"
                                trigger="hover"
                                colors="primary:#f8f9fc"
                                style="font-size:5px">
                            </lord-icon>
                            <p class="navUser-icons-notifs-dot"></p>

                        </a>
                        <a href="" class="navUser-icons-notifs">
                            {{-- <i class="fa-solid fa-bell"></i> --}}

                            <lord-icon
                                src="https://cdn.lordicon.com/ayhtotha.json"
                                trigger="hover"
                                colors="primary:#f8f9fc"
                                style="font-size:5px">
                            </lord-icon>
                            <p class="navUser-icons-notifs-dot"></p>

                        </a>
                    </div>
                </nav>
                @yield('contenue')
            </div>


        </figure>

    </main>


</body>
<script src="{{asset('javaScript/jquery-3.7.1.min.js')}}"></script>
<script src="https://cdn.lordicon.com/lordicon.js"></script>
<script src="{{asset('javaScript/user/commande.js')}}"></script>
</html>

