var swiper = new Swiper('.swiper-container', {
  slidesPerView: 3,
  spaceBetween: 10,
  // Pagination
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
  // Responsive breakpoints
  breakpoints: {
    // when window width is >= 640px
    320: {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    640: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    // when window width is >= 768px
    768: {
      slidesPerView: 3,
      spaceBetween: 30,
    },
    // when window width is >= 1024px
    1024: {
      slidesPerView: 4,
      spaceBetween: 40,
    },
  }
});
