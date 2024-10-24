@extends('Admin.layouts.master')

@section('titre')
    Modification
@endsection

@section('contenue')
    <seciton class="ajout">
        <h1 class="ajout-title">Modification produits</h1>
        @if ($errors)
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        @endif

        <form class="ajout-contenair" method="POST" enctype="multipart/form-data"
            action="{{ route('updateProduit', $produit->id) }}">
            @csrf
            @method('PUT')

            <div class="ajout-contenair-content">
                <figure class="ajout-contenair-content-figure">

                    <img class="ajout-contenair-img" src="{{ asset('storage/imageProduit/' . $produit->image) }}" alt=""
                        id="img"><br>
                </figure>




                <label for="file_upload">
                    <i class="fa-solid fa-circle-plus ajout-contenair-content-file"></i>

                </label>
                <input type="file" id="file-img" name="modifImage">
            </div>

            {{-- <h1>test</h1> --}}


            <div action="" class="ajout-contenair-form">

                <div class="ajout-contenair-form-content">
                    {{-- <label for="text">Nom de produit</label><br> --}}
                    <i class="fa-solid fa-signature ajout-contenair-form-content-icon"></i>
                    <input type="text" class="ajout-contenair-form-content-input input" placeholder="Nom de produit"
                        id="nom de produit" value="{{ $produit->nom }}" name="modifNom">

                </div>
                <div class="ajout-contenair-form-content">
                    {{-- <label for="text">Nom de produit</label><br> --}}

                    <i class="fa-solid fa-barcode ajout-contenair-form-content-icon"></i>
                    <select id="" class="ajout-contenair-form-content-input input" name="modifCategorie">
                        <option value="{{ $produit->categorie }}">{{ $produit->categorie }}</option>
                        @foreach ($categories as $ctg)
                            <option value="{{ $ctg->categorie }}">{{ $ctg->categorie }}</option>
                        @endforeach
                    </select>
                    {{-- <input type="text" class="ajout-contenair-form-content-input input" placeholder="Categorie" name="categorie"> --}}

                </div>
                <div class="ajout-contenair-form-content">
                    {{-- <label for="text">Nom de produit</label><br> --}}
                    <i class="fa-solid fa-money-check-dollar ajout-contenair-form-content-icon"></i>
                    <input type="text" class="ajout-contenair-form-content-input input" placeholder="Prix"
                        value="{{ $produit->prix }}" name="modifPrix">

                </div>

                <div class="ajout-contenair-form-content">
                    {{-- <label for="text">Nom de produit</label><br> --}}
                    <i class="fa-solid fa-arrow-up-short-wide ajout-contenair-form-content-icon"></i>
                    <input min="1" type="number" class="ajout-contenair-form-content-input input"
                        placeholder="Quantité" name="modifQuantité" value="{{ $produit->quantite }}">

                </div>

                @if ($produit->checkPromotion)
                    <div class="ajout-contenair-form-content">
                        {{-- <h1>{{$promotion->date_fin}}</h1> --}}
                        <label for="text">Prix de promotion</label><br>
                        <i class="fa-solid fa-arrow-up-short-wide ajout-contenair-form-content-icon"></i>
                        <input min="1" type="text" class="ajout-contenair-form-content-input input" placeholder=""
                            name="modifPrixProm" value="{{ $produit->prixPromotion }}">

                    </div>



                    <div class="ajout-contenair-form-content">
                        <label for="text">Fin de promotion</label><br>
                        <i class="fa-regular fa-calendar-minus ajout-contenair-form-content-icon"></i>
                        <input min="1" type="date" class="ajout-contenair-form-content-input input" placeholder=""
                            name="modif_dateFin" value="{{ $finPromotion }}">

                    </div>
                @endif



                <div class="ajout-contenair-form-content">


                    <button class="ajout-contenair-form-content-btn" type="submit">Mettre à jour</button>
                </div>
            </div>

        </form>





    </seciton>

@endsection
