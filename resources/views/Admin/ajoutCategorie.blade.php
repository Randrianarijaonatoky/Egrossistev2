@extends('Admin.layouts.master')

@section('titre')
Ajout Categoire
@endsection

@section('contenue')
<seciton class="ajoutCategorie">
    <h1 class="ajout-title">Ajout Categorie</h1>
    @if (session('success'))
    <p class="text-center  success">{{session('success')}}</p>

    @endif
    @if (session('error'))
        <p class="text-center  error">{{session('error')}}</p>

    @endif

    <main class="ajoutCategorie-main">

        <div class="ajoutCategorie-categories">
            <h1 class="ajoutCategorie-categories-title">Toutes les categories</h1>
            @foreach ($categories as $categorie)
                <form action="{{ route('deleteCategorie', $categorie->id) }}" class="ajoutCategorie-cards" onsubmit="" method="POST">
                    @csrf
                    @method('DELETE')

                    <div class="ajoutCategorie-categories-ctg">
                        <p>{{$categorie->categorie}}</p>
                        <button  class="fa-regular fa-trash-can ajoutCategorie-categories-ctg-delete" onclick="confirmDeletion(event)"></button>
                    </div>

                    @endforeach
                </form>

        </div>

        <div class="ajoutCategorie-contenair">
            <h1 class="ajoutCategorie-categories-title">Ajout heures de livraison</h1>


            <form action="{{route('addCategorie')}}" method="POST" enctype="multipart/form-data" class="ajoutCategorie-contenair-form">
                @csrf

                <div class="ajout-contenair-form-content mt-2">
                    {{-- <label for="text">Nom de produit</label><br> --}}

                    <i class="fa-solid fa-barcode ajout-contenair-form-content-icon"></i>
                    <input type="text" class="ajout-contenair-form-content-input input" placeholder="Categorie" name="categorie">

                </div>
                <div class="ajout-contenair-form-content mt-2">
                    {{-- <label for="text">Nom de produit</label><br> --}}

                    <i class="fa-solid fa-image ajout-contenair-form-content-icon"></i>
                    <input type="file" class="ajout-contenair-form-content-input input" name="imageCategorie">

                </div>

                <div class="ajout-contenair-form-content mt-2">


                    <button class="ajout-contenair-form-content-btn" type="submit">Ajouté</button>
                </div>
            </form>

        </div>
    </main>

    {{-- <h1 class="">Les Categories</h1> --}}






</seciton>

@endsection
