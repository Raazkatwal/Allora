const menu_btn = document.querySelector(".fa-bars");
const menu_close_btn = document.querySelector(".fa-xmark");
const mbl_nav = document.querySelector(".mbl-nav");
const main_content = document.getElementById("main-content");
const footer = document.querySelector(".footer-content");
const form_login_section_btn = document.querySelector(".login-form-btn");
const form_register_section_btn = document.querySelector(".register-form-btn");
const login_swipe = document.querySelector(".login-swipe");
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
  form_register_section_btn.addEventListener('click', e=>{
    e.preventDefault();
    form_login_section_btn.classList.remove('active-btn');
    form_register_section_btn.classList.add('active-btn');
    login_swipe.classList.add('login-swipe-left');
    
  })
  form_login_section_btn.addEventListener('click', e=>{
    e.preventDefault();
    form_register_section_btn.classList.remove('active-btn');
    form_login_section_btn.classList.add('active-btn');
    login_swipe.classList.remove('login-swipe-left');
    
  })