<header class="headUser">
    @auth

    @endauth
    <figure class="headUser-figrure">
        <img src="{{asset('storage/imageUser/'.Auth::user()->pdp)}}" alt="" class="headUser-figure-image">

        <h2 class="headUser-figure-pseudo">{{ Auth::user()->name}}
            <lord-icon
                src="https://cdn.lordicon.com/lomfljuq.json"
                trigger="loop"
                delay="2000"
                colors="primary:#feb600"
                style="width:1rem;height:1rem">
            </lord-icon>
        </h2>
        <p></p>
    </figure>

    <ul class="headUser-listes">
        <li class="">
            <a href="{{url('/')}}" class="headUser-listes-liste">
                <i class="fa-solid fa-arrow-left headUser-listes-liste-icon"></i>

                <p class="headUser-listes-liste-para">Acceuil</p>
            </a>
        </li>
        <li class="">
            <a href="{{url('/userModif')}}" class="headUser-listes-liste">
                <i class="fa-solid fa-user headUser-listes-liste-icon"></i>

                <p class="headUser-listes-liste-para">Modifier</p>
            </a>
        </li>
        <li class="">
            <a href="{{url('/commandeUser')}}" class="headUser-listes-liste">
                <i class="fa-brands fa-shopify headUser-listes-liste-icon"></i>

                <p class="headUser-listes-liste-para">Achat effectué</p>
            </a>
        </li>
        <li class="">
            <a href="" class="headUser-listes-liste">
                <i class="fa-solid fa-file-invoice-dollar headUser-listes-liste-icon"></i>

                <p class="headUser-listes-liste-para">Facture</p>
            </a>
        </li>
        <li class="">
            <a href="{{url('/coupons')}}" class="headUser-listes-liste">
                <i class="fa-solid fa-credit-card headUser-listes-liste-icon"></i>

                <p class="headUser-listes-liste-para">Coupon</p>
            </a>
        </li>
    </ul>
</header>
