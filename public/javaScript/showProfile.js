/// ****** show Profil start ***********

let btnProfil = document.querySelector('.header-nav-iconsContenair-profils');
let profil = document.querySelector('.header-hoverProfil');
console.log(profil);

console.log('profile ');
// Fonction pour afficher le profil
function showProfil() {
    profil.style.display = 'block';
    profil.style.transition = '2s ease-out';
}

// Fonction pour cacher le profil
function hideProfil() {
    profil.style.display = 'none';
}

// Ajoute un écouteur d'événements pour afficher le profil
btnProfil.addEventListener('click', (event) => {
    // Empêche la propagation du clic à l'écouteur d'événements du document
    event.stopPropagation();
    showProfil();
});

// Ajoute un écouteur d'événements pour cacher le profil lorsqu'on clique en dehors
document.addEventListener('click', (event) => {
    // Vérifie si le clic est en dehors du profil et du bouton
    if (!profil.contains(event.target) && !btnProfil.contains(event.target)) {
        hideProfil();
    }
});

// Optionnel : Ajoute un écouteur d'événements pour empêcher le clic sur le profil de fermer le profil
profil.addEventListener('click', (event) => {
    event.stopPropagation();
});

// ****** show Profil end ***********
