//Panier
const plus = document.getElementById('plus');
const moins = document.getElementById('moin');




// function test() {

//     plus.addEventListener('click', () => {
//         const value =  document.getElementById('Quantite').value;
//         const numberValue = parseFloat(value);
//         const prix = 7000;


//         const resultat = numberValue + 1 ;
//         const montant = prix * resultat;
//         // console.log(resultat);
//         montant.toString();
//         //aficharge
//         document.getElementById('Quantite').value = `${resultat}`

//         document.getElementById('qte').textContent = `${resultat}`

//         document.getElementById('prix').textContent = `${montant} Ar`
//         document.getElementById('prixDb').value = `${montant} Ar` ;
//         // console.log(numberValue);

//     });

//     moins.addEventListener('click', () => {
//         const value =  document.getElementById('Quantite').value;
//         const numberValue = parseFloat(value);
//         const prix = 7000;
//         if(numberValue >= 2 ){

//             const resultat = numberValue - 1 ;
//             const montant = prix * resultat;


//             //aficharge
//             document.getElementById('Quantite').value = `${resultat}`

//             document.getElementById('qte').textContent = `${resultat}`
//             document.getElementById('prix').textContent = `${montant} Ar`
//         }


//     })
// }
// // moins.addEventListener('click', decrement);

// test();


const closex = document.getElementById('close');
const bar = document.getElementById('bar');
const listNav = document.querySelector('.header-nav-listes');

closex.style.display ='none';



bar.addEventListener('click', () => {
    bar.style.display = 'none';
    closex.style.display ='block';
    listNav.style.top = 0;
    // listNav.style.top = 0;
    listNav.style.transition = '1s In Out · Back'

})
closex.addEventListener('click', () => {
    bar.style.display = 'block';
    closex.style.display ='none';
    listNav.style.top = '-100%';
    // listNav.style.top = '-100%';
    listNav.style.transition = '1s ease-out'

})

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
document.addEventListener("DOMContentLoaded", function() {
    // Sélectionner tous les messages d'erreur
    const errorMessages = document.querySelectorAll('.error');

    // Appliquer l'effet de disparition à chaque message d'erreur
    errorMessages.forEach(function(errorMessage) {
        setTimeout(() => {
            errorMessage.classList.add('hideMessage');
        }, 10000); // 5000 millisecondes = 5 secondes
    });
});

//anmation sur les section

document.addEventListener('DOMContentLoaded', () => {
    // Sélectionner toutes les sections que vous voulez observer
    const sections = document.querySelectorAll('#section');
    console.log(sections);

    // Créer une instance d'Intersection Observer
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Ajouter la classe d'animation lorsque l'élément entre dans la vue
                entry.target.classList.add('animateSecion');
            } else {
                // Vous pouvez retirer la classe d'animation lorsque l'élément sort de la vue
                entry.target.classList.remove('animateSecion');
            }
        });
    }, { threshold: 0.5 }); // 0.5 signifie que 50% de l'élément doit être visible

    const ctg = document.querySelectorAll('.ctg-main-listes-liste')
    console.log(ctg);

    const observerCtg = new IntersectionObserver((entries) => {
        entries.forEach(o => {

            if(o.isIntersecting) {
                o.target.classList.add('slideUp')
            }else {
                o.target.classList.remove('slideUp')
            }
        })
    })

    const promotions = document.querySelectorAll('.achat-cards-card-img');
    const observeProm = new IntersectionObserver((entries) => {
        entries.forEach(prom => {
            if(prom.isIntersecting) {
                prom.target.classList.add('promotionRotate');
            }else {
                prom.target.classList.remove('promotionRotate')
            }
        })
    })


    // Observer chaque section
    sections.forEach(section => {
        observer.observe(section);
    });
    ctg.forEach( listeCtg => {

        observerCtg.observe(listeCtg)
    })

    promotions.forEach(promotion => {
        observeProm.observe(promotion)
    })



});









//*******slide*********
// document.addEventListener('DOMContentLoaded', () =>{

//     const btnLeft = document.querySelector('.ctg-main-btnLeft');
//     const btnRight = document.querySelector('.ctg-main-btnRight');
//     const main = document.querySelector('.ctg-main')
//     const card = document.querySelector('.ctg-main-listes');

//     card.scrollLeft = 200

//     btnLeft.addEventListener('click', (e) => {
//         console.log('left');
//         card.scrollLeft -= 200;
//         card.transition = '2s ease-out';
//     })

//     btnRight.addEventListener('click', (e) => {
//         console.log("right");
//         card.scrollLeft += 200;
//     })
// })


// document.addEventListener('DOMContentLoaded', () => {
//     const btnLeft = document.querySelector('.ctg-main-btnLeft');
//     const btnRight = document.querySelector('.ctg-main-btnRight');
//     const card = document.querySelector('.ctg-main-listes');

//     let scrollAmount = 200; // Distance à faire défiler
//     let duration = 2000; // Durée de l'animation en millisecondes (initialement lente)

//     function smoothScrollTo(target, duration) {
//         const start = card.scrollLeft;
//         const startTime = performance.now();

//         function scrollAnimation(currentTime) {
//             const timeElapsed = currentTime - startTime;
//             const progress = Math.min(timeElapsed / duration, 1); // Progrès de l'animation (0 à 1)

//             card.scrollLeft = start + (target - start) * progress;

//             if (progress < 1) {
//                 requestAnimationFrame(scrollAnimation);
//             }
//         }

//         requestAnimationFrame(scrollAnimation);
//     }

//     function toggleScrollSpeed() {
//         // Alterner la durée pour changer la vitesse
//         duration = (duration === 2000) ? 500 : 2000;
//     }

//     btnLeft.addEventListener('click', () => {
//         console.log('left');
//         smoothScrollTo(card.scrollLeft - scrollAmount, duration);
//         toggleScrollSpeed(); // Alterner la vitesse après chaque clic
//     });

//     btnRight.addEventListener('click', () => {
//         console.log('right');
//         smoothScrollTo(card.scrollLeft + scrollAmount, duration);
//         toggleScrollSpeed(); // Alterner la vitesse après chaque clic
//     });
// });


// scroll lent
// document.addEventListener('DOMContentLoaded', () => {
//     const btnLeft = document.querySelector('.ctg-main-btnLeft');
//     const btnRight = document.querySelector('.ctg-main-btnRight');
//     const card = document.querySelector('.ctg-main-listes');
//     const allList = document.querySelectorAll('.ctg-main-listes-liste')
//     console.log(allList);

//     const scrollAmount = 200; // Distance à faire défiler en pixels
//     const duration = 1000; // Durée de l'animation en millisecondes (fixe)

//     function smoothScrollTo(target, duration) {
//         const start = card.scrollLeft;
//         const startTime = performance.now();

//         function scrollAnimation(currentTime) {
//             const timeElapsed = currentTime - startTime;
//             const progress = Math.min(timeElapsed / duration, 1); // Progrès de l'animation (0 à 1)

//             card.scrollLeft = start + (target - start) * progress;

//             if (progress < 1) {
//                 requestAnimationFrame(scrollAnimation);
//             }
//         }

//         requestAnimationFrame(scrollAnimation);
//     }

//     btnLeft.addEventListener('click', () => {
//         console.log('left');
//         smoothScrollTo(card.scrollLeft - scrollAmount, duration);
//     });

//     btnRight.addEventListener('click', () => {
//         console.log('right');
//         smoothScrollTo(card.scrollLeft + scrollAmount, duration);
//     });
// });


//avec scroll auto

document.addEventListener('DOMContentLoaded', () => {
    const btnLeft = document.querySelector('.ctg-main-btnLeft');
    const btnRight = document.querySelector('.ctg-main-btnRight');
    const card = document.querySelector('.ctg-main-listes');
    const scrollAmount = 272; // Distance à faire défiler en pixels
    const scrollDuration = 1000; // Durée de l'animation en millisecondes (fixe)
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

    // btnLeft.addEventListener('click', () => {
    //     stopAutoScroll(); // Arrête le défilement automatique
    //     smoothScrollTo(card.scrollLeft - scrollAmount, scrollDuration);
    //     startAutoScroll(); // Redémarre le défilement automatique après avoir cliqué
    // });

    // btnRight.addEventListener('click', () => {
    //     stopAutoScroll(); // Arrête le défilement automatique
    //     smoothScrollTo(card.scrollLeft + scrollAmount, scrollDuration);
    //     startAutoScroll(); // Redémarre le défilement automatique après avoir cliqué
    // });

    startAutoScroll(); // Démarre le défilement automatique lors du chargement
});


//avec scale
// document.addEventListener('DOMContentLoaded', () => {
//     const btnLeft = document.querySelector('.ctg-main-btnLeft');
//     const btnRight = document.querySelector('.ctg-main-btnRight');
//     const card = document.querySelector('.ctg-main-listes');
//     const items = document.querySelectorAll('.ctg-main-listes-liste');

//     card.scrollLeft = 150;

//     const scrollAmount = 200; // Distance à faire défiler en pixels
//     const duration = 1000; // Durée de l'animation en millisecondes (fixe)

//     function smoothScrollTo(target, duration) {
//         const start = card.scrollLeft;
//         const startTime = performance.now();

//         function scrollAnimation(currentTime) {
//             const timeElapsed = currentTime - startTime;
//             const progress = Math.min(timeElapsed / duration, 1); // Progrès de l'animation (0 à 1)

//             card.scrollLeft = start + (target - start) * progress;

//             if (progress < 1) {
//                 requestAnimationFrame(scrollAnimation);
//             } else {
//                 highlightCenteredItem();
//             }
//         }

//         requestAnimationFrame(scrollAnimation);
//     }

//     function highlightCenteredItem() {
//         // Calculer la position centrale du conteneur
//         const containerWidth = card.offsetWidth;
//         const containerCenter = card.scrollLeft + containerWidth / 2;

//         items.forEach(item => {
//             const itemRect = item.getBoundingClientRect();
//             const itemCenter = itemRect.left + itemRect.width / 2;

//             // Si l'élément est au centre du conteneur
//             // if (Math.abs(containerCenter - itemCenter) < itemRect.width / 2) {
//             //     item.classList.add('active-scroll');
//             // } else {
//             //     item.classList.remove('active-scroll');
//             // }
//         });
//     }

//     btnLeft.addEventListener('click', () => {
//         console.log('left');
//         smoothScrollTo(card.scrollLeft - scrollAmount, duration);
//     });

//     btnRight.addEventListener('click', () => {
//         console.log('right');
//         smoothScrollTo(card.scrollLeft + scrollAmount, duration);
//     });

//     // Mettre à jour l'élément centré lors du chargement initial
//     highlightCenteredItem();

//     // Mettre à jour l'élément centré lors du défilement manuel
//     card.addEventListener('scroll', highlightCenteredItem);
// });


//*******show panier********
const panier = document.getElementById('panierShow');
// const btnShow = document.querySelector('.header-nav-icons-icon')

// console.log(panier);
const card =  document.querySelector('.panier');
let btnsAdd = document.querySelectorAll('.produits-cards-card-btn');
// console.log(card);

const closePanier = document.getElementById('panier-close');

panier.addEventListener('click', () => {
    console.log('ok');
    // card.classList.toggle('.active');
    card.style.right = '0'
    card.style.transition = '1s ease-out'

    // btnsAdd.forEach(element => {
    //     console.log(element);-m

    //     element.style.display = 'none'
    // });
});

closePanier.addEventListener('click', () =>{
    card.style.right = '-100%';
    card.style.transition = '1s ease-out'
    btnsAdd.disabled = false;
})







