@extends('layouts.master')

@section('titre')
    Paiemment
@endsection

@section('contenu')
    <section class="checkout">
        @if (Session::has('user'))
            <form class="checkout-main" action="{{ Route('payer') }}" class="checkout-form" method="POST" id="validationForm">
                @csrf

                <div action="" class="checkout-form" data-aos="zoom-in" data-aos-duration="1500">
                    @csrf
                    <h3 class="checkout-title">Formulaire de la commande</h3>






                    {{-- @if (Session('success'))
            <p>{{Session('success')}}</p>

            @endif
            @if (Session('error'))
            <p>{{Session('errror')}}</p>

            @endif --}}

                    @if ($errors)
                        @foreach ($errors->all() as $item)
                            <p>{{ $item }}</p>
                        @endforeach
                    @endif
                    <p class="checkout-prix"></p>



                    <div class="checkout-form-content">
                        <div class="checkout-form-container">
                            <i class="fa-solid fa-at input-icon"></i>

                            <input type="text" class="input-form" id="firstname" name="prenom"
                                placeholder="Votre prénom">

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
                                <option value="3000">Centre ville 3000Ar </option>
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
                                    @endphp

                                    <option value="{{ $heure->heurre }}">{{ $heure->heurre }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>


                </div>

                {{-- formulaire paiement  --}}
                <div data-aos="zoom-in" data-aos-duration="1500" class="checkout-form">

                    <h3 class="checkout-title">Formulaire du paiement</h3>
                    @if (!isset($message))
                        <h3 class="checkout-desc"> Après avoir effectue une <span class="checkout-desc-para">paiement</span>
                            vous allez recevoir une <span class="checkout-desc-para">reduction </span> à la prochaine achat
                        </h3>
                    @else
                        <p class="checkout-desc">{{ $message }}</p>
                        <input type="hidden" value="5%" name="" class="statusPromotion">
                    @endif


                    <h4 class="checkout-montant">Montant à payer: <span class="checkout-montant-prix" id="showPrix"></span>
                    </h4>
                    <div id="change-error" class="hidden "></div>



                    @if (Session('success'))
                        <p>{{ Session('success') }}</p>
                    @endif
                    @if (Session('error'))
                        <p>{{ Session('errror') }}</p>
                    @endif
                    <p class="checkout-prix"></p>
                    <div class="card" id=" card"></div>

                    <div id="card-element"></div>
                    <div id="change-error" class="hidden"></div>


                    <div class="checkout-form-content">


                        <div class="checkout-form-container">

                            <input type="month" class="input-form" placeholder="Mois d'expiration" id="card-expiry-month">
                        </div>
                        <div class="checkout-form-container">
                            <i class="fa-regular fa-calendar-minus input-icon"></i>

                            <input type="number" class="input-form" min="1" placeholder="Année d'expiration"
                                id="card-expiry-year">
                        </div>

                    </div>

                    {{-- <div class="checkout-form-content">



                  <div class="checkout-form-container">
                      <i class="fa-solid fa-address-card input-icon"></i>

                      <input type="text" class="input-form" placeholder="Nom du carte"  id="">

                  </div>
              </div> --}}

                    <div class="checkout-form-content">

                        <div class="checkout-form-container">
                            <i class="fa-solid fa-address-card input-icon"></i>

                            <input type="text" class="input-form" placeholder="Numero de carte" id="card-number">
                        </div>

                        <div class="checkout-form-container">

                            <input type="text" class="input-form" placeholder="cvc" id="card-cvc">
                        </div>
                    </div>










                    <div class="checkout-form-footer">
                        <input type="hidden" name="stripeToken" id="tokenKey" value="">
                        <input type="hidden" name="final-price" value="" id="final-price">
                        <input type="hidden" name="panier" value="" class="commande">



                        <input class="checkout-btn " value="Payer" type="submit" id="button-pay">

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

                        <input type="text" class="input-form" id="firstname" name="prenom"
                            placeholder="Votre prénom" disabled>

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

    <script src="https://js.stripe.com/v2/"></script>
    {{-- <script src="https://js.stripe.com/v3/"></script> --}}
    {{-- <script src="/path/to/your/stripe-script.js"></script> --}}

    {{-- //methode stirpe v3
// let stripe = Stripe('pk_test_51PStORRxV6dbiGjl1JcLoO;JghE6LzFfQKEA2BFQsj3pzevgQ8PaYCilT5eXgLkUbAT26kTRmp9D2UrAVBDWk0MJP00ihg8e6li');
// let elements = stripe.elements(); --}}
    {{-- stripe v2 --}}
    <script>
        //methode stirpe v2
        Stripe.setPublishableKey(
            'pk_test_51PStORRxV6dbiGjl1JcLoOJghE6LzFfQKEA2BFQsj3pzevgQ8PaYCilT5eXgLkUbAT26kTRmp9D2UrAVBDWk0MJP00ihg8e6li'
        );

        let form = document.querySelector('#validationForm');
        let sumbits = document.querySelector('#button-pay');
        // console.log(final);
        let finalPrice = document.querySelector('#final-price')
        let panier = document.querySelector('.commande');

        // let statutPromotion = document.querySelector('.statusPromotion').value;
        // console.log(statutPromotion);


        // console.log(finalPrice);



        // final.value = sessionStorage.getItem('prix');
        finalPrice.value = sessionStorage.getItem('prix');

        // panier.value = JSON.parse( sessionStorage.getItem('commande')) || {};
        panier.value = sessionStorage.getItem('commande');
        console.log(sessionStorage.getItem('commande'));

        let montant = sessionStorage.getItem('prix');
        document.getElementById('showPrix').textContent = `${montant} Ar`;



        // document.querySelector('#showPrix').textContent = sessionStorage.getItem('prix');



        // // Créer les éléments de formulaire pour Stripe
        // let cardElement = elements.create('card');
        // cardElement.mount('#card-element'); // Assurez-vous d'avoir un élément avec cet ID dans votre HTML

        sumbits.addEventListener('click', (e) => {
            e.preventDefault();

            let exp_mm_yyyy = document.querySelector("#card-expiry-month").value;
            console.log(exp_mm_yyyy);
            let mm = exp_mm_yyyy.split("-")[1];

            let btns = document.querySelectorAll('button');
            btns.forEach(btn => {
                btn.disabled = true;

            });

            console.log(`
            number: ${document.querySelector("#card-number").value},
            cvc: ${document.querySelector("#card-cvc").value},
            exp_month: ${mm},
            exp_year: ${document.querySelector("#card-expiry-year").value},
            name: ${document.querySelector("#card-name").value}
        `);

            Stripe.createToken({
                number: document.querySelector("#card-number").value,
                cvc: document.querySelector("#card-cvc").value,
                exp_month: mm,
                exp_year: document.querySelector("#card-expiry-year").value,
                name: document.querySelector("#card-name").value
            }, stripeResponseHandler);




        })

        // function envoyeDonneAuServeur() {
        //         let cart = JSON.parse( sessionStorage.getItem('commande')) || {};
        //         console.log('envoye', cart);
        //         let panier = [];

        //         cart.forEach((produit, index) => {
        //             panier.push({
        //                 id: index,
        //                 // nom: cart[id].nom,
        //                 // quantite: cart[id].quantite,
        //                 // image: cart[id].image,
        //                 // prix : cart[id].prix,
        //                 nom: produit.nom,
        //                 quantite: produit.quantite,
        //                 image: produit.image,
        //                 prix: produit.prix
        //             });
        //         });

        //         console.log( 'panier:' , panier);

        //         //envoye des donné via ajax
        //         fetch('payer', {
        //             method: 'POST' ,
        //             headers: {
        //                 'Content-Type': 'application/json',
        //                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        //             },
        //             body: JSON.stringify({ panier: panier })
        //         })

        //         .then(response=> response.json())
        //         .then(data => {
        //             console.log('Réponse du serveur:', data);
        //         })
        //         .catch(error => {
        //             console.error('Erreur :', error);
        //         })

        // }
        //         // envoyeDonneAuServeur();
        //     setInterval(envoyeDonneAuServeur, 1000)


        // }

        function stripeResponseHandler(status, response) {
            if (status != 200) {
                document.querySelector('#change-error').classList.remove('hidden')
                document.querySelector('#change-error').textContent = response.error.message
                document.querySelector('#change-error').classList.add('error')
                let btns = document.querySelectorAll('button');
                btns.forEach(btn => btn.disabled = false);
            } else {
                console.log(response.id);
                document.querySelector('#tokenKey').value = response.id
                document.querySelector('#validationForm').submit()
            }
        }
    </script>




@endsection
