setTimeout(function() {
    var alertElement = document.querySelector('.alert');
    if (alertElement) {
        alertElement.classList.add('fade-out');

        // Optionnel : retirer l'élément du DOM après la transition
        setTimeout(function() {
            alertElement.style.display = 'none';
        }, 1000); // La durée de la transition est de 1 seconde (1000 millisecondes)
    }
}, 9000);



//fenêter de confirmation de suppression
function confirmDeletion(event) {

    if (!confirm('Êtes-vous sûr de vouloir supprimer cette element ?')) {
        event.preventDefault();
    }
}

function confirmRetire(event) {
    if(!confirm('Êtes-vous sûr de vouloir retire cette promotion')) {
        event.preventDefault();
    }

}

function confirmAnnulation(event) {
    if(!confirm('Êtes-vous sur de vouloir confirmer l\'anulation de commadne')){
        event.preventDefault();
    }

}

//function alert
function alertMessage() {
    alert('il y a des produit qui est en alert ')


}

document.addEventListener("DOMContentLoaded", function() {
    // Sélectionner tous les messages d'erreur
    const errorMessages = document.querySelectorAll('.error');

    // Appliquer l'effet de disparition à chaque message d'erreur
    errorMessages.forEach(function(errorMessage) {
        setTimeout(() => {
            // errorMessage.style.display = 'none';
            errorMessage.classList.add('hideMessage');
        }, 10000); // 5000 millisecondes = 5 secondes
    });
});
document.addEventListener("DOMContentLoaded", function() {
    // Sélectionner tous les messages d'erreur
    const errorMessages = document.querySelectorAll('.success');

    // Appliquer l'effet de disparition à chaque message d'erreur
    errorMessages.forEach(function(errorMessage) {
        setTimeout(() => {
            errorMessage.classList.add('hideMessage');
        }, 5000); // 5000 millisecondes = 5 secondes
    });
});



// prompt('Ete vous sure')
// alert('')

document.getElementById('file-img').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('img').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});

//message
setTimeout(function() {
    var alertElement = document.querySelector('.alert');
    if (alertElement) {
        alertElement.classList.add('fade-out');

        // Optionnel : retirer l'élément du DOM après la transition
        setTimeout(function() {
            alertElement.style.display = 'none';
        }, 1000); // La durée de la transition est de 1 seconde (1000 millisecondes)
    }
}, 6000); // Attendre 3 secondes avant de commencer la transition

