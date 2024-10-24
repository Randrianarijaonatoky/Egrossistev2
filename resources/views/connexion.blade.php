@extends('layouts.master')
@section('titre')
    Connexion
@endsection

@section('contenu')
    <section class="connexion">
        <form action="{{ route('login') }}" class="connexion-form" method="POST">
            @csrf

            {{-- <i class="fa-regular fa-circle-user connexion-form-avatar"></i> --}}

            <h1 class="connexion-title">Connectez-vous</h1>
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="error">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>

            <div class="connexion-form-contenair" data-aos="fade-right" data-aos-duration="1500">
                <div class="connexion-form-contenair-content form-floating">
                    <i class="fa-solid fa-envelope connexion-form-contenair-icon mb-0"></i>

                    <input class="connexion-form-contenair-input input form-control" type="email" name="email"
                        placeholder="Votre email">
                </div>

            </div>
            <div class="connexion-form-contenair" data-aos="fade-left" data-aos-duration="1500">
                <div class="connexion-form-contenair-content">
                    <i class="fa-solid fa-lock connexion-form-contenair-icon"></i>
                    <input class="connexion-form-contenair-input input" type="password" name="pwd"
                        placeholder="votre mot de pass" id="pwd">

                    <i class="fa-regular fa-eye connexion-form-contenair-content-voir" id="voir"></i>
                    <i class="fa-regular fa-eye-slash connexion-form-contenair-content-voir" id="caché"
                        style="display: none"></i>
                </div>
            </div>


            <button class="connexion-form-btn" type="submit">Connexion</button>




            <h4 class="connexion-form-lien">Créer une compte
                <a href="{{ url('/inscription') }}" class="connexion-form-link">Inscription</a>
            </h4>

            <div class="connexion-form-continue">
                <div class="connexion-form-continue-hr"></div>
                <p class="connexion-form-continue-title">Connecter avec </p>
                <div class="connexion-form-continue-hr"></div>

            </div>

            <a href="{{ route('google.auth') }}" class="connexion-form-google">
                <i class="fa-brands fa-google"></i>
                Google
            </a>

        </form>

        <script>
            const voir = document.getElementById('voir');
            const caché = document.getElementById('caché');
            const pwd = document.getElementById('pwd');
            console.log(voir);

            voir.addEventListener('click', () => {
                console.log('voir');

                caché.style.display = 'block';
                voir.style.display = 'none';
                // pwd.style.type = 'text';
                pwd.type = 'text';

            });

            caché.addEventListener('click', () => {
                voir.style.display = 'block';
                caché.style.display = 'none';
                pwd.type = 'password';
            })
        </script>
    </section>
@endsection
