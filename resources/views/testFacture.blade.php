<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome-free-6.0.0-web/css/all.min.css')}}">
    <title>Document</title>
</head>
<body>

    <main class="facture">

        <header class="facture-head">
            <img src="{{asset('images/phoneLogo2.png')}}" alt="" class="facture-head-logo">

            <div class="facture-head-contenair">
                <div class="facture-head-contenair-details">
                    <h2 class="facture-head-title">Numero de Facture</h2>
                    <p class="facture-head-value">655131</p>


                    <h2 class="facture-head-title">Paiement Effectue</h2>
                    <p class="facture-head-value">10 000 Ar</p>





                </div>
                <div class="facture-head-contenair-details">
                    <h2 class="facture-head-title">Mode de Paiement</h2>
                    <p class="facture-head-value">Paiement avec stripe</p>


                    <h2 class="facture-head-title">Date</h2>
                    <p class="facture-head-value">22 Août 2024</p>


                </div>

            </div>
        </header>


        <table class="facture" >
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Nombre</th>
                    <th>Prix unitaire</th>
                    <th>Prix Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Goutie madelenne</td>
                    <td>5</td>
                    <td>8000 Ar</td>
                    <td>40000 Ar</td>

                </tr>
                <tr>
                    <td>Goutie cockies</td>
                    <td>5</td>
                    <td>4000 Ar</td>
                    <td>20000 Ar</td>

                </tr>
                <tr>
                    <td>Goutie cockies</td>
                    <td>5</td>
                    <td>4000 Ar</td>
                    <td>20000 Ar</td>

                </tr>
            </tbody>

            <tfoot>
                <tr>
                    <th colspan="2"></th>
                    <th>Total Montant</th>
                    <th>162 000 Ar</th>
                </tr>
                {{-- <tr>
                    <td>162 000 Ar</td>
                </tr> --}}
            </tfoot>
        </table>


        <footer class="facture-footer">
            <div class="facture-footer-merci">
                <h2 class="facture-head-title">Grossiste Store</h2>
                <p class="facture-foot-para">Merci pour votre achat chez Grossiste Store,</p>

            </div>

            <div class="facture-footer-contenair">
                <div class="facture-footer-contenair-contact">
                    {{-- <h2 class="facture-head-title"> Contact</h2> --}}
                    <p class="facture-footer-contenair-contact-link">
                        <i class="fa-solid fa-phone"></i>
                        +261 32 25 465 05

                    </p>
                    <p class="facture-footer-contenair-contact-link">
                        <i class="fa-solid fa-envelope"></i>
                        grossiste.stroe@gmail.com

                    </p>
                    <p class="facture-footer-contenair-contact-link">
                        <i class="fa-solid fa-location-dot"></i>
                        Andoharanofotsy

                    </p>

                </div>
                <div class="facture-hr"></div>
                {{-- <img src="{{asset('images/phoneLogo2.png')}}" alt="" class="facture-head-logo"> --}}

                <h1>Logo</h1>


            </div>
        </footer>


    </main>


</body>
</html>
