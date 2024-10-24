@extends('Admin.layouts.master')

@section('titre')
Ajout Promotion
@endsection

@section('contenue')
<seciton class="ajout">
    <h1 class="ajout-title">Ajouté une promotion </h1>
    @if (session('error'))
        <p class="text-center  error">{{session('error')}}</p>

    @endif

    @csrf
    <form class="ajout-contenair" method="POST" enctype="multipart/form-data" action="{{route('addPromotion')}}" >
        @method('POST')
        @csrf

        <div class="ajout-contenair-content">
            <figure class="ajout-contenair-content-figure">

                <img class="ajout-contenair-img" src="{{asset('storage/imageProduit/'.$produit->image)}}" alt="" id="img"><br>
            </figure>
            {{-- <input type="file" id="file-img" name="modifImage"> --}}
            <input type="hidden" value="{{$produit->id}}" name="idProduit">
            <input type="hidden" value="{{$produit->image}}" name="imgProduit">

        </div>

        <div action="" class="ajout-contenair-form" >



            <div class="ajout-contenair-form-content">
                {{-- <label for="text"></label><br> --}}
                <i class="fa-solid fa-signature ajout-contenair-form-content-icon"></i>
                {{-- <input type="text" class="ajout-contenair-form-content-input input" placeholder="Prix" value="{{$produit->prix}}" name="modifPrix"> --}}
                <p class="ajout-contenair-form-content-input input" >  Nom de Produit:  {{$produit->nom}}</p>
                <input type="hidden" value="{{$produit->nom}}" name="nomPromotion">

            </div>
            <div class="ajout-contenair-form-content">
                {{-- <label for="text"></label><br> --}}
                <i class="fa-solid fa-money-check-dollar ajout-contenair-form-content-icon"></i>
                {{-- <input type="text" class="ajout-contenair-form-content-input input" placeholder="Prix" value="{{$produit->prix}}" name="modifPrix"> --}}
                <p class="ajout-contenair-form-content-input input" >  Prix actuelle: {{$produit->prix}}</p>
                <input type="hidden" value="{{$produit->prix}}" name="prixOld">

            </div>
            <div class="ajout-contenair-form-content">
                {{-- <label for="text"></label><br> --}}
                <i class="fa-solid fa-money-check-dollar ajout-contenair-form-content-icon"></i>
                <input type="text" class="ajout-contenair-form-content-input input" placeholder="Prix de promotion"  name="prixPromotion">


            </div>
            <div class="ajout-contenair-form-content">
                <label for="text">Fin de promotion:</label><br>
                <i class="fa-solid fa-money-check-dollar ajout-contenair-form-content-icon"></i>
                <input type="date" class="ajout-contenair-form-content-input input" placeholder="Find de promotion"  name="finPromotion">


            </div>



            <div class="ajout-contenair-form-content">


                <button class="ajout-contenair-form-content-btn" type="submit">Confirmer</button>
            </div>
        </div>

    </form>





</seciton>

@endsection
