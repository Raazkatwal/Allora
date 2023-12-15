const eye_icon = document.querySelectorAll(".eye-icon");
// const password_input = document.querySelector("#password");
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
  function password_is_null() {
    password_input.classList.add("input-error");
    password_input.parentElement.classList.add("password-error");
    password_input.value = "";
  }
  function password_input_type_toggle(a) {
    (a.type=='text')? a.type = 'password' : a.type = 'text';
  }
  eye_icon.forEach(e => {
    e.addEventListener('click', ()=>{
      e.classList.toggle("fa-eye");
        password_input_type_toggle(login_password_input);      
    })
  });