const eye_icon = document.querySelectorAll(".eye-icon");
const login_password_input = document.querySelector("#logpassword");
const register_password_input = document.querySelector("#regpassword");
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
  function password_is_null() {
    document.querySelector("#register-submit-btn").preventDefault();
    pwd_text_box = register_password_input;
    pwd_text_box.classList.add("input-error");
    pwd_text_box.parentElement.classList.add("password-error");
    pwd_text_box.value = "";
  }
  function password_input_type_toggle(a) {
    (a.type=='text')? a.type = 'password' : a.type = 'text';
  }
  eye_icon.forEach(e => {
    e.addEventListener('click', ()=>{
      e.classList.toggle("fa-eye");
      if (e.parentElement.classList.contains("login_password_div")) {
        password_input_type_toggle(login_password_input);
      } else {
        password_input_type_toggle(register_password_input);
      }
    })
  });