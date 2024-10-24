

@extends('layouts.master')
@section('titre')
Inscription
@endsection

@section('contenu')
<section class="connexion">
    <form action="{{route('singup')}}" class="connexion-form" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- <i class="fa-regular fa-circle-user connexion-form-avatar"></i> --}}

        <h1 class="connexion-title">Inscrivez-vous</h1>
        @if ($errors)
            @foreach ($errors->all() as $item)
                <p class="text-danger">{{ $item }}</p>
            @endforeach
        @endif


        <div class="connexion-form-contenair">

            <div class="connexion-form-contenair-content">

                <i class="fa-solid fa-user connexion-form-contenair-icon mb-0"></i>

                <input class="connexion-form-contenair-input input" type="text" name="pseudo" placeholder="Votre pseudo">
            </div>

            <div class="connexion-form-contenair-content">

                <i class="fa-solid fa-envelope connexion-form-contenair-icon mb-0"></i>

                <input class="connexion-form-contenair-input input" type="text" name="email" placeholder="Votre email">
            </div>



        </div>
        <div class="connexion-form-contenair">
            <div class="connexion-form-contenair-content">

                <i class="fa-solid fa-lock connexion-form-contenair-icon"></i>
                <input class="connexion-form-contenair-input input" type="password" name="pwd" placeholder="votre mot de pass">
            </div>

        </div>
        <div class="connexion-form-contenair">
            <div class="connexion-form-contenair-content">

                <i class="fa-solid fa-lock connexion-form-contenair-icon"></i>
                <input class="connexion-form-contenair-input input" type="password" name="pwdConf" placeholder="Confirmer votre mot de pass">
            </div>

        </div>
        <div class="connexion-form-contenair">
            <div class="connexion-form-contenair-content">

                <i class="fa-regular fa-image connexion-form-contenair-icon"></i>
                <input class="connexion-form-contenair-input input" type="file" name="pdp" >
            </div>

        </div>


        <button class="connexion-form-btn" type="submit">S'inscrire</button>


    </form>
</section>


@endsection



