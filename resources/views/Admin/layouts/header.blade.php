<nav class="Dashboard-nav">
    <ul class="Dashboard-nav-listes">
        <li class="Dashboard-nav-listes-contenair">
            <i class="fa-solid fa-house Dashboard-nav-listes-contenair-icon"></i>

            <a class="Dashboard-nav-listes-contenair-liste " href="{{url('/')}}">Accueil</a>
        </li>
        <div class="Dashboard-nav-listes-figure">
            <img class="Dashboard-nav-listes-img" src="{{asset('images/1.jpg')}}" alt="">
            {{-- <img class="Dashboard-nav-listes-img" src="{{asset('storage/imageUser/'.$user->pdp)}}" alt="{{$user->name}}"> --}}
            <h5 class="Dashboard-nav-listes-figure-pseudo">Admin </h5>
            <a class="Dashboard-nav-listes-figure-btn" href="">Modifier</a>


        </div>
        <li class="Dashboard-nav-listes-contenair">
            <div class=" Dashboard-nav-listes-contenair-content" >

                <i class="fa-solid fa-chart-line Dashboard-nav-listes-contenair-icon"></i>
                <a class="Dashboard-nav-listes-contenair-liste " href="{{url('/dashboard')}}">Tableau de Bord</a>
            </div>
        </li>
        <li class="Dashboard-nav-listes-contenair">
            <div class=" Dashboard-nav-listes-contenair-content">

                <i class="fa-solid fa-users-gear Dashboard-nav-listes-contenair-icon"></i>
                <a class="Dashboard-nav-listes-contenair-liste " href="{{url('/utilisateur')}}">Utilisateur</a>
            </div>
        </li>

        {{-- anglé --}}

        <li class="Dashboard-nav-listes-contenair">
            <div class=" Dashboard-nav-listes-contenair-content">
                <i class="fa-solid fa-bag-shopping Dashboard-nav-listes-contenair-icon"></i>

                <a class="Dashboard-nav-listes-contenair-liste " href="">Produits</a>
            </div>
            <div class=" Dashboard-nav-listes-contenair-content">

                <i class="fa-solid fa-chevron-right Dashboard-nav-listes-contenair-arrow arrow-right-produitsNav" ></i>
                <i class="fa-solid fa-chevron-up Dashboard-nav-listes-contenair-arrow arrow-down-produitsNav" style="display:
                none"></i>

            </div>
        </li>

        <div class="Dashboard-nav-listes-angle produitsNav" style="display: none">
            <li class="Dashboard-nav-listes-contenair">
                <div>


                    <a class="Dashboard-nav-listes-contenair-liste " href="{{url('/lesProduits')}}">Liste</a> <br>
                </div>
            </li>
            <li class="Dashboard-nav-listes-contenair">
                <div>


                    <a class="Dashboard-nav-listes-contenair-liste " href="{{url('/ajout')}}">Ajout Produit</a> <br>

                </div>
            </li>
            </li>
            <li class="Dashboard-nav-listes-contenair">
                <div>


                    <a class="Dashboard-nav-listes-contenair-liste " href="{{url('/ajoutCategorie')}}">Ajout Categorie</a> <br>

                </div>
            </li>

        </div>



        {{-- anglé --}}
        <li class="Dashboard-nav-listes-contenair">
            <div class=" Dashboard-nav-listes-contenair-content" >
                <i class="fa-solid fa-address-book Dashboard-nav-listes-contenair-icon"></i>

                <a class="Dashboard-nav-listes-contenair-liste " href="">Commande</a>
            </div>
            <div>

                <i class="fa-solid fa-chevron-right Dashboard-nav-listes-contenair-arrow arrow-right-commande" ></i>
                <i class="fa-solid fa-chevron-up Dashboard-nav-listes-contenair-arrow arrow-down-commande" style="display:
                none"></i>
            </div>
        </li>
        <div class="Dashboard-nav-listes-angle commande" style="display: none">
            <li class="Dashboard-nav-listes-contenair">
                <div>


                    <a class="Dashboard-nav-listes-contenair-liste " href="{{url('/showHeure')}}">Heure livraison</a> <br>

                </div>
            </li>
            <li class="Dashboard-nav-listes-contenair">
                <div>


                    <a class="Dashboard-nav-listes-contenair-liste " href="{{url('/showCommande/admin')}}">Les commande</a> <br>
                </div>
            </li>

        </div>

        {{-- anglé --}}
        <li class="Dashboard-nav-listes-contenair">
            <div class=" Dashboard-nav-listes-contenair-content" >
                <i class="fa-solid fa-address-book Dashboard-nav-listes-contenair-icon"></i>

                <a class="Dashboard-nav-listes-contenair-liste " href="">Gestion</a>
            </div>
            <div>

                <i class="fa-solid fa-chevron-right Dashboard-nav-listes-contenair-arrow arrow-right-gestionNav" ></i>
                <i class="fa-solid fa-chevron-up Dashboard-nav-listes-contenair-arrow arrow-down-gestionNav" style="display:
                none"></i>
            </div>
        </li>
        <div class="Dashboard-nav-listes-angle gestionNav" style="display: none">
            <li class="Dashboard-nav-listes-contenair">
                <div>


                    <a class="Dashboard-nav-listes-contenair-liste " href="{{url('/fiche')}}">Fiche de Stock</a> <br>

                </div>
            </li>
            <li class="Dashboard-nav-listes-contenair">
                <div>


                    <a class="Dashboard-nav-listes-contenair-liste " href="{{url('/payement')}}">Payement</a> <br>
                </div>
            </li>

        </div>
    </ul>


</nav>
