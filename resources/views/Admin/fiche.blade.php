@extends('Admin.layouts.master')

@section('titre')
FIche de stock

@endsection

@section('contenue')
<seciton class="fiche">
    {{-- <h2 class="fiche-title">Fiche de stock</h2> --}}


    <table class="table fiche-table table-bordered">
        <div class="entre">

            <thead>
                <tr>
                    <th>Produits</th>
                    <th>Quantité</th>
                    <th>Prix Unitaire</th>
                    <th>Montant</th>
                </tr>
                <tr>
                    <th colspan="4 " class="text-center fiche-table-titre">Entre</th>



                </tr>



            </thead>

            <tbody class="fiche-content">

                    {{-- Entré --}}
                    @foreach ($entres as $entre)

                    <tr  class="entre" data-id="{{$entre->id}}">


                      <td class="fiche-table-produits">{{$entre->nom}}</td>
                      <td class="quantite">{{$entre->quantite}}</td>
                      <td class="montant">{{$entre->prix}}</td>
                      <td class="resultat">8000</td>
                      <input type="hidden"  value="">





                    </tr>
                    @endforeach




            </tbody>
            {{-- total --}}
            <tfoot>
              <tr>
                {{--Total Entré --}}


                <th>Total</th>
                <td>5</td>
                <td>2000</td>
                <td>10000</td>




              </tr>

            </tfoot>
        </div>

    </table>
    <table class="table fiche-table table-bordered">

        <div class="">

            <thead>
                <tr>
                    <th>Produits</th>
                    <th>Quantité</th>
                    <th>Prix Unitaire</th>
                    <th>Montant</th>
                </tr>
                <tr>
                    <th colspan="4" class="text-center fiche-table-titre1">Sortie</th>

                </tr>

            </thead>
            <tbody>
                @foreach ($sortis as $sortie)

                    <tr class="sortie">





                    {{-- Sortie --}}
                    <td class="fiche-table-produits">{{$sortie->nom_produits}}</td>
                    <td class="quantite">{{$sortie->quantite}}</td>
                    <td class="montant">{{$sortie->prix}}</td>
                    <td class="resultat"></td>


                    </tr>
                @endforeach

            </tbody>
            {{-- total --}}
            <tfoot>
              <tr>


                {{--Total Sortie --}}
                <th>Total</th>
                <td>3</td>
                <td>7000</td>
                <td>21000</td>


              </tr>

            </tfoot>
        </div>
    </table>

</seciton>

{{-- <script>
    const entreDb = @json($produits);
    // console.log(produitsDb);

    let entres = entreDb.map(produit => ({
        id: produit.id,
        nom: produit.nom,
        quantite: produit.quantite,
        prix: produit.prix,
        image: produit.image
    }));

    const montants = document.querySelectorAll('#montant');
    const quantités = document.querySelectorAll('#quantité');

    montants.forEach(montant => {
        montant = montant.textContent;
        let prix = parseFloat(montant)

        console.log(prix);
        // console.log(montants);
    });
    quantités.forEach(quantité => {

        qte =  quantité.textContent;
        let quantite = Number(qte)
        console.log(quantite);
    });

    let prixTotal = montants * quantités;

    // console.log(prixTotal);
    // document.addEventListner('DOMContentLoaded', () => {

    // })

    // function entre() {
    //     const content = document.querySelector('.fiche-content')


    //     let html = "";

    //     entres.forEach(entre => {


    //         content.innerHTML = html
    //         // montant();
    //         let id = entre.id;
    //         let nom = entre.nom;
    //         let quantite = entre.quantite;
    //         quantite = Number(quantite);
    //         // console.log(typeof(quantite));
    //         let prix = entre.prix;
    //         prix = parseFloat(prix);
    //         // console.log(prix);
    //         // let nom = entre.nom;


    //         let montant = quantite * prix ;
    //         console.log(`${nom}: ${montant}`);
    //         montants.textContent = `${montant} Ar`

    //         // html += `
    //         //     <tr >


    //         //         <td class="fiche-table-produits">${entre.nom}</td>
    //         //         <td>${entre.quantite}</td>
    //         //         <td>${entre.prix}</td>
    //                 // <td id="montant" class='fiche-montant'> ${montant}  Ar</td>
    //         //         <input type="hidden"  value="">





    //         //     </tr>
    //         `
    //     })





    // }
    // entre();




</script> --}}

@endsection
