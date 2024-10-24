@extends('user.layouts.master')
@section('titre')
    Tableau de bord
@endsection

@section('contenue')



    <section class="userCompte">
        {{-- <nav class="navUser">
            <h1>Bienvenue sur votre compte</h1>
        </nav> --}}


        <section class="userCompte-compte">

            <div class="userCompte-compte-card">
                {{-- <i class="fa-brands fa-shopify userCompte-compte-card-icon"></i> --}}
                <lord-icon src="https://cdn.lordicon.com/mqdkoaef.json" trigger="hover" colors="primary:#feb600"
                    style="width:3rem;height:3rem;">
                </lord-icon>
                <p class="userCompte-compte-card-nom">Commande</p>
                <h2 class="userCompte-compte-card-value">{{ $countCommande }}</h2>

            </div>
            <div class="userCompte-compte-card">
                {{-- <i class="fa-solid fa-gift userCompte-compte-card-icon"></i> --}}
                <lord-icon src="https://cdn.lordicon.com/fnxnvref.json" trigger="hover" colors="primary:#feb600"
                    style="width:3rem;height:3rem">
                </lord-icon>
                <p class="userCompte-compte-card-nom">Coupon de Réduction</p>
                <h2 class="userCompte-compte-card-value">{{ $countCoupon }}</h2>

            </div>
            <div class="userCompte-compte-card">
                <i class="fa-brands fa-shopify userCompte-compte-card-icon"></i>
                <p class="userCompte-compte-card-nom">Produit livre</p>
                <h2 class="userCompte-compte-card-value">15</h2>

            </div>
            <div class="userCompte-compte-card">
                {{-- <i class="fa-solid fa-credit-card userCompte-compte-card-icon"></i> --}}
                <lord-icon src="https://cdn.lordicon.com/gjjvytyq.json" trigger="hover" colors="primary:#feb600"
                    style="width:3rem;height:3rem">
                </lord-icon>
                <p class="userCompte-compte-card-nom">Paiement effectué ()</p>
                <h2 class="userCompte-compte-card-value">Ariary {{ $totalAmount }}</h2>

            </div>

        </section>

        <main class="userCompte-contenair">

            <table class="userCompte-achat table">
                <thead class="userCompte-achat-title" style="margin-bottom: 1rem">
                    <tr class="userCompte-achat-title">
                        <th colspan="7" class="userCompte-achat-title-text"> Produit Acheté</th>
                    </tr>
                </thead>
                <thead>

                    <tr>
                        <th>Produit</th>
                        <th>Nom</th>
                        <th>Quantite</th>
                        <th>Prix</th>
                        <th>Statut</th>


                    </tr>
                </thead>

                @if ($commandes->isNotEmpty())
                    <tbody>
                        @foreach ($commandes as $commande)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/imageProduit/' . $commande->image) }}" alt=""
                                        class="userCompte-achat-img">
                                </td>
                                <td>{{ $commande->nom_produits }}</td>
                                <td>{{ $commande->quantite }}</td>
                                <td>{{ $commande->prix }}</td>
                                {{-- <td>{{$commandes->statut}}</td> --}}
                                <td>en a tente</td>
                            </tr>
                        @endforeach
                    </tbody>
                @else
                    <tbody>
                        <tr>
                            <td>Accunne commande</td>

                        </tr>
                    </tbody>
                @endif



                <tfoot>

                    <tr>
                        <th colspan="4"></th>
                        <th>
                            <a href="{{ url('/commandeUser') }}">Voir plus</a>

                        </th>
                    </tr>
                </tfoot>
            </table>


            <section class="userCompte-paiement">
                <h1 class="userCompte-paiement-title">Paiement</h1>
                <div class="userCompte-paiement-cards">
                    @if ($paiements->isNotEmpty())
                        @foreach ($paiements as $paiement)
                            <div class="userCompte-paiement-cards-card">
                                <h3 class="userCompte-paiement-cards-card-prix">{{ $paiement->amount }} Ar</h3>

                                <p class="userCompte-paiement-cards-card-date">{{ $paiement->formatted_date }}
                                    {{-- <span>{{$heure}}</span> --}}
                                </p>
                                <hr>
                            </div>
                        @endforeach
                    @else
                        <h1 class="userCompte-paiement-cards-none">Accune paiement </h1>
                    @endif



                </div>
            </section>

        </main>

    </section>
    {{-- <ul>
        @foreach ($notifications as $notification)
            <li>{{ $notification->data['message'] }}</li>
        @endforeach
    </ul> --}}






@endsection
