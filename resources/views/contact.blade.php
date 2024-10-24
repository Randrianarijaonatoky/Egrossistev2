
@extends('layouts.master')
@section('titre')
Contact
@endsection

@section('contenu')
<section class="connexion">
    <form action="{{Route('SendMail')}}" class="connexion-form" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        {{-- <i class="fa-regular fa-circle-user connexion-form-avatar"></i> --}}

        <h1 class="connexion-title">Contacter-moi</h1>

        <div class="connexion-form-contenair">
            <div class="connexion-form-contenair-content form-floating">
                <i class="fa-solid fa-envelope connexion-form-contenair-icon mb-0"></i>

                <input class="connexion-form-contenair-input input form-control" type="email" name="email" placeholder="Votre email">
            </div>

        </div>

        <div class="connexion-form-contenair " style="margin-bottom: 1rem">
            <textarea class="connexion-form-contenair-input input" name="message" id="" cols="30" rows="10" placeholder="votre message"></textarea>
        </div>


        <button class="connexion-form-btn" type="submit">Envoyer</button>






    </form>

</section>

@endsection
