<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
    {{-- <img src="{{ asset('images/phoneLogo2.png') }}" alt="Logo"> --}}

    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.0.0-web/css/all.min.css') }}">
    <title>Facture</title>
</head>

<style>
    .facture {
        margin: 2rem auto;
        width: 80%;
        border-radius: 10px;
        /* // border: 5px solid $jaune; */
        border: 1px solid #feb600;
        padding: 1rem;
        font-weight: 500;
    }

    .facture-head {}

    .facture-head-contenair {
        display: flex;
        justify-content: space-between;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        /* background-color: #fffeef; */

    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table,
    th,
    td {
        border: 1px solid black;
    }

    th,
    td {
        padding: 8px;
        text-align: left;
    }

    th {
        /* color: #feb600; */
    }

    header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .facture-footer {
        display: flex !important;
        justify-content: space-between
    }
</style>

<body>

    <main class="facture">

        <header class="head" style="display: flex">
            {{-- <img src="{{asset('images/phoneLogo2.png')}}" alt="" class="facture-head-logo"> --}}

            <div class="facture-head-contenair">
                <div class="facture-head-contenair-details">
                    <h3 class="facture-head-title">Numero de Facture</h3>
                    <p class="facture-head-value">n° {{ $paiement->numero_facture }}</p>


                    <h3 class="facture-head-title">Paiement Effectue</h3>
                    <p class="facture-head-value" id="payer">{{ $paiement->amount }} Ar</p>





                </div>
                <div class="facture-head-contenair-details">
                    <h3 class="facture-head-title">Mode de Paiement</h3>
                    <p class="facture-head-value">Paiement avec stripe</p>


                    <h3 class="facture-head-title">Date</h3>
                    @php
                        $date = $paiement->created_at;
                        $dateC = date('d F Y', strTotime($date));
                        // $date = date('d F Y' , strtotime($dateFin))
                    @endphp
                    <p class="facture-head-value">{{ $dateC }}</p>


                </div>

            </div>
        </header>
        <hr>


        <table class="facture">
            <thead>
                <tr style="background-color: #fffeef">
                    <th>Nom produit</th>
                    <th>Quantite</th>
                    <th>Prix unitaire</th>
                    <th>Prix Total</th>
                </tr>
            </thead>
            <tbody>
                {{-- <tr>
                    @php
                        // Dans votre contrôleur ou directement dans votre vue Blade
                        $nomJson = $paiement->nom;
                        $nomArray = json_decode($nomJson, true); // Décode JSON en tableau PHP
                        // $nomString = implode(', ', $nomArray); // Convertit le tableau en une chaîne séparée par des virgules
                        // var_dump($nomArray);

                    @endphp
                    @foreach ($nomArray as $nom)

                    <td>{{$nom}}</td>
                    @endforeach


                    <td>5</td>
                    <td>8000 Ar</td>
                    <td>40000 Ar</td>

                </tr> --}}

                @foreach ($details as $detail)
                    <tr>
                        <td>{{ $detail['nom'] }}</td>
                        <td>{{ $detail['quantite'] }}</td>
                        <td>{{ $detail['prix'] }}</td>
                        <td>{{ $detail['total'] }}</td>
                        {{-- <td>{{ number_format($detail['prix'], 2) }} Ar</td> --}}
                        {{-- <td>{{ number_format($detail['total'], 2) }} Ar</td> --}}
                    </tr>
                @endforeach

            </tbody>

            <tfoot>
                <tr>
                    <th colspan="2"></th>
                    <th style="background-color: #fffeef">Total Montant</th>
                    <th id="payer" style="background-color: #fffeef">{{ $paiement->amount }} Ar</th>
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

                {{-- <h1>Logo</h1> --}}


            </div>
        </footer>


    </main>


    {{-- <footer>
        <form action="{{ route('generateInvoice', ['id' => $paiement->id]) }}" method="GET">
            <button type="submit">Télécharger la facture</button>
        </form>
    </footer> --}}

    <footer>
        <a href="{{ route('generateInvoice', ['id' => $paiement->id]) }}" class="btn-download">Télécharger la
            facture</a>
    </footer>

</body>

<script>
    function formatNumber(number) {
        return number.toLocaleString('fr-FR', {
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
        }) + ' Ar';
    }

    let payer = document.getElementById('payer').textContent;
    payer = parseFloat(payer)
    payer = formatNumber(payer)




    let payers = document.querySelectorAll('#payer');
    payers.forEach(element => {
        element.textContent = payer

    });
    console.log(test);
</script>

</html>
