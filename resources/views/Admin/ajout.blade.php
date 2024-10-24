@extends('Admin.layouts.master')

@section('titre')
Ajout produits
@endsection

@section('contenue')
<seciton class="ajout">
    <h1 class="ajout-title">Ajout produits</h1>
    @if (session('success'))
    <p class="success text-center">{{session('success')}}</p>

    @endif

    @if ($errors)
    @foreach ($errors->all() as $item)
    <p>{{$item}}</p>

    @endforeach

    @endif

    <form class="ajout-contenair" action="{{route('addProduit')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="ajout-contenair-content">
            <figure class="ajout-contenair-content-figure">

                <img class="ajout-contenair-img" src="{{asset('images/imgChange.jpg')}}" alt="" id="img"><br>
            </figure>
            <input type="file" id="file-img" name="image">

        </div>
        {{-- @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror --}}

        <div  class="ajout-contenair-form" >

            <div class="ajout-contenair-form-contenair">
                <div class="ajout-contenair-form-content">
                    {{-- <label for="text">Nom de produit</label><br> --}}
                    <i class="fa-solid fa-signature ajout-contenair-form-content-icon"></i>
                    <input type="text" class="ajout-contenair-form-content-input input" placeholder="Nom de produit" id="nom de produit" name="nomP">

                </div>
                <div class="ajout-contenair-form-content">
                    {{-- <label for="text">Nom de produit</label><br> --}}

                    <i class="fa-solid fa-barcode ajout-contenair-form-content-icon"></i>
                    <select name="categorie" id="" class="ajout-contenair-form-content-input input">
                        @foreach ($categories as $ctg)

                        <option value="{{$ctg->categorie}}">{{$ctg->categorie}}</option>
                        @endforeach
                    </select>
                    {{-- <input type="text" class="ajout-contenair-form-content-input input" placeholder="Categorie" name="categorie"> --}}

                </div>

            </div>
            <div class="ajout-contenair-form-contenair">

                <div class="ajout-contenair-form-content">
                    {{-- <label for="text">Nom de produit</label><br> --}}
                    <i class="fa-solid fa-money-check-dollar ajout-contenair-form-content-icon"></i>
                    <input type="text" class="ajout-contenair-form-content-input input" placeholder="Prix" name="prix">

                </div>
                <div class="ajout-contenair-form-content">
                    {{-- <label for="text">Nom de produit</label><br> --}}
                    <i class="fa-solid fa-arrow-up-short-wide ajout-contenair-form-content-icon"></i>
                    <input min="1" type="number" class="ajout-contenair-form-content-input input" placeholder="Quantité" name="Quantité">

                </div>
            </div>


            <h1>Description</h1>
            <div class="ajout-contenair-form-content">
                <label for="conposons">Coposon de produit</label><br>
                <i class="fa-solid fa-circle-info ajout-contenair-form-content-icon"></i>
                <input  type="text" class="ajout-contenair-form-content-input input" placeholder="conposon de votre produt" name="conposons">

            </div>
            <div class="ajout-contenair-form-content">
                <label for="date">Date de creation</label><br>
                <i class="fa-solid fa-arrow-up-short-wide ajout-contenair-form-content-icon"></i>
                <input  type="date" class="ajout-contenair-form-content-input input" placeholder="conposon de votre produt" name="date_creation">

            </div>
            <div class="ajout-contenair-form-content">
                <label for="description">Desciption de produit</label><br>

                {{-- <i class="fa-solid fa-arrow-up-short-wide ajout-contenair-form-content-icon"></i> --}}
                {{-- <textarea  type="text" class="ajout-contenair-form-content-input input" placeholder="Quantité" name="decription"> --}}
                <textarea name="description" id="" cols="30" rows="5" placeholder="Descpition du produit" class="ajout-contenair-form-content-input input"></textarea>



            </div>




            <div class="ajout-contenair-form-content">


                <button class="ajout-contenair-form-content-btn">Ajouté</button>
            </div>
        </div>

    </form>





</seciton>

@endsection

