@php
    // $categories = App\Model\Categorie::get();
@endphp

<footer class="footer">
    <div class="footer-cards">
        <div class="footer-cards-card">
            <div class="">

                <h1 class="footer-cards-card-title">Apropos</h1>

                <p class="footer-cards-card-para">Notre site <span class="footer-cards-card-para-nom">E-Grossiste</span>
                    est conçu pour la faciliter notre vie quotidien </p>
                <p>
                    Ce qui a été fait pour éviter le déplacements, alors
                    n'hésitez pas à faire <span class="footer-cards-card-para-nom"> votre achat en ligne</span></p>
            </div>

            <hr class="footer-cards-card-hr">
        </div>
        <div class="footer-cards-card">
            <div class="">
                <h1 class="footer-cards-card-title">Contact</h1>


                <p class="footer-cards-card-detail">tokyrandria36@gmail.com</p>
                <p class="footer-cards-card-detail">+261 32 25 465 05</p>
                <p class="footer-cards-card-detail">+261 34 89 171 95</p>

                <ul class="footer-cards-card-links">
                    <li class="">
                        <a target="_blank" href="" class="footer-cards-card-links-link fa-brands fa-twitter"></a>
                    </li>
                    <li class="">
                        <a target="_blank" href=""
                            class="footer-cards-card-links-link fa-brands fa-linkedin-in"></a>
                    </li>
                    <li class="">
                        <a target="_blank" href=""
                            class="footer-cards-card-links-link fa-brands fa-whatsapp"></a>
                    </li>
                    <li class="">
                        <a target="_blank" href=""
                            class="footer-cards-card-links-link fa-brands fa-facebook-f"></a>
                    </li>
                </ul>
            </div>
            <hr class="footer-cards-card-hr">

            <div class="">
                <h1 class="footer-cards-card-title">Categorie</h1>

                {{-- @foreach ($categories as $categorie)

                <p class="footer-cards-card-detail">{{$categorie->categorie}}</p>
                @endforeach --}}
                <p class="footer-cards-card-detail">Produit laitié </p>
                <p class="footer-cards-card-detail">PPN</p>
                <p class="footer-cards-card-detail">Boisson</p>
                <p class="footer-cards-card-detail">Biscuits</p>
                <p class="footer-cards-card-detail">Bonbon</p>






            </div>
            {{-- <hr class="footer-cards-card-hr"> --}}









        </div>




    </div>


    <p class="footer-foot">-- Projet final E-grossiste 2024 © --</p>

    <i class="fa-solid fa-mobile-screen-button footer-bgPhone"></i>
    <i class="fa-regular fa-circle footer-circle"></i>



</footer>
