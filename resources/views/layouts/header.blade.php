<header class="header">

    <nav class="header-nav" id="header-nav">
        <div class="header-nav-iconMenu">
            <span id="bar"><i class="fa-solid fa-bars"></i></span>

        </div>
        <div class="header-nav-logos">

            <img src="{{ asset('images/phoneLogo.png') }}" alt="" class="header-nav-logo">
            {{-- <h1 class="header-nav-titre">Grossiste Store</h1> --}}
        </div>

        <ul class="header-nav-listes" id="btns-nav">
            <span id="close"><i class="fa-solid fa-xmark header-nav-iconMenu-xmark"></i></span>
            <li>
                <a href="{{ url('/') }}" class="header-nav-listes-liste">Acceuil
                    {{-- <div class="header-nav-listes-liste-line"> </div> --}}
                </a>
            </li>
            <li>
                <a href="{{ url('/produits') }}" class="header-nav-listes-liste">Produits</a>
            </li>
            <li>
                <a href="{{ url('/connexion') }}" class="header-nav-listes-liste">Connexion</a>
            </li>
            <li>
                <a href="{{ url('/contact') }}" class="header-nav-listes-liste">Contact</a>
            </li>
            @if (Session::has('user'))
                @if (Session::get('user')->statut === 'admin')
                    <li>
                        <a href="{{ url('/dashboard') }}" class="header-nav-listes-liste">Tableau de Bord</a>
                    </li>
                @endif

            @endif
        </ul>
        @if (Session::has('user'))
            <div class="header-nav-iconsContenair">
                <div class="header-nav-iconsContenair-profils" title="profile">
                    @auth
                        <figure class="header-nav-iconsContenair-profils-profile">

                            <img src="{{ asset('storage/imageUser/' . Auth::user()->pdp) }}" alt=""
                                class="header-nav-iconsContenair-profils-profile-pdp">
                        </figure>
                        <p class="header-nav-iconsContenair-profils-pseudo">{{ Auth::user()->name }}</p>

                    @endauth

                </div>

                <div class="header-nav-iconsContenair-hr"></div>


                <div class="header-nav-icons">
                    <a href="{{ route('logout') }}" title="Déconnexion"
                        class="fa-solid fa-arrow-right-from-bracket header-nav-icons-icon" type="button"
                        id="panier"></a>
                    {{-- <p class="header-nav-icons-num">0</p> --}}

                </div>
            </div>
        @endif





    </nav>
    <ul class="header-hoverProfil">

        <li>
            <a href="{{ url('/dashboardUser') }}" class="header-hoverProfil-link">Mon Compte</a>
        </li>
        <li>
            <a href="{{ url('/showNotifUser') }}" class="header-hoverProfil-link">Notification</a>
            <p class="header-hoverProfil-count"></p>
        </li>
        <li>
            <a href="{{ url('/commandeUser') }}" class="header-hoverProfil-link">Commande</a>
        </li>
    </ul>
    @if (session('success'))
        <div class="alert">
            <span class="closebtn"></span>
            {{ session('success') }}
        </div>
    @endif

    {{-- <div class="bg-panier">

        <div class="panier"  >

            <div class="panier-head">
              <h1 class=" panier-title">Votre Panier</h1>
              <i class="fa-solid fa-xmark  panier-close" id="panier-close"></i>
            </div>
            <h3 class="panier-montant"></h3>
            <input type="hidden" name="stripeTotal" readonly value="" class="prixFinal">
            <div class="panier-cards">



            </div>


                <a class="panier-payement" href="{{url('/checkout')}}">Accedé au payement
                    <i class="fa-brands fa-stripe panier-payement-icon"></i>
                </a>


        </div>
    </div> --}}


    <script>
        // 33 62 812 18
        // 34 45 199 45



        setTimeout(function() {
            var alertElement = document.querySelector('.alert');
            if (alertElement) {
                alertElement.classList.add('fade-out');

                // Optionnel : retirer l'élément du DOM après la transition
                setTimeout(function() {
                    alertElement.style.display = 'none';
                }, 1000); // La durée de la transition est de 1 seconde (1000 millisecondes)
            }
        }, 2000); // Attendre 3 secondes avant de commencer la transition


        //scroll nav
        //Get the button:
        nav = document.getElementById("header-nav");
        profilNav = document.querySelector('.header-hoverProfil')
        console.log(nav);

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 530 || document.documentElement.scrollTop > 530) {
                nav.style.position = "fixed";
                nav.style.background = 'rgb(31 31 31 / 66%)';
                nav.style.transition = '1s ease-out'
                profilNav.style.position = 'fixed'
            } else {
                nav.style.position = "absolute";
                nav.style.background = 'linear-gradient(180deg, #00000091, #00000000)';
                nav.style.transition = '1s ease-out'
                profilNav.style.position = 'absolute'
            }
        }
    </script>





</header>
