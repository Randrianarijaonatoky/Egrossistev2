@extends('user.layouts.master')

@section('titre')
    Notifications
@endsection

@section('contenue')
    <section class="notificationUser">
        <div class="notificationUser-cards">
            @if ($notifications->isNotEmpty())
                @foreach ($notifications as $notification)
                    <div class="notificationUser-cards-card">
                        <div class="notificationUser-cards-card-head">
                            <h1 class="notificationUser-cards-card-title"> {{ $notification->type }} </h1>

                            <p class="notificatoinUser-cards-card-head-time">{{ $notification->time_ago }}</p>

                        </div>

                        <div class="notificationUser-cards-card-textes">
                            <div class="">
                                <p class="notificationUser-cards-card-textes-para">
                                    Nom:
                                    <span
                                        class="notificationUser-cards-card-textes-para-value">{{ json_decode($notification->data)->nom_produit }}</span>

                                </p>
                                <p class="notificationUser-cards-card-textes-para">
                                    Quantite:
                                    <span
                                        class="notificationUser-cards-card-textes-para-value">{{ json_decode($notification->data)->quantite }}</span>

                                </p>
                                <p class="notificationUser-cards-card-textes-para">
                                    Prix:
                                    <span
                                        class="notificationUser-cards-card-textes-para-value">{{ json_decode($notification->data)->prix }}</span>

                                </p>

                            </div>
                            {{-- <img src="{{asset('storage/imageProduit/'.json)}}" alt=""> --}}
                        </div>
                        <hr>
                    </div>
                @endforeach
            @else
                <h1 class="text-center m-2" style="padding: 2rem; font-size: 2rem; font-weight: 400">Accunne notification
                </h1>
            @endif

        </div>
    </section>

@endsection
