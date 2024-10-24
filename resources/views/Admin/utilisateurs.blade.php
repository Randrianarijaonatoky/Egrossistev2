@extends('Admin.layouts.master')

@section('titre')
Les Utilisateurs

@endsection

@section('contenue')
<section class="utilisateur">
    @if (session('success'))
        <p class="success text-center" >{{session('success')}}</p>

    @endif
    <h1 class="utilisateur title">Les utilisateurs</h1>
    <div class="utilisateur-cards">
        @foreach ($users as $user)
            <form class="utilisateur-cards-card" action="{{route('deleteUser', $user->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <div class="utilisateur-cards-card-bg"></div>
                    <figure class="utilisateur-cards-card-figure">
                        <img src="{{asset('storage/imageUser/'.$user->pdp)}}" class="utilisateur-cards-card-figure-img" alt="">
                    </figure>

                    <div class="utilisateur-cards-card-textes">
                        <h1>{{$user->name}}</h1>
                        <p>{{$user->email}}</p>
                    </div>
                <div class="utilisateur-cards-card-action">
                    <h2 class="utilisateur-cards-card-action-id">id: {{$user->id}}</h2>
                    <button type="submit" class="fa-regular fa-trash-can utilisateur-cards-card-action-btn"  onclick="confirmDeletion(event)">
                        {{-- <i class="fa-regular fa-trash-can"></i> --}}
                    </button>
                </div>

                <!-- The Modal -->
            </form>

        @endforeach

        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Effacer</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        Ête-vous sure de voulloir effacer cette utilisateur
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Effacer</button>
                        {{-- <button class="btn btn-danger">Effacer</button> --}}
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>

@endsection
