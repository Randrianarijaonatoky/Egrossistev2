@extends('Admin.layouts.master')

@section('titre')
    Liste produits
@endsection

@section('contenue')
    <seciton class="lesProduits">
        @if ($alertP->isNotEmpty())
            <div class="alert alert-warning">
                <h4 class="alert-heading">Alerte Stock Bas !</h4>
                <p>Les produits suivants sont prèsque épuiser :</p>
                <ul>
                    @foreach ($alertP as $product)
                        <li>{{ $product->nom }} (Quantité: {{ $product->quantite }})</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- Vérifiez s'il y a des produits en rupture de stock -->
        <h1 class="lesProduits-title">Liste de tous les produits</h1>
        @if (session('success'))
            <p class="text-center  success">{{ session('success') }}</p>
        @endif

        {{-- <div class="lesProduits-categories" id="btnContainer">
        <button class="lesProduits-categories-categorie active2" onclick="filterSelection('all')">Tous</button>
        @foreach ($categories as $categorie)
            <button class="lesProduits-categories-categorie" onclick="filterSelection('{{$categorie->categorie}}')">{{$categorie->categorie}}</button>

        @endforeach

    </div> --}}
        <main class="lesProduits-listes">
            <div class="lesProduits-listes-nav">
                <select name="" id=""> categorie
                    <option value="">Tous</option>
                    <option value="">Bonbon</option>
                    <option value="">Biscuit</option>
                    <option value="">Boisson</option>
                </select>

                <form action="" method="POST" class="lesProduits-listes-nav-recherche">
                    @csrf
                    <input type="text" class=" lesProduits-listes-nav-recherche-input" placeholder="recheche">
                    <button class="lesProduits-listes-nav-recherche-btn">
                        <i class="fa-solid fa-magnifying-glass lesProduits-listes-nav-recherche-btn-icon"></i>

                    </button>

                </form>
            </div>

            <table class="table fiche-table table-bordered mt-1">


                <thead>

                    <tr class="text-center">
                        <th colspan="2">Produits</th>
                        <th rowspan="2">Quantité</th>
                        <th colspan="2">Prix </th>

                        <th rowspan="2" class="text-center ">Fin de promotion</th>
                        <th colspan="3">Action </th>

                    </tr>
                    <tr>
                        <th colspan=" " class="text-center ">image</th>
                        <th colspan=" " class="text-center ">Nom</th>
                        <th colspan=" " class="text-center ">Actuel</th>
                        <th colspan="" class="text-center ">Promotion</th>
                        <th colspan="" class="text-center ">Effacer</th>
                        <th colspan="2" class="text-center ">Ajouté</th>

                        {{-- <th colspan="2" class="text-center fiche-table-titre">Note</th> --}}



                    </tr>




                </thead>

                <tbody class="fiche-content">


                    @foreach ($produits as $produit)
                        <tr class="text-center {{ $produit->categorie }}  ">


                            {{-- Produits --}}
                            <td class="fiche-content-contenair">
                                <img src="{{ asset('storage/imageProduit/' . $produit->image) }}" alt=""
                                    class="fiche-content-contenair-image">
                            </td>
                            <td class="fiche-table-produits">{{ $produit->nom }}</td>

                            {{-- categorie --}}

                            <td id="montant">{{ $produit->quantite }}</td>
                            @if ($alertP->isNotEmpty())
                            @else
                                {{-- <td id="montant" class="StockBas"></td> --}}
                            @endif



                            {{-- prix --}}

                            @if ($produit->showPromotionButton)
                                <td id="montant">{{ $produit->prix }}</td>

                                <td id="montant">----</td>
                            @endif

                            @if ($produit->checkPromotion)
                                <td id="montant" class="prixProm">{{ $produit->prix }}</td>

                                <td id="montant">{{ $produit->prixPromotion }}</td>
                            @endif
                            <td>----</td>




                            {{-- Date de fin de la promotion --}}
                            {{-- @if ($produit->promotion)
                                <td id="montant">Date de fin : {{ $produit->promotion->date_fin }}</td>
                            @endif --}}
                            {{-- Action --}}
                            <td id="montant" class=" fiche-content-delete ">
                                <form action="{{ route('deleteProduit', $produit->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class=" fiche-content-delete-btn "
                                        onclick="confirmDeletion(event)">
                                        <i class="fa-regular fa-trash-can fiche-content-delete-icon"></i>


                                    </button>
                                </form>
                            </td>

                            <td id="montant" class="text-center fiche-content-modif ">
                                <a href="{{ url('/modification', $produit->id) }}"
                                    class="fiche-content-modif-btn">Modification</a>
                            </td>
                            @if ($produit->showPromotionButton)
                                <td id="montant" class="fiche-content-prom">

                                    <a href="{{ url('/promotion', $produit->id) }}"
                                        class="fiche-content-prom-btn">Promotion</a>

                                </td>
                            @endif

                            @if ($produit->checkPromotion)
                                <td id="montant" class="fiche-content-chek">
                                    <form action="{{ route('deletePromotion', $produit->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="fiche-content-chek-retire" type="submit"
                                            onclick="confirmRetire(event)">
                                            <i class="fa-regular fa-circle-check fiche-content-chek-btn "></i>
                                            Retiré
                                        </button>
                                    </form>
                                </td>
                            @endif
                            {{-- <td id="montant" >Ckeck</td> --}}





                        </tr>
                    @endforeach
                    <input type="hidden" value="">




                </tbody>
                {{-- total --}}


            </table>
            <!-- Pagination -->
            {{-- <div class="">
            {{ $produits->links() }}
        </div> --}}
            <div class="d-flex justify-content-end">
                <p></p>
                {{ $produits->links('vendor.pagination.bootstrap-5') }}
            </div>
        </main>









        {{-- <div class="lesProduits-cards">
        @foreach ($produits as $produit)


                <div class="lesProduits-cards-card {{$produit->categorie}}">

                    <form class="lesProduits-cards-card-contenair" action="{{route('deleteProduit', $produit->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <img class="lesProduits-cards-card-img" src="{{asset('storage/imageProduit/'.$produit->image)}}" alt="">
                        <div class="lesProduits-cards-card-desc">




                            <h2 class="lesProduits-cards-card-desc-nom">Nom :
                                <span class="lesProduits-cards-card-desc-valeur">{{$produit->nom}}</span>
                            </h2>
                            <h2 class="lesProduits-cards-card-desc-nom">Quantité:
                                <span class="lesProduits-cards-card-desc-valeur">{{$produit->quantite}}</span>
                            </h2>
                            @if ($produit->showPromotionButton)
                                <h2 class="lesProduits-cards-card-desc-nom">Prix:
                                    <span class="lesProduits-cards-card-desc-valeur">{{$produit->prix}}</span>
                                </h2>

                            @endif

                            @if ($produit->checkPromotion)
                                <h2 class="lesProduits-cards-card-desc-nom lesProduits-cards-card-desc-prom">Prix:
                                    <span class="lesProduits-cards-card-desc-valeur">{{$produit->prix}}</span>
                                </h2>

                                <h2 class="lesProduits-cards-card-desc-nom">Prix promotion:
                                    <span class="lesProduits-cards-card-desc-valeur">{{$produit->prixPromotion}}</span>
                                </h2>



                            @endif

                            <div class="lesProduits-cards-card-desc-links">

                                <a class="lesProduits-cards-card-desc-btn" href="{{url('/modification', $produit->id)}}">Modifier</a>
                                @if ($produit->showPromotionButton)
                                    <a class="lesProduits-cards-card-desc-btn" href="{{url('/promotion', $produit->id)}}">
                                        <i class="fa-solid fa-circle-plus lesProduits-cards-card-desc-btn-plus"></i>
                                        <p class="lesProduits-cards-card-desc-btn-name">Promotion</p>
                                    </a>

                                @endif

                                @if ($produit->checkPromotion)

                                <a class="lesProduits-cards-card-desc-btn" href="">
                                    <i class="fa-solid fa-check-double lesProduits-cards-card-desc-btn-check"></i>
                                    <p class="lesProduits-cards-card-desc-btn-name">Promotion</p>

                                </a>
                                @endif
                            </div>



                        </div>
                    </form>

                </div>

        @endforeach






    </div> --}}



    </seciton>


    <script>
        filterSelection("all")

        function filterSelection(c) {
            var x, i;
            x = document.getElementsByClassName("lesProduits-cards-card ");
            if (c == "all") c = "";
            // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
            for (i = 0; i < x.length; i++) {
                w3RemoveClass(x[i], "show2");
                if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show2");
            }
        }

        // Show filtered elements
        function w3AddClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
                if (arr1.indexOf(arr2[i]) == -1) {
                    element.className += " " + arr2[i];
                }
            }
        }

        // Hide elements that are not selected
        function w3RemoveClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
                while (arr1.indexOf(arr2[i]) > -1) {
                    arr1.splice(arr1.indexOf(arr2[i]), 1);
                }
            }
            element.className = arr1.join(" ");
        }
        var btnContainer = document.getElementById("btnContainer");
        console.log(btnContainer);
        var btns = btnContainer.getElementsByClassName("lesProduits-categories-categorie");
        console.log(btns);
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("active2");
                current[0].className = current[0].className.replace(" active2", "");
                this.className += " active2";
            });
        }
    </script>

@endsection
