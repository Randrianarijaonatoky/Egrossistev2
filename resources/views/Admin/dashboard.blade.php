@extends('Admin.layouts.master')
@section('titre')
    Dashboard
@endsection

@section('contenue')
    @if (session('success'))
    @endif
    <section class="dashboard">
        {{-- <div class="alert">
        <span class="closebtn" ></span>
        {{session('success')}}
    </div> --}}


        <div class="">

            <div class="dashboard-detail">
                <h1 class="dashboard-detail-title">Tableau de bord</h1>
                <div class="dashboard-detail-cards">
                    <div class="dashboard-detail-cards-card">
                        <div class="dashboard-detail-cards-card-content">
                            <h1 class="dashboard-detail-cards-card-content-desc">Utilisateurs</h1>
                            <h3 class="dashboard-detail-cards-card-content-count">{{ $totalUser }}</h3>
                        </div>

                        <a class="fa-solid fa-users dashboard-detail-cards-card-icon" href="{{ url('/utilisateur') }}"></a>
                    </div>
                    <div class="dashboard-detail-cards-card">
                        <div class="dashboard-detail-cards-card-content">
                            <h1 class="dashboard-detail-cards-card-content-desc">Produits</h1>
                            <h3 class="dashboard-detail-cards-card-content-count">{{ $totalProduit }}</h3>
                        </div>

                        <a class="fa-solid fa-bag-shopping  dashboard-detail-cards-card-icon"
                            href="{{ url('/lesProduits') }}"></a>
                    </div>
                    <div class="dashboard-detail-cards-card">
                        <div class="dashboard-detail-cards-card-content">
                            <h1 class="dashboard-detail-cards-card-content-desc">Achat</h1>
                            <h3 class="dashboard-detail-cards-card-content-count">15</h3>
                        </div>

                        <a class="fa-brands fa-shopify  dashboard-detail-cards-card-icon" href=""></a>
                    </div>
                    <div class="dashboard-detail-cards-card">
                        <div class="dashboard-detail-cards-card-content">
                            <h1 class="dashboard-detail-cards-card-content-desc">Admin</h1>
                            <h3 class="dashboard-detail-cards-card-content-count">{{ $totalAdmin }}</h3>
                        </div>

                        <a class="fa-solid fa-lock  dashboard-detail-cards-card-icon" href=""></a>
                    </div>



                </div>
            </div>

            <div class="dashboard-contenue">

                <div class="dashboard-contenue-paiement">
                    <h1 class="dashboard-contenue-paiement-title">Paiement</h1>
                    <div class="dashboard-contenue-paiement-card">
                        <figure class="dashboard-contenue-paiement-card-figure">

                        </figure>
                    </div>


                </div>

                <div class="dashboard-contenue-notif">
                    <h1 class="dashboard-contenue-notif-title">Notification</h1>

                    @foreach ($notifications as $notification)
                        <div class="dashboard-contenue-notif-card">
                            <div class="dashboard-contenue-notif-card-head">
                                <h3 class="dashboard-contenue-notif-card-head-title">{{ $notification->type }}</h3>

                                <p class="dashboard-contenue-notif-card-head-time">{{ $notification->time_ago }}</p>
                            </div>
                            <div class="dashboard-contenue-notif-card-content">
                                <div class="dashboard-contenue-notif-card-content-profile">
                                    <img src="{{ asset('images/1.jpg') }}" alt=""
                                        class="dashboard-contenue-notif-card-content-img">
                                    <div class="dashboard-contenue-notif-card-content-detail">
                                        <p>Randrianarijaona Toky</p>

                                    </div>

                                </div>
                                <a href="{{ url('/notificationAdmin') }}">
                                    <i class="fa-regular fa-eye"></i>
                                    Voir

                                </a>

                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
    </section>
@endsection
