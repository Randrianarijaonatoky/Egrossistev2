@extends('layouts.master')

@section('titre')
    produits
@endsection


@section('contenu')
    <section class="produits">
        {{-- <h1 class="produits-title"> </h1> --}}

        <main class="produits-main">
            <div class="produits-nav">
                <div class="produits-categorie" id="myBtnContainer">
                    <button class="produits-categorie-select active1" onclick="filterSelection('all')">Tous</button>
                    @foreach ($categories as $ctg)
                        <button class="produits-categorie-select"
                            onclick="filterSelection('{{ $ctg->categorie }}')">{{ $ctg->categorie }}</button>
                    @endforeach



                </div>

                <div class="produits-nav-contenair">
                    <form class="produits-nav-contenair-recherche" action="{{ route('recherche') }}">
                        @csrf
                        <input type="text" name="recherche" class="produits-nav-contenair-recherche-input"
                            placeholder="votre recherche">
                        <button class="produits-nav-contenair-recherche-btn" type="submit">Rechercher</button>
                    </form>

                    <div class="header-nav-icons " id="nav-cart" style="">
                        <i class="fa-solid fa-bag-shopping header-nav-icons-icon" type="button" id="panierShow"></i>
                        @if (Session::has('cart'))
                            <p class="header-nav-icons-num" id="cart-count"></p>
                        @endif



                        {{-- <p class="header-nav-icons-total">150 000 Ar</p> --}}

                    </div>
                </div>


            </div>

            {{-- <ul class="produits-nav-filtre">
            <div class="produits-nav-filtre-listes">

                <li>
                    <a href="" class="produits-nav-filtre-liste">Avec Alchol</a>

                </li>
                <li>
                    <a href="" class="produits-nav-filtre-liste">Sans Alchol</a>

                </li>
            </div>
        </ul> --}}
            <div class="produits-cards ">

                @foreach ($produits as $produit)
                    <div class="produits-cards-card {{ $produit->categorie }}">
                        <figure class="produits-cards-card-figure">

                            <img class="produits-cards-card-img"
                                src="{{ asset('storage/imageProduit/' . $produit->image) }}" alt="">
                        </figure>


                        <a class="fa-solid fa-cart-plus produits-cards-card-btn" data-id="{{ $produit->id }}"
                            href="{{ url('/addPanier/' . $produit->id) }}"></a>


                        @if ($produit->checkPromotion)
                            {{-- <h1 class="produits-cards-card-img-prixProm-value" >{{$produit->prixPromotion}}</h1> --}}

                            {{-- <div class="produits-cards-card-overlay">

                        <i class="fa-solid fa-gift produits-cards-card-overlay-icon"></i>

                    </div> --}}
                            <img src="{{ asset('images/neux.png') }}" alt="neux"
                                class="produits-cards-card-img-cadeaux">
                        @endif



                        <h1 class="produits-cards-card-nom">{{ $produit->nom }}</h1>

                        @if ($produit->showPromotionButton)
                            <h4 class="produits-cards-card-prix"> {{ $produit->prix }}</h4>
                        @endif

                        @if ($produit->checkPromotion)
                            <h4 class="produits-cards-card-prix prixProm"> {{ $produit->prix }}</h4>
                            <h3 class="produits-cards-card-Prixpromotion">{{ $produit->prixPromotion }}</h3>
                        @endif

                        <form class="produits-cards-card-quantites" action="{{ url('detail/' . $produit->id) }}">
                            @csrf
                            <p produits-cards-card-prix>Quantite: {{ $produit->quantite }}</p>
                            <p type="submit" class="produits-cards-card-detail" data-id="{{ $produit->id }}">
                                <span>Details</span>
                                <i class="fa-solid fa-ellipsis-vertical"></i>

                            </p>
                        </form>



                    </div>
                @endforeach



            </div>

            <div class="produits-btns">
                <i class="fa-solid fa-angle-left produits-btns-prev"></i>
                <i class="fa-solid fa-chevron-right produits-btns-next"></i>

            </div>

        </main>








        <img src="{{ asset('images/start.png') }}" alt="star" class="produits-star Boisson">
        <img src="{{ asset('images/cadeau.png') }}" alt="" class="produits-cadeau ">
        <img src="{{ asset('images/JB.png') }}" alt="" class="produits-jb Biscuits">
        <img src="{{ asset('images/socolait.png') }}" alt="" class="produits-socolait">






    </section>




    {{-- <swiper-container class="mySwiper" pagination="true" pagination-clickable="true" space-between="30" slides-per-view="3">
        @foreach ($produits as $produit)
            <swiper-slide>
                <figure class="produits-cards-card-figure">

                    <img class="produits-cards-card-img" src="{{ asset('storage/imageProduit/' . $produit->image) }}"
                        alt="">
                </figure>


                <a class="fa-solid fa-cart-plus produits-cards-card-btn" data-id="{{ $produit->id }}"
                    href="{{ url('/addPanier/' . $produit->id) }}"></a>


                @if ($produit->checkPromotion)
                    <img src="{{ asset('images/neux.png') }}" alt="neux" class="produits-cards-card-img-cadeaux">
                @endif



                <h1 class="produits-cards-card-nom">{{ $produit->nom }}</h1>

                @if ($produit->showPromotionButton)
                    <h4 class="produits-cards-card-prix"> {{ $produit->prix }}</h4>
                @endif

                @if ($produit->checkPromotion)
                    <h4 class="produits-cards-card-prix prixProm"> {{ $produit->prix }}</h4>
                    <h3 class="produits-cards-card-Prixpromotion">{{ $produit->prixPromotion }}</h3>
                @endif

                <form class="produits-cards-card-quantites" action="{{ url('detail/' . $produit->id) }}">
                    @csrf
                    <p produits-cards-card-prix>Quantite: {{ $produit->quantite }}</p>
                    <p type="submit" class="produits-cards-card-detail" data-id="{{ $produit->id }}">
                        <span>Details</span>
                        <i class="fa-solid fa-ellipsis-vertical"></i>

                    </p>
                </form>
            </swiper-slide>
        @endforeach
    </swiper-container> --}}



    <img src="{{ asset('images/start.png') }}" alt="star" class="produits-star Boisson">
    <img src="{{ asset('images/cadeau.png') }}" alt="" class="produits-cadeau ">
    <img src="{{ asset('images/JB.png') }}" alt="" class="produits-jb Biscuits">
    <img src="{{ asset('images/socolait.png') }}" alt="" class="produits-socolait">






    </section>


    <div class="bg-panier">

        <div class="panier">

            <div class="panier-head">
                <h1 class=" panier-title">Votre Panier</h1>
                <i class="fa-solid fa-xmark  panier-close" id="panier-close"></i>
            </div>
            <h3 class="panier-montant">Montant Totl: </h3>
            <input type="hidden" name="stripeTotal" readonly value="16226" class="prixFinal">
            <div class="panier-cards">


                @foreach ($cart as $item)
                    <div class="panier-cards-card" data-id="{{ $item['id'] }}" data-nom="{{ $item['nom'] }}"
                        data-prix="{{ $item['prixPromotion'] }}" data-quantite="1" data-image="{{ $item['image'] }}"
                        data-quantiteMax="{{ $item['quantite'] }}">
                        <figure class="panier-cards-card-figure">
                            <div class="panier-cards-card-figure-picture">
                                <img class="panier-cards-card-img"
                                    src="{{ asset('storage/imageProduit/' . $item['image']) }}" alt="">
                                <p class="fa-solid fa-trash panier-cards-card-figure-picture-delete"
                                    data-produit-id="{{ $item['id'] }}" href="{{ 'deletePanier/' . $item['id'] }}">
                                </p>
                            </div>
                            <div class="panier-cards-card-detail">
                                <p class="panier-cards-card-detail-nom">{{ $item['nom'] }}</p>
                                <p class="panier-cards-card-detail-prix">{{ $item['prixPromotion'] }}</p>
                                <input type="hidden" class="prixBase" value='{{ $item['prixPromotion'] }}'
                                    id='prix'>
                            </div>
                        </figure>
                        <div class="panier-cards-card-btns">
                            <button class="panier-cards-card-btns-btn plus-btn">+</button>
                            <p class="panier-cards-card-btns-num">1</p>
                            <input type="hidden" value="1" class="qteBase">
                            <input type="hidden" value="1" id="Quantite">
                            <button class="panier-cards-card-btns-btn moin-btn">-</button>
                        </div>
                    </div>
                @endforeach




            </div>


            <div class="panier-option">

                <a class="panier-payement" href="{{ url('/checkout') }}">Accedé au payement
                    <i class="fa-brands fa-stripe panier-payement-icon"></i>
                </a>
                <a class="panier-payement" href="{{ url('/showCommande') }}">Paiement au moment de livraison
                    {{-- <i class="fa-brands fa-stripe panier-payement-icon"></i> --}}
                </a>
            </div>




        </div>
    </div>
    <div class="produits-details" style="display: none">
        <div class="produits-details-card">
            <figure class="produits-details-card-figure">

                <img src="{{ asset('images/jok.jpg') }}" alt="" class="produits-details-card-figure-img">
            </figure>


            <div class="produits-details-card-contenair">
                <h1 class="produits-details-card-contenair-title" id="detail_nom">Gouty Cockies</h1>
                <div class="produits-details-card-contenair-textes">

                    <div>
                        <h2 class="produits-details-card-contenair-textes-title">Date de création:</h2>
                        <p class="produits-details-card-contenair-textes-para">
                            cette produit à été crée en
                            <span class="detail_date"></span>
                        </p>

                    </div>


                    <div>

                        <h2 class="produits-details-card-contenair-textes-title">Composant:</h2>
                        <p class="produits-details-card-contenair-textes-para" id="detail_composant">20-56-42</p>
                    </div>
                    <div>

                        <h2 class="produits-details-card-contenair-textes-title">Desc:</h2>

                        <p class="produits-details-card-contenair-textes-para" id="detail_desc">Lorem ipsum dolor sit amet
                            consectetur adipisicing elit. Tempore labore modi iure distinctio quo quasi quibusdam autem rem
                            quae porro aliquid nostrum soluta, vel doloremque natus eveniet unde alias quia officiis illo
                            hic laboriosam. Nemo officiis fugiat, laboriosam praesentium eos ratione earum. Mollitia ea
                            dicta distinctio, facere, iure porro non quo a quam dolorem libero corporis obcaecati saepe quis
                            excepturi omnis dolores ducimus. Ipsa earum cumque perferendis voluptatem illo repellendus
                            itaque quaerat inventore facere. Optio fuga quas nobis qui. Porro pariatur facilis aperiam nulla
                            omnis sed delectus, ducimus, ipsa quidem quod explicabo iusto sit fugit minima dolor tenetur,
                            suscipit nemo..</p>
                    </div>

                </div>
            </div>
        </div>
    </div>






    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // $(document).ready(function() {
        //     $('.produits-cards-card-btn').click(function(e) {
        //         e.preventDefault();

        //         let produitId = $(this).data(id);
        //         const url = $(this).attr('href');

        //         $.ajax({
        //             url: url,
        //             type: 'GET',
        //             success: function() {
        //                 // $('#cart-count').text(response.cartCount)
        //                 let countHTML = response.cartCount;
        //                 let count = `                <p class="header-nav-icons-num" id="cart-count">${countHTML}</p>`

        //                 console.log(response.cartItems);
        //                 let panierHTML = '';
        //                 response.cartItems.forEach(function(item) {
        //                     `
    //                     <div class="panier-cards-card" data-id="${item.id}" data-nom="${item.nom}" data-prix="${item.prixPromotion}" data-quantite='1' >
    //                         <figure class="panier-cards-card-figure">
    //                             <div class="panier-cards-card-figure-picture">
    //                                 <img class="panier-cards-card-img" src="${item.imageUrl}" alt="">
    //                                 <a class="fa-solid fa-trash panier-cards-card-figure-picture-delete" data-produit-id='${item.id}' href="${item.deleteUrl}"></a>
    //                             </div>
    //                             <div class="panier-cards-card-detail">
    //                                 <p class="panier-cards-card-detail-nom">${item.nom}</p>
    //                                 <p class="panier-cards-card-detail-prix">${item.prixPromotion}</p>
    //                                 <input type="text" class="prixBase" value='${item.prixPromotion}' id='prix'>
    //                                 <input type="hidden" value="${item.prix}" class='prixDb' id="prixDb">
    //                             </div>
    //                         </figure>
    //                         <div class="panier-cards-card-btns">
    //                             <button class="panier-cards-card-btns-btn plus-btn">+</button>
    //                             <p class="panier-cards-card-btns-num">1</p>
    //                             <input type="hidden" value="1" class='qteBase'>
    //                             <input type="hidden" value="1" id="Quantite">
    //                             <button class="panier-cards-card-btns-btn moin-btn">-</button>
    //                         </div>
    //                     </div>
    //                     `
        //                 })

        //             }

        //             error: function(xhr) {
        //                 console.log('Erreur sur l\'ajout du panier');

        //             }
        //         })

        //     })

        // })
    </script>

    <script>
        filterSelection("all")

        function filterSelection(c) {
            var x, i;
            x = document.getElementsByClassName("produits-cards-card ");
            if (c == "all") c = "";
            // Add the "show" class (display:block) to the filtered elements, and remove the "show" class from the elements that are not selected
            for (i = 0; i < x.length; i++) {
                w3RemoveClass(x[i], "show");
                if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
            }
        }

        // Show filtered elements
        function w3AddClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
                if (arr1.indexOf(arr2[i]) == -1) {
                    element.className += " " + arr2[i];
                }
            }
        }

        // Hide elements that are not selected
        function w3RemoveClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
                while (arr1.indexOf(arr2[i]) > -1) {
                    arr1.splice(arr1.indexOf(arr2[i]), 1);
                }
            }
            element.className = arr1.join(" ");
        }


        var btnContainer = document.getElementById("myBtnContainer");
        // console.log(btnContainer);
        var btns = btnContainer.getElementsByClassName("produits-categorie-select");
        // console.log(btns);
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("active1");
                current[0].className = current[0].className.replace(" active1", "");
                this.className += " active1";
            });
        }






        //panier

        // const addCar
        const produitsDb = @json($produits);
        // console.log(produitsDb);

        const produits = produitsDb.map(produit => ({
            id: produit.id,
            nom: produit.nom,
            quantite: produit.quantite,
            prix: produit.prix,
            image: produit.image
        }));



        function addCart() {

            document.addEventListener('DOMContentLoaded', () => {
                const btnsAdd = document.querySelectorAll('.produits-cards-card-btn');
                let carts = [];

                const cartsContent = document.querySelector('.panier-cards');
                const iconCart = document.getElementById('nav-cart');



                btnsAdd.forEach(btn => {
                    btn.addEventListener('click', (e) => {
                        // let id = e.target.dataset.id;
                        // id = Number(id);
                        // let item = produits.find(i => i.id === id);
                        // carts.push(item);

                        e.preventDefault();

                        iconCart.classList.remove('cartAnim');
                        void iconCart.offsetWidth;
                        iconCart.classList.add('cartAnim');

                        const url = btn.getAttribute('href');
                        // console.log(url);
                        const quantitéSélectionnée = 2;



                        fetch(url, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/x-www-form-urlencoded',
                                    'X-CSRF-TOKEN': document.querySelector(
                                        'meta[name="csrf-token"]').getAttribute('content')
                                },
                                body: new URLSearchParams({
                                    quantite: quantitéSélectionnée // Assurez-vous que cette variable contient la quantité souhaitée
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                // console.log('Data received:', data); // Vérifiez ici
                                if (Array.isArray(data.cartItems)) {
                                    updateCart(data.cartItems);
                                    console.log(data.cartItems);
                                } else {
                                    console.error('cartItems n\'est pas un tableau');
                                }
                                document.querySelector('.header-nav-icons-num').textContent =
                                    data.cartCount;
                            })
                            .catch(error => {
                                console.error('Erreur:', error);
                            });



                        // updateCartDisplay();

                        document.querySelector('.header-nav-icons-num').textContent = carts.length;
                        addQuantityEventListeners();
                        totale();
                    });
                });

                const deleteBtns = document.querySelectorAll('.panier-cards-card-figure-picture-delete');
                console.log('deleteBtns:', deleteBtns);

                function deletePanier() {

                    deleteBtns.forEach(btnDelete => {
                        btnDelete.addEventListener('click', (e) => {
                            e.preventDefault();
                            console.log('delete');
                            const id = btnDelete.getAttribute('data-produit-id');
                            console.log(id);
                            const csrfToken = document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content');
                            console.log(csrfToken);

                            fetch(`/deletePanier/${id}`, {
                                    method: 'DELETE',
                                    headers: {
                                        'Content-Type': 'application/x-www-form-urlencoded',
                                        // 'X-CRSF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                        'X-CSRF-TOKEN': csrfToken,
                                    }
                                })

                                .then(response => response.json())
                                .then(data => {
                                    console.log('Donner:', data);
                                    if (Array.isArray(data.cartItems)) {
                                        updateCart(data.cartItems)
                                    } else {
                                        console.log('CartItem n\'est pas un tableaau');
                                    }

                                    document.querySelector('.header-nav-icons-num')
                                        .textContent = data.cartCount;
                                })

                                .catch(error => {
                                    console.log('Erreur', error);
                                })

                        })
                    })
                }




                // function updateCart(cartItems) {
                //     console.log(cartItems);
                //     console.log('cartItems:', cartItems); // Vérifiez ce que vous recevez
                //     if (!Array.isArray(cartItems)) {
                //         console.error('cartItems n\'est pas un tableau');
                //         return;
                //     }

                //     const panierCards = document.querySelector('.panier-cards');
                //     console.log(panierCards);
                //     panierCards.innerHTML = '';

                //     // Définir la base de l'URL pour les images
                //     const imageBaseUrl = "{{ asset('storage/imageProduit') }}";
                //     const deleteBaseUrl = "{{ 'deletePanier' }}";

                //     cartItems.forEach(item => {
                //         // Construire l'URL complète de l'image en utilisant le nom de fichier de l'image
                //         const imageUrl = `${imageBaseUrl}/${item.imageUrl}`;
                //         const deleteUrl = `${deleteBaseUrl}/${item.id}`;

                //         panierCards.innerHTML += `
            //         <div class="panier-cards-card" data-id="${item.id}" data-nom="${item.nom}" data-prix="${item.prixPromotion}" data-quantite='1' data-image="${item.imageUrl}">
            //             <figure class="panier-cards-card-figure">
            //                 <div class="panier-cards-card-figure-picture">
            //                     <img class="panier-cards-card-img" src="${imageUrl}" alt="">

            //                     <p class="fa-solid fa-trash panier-cards-card-figure-picture-delete" data-produit-id="${item.id}" href="${deleteUrl}"></p>
            //                 </div>
            //                 <div class="panier-cards-card-detail">
            //                     <p class="panier-cards-card-detail-nom">${item.nom}</p>
            //                     <p class="panier-cards-card-detail-prix">${item.prixPromotion}</p>
            //                     <input type="hidden" class="prixBase" value='${item.prixPromotion}' id='prix'>
            //                     <input type="hidden" value="${item.prixPromotion}" class='prixDb' id="prixDb">
            //                 </div>
            //             </figure>
            //             <div class="panier-cards-card-btns">
            //                 <button class="panier-cards-card-btns-btn plus-btn">+</button>
            //                 <p class="panier-cards-card-btns-num">1</p>
            //                 <input type="hidden" value="1" class='qteBase'>
            //                 <input type="hidden" value="1" id="Quantite">
            //                 <button class="panier-cards-card-btns-btn moin-btn">-</button>
            //             </div>
            //         </div>
            //         `;
                //     });

                //     // Réaffecter les écouteurs d'événements nécessaires après la mise à jour du panier
                //     addQuantityEventListeners();
                //     totale();
                // }

                function updateCart(cartItems) {
                    console.log(cartItems);
                    if (!Array.isArray(cartItems)) {
                        console.error('cartItems n\'est pas un tableau');
                        return;
                    }

                    const panierCards = document.querySelector('.panier-cards');
                    panierCards.innerHTML = '';

                    // Définir la base de l'URL pour les images
                    const imageBaseUrl = "{{ asset('storage/imageProduit') }}";
                    const deleteBaseUrl = "{{ url('deletePanier') }}";

                    cartItems.forEach(item => {
                        // Construire l'URL complète de l'image en utilisant le nom de fichier de l'image
                        const imageUrl = `${imageBaseUrl}/${item.imageUrl}`;
                        const deleteUrl = `${deleteBaseUrl}/${item.id}`;

                        panierCards.innerHTML += `
                    <div class="panier-cards-card" data-id="${item.id}" data-nom="${item.nom}" data-prix="${item.prixPromotion}" data-quantite='1' data-image="${item.imageUrl}">
                        <figure class="panier-cards-card-figure">
                            <div class="panier-cards-card-figure-picture">
                                <img class="panier-cards-card-img" src="${imageUrl}" alt="">
                                <p class="fa-solid fa-trash panier-cards-card-figure-picture-delete" data-produit-id="${item.id}" href="${item.id}"></p>
                            </div>
                            <div class="panier-cards-card-detail">
                                <p class="panier-cards-card-detail-nom">${item.nom}</p>
                                <p class="panier-cards-card-detail-prix">${item.prixPromotion}</p>
                                <input type="hidden" class="prixBase" value='${item.prixPromotion}' id='prix'>
                                <input type="hidden" value="${item.prixPromotion}" class='prixDb' id="prixDb">
                            </div>
                        </figure>
                        <div class="panier-cards-card-btns">
                            <button class="panier-cards-card-btns-btn plus-btn">+</button>
                            <p class="panier-cards-card-btns-num">1</p>
                            <input type="hidden" value="1" class='qteBase'>
                            <input type="hidden" value="1" id="Quantite">
                            <button class="panier-cards-card-btns-btn moin-btn">-</button>
                        </div>
                    </div>
                    `;
                    });

                    // Réaffecter les écouteurs d'événements nécessaires après la mise à jour du panier
                    addQuantityEventListeners();
                    deletePanier();
                    totale();
                }

                function updateCartDelete(cartItems) {
                    console.log(cartItems);
                    if (!Array.isArray(cartItems)) {
                        console.error('cartItems n\'est pas un tableau');
                        return;
                    }

                    const panierCards = document.querySelector('.panier-cards');
                    panierCards.innerHTML = '';

                    // Définir la base de l'URL pour les images
                    const imageBaseUrl = "{{ asset('storage/imageProduit') }}";
                    const deleteBaseUrl = "{{ url('deletePanier') }}";

                    cartItems.forEach(item => {
                        // Construire l'URL complète de l'image en utilisant le nom de fichier de l'image
                        const imageUrl = `${imageBaseUrl}/${item.imageUrl}`;
                        const deleteUrl = `${deleteBaseUrl}/${item.id}`;

                        panierCards.innerHTML += `
                    <div class="panier-cards-card" data-id="${item.id}" data-nom="${item.nom}" data-prix="${item.prixPromotion}" data-quantite='1' data-image="${item.image}">
                        <figure class="panier-cards-card-figure">
                            <div class="panier-cards-card-figure-picture">
                                <img class="panier-cards-card-img" src="${imageUrl}" alt="">
                                <p class="fa-solid fa-trash panier-cards-card-figure-picture-delete" data-produit-id="${item.id}" href="${item.id}"></p>
                            </div>
                            <div class="panier-cards-card-detail">
                                <p class="panier-cards-card-detail-nom">${item.nom}</p>
                                <p class="panier-cards-card-detail-prix">${item.prixPromotion}</p>
                                <input type="hidden" class="prixBase" value='${item.prixPromotion}' id='prix'>
                                <input type="hidden" value="${item.prixPromotion}" class='prixDb' id="prixDb">
                            </div>
                        </figure>
                        <div class="panier-cards-card-btns">
                            <button class="panier-cards-card-btns-btn plus-btn">+</button>
                            <p class="panier-cards-card-btns-num">1</p>
                            <input type="hidden" value="1" class='qteBase'>
                            <input type="hidden" value="1" id="Quantite">
                            <button class="panier-cards-card-btns-btn moin-btn">-</button>
                        </div>
                    </div>
                    `;
                    });

                    // Réaffecter les écouteurs d'événements nécessaires après la mise à jour du panier
                    addQuantityEventListeners();
                    totale();
                }


                // updateCart(cartItems);

                function updateDelete() {
                    const carts = sessionStorage.getItem('commande');


                }





                function addQuantityEventListeners() {
                    const plusBtns = document.querySelectorAll('.plus-btn');
                    const moinBtns = document.querySelectorAll('.moin-btn');

                    plusBtns.forEach(btn => {
                        btn.addEventListener('click', (e) => {
                            const card = e.target.closest('.panier-cards-card');
                            const id = card.getAttribute('data-id');


                            const qtyElem = card.querySelector(
                                '.panier-cards-card-btns-num'
                            ); // Change to .panier-cards-card-btns-num
                            let qteBaseElem = card.querySelector(
                                '.qteBase'); // Element to store quantity
                            let qteBase = Number(qteBaseElem.value);

                            let prixText = card.querySelector('.panier-cards-card-detail-prix');
                            let prix = parseFloat(card.querySelector('.prixBase').value.trim());
                            let prixDb = card.querySelector('#prixDb');
                            // console.log(prix);

                            let quantity = qteBase + 1;
                            qtyElem.textContent = quantity;
                            qteBaseElem.value = quantity;
                            card.setAttribute('data-quantite', quantity);

                            // console.log(card);

                            let totalPrix = prix * quantity;
                            // console.log(totalPrix);
                            prixText.textContent = `${totalPrix} Ar`;
                            prixDb.value = totalPrix;


                            // localStorage.setItem('prix', totalPrix);
                            // localStorage.setItem('quantite', quantity);

                            // total();
                            saveCartData(id, quantity, totalPrix);
                            loadCartData()
                        });
                    });

                    moinBtns.forEach(btn => {
                        btn.addEventListener('click', (e) => {
                            const card = e.target.closest('.panier-cards-card');
                            const id = card.getAttribute('data-id');
                            const qtyElem = card.querySelector(
                                '.panier-cards-card-btns-num'
                            ); // Change to .panier-cards-card-btns-num
                            let qteBaseElem = card.querySelector(
                                '.qteBase'); // Element to store quantity
                            let qteBase = Number(qteBaseElem.value);

                            let prixText = card.querySelector('.panier-cards-card-detail-prix');
                            let prix = parseFloat(card.querySelector('.prixBase').value.trim());
                            let prixDb = card.querySelector('#prixDb');

                            if (qteBase > 1) {
                                let quantity = qteBase - 1;
                                qtyElem.textContent = quantity;
                                qteBaseElem.value = quantity;
                                card.setAttribute('data-quantite', quantity);

                                let totalPrix = prix * quantity;
                                prixText.textContent = `${totalPrix} Ar`;
                                prixDb.value = totalPrix;


                                // total();
                                saveCartData(id, quantity, totalPrix);
                                loadCartData()
                            }
                        });
                    });
                }
                // function saveCartData(id, quantity , totalPrix, nom) {
                //     let cart = JSON.parse(localStorage.getItem('cart')) || {}

                //     cart[id] = {
                //         quantity: quantity,
                //         totalPrix: totalPrix,
                //         nom: nom
                //     }

                //     localStorage.setItem('cart', JSON.stringify(cart))

                // }




                // function loadCartData() {
                //     let cart = JSON.parse(localStorage.getItem('cart')) || {};
                //     console.log("Chargement des données du panier :", cart);

                //     document.querySelectorAll('.panier-cards-card').forEach(card => {
                //         const id = card.getAttribute('data-id');

                //         if (cart[id]) {
                //             const { quantity, totalPrix } = cart[id];
                //             card.querySelector('.panier-cards-card-btns-num').textContent = quantity;
                //             card.querySelector('.qteBase').value = quantity;
                //             card.querySelector('.panier-cards-card-detail-prix').textContent = `${totalPrix} Ar`;
                //             card.querySelector('#prixDb').value = totalPrix;
                //         }
                //     });
                // }


                addQuantityEventListeners();

                // window.onload = loadCartData;


                // function updateCart(cartItems) {
                //     console.log(cartItems);
                //     console.log('cartItems:', cartItems); // Vérifiez ce que vous recevez
                //     if (!Array.isArray(cartItems)) {
                //         console.error('cartItems n\'est pas un tableau');
                //         return;
                //     }
                //     const panierCards =  document.querySelector('.panier-cards');
                //     console.log(panierCards);
                //     panierCards.innerHTML = '';


                //     cartItems.forEach(item => {
                //         panierCards.innerHTML += `
            //         <div class="panier-cards-card" data-id="${item.id}" data-nom="${item.nom}" data-prix="${item.prixPromotion}" data-quantite='1' data-image="${item.imageUrl}">
            //             <figure class="panier-cards-card-figure">
            //                 <div class="panier-cards-card-figure-picture">
            //                     <img class="panier-cards-card-img" src="${item.imageUrl}" alt="">

            //                     <a class="fa-solid fa-trash panier-cards-card-figure-picture-delete" data-produit-id="${item.id}" href="{{ 'deletePanier/ .${item.id}' }}" ></a>

            //                 </div>
            //                 <div class="panier-cards-card-detail">
            //                     <p class="panier-cards-card-detail-nom">${item.nom}</p>
            //                     <p class="panier-cards-card-detail-prix">${item.prixPromotion}</p>
            //                     <input type="hidden" class="prixBase" value='${item.prixPromotion}' id='prix'>
            //                     <input type="hidden" value="${item.prixPromotion}" class='prixDb' id="prixDb">
            //                 </div>
            //             </figure>
            //             <div class="panier-cards-card-btns">
            //                 <button class="panier-cards-card-btns-btn plus-btn">+</button>
            //                 <p class="panier-cards-card-btns-num">1</p>
            //                 <input type="hidden" value="1" class='qteBase'>
            //                 <input type="hidden" value="1" id="Quantite">
            //                 <button class="panier-cards-card-btns-btn moin-btn">-</button>
            //             </div>
            //         </div>
            //         `
                //     })
                //     addQuantityEventListeners();
                //     totale();
                // }
                updateCart();
            })



            // total();




            // window.onload = loadCartData;



            function storage() {
                // let ligne  = document.querySelectorAll(`.panier-cards-card`);
                let detail = document.querySelectorAll('.panier-cards-card-detail');
                // let quantite = document.querySelector('.panier-cards-card-btns .panier-cards-card-btns-num').textContent;
                // console.log(quantite);

                let commande = [];

                document.querySelectorAll('.panier-cards-card').forEach((card) => {
                    let nom = card.getAttribute('data-nom');
                    let prix = card.getAttribute('data-prix');
                    let quantite = card.getAttribute('data-quantite');
                    let image = card.getAttribute('data-image')
                    let id = card.getAttribute('data-id');

                    const produit = {
                        id: id,
                        nom: nom,
                        prix: prix,
                        quantite: quantite,
                        image: image,
                    }
                    commande.push(produit);

                })






                console.log(commande);
                if (!sessionStorage.getItem('commande')) {

                    console.log(sessionStorage.setItem('commande', JSON.stringify(commande)));
                } else {
                    sessionStorage.setItem('commande', JSON.stringify(commande))
                }
                // sessionStorage.setItem('commande',JSON.stringify(commande))


            }



            setInterval(storage, 1000)

            // function saveCommand()  {
            //     const commande = JSON.parse(sessionStorage.getItem('commande'));

            //     console.log('saveCommande:' ,commande);

            //     if(!commande || commande.length === 0){
            //         console.log('accunne comande trouver');
            //         return;
            //     }

            //     fetch('/save-commande', {
            //         method: 'POST',
            //         headers: {
            //             'content-Type': 'application/json',
            //             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            //         },
            //         body: JSON.stringify({commande})
            //     })

            //     .then(response => response.json());
            //     // .then(data => {
            //     //     if(data.success){
            //     //         console.log('commande sauvgardé');

            //     //         sessionStorage.removeItem('commande')
            //     //     }else{
            //     //         console.log('commend erreur');
            //     //     }
            //     // })

            //     .cacth(error => {
            //         console.log('Erreur:', error);
            //     })


            // }
            // saveCommand();
            // storage();

        }
        // setInterval(total,100)



        addCart();

        function totale() {
            let prix = document.querySelectorAll(".panier-cards-card-detail-prix")
            let total = document.querySelector('.prixFinal');
            let number = document.querySelectorAll(`.panier-cards-card-btns-num`)

            let data = []
            prix.forEach(e => {
                data.push(parseInt(e.textContent))
            })
            let somme = 0;
            data.forEach((e, i) => {
                // somme += e*parseInt(number[i].value)
                // somme  = somme + e*parseInt(number[i].value)
                somme += data[i];
                // console.log(somme);
            })

            total.value = somme;

            document.querySelector('.panier-montant').textContent = `Montant total: ${somme} Ar `

            // console.log(total);

            // console.log(data);



            if (!sessionStorage.getItem('prix')) {
                sessionStorage.setItem('prix', JSON.stringify(somme));
            } else {
                sessionStorage.setItem('prix', JSON.stringify(somme));
            }

            if (somme === 0) {
                sessionStorage.removeItem('prix');
            }
            // console.log(sessionStorage.getItem('prix'));
            return somme;
        }
        setInterval(totale, 100)
        // totale();


        // totale();
    </script>
@endsection
