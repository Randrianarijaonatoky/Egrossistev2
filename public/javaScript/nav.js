









// produits
const btnRight = document.querySelector('.arrow-right-produitsNav');
const btnDown = document.querySelector('.arrow-down-produitsNav');
// const btnDown = document.getElementsByClassName('arrow-down-produitsNav');


const contenairProduits = document.querySelector('.produitsNav');



btnRight.addEventListener('click', (e) => {
    contenairProduits.style.transition = '2s ease'
    contenairProduits.style.height = '100%'
    contenairProduits.style.display ='block';
    btnRight.style.display = 'none';
    btnDown.style.display = 'block';

})
btnDown.addEventListener('click', (e) => {

    contenairProduits.style.display ='none';
    btnDown.style.display = 'none';
    btnRight.style.display = 'block';
    // contenairProduits.style.transition = '1s ease-in-out'

})


//Commadnde
const btnRight1 = document.querySelector('.arrow-right-commande');
const btnDown1 = document.querySelector('.arrow-down-commande');

const contenairCommande = document.querySelector('.commande')



btnRight1.addEventListener('click', () => {
    contenairCommande.style.display = 'block'
    contenairCommande.style.transition = '2s'
    btnDown1.style.display = 'block'
    btnRight1.style.display = 'none'

});

btnDown1.addEventListener('click',  () => {
    contenairCommande.style.display = 'none'
    btnDown1.style.display = 'none'
    btnRight1.style.display = 'block'
})
//Gestion
const btnRight2 = document.querySelector('.arrow-right-gestionNav');
const btnDown2 = document.querySelector('.arrow-down-gestionNav');

const contenairGestion = document.querySelector('.gestionNav')



btnRight2.addEventListener('click', () => {
    contenairGestion.style.display = 'block'
    contenairGestion.style.transition = '2s'
    btnDown2.style.display = 'block'
    btnRight2.style.display = 'none'

});

btnDown2.addEventListener('click',  () => {
    contenairGestion.style.display = 'none'
    btnDown2.style.display = 'none'
    btnRight2.style.display = 'block'
})



