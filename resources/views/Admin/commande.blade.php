@extends('Admin.layouts.master')

@section('titre')
    FIche de stock
@endsection

@section('contenue')
    <seciton class="fiche">
        {{-- <h2 class="fiche-title">Fiche de stock</h2> --}}
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
                        <th colspan="3">Produits</th>
                        <th colspan="2">Prix </th>

                        <th colspan="4" class="text-center ">Livraison</th>
                        {{-- <th colspan="">Action </th> --}}

                    </tr>
                    <tr>
                        <th colspan=" " class="text-center ">image</th>
                        <th colspan=" " class="text-center ">Nom</th>
                        <th rowspan="">Quantité</th>
                        <th colspan=" " class="text-center ">Montant</th>
                        <th colspan="" class="text-center ">statut</th>
                        <th colspan="" class="text-center ">Date</th>
                        <th colspan="" class="text-center ">heure</th>
                        <th colspan="" class="text-center ">Lieu</th>
                        <th colspan="" class="text-center ">Note</th>

                        {{-- <th colspan="2" class="text-center fiche-table-titre">Note</th> --}}



                    </tr>




                </thead>

                <tbody class="fiche-content">


                    @foreach ($commandes as $commande)
                        <tr class="text-center  ">


                            {{-- Produits --}}
                            <td class="fiche-content-contenair">
                                <img src="{{ asset('storage/imageProduit/' . $commande->image) }}" alt=""
                                    class="fiche-content-contenair-image">
                            </td>
                            <td class="fiche-table-produits">{{ $commande->nom_produits }}</td>

                            {{-- categorie --}}

                            <td id="montant">{{ $commande->quantite }}</td>



                            <td id="montant">{{ $commande->prix }}</td>





                            <td>{{ $commande->statu_paiement }}</td>



                            @php

                                \Carbon\Carbon::setLocale('fr');
                                $date = $commande->date_de_livraison;

                                $dateCommande = \Carbon\Carbon::parse($date)->translatedFormat('d F Y');
                            @endphp

                            {{-- <td>{{$commande->date_de_livraison}}</td> --}}
                            <td>{{ $dateCommande }}</td>
                            <td>{{ $commande->heurre }}</td>
                            <td>{{ $commande->lieu }}</td>
                            <td>{{ $commande->statut }}</td>


                            {{-- @if ($produit->checkPromotion)


                            <td id="montant" class="fiche-content-chek">
                                <form action="{{route('deletePromotion', $produit->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="fiche-content-chek-retire" type="submit" onclick="confirmRetire(event)">
                                        <i class="fa-regular fa-circle-check fiche-content-chek-btn "></i>
                                        Retiré
                                    </button>
                                </form>
                            </td>

                          @endif --}}
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
                {{ $commandes->links('vendor.pagination.bootstrap-5') }}
            </div>
        </main>




    </seciton>
@endsection
