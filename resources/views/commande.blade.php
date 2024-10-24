@extends('layouts.master')

@section('titre')
    Commande
@endsection

@section('contenu')
    <section class="checkout">
        @if (Session::has('user'))

            <form action="{{ route('addCommande') }}" class="checkout-form" method="POST" id="validationForm" data-aos="zoom-in"
                data-aos-duration="1500">
                @csrf
                <h3 class="checkout-title">Formulaire de la commande</h3>
                <h3 class="checkout-desc"> Vous passez le <span class="checkout-desc-para">paiement</span> au monment de la
                    <span class="checkout-desc-para">livraison</span> </h3>

                <h4 class="checkout-montant" id="showPrix">Montant à payer: <span class="checkout-montant-prix">45000
                        Ar</span></h4>



                @if (Session('success'))
                    <p class="alert">{{ Session('success') }}</p>
                @endif
                @if ($errors)
                    @foreach ($errors->all() as $item)
                        <p>{{ $item }}</p>
                    @endforeach
                @endif
                <p class="checkout-prix"></p>
                <div class="card" id=" card"></div>

                <div class="checkout-form-content">
                    <div class="checkout-form-container">
                        <i class="fa-solid fa-at input-icon"></i>

                        <input type="text" class="input-form" id="firstname" name="prenom" placeholder="Votre prénom">

                    </div>

                    <div class="checkout-form-container">
                        <i class="fa-solid fa-at input-icon"></i>

                        <input type="text" class="input-form" placeholder="votre nom" id="card-name" name="nom">
                    </div>
                </div>


                <div class="checkout-form-content">

                    <div class="checkout-form-container">
                        {{-- <label for="">Adresse de livraison</label><br> --}}
                        <i class="fa-solid fa-phone input-icon"></i>

                        <input type="text" class="input-form" placeholder="Contact" id="adresse" name="contact">
                    </div>




                </div>

                <div class="checkout-form-content">

                    <div class="checkout-form-container">
                        {{-- <label for="">Adresse de livraison</label><br> --}}
                        <i class="fa-solid fa-truck-ramp-box input-icon"></i>

                        <input type="text" class="input-form" placeholder="addresse de livraison" id="adresse"
                            name="adresse">
                    </div>

                    <div class="checkout-form-container">
                        <i class="fa-solid fa-location-dot input-icon"></i>

                        <select name="frais" id="" class="input-form">
                            <option value="3000">Centre ville 3000Ar</option>
                            <option value="5000">en dehors du ville 5000Ar</option>
                        </select>

                    </div>



                </div>

                <div class="checkout-form-content">

                    <div class="checkout-form-container">
                        <i class="fa-regular fa-calendar-check input-icon"></i>

                        <input type="date" class="input-form" placeholder="date_livraison" name="date_livraison">
                    </div>

                    <div class="checkout-form-container">
                        <i class="fa-solid fa-clock-rotate-left input-icon"></i>

                        <select name="heure" id="" class="input-form">
                            @foreach ($heures as $heure)
                                @php
                                    // $time = date('h:i ', strval($heure->heurre))
                                    \Carbon\Carbon::setLocale('fr');
                                @endphp

                                <option value="{{ $heure->heurre }}">{{ $heure->heurre }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>










                <div class="checkout-form-footer">

                    <input type="hidden" name="commande" value="" class="commande">
                    <input type="hidden" name="final_prix" class="final_prix">

                    <button class="checkout-btn " value="" type="submit" id="button-pay">Envoyer
                </div>

                </div>
            </form>
        @else
            <div class="checkout-form" data-aos="zoom-in" data-aos-duration="1500">
                <h3 class="checkout-title ">Conectez-vous pour procceder au paiement </h3>




                <p class="checkout-prix"></p>



                <div class="checkout-form-content">
                    <div class="checkout-form-container">
                        <i class="fa-solid fa-at input-icon"></i>

                        <input type="text" class="input-form" id="firstname" name="prenom" placeholder="Votre prénom"
                            disabled>

                    </div>

                    <div class="checkout-form-container">
                        <i class="fa-solid fa-at input-icon"></i>

                        <input type="text" class="input-form" placeholder="votre nom" id="card-name" name="nom"
                            disabled>
                    </div>
                </div>


                <div class="checkout-form-content">

                    <div class="checkout-form-container">
                        {{-- <label for="">Adresse de livraison</label><br> --}}
                        <i class="fa-solid fa-phone input-icon"></i>

                        <input type="text" class="input-form" placeholder="Contact" id="adresse" name="contact"
                            disabled>
                    </div>




                </div>

                <div class="checkout-form-content">

                    <div class="checkout-form-container">
                        {{-- <label for="">Adresse de livraison</label><br> --}}
                        <i class="fa-solid fa-truck-ramp-box input-icon"></i>

                        <input type="text" class="input-form" placeholder="addresse de livraison" id="adresse"
                            name="adresse" disabled>
                    </div>





                </div>

                <div class="checkout-form-content">

                    <div class="checkout-form-container">
                        <i class="fa-regular fa-calendar-check input-icon"></i>

                        <input type="date" class="input-form" placeholder="date_livraison" name="date_livraison"
                            disabled>
                    </div>

                    {{-- <div class="checkout-form-container">
                        <i class="fa-solid fa-clock-rotate-left input-icon"></i>

                        <select name="heure" id="" class="input-form" disabled>
                            @foreach ($heures as $heure)
                                @php
                                    // $time = date('h:i ', strval($heure->heurre))
                                @endphp

                                <option value="{{ $heure->heurre }}">{{ $heure->heurre }}</option>
                            @endforeach
                        </select>

                    </div> --}}
                </div>

                <a href="{{ url('/connexion') }}" class="checkout-btn ">Se Connecter</a>


            </div>

        @endif


        {{-- <img src="{{asset('images/money1.png')}}" alt="" class="checkout-money1">
    <img src="{{asset('images/money2.png')}}" alt="" class="checkout-money2">
    <img src="{{asset('images/money3.png')}}" alt="" class="checkout-money3">

    <img src="{{asset('images/coin1.png')}}" alt="" class="checkout-coin1"> --}}

    </section>

@endsection

<script>
    document.addEventListener('DOMContentLoaded', () => {

        let commande = document.querySelector('.commande');
        commande.value = sessionStorage.getItem('commande');
        let prix = sessionStorage.getItem('prix');
        let finalPrix = document.querySelector('.final_prix');
        finalPrix.value = prix;
        console.log(sessionStorage.getItem('commande'));
        document.querySelector('.checkout-montant-prix').textContent = `${prix} Ar`

        console.log("commande", commande);
    })
</script>
