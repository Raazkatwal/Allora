const menu_btn = document.querySelector(".fa-bars");
const menu_close_btn = document.querySelector(".fa-xmark");
const mbl_nav = document.querySelector(".mbl-nav");
const main_content = document.getElementById("main-content");
const footer = document.querySelector(".footer-content");
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
  menu_btn.addEventListener('click', ()=>{
    mbl_nav.classList.add("mbl-nav-active");
    main_content.classList.add("disable-click");
    footer.classList.add("disable-click");
  })
  menu_close_btn.addEventListener('click', ()=>{
    mbl_nav.classList.remove("mbl-nav-active");
    main_content.classList.remove("disable-click");
    footer.classList.remove("disable-click");
  })