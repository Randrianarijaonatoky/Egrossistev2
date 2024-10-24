// console.log('mandel')

let btnAnnules = document.querySelectorAll('#btnAnnule');
let froms = document.querySelectorAll('#annulationfrom')


$(document).ready(function () {
    // console.log('commande ajax');
    $('.userCompte-achat-btnAnnuler').on('click', function(e) {
        e.preventDefault();
        console.log('clic');

        const commandeId = $(this).data('id');
        const form = $('#annulationForm-' + commandeId); // Sélectionne le formulaire associé
        const boutton = $(this); // Sélectionne le bouton qui a été cliqué




        $.ajax({
            url: form.attr('action'), // Utilise l'attribut action du formulaire
            method: 'POST',
            data: form.serialize(), // Sérialise les données du formulaire pour l'envoi
            success: function(response) {
                // Met à jour le texte du bouton après la requête réussie
                boutton.html('En attente de validation');
                alert(response.success);
            },

            error: function(xhr) {
                alert('Une erreur est survenue au moment de annulation')
            }
        })


    })

})


// })

// document.querySelectorAll('.annulationform').forEach(function(form) {
//     form.addEventListener('submit', function(event) {
//         // Empêcher le formulaire d'être immédiatement soumis
//         event.preventDefault();

//         // Récupérer le bouton de ce formulaire particulier
//         const btnAnnuler = form.querySelector('button[type="submit"]');

//         // Modifier le texte du bouton
//         btnAnnuler.innerHTML = "En attente de validation...";
//         btnAnnuler.disabled = true; // Désactiver le bouton pour éviter des clics multiples

//         // Soumettre le formulaire après avoir modifié le texte du bouton
//         form.submit();
//     });

//     // setTimeout(function() {
//     //     form.submit(); // Soumettre le formulaire après un délai de 2 secondes
//     // }, 2000); // délai de 2000 ms (2 secondes)
// });
