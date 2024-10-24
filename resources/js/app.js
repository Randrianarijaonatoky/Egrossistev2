// import $ from 'jquery';
// window.$ = window.jQuery = $;

import 'jquery'


import 'owl.carousel';
import 'owl.carousel/dist/assets/owl.carousel.min.css';
import 'owl.carousel/dist/assets/owl.theme.default.min.css';
import 'owl.carousel/dist/owl.carousel.min.js';

$(document).ready(function() {
    // console.log('owl');



});


$(document).ready(function() {
    console.log('owl test');
    $('.achat-cards').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        navText : ['<i class="fa-solid fa-chevron-left achat-btnLeft"></i>', '<i class="fa-solid fa-chevron-right achat-btnRight"></i>'],
        autoplay: true,
        // autoplayHoverPause: true,
        autoplauTimeout: 2500,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },

            1000:{
                items:3
            }
        }
    })
        // $('.produits-cards').owlCarousel({
        //     loop:true,
        //     margin:10,
        //     nav:true,
        //     navText : ['<i class="fa-solid fa-chevron-left ctg-main-btnLeft"></i>', '        <i class="fa-solid fa-chevron-right ctg-main-btnRight"></i>'],
        //     autoplay: true,
        //     autoplayHoverPause: true,
        //     autoplauTimeout: 1500,
        //     responsive:{
        //         0:{
        //             items:1
        //         },
        //         600:{
        //             items:3
        //         },
        //         1000:{
        //             items:3
        //         }
        //     }
        // })

});
