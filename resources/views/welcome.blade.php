@extends('layouts.master')
@section('titre')
    Acceuil
@endsection

@section('contenu')
    <section class="header-image fade ">
        <div class="header-image-textes">

            <div class="header-image-textes-logo">
                <figure class="header-image-textes-logo-carts">
                    <img src="{{ 'images/phoneLogo.png' }}" alt="" class="header-image-textes-logo-carts-phoneLogo">



                </figure>


                <img src="{{ asset('images/coinNav.png') }}" alt="" class="header-image-textes-logo-icons-icon coin">
                <img src="{{ asset('images/box.png') }}" alt="" class="header-image-textes-logo-icons-icon cadeau">
                <img src="{{ asset('images/cadeau.png') }}" alt=""
                    class="header-image-textes-logo-icons-icon cadeau">



                <h1 class="header-image-textes-logo-name">Grossiste Store</h1>
                <p class="header-image-textes-logo-txt">meilleur solution</p>
            </div>
            <h5 class="header-image-textes-para">Faite votre achat en ligne, c'est la <span
                    class="header-image-textes-para-txt">meilleur solution</span></h5>


            <a href="{{ url('produits') }}" class="header-image-textes-btn">Commencer</a>
        </div>


        <img class="header-image-img" src="{{ asset('images/epiceriekely.png') }}" alt="">

    </section>



    <section class="header-image fade">
        <div class="header-image-textes">

            <div class="header-image-textes-logo">
                <figure class="header-image-textes-logo-carts">
                    <img src="{{ 'images/phoneLogo.png' }}" alt="" class="header-image-textes-logo-carts-phoneLogo">



                </figure>


                <img src="{{ asset('images/cadeau.png') }}" alt=""
                    class="header-image-textes-logo-icons-icon cadeau">
                <img src="{{ asset('images/coinNav.png') }}" alt=""
                    class="header-image-textes-logo-icons-icon coin">
                <img src="{{ asset('images/box.png') }}" alt="" class="header-image-textes-logo-icons-icon cadeau">

                <div class="header-image-textes-logo-icons">

                </div>

                <h1 class="header-image-textes-logo-name">Grossiste Store</h1>
                <p class="header-image-textes-logo-txt">meilleur solution</p>
            </div>

            <h5 class="header-image-textes-para">Faites votre paiement,
                <span class="header-image-textes-para-txt">en ligne</span>
                et vous obtiendrez une
                <span class="header-image-textes-para-txt">réduction</span>
            </h5>



            <a href="{{ url('produits') }}" class="header-image-textes-btn">Commencer</a>
        </div>


        <img class="header-image-img" src="{{ asset('images/epiceriekely2.png') }}" alt="">

    </section>
    <section class="header-image fade">
        <div class="header-image-textes">

            <div class="header-image-textes-logo">
                <figure class="header-image-textes-logo-carts">
                    <img src="{{ 'images/phoneLogo.png' }}" alt=""
                        class="header-image-textes-logo-carts-phoneLogo">




                </figure>


                <img src="{{ asset('images/cadeau.png') }}" alt=""
                    class="header-image-textes-logo-icons-icon cadeau">
                <img src="{{ asset('images/box.png') }}" alt="" class="header-image-textes-logo-icons-icon cadeau">
                <img src="{{ asset('images/coinNav.png') }}" alt=""
                    class="header-image-textes-logo-icons-icon coin">

                <div class="header-image-textes-logo-icons">

                </div>

                <h1 class="header-image-textes-logo-name">Grossiste Store</h1>
                <p class="header-image-textes-logo-txt">meilleur solution</p>
            </div>


            <h5 class="header-image-textes-para">Utilisé le coupon pour encaiser la <span
                    class="header-image-textes-para-txt">Reduciton</span></h5>




            <a href="{{ url('produits') }}" class="header-image-textes-btn">Commencer</a>
        </div>


        <img class="header-image-img" src="{{ asset('images/epicerieMada.png') }}" alt="">

    </section>


    {{-- <swiper-container class="mySwiper slider" navigation="true">
        <swiper-slide class="slider-contenue">
            <div class="slider-contenue-textes">

                <div class="slider-contenue-textes-logo">
                    <figure class="slider-contenue-textes-logo-carts">
                        <img src="{{ 'images/phoneLogo.png' }}" alt=""
                            class="slider-contenue-textes-logo-carts-phoneLogo">



                    </figure>


                    <img src="{{ asset('images/cadeau.png') }}" alt=""
                        class="slider-contenue-textes-logo-icons-icon cadeau">
                    <img src="{{ asset('images/coinNav.png') }}" alt=""
                        class="slider-contenue-textes-logo-icons-icon coin">
                    <img src="{{ asset('images/box.png') }}" alt=""
                        class="slider-contenue-textes-logo-icons-icon cadeau">

                    <div class="slider-contenue-textes-logo-icons">

                    </div>

                    <h1 class="slider-contenue-textes-logo-name">Grossiste Store</h1>
                    <p class="slider-contenue-textes-logo-txt">meilleur solution</p>
                </div>

                <h5 class="slider-contenue-textes-para">Faite votre paiement,
                    <span class="slider-contenue-textes-para-txt">en ligne</span>
                    et vous obtiendrez une
                    <span class="slider-contenue-textes-para-txt">réduction</span>
                </h5>



                <a href="{{ url('produits') }}" class="slider-contenue-textes-btn">Commencer</a>
            </div>

            <img class="" src="{{ asset('images/epiceriekely2.png') }}" alt="">

        </swiper-slide>
        <swiper-slide>Slide 2</swiper-slide>
        <swiper-slide>Slide 3</swiper-slide>
    </swiper-container> --}}













    <section class="ctg ">
        <main class="ctg-main">
            <h1 class="categorie-title2"> Categories</h1>
            <h1 class="categorie-title">Produits </h1>
            {{-- <i class="fa-solid fa-chevron-left ctg-main-btnLeft"></i> --}}
            <ul class="ctg-main-listes ">

                @foreach ($categories as $categorie)
                    <li class="ctg-main-listes-liste ">

                        <img src="{{ asset('storage/imageCategorie/' . $categorie->imageCategorie) }}" alt=""
                            class="ctg-main-listes-liste-img">

                        <div class="ctg-main-listes-liste-textes">
                            <p class="ctg-main-listes-liste-textes-name">{{ $categorie->categorie }}</p>
                            {{-- <a href="" class="ctg-main-listes-liste-textes-btn">Voir plus</a> --}}
                        </div>


                    </li>
                @endforeach






            </ul>
            {{-- <i class="fa-solid fa-chevron-right ctg-main-btnRight"></i> --}}
        </main>
    </section>

    {{-- <swiper-container class="mySwiper" pagination="true" pagination-clickable="true" slides-per-view="3" space-between="30"
        free-mode="true">
        @foreach ($categories as $categorie)
            <swiper-slide class="ctg-main-listes-liste ">
                <img src="{{ asset('storage/imageCategorie/' . $categorie->imageCategorie) }}" alt=""
                    class="ctg-main-listes-liste-img">
            </swiper-slide>
        @endforeach
    </swiper-container> --}}





    <section class="livraison " id="section">
        <div class="livraison-cards">

            <div class="livraison-card section" id="section">
                <div class="livraison-card-border"></div>
                <div class="livraison-card-content">


                    <i class="fa-solid fa-coins livraison-card-icon "></i>

                    {{-- <lord-icon src="https://cdn.lordicon.com/gjjvytyq.json" trigger="hover" colors="primary:#feb600"
                        style="width:5rem;height:5rem;position:absolute;top:2%;left:0%;">
                    </lord-icon> --}}
                    <div class="livraison-card-content-contenair">

                        <h1 class="livraison-card-title">Achat</h1>
                        <h1 class="livraison-card-desc">En Ligne</h1>
                    </div>
                </div>
            </div>
            <div class="livraison-card section" id="section">
                <div class="livraison-card-border"></div>
                <div class="livraison-card-content">


                    <i class="fa-solid fa-file-lines  livraison-card-icon"></i>
                    {{-- <img src="{{asset('images/facture.gif')}}" alt="" class="livraison-card-icon"> --}}

                    {{-- <lord-icon src="https://cdn.lordicon.com/depeqmsz.json" trigger="hover" colors="primary:#feb600"
                        style="width:5rem;height:5rem;position:absolute;top:2%;left:0%;">
                    </lord-icon> --}}

                    <div class="livraison-card-content-contenair">

                        <h1 class="livraison-card-title">Facture</h1>
                        <h1 class="livraison-card-desc">Téléchargable</h1>
                    </div>
                </div>
            </div>
            <div class="livraison-card section" id="section">
                <div class="livraison-card-border"></div>
                <div class="livraison-card-content">


                    <i class="fa-solid fa-truck livraison-card-icon"></i>
                    <div class="livraison-card-content-contenair">

                        <h1 class="livraison-card-title">Livraison</h1>
                        <h1 class="livraison-card-desc"> Rapide</h1>
                    </div>
                </div>
            </div>


        </div>
    </section>


    <section class="achat " id="section">
        <h1 class="categorie-title2"> Les</h1>
        <h1 class="categorie-title">Promotion </h1>


        @if ($promotions->isEmpty())
            <div class="achat-imgNone">
                <img src="{{ asset('images/promNone2.png') }}" alt="" class="achat-imgNone-img">

                <h1 class="achat-textNone">Accune promotions pour le moment </h1>
            </div>
        @else
            <div class="achat-cards owl-carousel ">

                @foreach ($promotions as $produit)
                    <div class="achat-cards-card">

                        <div class="achat-cards-card-textes">

                            <h1 class="achat-cards-card-textes-title">{{ $produit->nom }}</h1>
                            {{-- <p class="achat-cards-card-textes-para">Lorem ipsum dolor sit amet, consectetur adipisicing elit. In fuga numquam accusamus soluta exercitationem est beatae voluptatum magni, alias sequi nobis harum neque a dolorem, rerum accusantium necessitatibus vel pariatur!</p> --}}


                            <h3 class="achat-cards-card-textes-oldPrice">{{ $produit->oldPrix }}</h3>
                            {{-- <div class="achat-cards-card-textes-price-croix"></div> --}}

                            @php
                                \Carbon\Carbon::setLocale('fr');
                                $dateFin = $produit->date_fin;
                                // $date = date('d F Y' , strtotime($dateFin))

                                $date = \Carbon\Carbon::parse($dateFin)->translatedFormat('d F Y');
                            @endphp
                            <p class="achat-cards-card-textes-date">Fin:
                                <span class="achat-cards-card-textes-date-value">{{ $date }}</span>
                            </p>



                            <h2 class="achat-cards-card-textes-prix">{{ $produit->newPrix }}</h2>

                            <a class="achat-cards-card-textes-btn" href="{{ url('/produits') }}">Voir</a>
                        </div>
                        <img class="achat-cards-card-img" src="{{ asset('storage/imageProduit/' . $produit->image) }}"
                            alt="">
                    </div>
                @endforeach






            </div>
        @endif

        {{-- <div>
        {{$promotions->links('vendor.pagination.default')}}
    </div> --}}
        {{-- <div class="achat-none">


        <div class="achat-none-card">

            <div class="achat-none-card-textes">

                <h1 class="achat-none-card-textes-title">Eau Vive</h1>



                    <h3 class="achat-none-card-textes-oldPrice">----</h3>






                <h2 class="achat-none-card-textes-prix">--------</h2>

                <h2 class="achat-none-card-textes-btn" >Voir</h2>
            </div>
            <img class="achat-none-card-img" src="{{asset('images/auVive.jpg')}}" alt="">
        </div>
        <div class="achat-none-card">

            <div class="achat-none-card-textes">

                <h1 class="achat-none-card-textes-title">Youzo</h1>



                    <h3 class="achat-none-card-textes-oldPrice">----</h3>






                <h2 class="achat-none-card-textes-prix">--------</h2>

                <h2 class="achat-none-card-textes-btn" >Voir</h2>
            </div>
            <img class="achat-none-card-img" src="{{asset('images/youzo.jpg')}}" alt="">
        </div>
        <div class="achat-none-card">

            <div class="achat-none-card-textes">

                <h1 class="achat-none-card-textes-title">Gouty Coockies</h1>



                    <h3 class="achat-none-card-textes-oldPrice">----</h3>






                <h2 class="achat-none-card-textes-prix">--------</h2>

                <h2 class="achat-none-card-textes-btn" >Voir</h2>
            </div>
            <img class="achat-none-card-img" src="{{asset('images/Gouty-coockies.jfif')}}" alt="">
        </div>







        <h1 class="achat-textNone">Accune promotion pour le moment</h1>
    </div> --}}





    </section>

    <section class="reduction">
        <h1 class="reduction-title">Oportunité de reduciton</h1>
        <div class="reduction-textes">
            <h2 class="reduction-textes-para">Vous obtenez une coupon après avoir effectué une paiement en ligne </h2>
            <h3 class="reduction-textes-txt">Réduction de <span class="reduction-textes-txt-value">-5%</span> à la
                prochaine achat</h3>
        </div>

    </section>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('animejs/lib/anime.min.js') }}"></script>
    <script>
        var swiper = new Swiper('.mySwiper', {
            speed: 600,
            parallax: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>

    <script>
        let slideIndex = 0;
        showSlides();

        function showSlides() {
            let i;
            let slides = document.getElementsByClassName("header-image");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            slides[slideIndex - 1].style.display = "block";
            slides[slideIndex - 1].style.transition = '5s';

            setTimeout(showSlides, 8000); // Change image every 2 seconds
        }


        //*********animation section images statt********

        // Wrap every letter in a span
        var textWrapper = document.querySelector('.header-image-textes .header-image-textes-para-txt');
        console.log(textWrapper);
        textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g,
            "<span class='header-image-textes-para-txt'>$&</span>");

        anime.timeline({
                loop: true
            })
            .add({
                targets: '.header-image-textes .header-image-textes-para-txt',
                scale: [0, 1],
                duration: 1500,
                elasticity: 600,
                delay: (el, i) => 45 * (i + 1)
            }).add({
                targets: '.header-image-textes-para-txt',
                opacity: 0,
                duration: 1000,
                easing: "easeOutExpo",
                delay: 1000
            });


        // anime.timeline({loop: true})
        // .add({
        //     targets: '.header-image-textes-para-txt',
        //     scale: [11,1],
        //     opacity: [0,1],
        //     easing: "easeOutCirc",
        //     duration: 800,
        //     delay: (el, i) => 800 * i
        // }).add({
        //     targets: '.header-image-textes-para',
        //     opacity: 0,
        //     duration: 1000,
        //     easing: "easeOutExpo",
        //     delay: 1000
        // });

        //*********animation section images end********


        //*********animation owl carousel start********

        //*********animation section images end********
    </script>



@endsection
