document.addEventListener('DOMContentLoaded', () => {
    let btns = document.querySelectorAll('.produits-cards-card-detail');
    // console.log(btns);
    let produits = document.querySelector('.produits');
    const produitsDetail = document.querySelector('.produits-details');


    btns.forEach(detail => {
        detail.addEventListener('click', (e) => {
            e.preventDefault();
            const id = detail.getAttribute('data-id');
            console.log(id);
            // console.log('show');
            produitsDetail.style.display = 'block';
            produitsDetail.style.opacity = 1
            produitsDetail.style.transition = '1s ease-out'
            produits.style.filter = 'brightness(0.5)';


            fetch(`/detail/${id}`, {
                method: 'POST',
                headers: {
                    'Content-Type' : 'application/x-www-form-urlencoded',
                    'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                // body: JSON.stringify(detail)
                // body: new URLSearchParams(detail)
            })

            .then(Response => Response.json())
            .then(data => {
                // console.log(data.detail);
                updateProductDetails(data.detail);

            })

            .catch(error => {
                console.log('erreur detail', error);
            })






        })
    })

    // Mettre à jour l'image
    function updateProductDetails(detail) {
        // Assurez-vous que detail est un tableau avec les détails du produit
        if (Array.isArray(detail) && detail.length > 0) {
            const produit = detail[0]; // On suppose que detail est un tableau avec un seul produit
            const produitsDetailsCard = produitsDetail.querySelector('.produits-details-card');
            produitsDetailsCard.querySelector('img').src = produit.image;
            const textes = document.querySelector('.produits-details-card-contenair-textes')

            // Mettre à jour le nom
            produitsDetailsCard.querySelector('#detail_nom').textContent = produit.nom;
            produitsDetailsCard.querySelector('.detail_date').textContent = produit.date_creation;
            produitsDetailsCard.querySelector('#detail_composant').textContent = produit.composant;

            // Mettre à jour la description
            produitsDetailsCard.querySelector('#detail_desc').textContent = produit.description;



        } else {
            console.error('Aucun détail de produit disponible ou format incorrect');
        }
    }

    // Ajoute un écouteur d'événements pour cacher le profil lorsqu'on clique en dehors

    document.addEventListener('click', (event) => {
        // Vérifie si le clic est en dehors du profil et du bouton
        if (!produitsDetail.contains(event.target) && !Array.from(btns).some(btn => btn.contains(event.target))) {
            hideProfil();
        }
    });

    function hideProfil() {
        produitsDetail.style.display = 'none';
        produits.style.filter = 'brightness(1)'
    }
    produitsDetail.addEventListener('click', (event) => {
        event.stopPropagation();
    });


})


// ****produits************
document.addEventListener('DOMContentLoaded', () => {
    const btnLeft = document.querySelector('.produits-btns-prev');
    const btnRight = document.querySelector('.produits-btns-next');
    const card = document.querySelector('.produits-cards');
    const scrollAmount = 277; // Distance à faire défiler en pixels
    const scrollDuration = 600; // Durée de l'animation en millisecondes (fixe)
    const scrollInterval = 3000; // Intervalle pour le défilement automatique en millisecondes

    let autoScrollInterval;

    function smoothScrollTo(target, duration) {
        const start = card.scrollLeft;
        const startTime = performance.now();

        function scrollAnimation(currentTime) {
            const timeElapsed = currentTime - startTime;
            const progress = Math.min(timeElapsed / duration, 1); // Progrès de l'animation (0 à 1)

            card.scrollLeft = start + (target - start) * progress;

            if (progress < 1) {
                requestAnimationFrame(scrollAnimation);
            }
        }

        requestAnimationFrame(scrollAnimation);
    }

    function startAutoScroll() {
        autoScrollInterval = setInterval(() => {
            const maxScrollLeft = card.scrollWidth - card.clientWidth;
            const isAtEnd = card.scrollLeft >= maxScrollLeft;

            if (isAtEnd) {
                smoothScrollTo(0, scrollDuration);
            } else {
                smoothScrollTo(card.scrollLeft + scrollAmount, scrollDuration);
            }
        }, scrollInterval);
    }

    function stopAutoScroll() {
        clearInterval(autoScrollInterval);
    }

    btnLeft.addEventListener('click', () => {
        stopAutoScroll(); // Arrête le défilement automatique
        smoothScrollTo(card.scrollLeft - scrollAmount, scrollDuration);
        // startAutoScroll(); // Redémarre le défilement automatique après avoir cliqué
    });

    btnRight.addEventListener('click', () => {
        stopAutoScroll(); // Arrête le défilement automatique
        smoothScrollTo(card.scrollLeft + scrollAmount, scrollDuration);
        // startAutoScroll(); // Redémarre le défilement automatique après avoir cliqué
    });

    // startAutoScroll(); // Démarre le défilement automatique lors du chargement
});
