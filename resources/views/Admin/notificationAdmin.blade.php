@extends('Admin.layouts.master')

@section('contenue')
<section class="notificationAdmin">
    @if (session('success'))
    <p class="success">{{session('success')}}</p>

    @endif
    <div class="notificationAdmin-cards">

        @foreach($notifications as $notification)
            <div class="notificationAdmin-cards-card">
                <div class="notificationAdmin-cards-card-head">
                    <h1 class="notificationAdmin-cards-card-title">{{$notification->type}}</h1>

                    <p class="notificationAdmin-cards-card-time">{{$notification->time_ago}}
                </div>

                <div class="notificationAdmin-cards-card-textes">
                    <h2 class="notificationAdmin-cards-card-textes-title">
                        Client:
                        {{json_decode($notification->data)->nom}}
                        {{json_decode($notification->data)->prenom}}


                    </h2>

                    {{-- <p>Commande ID: {{ json_decode($notification->data)->id_commande }}</p> --}}
                    <p class="notificationAdmin-cards-card-textes-title">Nom produit:
                        {{ json_decode($notification->data)->nom_produit }}
                    </p>
                    <p class="notificationAdmin-cards-card-textes-title">Quantité:
                        {{ json_decode($notification->data)->quantite }}
                    </p>
                    <p class="notificationAdmin-cards-card-textes-title">Prix:
                        {{ json_decode($notification->data)->prix }}
                    </p>

                    <div class="notificationAdmin-cards-card-textes-btns">

                        <form action="{{ route('validerAnnulation', $notification->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="notificationAdmin-cards-card-textes-btns-confirm" onclick="confirmAnnulation(event)">Confirmer</button>
                        </form>
                        <form action="{{route('refuserAnnulation', $notification->id)}}" method="POST">
                            @csrf
                            <button type="submit" class="notificationAdmin-cards-card-textes-btns-annuler">Refuser</button>
                        </form>
                    </div>
                </div>
            </div>
            <hr>
        @endforeach
    </div>

</section>


@endsection
