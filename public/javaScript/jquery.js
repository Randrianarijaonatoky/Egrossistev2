// var owl = $('.owl-carousel');
// owl.owlCarousel({
//     loop:true,
//     nav:true,
//     margin:10,
//     responsive:{
//         0:{
//             items:1
//         },
//         600:{
//             items:3
//         },
//         960:{
//             items:5
//         },
//         1200:{
//             items:6
//         }
//     }
// });
// owl.on('mousewheel', '.owl-stage', function (e) {
//     if (e.deltaY>0) {
//         owl.trigger('next.owl');
//     } else {
//         owl.trigger('prev.owl');
//     }
//     e.preventDefault();
// });


$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})

$(document).ready(function() {

    $("#owl-demo").owlCarousel({

        autoPlay: 3000, //Set AutoPlay to 3 seconds

        items : 4,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3]

    });

  });
