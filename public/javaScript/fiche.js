// document.addEventListener('DOMContentLoaded', )

// function updateResultat() {

//     document.querySelectorAll('.entre').forEach( row => {
//         let qte = parseFloat(row.querySelector('.quantite').textContent.trim())
//         let montant = parseFloat(row.querySelector('.montant').textContent.trim());

//         let resultat = qte * montant;
//         row.querySelector('#resultat').textContent = `${resultat} Ar`
//     })
// }

function updateResultat() {
    document.querySelectorAll('.entre').forEach(row => {
        // Sélectionnez les éléments par classe
        let qteElem = row.querySelector('.quantite');
        let montantElem = row.querySelector('.montant');
        let resultatElem = row.querySelector('.resultat');

        // Assurez-vous que les éléments existent avant de tenter d'accéder à leurs propriétés
        if (qteElem && montantElem && resultatElem) {
            let qte = parseFloat(qteElem.textContent.trim());
            let montant = parseFloat(montantElem.textContent.trim());
            let total = 0;

            // Vérifiez que les valeurs sont des nombres valides
            if (!isNaN(qte) && !isNaN(montant)) {
                let resultat = qte * montant;
                total += resultat;

                console.log( `entre ${total}`);
                resultatElem.textContent = formatNumber(resultat);
                console.error("Quantité ou montant non valides pour la ligne :", row);
            } else {
            }
        } else {
            console.error("Éléments non trouvés pour la ligne :", row);
        }
        total();
    });
    document.querySelectorAll('.sortie').forEach(row => {
        // Sélectionnez les éléments par classe
        let qteElem = row.querySelector('.quantite');
        let montantElem = row.querySelector('.montant');
        let resultatElem = row.querySelector('.resultat');

        // Assurez-vous que les éléments existent avant de tenter d'accéder à leurs propriétés
        if (qteElem && montantElem && resultatElem) {
            let qte = parseFloat(qteElem.textContent.trim());
            // console.log(qte);
            let montant = parseFloat(montantElem.textContent.trim());
            let quantiteTotal =+ qte;
            console.log(quantiteTotal);

            // Vérifiez que les valeurs sont des nombres valides
            if (!isNaN(qte) && !isNaN(montant)) {
                let resultat = qte * montant;
                resultatElem.textContent = formatNumber(resultat);
            } else {
                console.error("Quantité ou montant non valides pour la ligne :", row);
            }
        } else {
            console.error("Éléments non trouvés pour la ligne :", row);
        }
        total();
    });


}

function formatNumber(number) {
    return number.toLocaleString('fr-FR', { minimumFractionDigits: 0, maximumFractionDigits: 0 }) + ' Ar';
}

function total() {
    document.addEventListener('DOMContentLoaded', () => {

        let montant = document.querySelectorAll('resultat');
        console.log(montant);
    })


}




window.onload = updateResultat;
