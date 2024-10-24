@extends('Admin.layouts.master')

@section('titre')
Ajout Heurre de livraison
@endsection

@section('contenue')

<seciton class="ajoutCategorie">
    <h1 class="ajout-title">Ajout Heure de livraison</h1>
    @if (session('success'))
    <p class="text-center  success">{{session('success')}}</p>

    @endif
    @if (session('error'))
        <p class="text-center  error">{{session('error')}}</p>

    @endif
    <main class="ajoutCategorie-main">

        <div class="ajoutCategorie-categories">
            <h1 class="ajoutCategorie-categories-title">Les heures de livraison</h1>
            @foreach ($heures as $heure)
                <form action="{{ route('deleteHeure', $heure->id) }}" class="ajoutCategorie-cards" onsubmit="" method="POST">
                    @csrf
                    @method('DELETE')

                    <div class="ajoutCategorie-categories-ctg">
                        <p>{{$heure->heurre}}</p>
                        <button  class="fa-regular fa-trash-can ajoutCategorie-categories-ctg-delete" onclick="confirmDeletion(event)"></button>
                    </div>

                    @endforeach
                </form>

        </div>

        <div class="ajoutCategorie-contenair">

            {{-- <lord-icon trigger="hover" src="/my-icon.json"></lord-icon> --}}
            <h1 class="ajoutCategorie-categories-title">Ajout heures de livraison</h1>






            <form action="{{route('addTime')}}" method="POST" class="ajoutCategorie-contenair-form">
                @csrf
                @if ($errors)
                    {{-- <p>{{$errors}}</p> --}}

                @endif

                @if (session('succcess'))
                    <p class='succcess'>{{sesion('succcess')}}</p>

                @endif
                <div class="ajout-contenair-form-content mt-2">
                    <label for="text">Heure </label><br>

                    <i class="fa-regular fa-clock ajout-contenair-form-content-icon"></i>
                    <input type="time" class="ajout-contenair-form-content-input input" name="heure" >

                </div>


                <div class="ajout-contenair-form-content mt-2">


                    <button class="ajout-contenair-form-content-btn" type="submit">Ajouté</button>
                </div>
            </form>

        </div>
    </main>







</seciton>

@endsection
