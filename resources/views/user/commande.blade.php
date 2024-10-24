@extends('user.layouts.master')

@section('titre')
    Commande
@endsection

@section('contenue')
    <section class="userCompte">

        @if (session('succsess'))
            <p class="success">{{ session('success') }}</p>
        @endif

        <table class="userCompte-achat table">
            <h1>Voici tous les commande</h1>
            <thead class="userCompte-achat-title" style="margin-bottom: 1rem">
                <tr class="userCompte-achat-title">
                    <th colspan="9" class="userCompte-achat-title-text"> Commande</th>
                </tr>
            </thead>
            <thead>

                <tr>
                    <th colspan="2">Produit</th>
                    <th>Nom</th>
                    <th>Quantite</th>
                    <th>Prix</th>
                    {{-- <th>date</th> --}}
                    <th colspan="2">Livraison</th>
                    <th>Frais</th>
                    <th>Action</th>

                </tr>
            </thead>

            <tbody>
                @if ($commandes->isNotEmpty())
                    @foreach ($commandes as $commande)
                        <tr>
                            <td class="userCompte-achat-timeAgo">{{ $commande->time_ago }}</td>

                            <td>
                                <img src="{{ asset('storage/imageProduit/' . $commande->image) }}" alt=""
                                    class="userCompte-achat-img">
                            </td>
                            <td>{{ $commande->nom_produits }}</td>
                            <td>{{ $commande->quantite }}</td>
                            <td>{{ $commande->prix }}</td>
                            {{-- <td>{{$commandes->statut}}</td> --}}
                            <td>{{ $commande->formatted_date_livraison }}</td>
                            <td> à {{ $commande->heure_de_livraison }}</td>
                            <td> {{ $commande->frais_de_livraison }}</td>
                            <td>
                                {{-- <form action="{{route('annulationCommande', $commande->id)}}" method="POST" class="annulationform" >
                        @csrf
                        @method('POST')
                        <button id="btnAnnule" data-id="{{$commande->id}}" id="btnAnnule-{{ $commande->id }}" type="button" class="userCompte-achat-btnAnuller" title="annulation du commande">
                            <i class="fa-regular fa-trash-can"></i>
                            Annuler
                        </button>
                    </form> --}}
                                @if ($commande->formatted_date_livraison == $dateNow)
                                    <p class="">Livré</p>
                                @else
                                    <form action="{{ route('annulationCommande', $commande->id) }}" method="POST"
                                        class="annulationform" id="annulationForm-{{ $commande->id }}">
                                        @csrf
                                        <button id="btnAnnule-{{ $commande->id }}" data-id="{{ $commande->id }}"
                                            type="button" class="userCompte-achat-btnAnnuler userCompte-achat-btnAnuller"
                                            title="Annulation de la commande">
                                            <i class="fa-regular fa-trash-can"></i> Annuler
                                        </button>
                                    </form>
                                @endif

                            </td>

                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td>Accunne commande pour le moment</td>
                    </tr>
                @endif



            </tbody>
            <tfoot>

                <tr>
                    <th colspan="8"></th>
                    <th>
                        {{-- <a href="">Voir plus</a> --}}
                        {{ $commandes->links('vendor.pagination.bootstrap-5') }}

                    </th>
                </tr>
            </tfoot>
        </table>
    </section>
@endsection
