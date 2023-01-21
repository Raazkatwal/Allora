const swiper = new Swiper('.swiper', {
    direction: 'horizontal',
    loop: true,
  
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
  
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
var Productswiper = new Swiper('.product-swiper', {
    slidesPerView: 5,
    spaceBetween: 30,
    direction: 'horizontal',
    loop: false,
    breakpoints: {
      0: {
        slidesPerView: 1,
        spaceBetween: 10,
      },
      320: {
        slidesPerView: 2,
        spaceBetween: 15,
      },
      550: {
        slidesPerView: 3,
        spaceBetween: 15,
      },
      640: {
        slidesPerView: 4,
        spaceBetween: 15,
      },
      780: {
        slidesPerView: 5,
        spaceBetween: 15,
      },
      1440: {
        slidesPerView: 6,
        spaceBetween: 15,
      },
    }
  });