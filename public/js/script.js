// Check if Swiper exists before initializing
const swiperElement = document.querySelector('.swiper');
if (swiperElement) {
    const swiper = new Swiper('.swiper', {
        direction: 'horizontal',
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
}

// Menu button logic
const menu_btn = document.querySelector(".fa-bars");
const menu_close_btn = document.querySelector(".fa-xmark");
const mbl_nav = document.querySelector(".mbl-nav");
const main_content = document.getElementById("main-content");
const footer = document.querySelector(".footer-content");

if (menu_btn && menu_close_btn && mbl_nav && main_content && footer) {
    menu_btn.addEventListener('click', () => {
        mbl_nav.classList.add("mbl-nav-active");
        main_content.classList.add("disable-click");
        footer.classList.add("disable-click");
    });

    menu_close_btn.addEventListener('click', () => {
        mbl_nav.classList.remove("mbl-nav-active");
        main_content.classList.remove("disable-click");
        footer.classList.remove("disable-click");
    });
}

// Eye icon toggle logic
const eye_icon = document.querySelectorAll(".eye-icon");
const password_input = document.querySelector("#password");

function password_input_type_toggle(a) {
    (a.type === 'text') ? a.type = 'password' : a.type = 'text';
}

if (eye_icon.length > 0 && password_input) {
    eye_icon.forEach(e => {
        e.addEventListener('click', () => {
            e.classList.toggle("fa-eye");
            password_input_type_toggle(password_input);
        });
    });
}

// Modal logic
const modal_open_btn = document.querySelector("#modal-open-btn");
const modal = document.querySelector("#logout-modal");
const modal_close_btn = document.querySelector("#modal-close-btn");

if (modal_open_btn && modal && modal_close_btn) {
    modal_open_btn.addEventListener('click', () => {
        modal.showModal();
    });

    modal_close_btn.addEventListener('click', e => {
        e.preventDefault();
        modal.close();
    });
}

// Dropdown logic
const dropdown_btn = document.querySelector(".user-profile-pic");
const dropdown = document.querySelector("#dropdown");

if (dropdown_btn && dropdown) {
    dropdown_btn.addEventListener('click', () => {
        dropdown.classList.toggle("show");
    });
}

// Quantity logic
const increase_quantity = document.querySelector(".inc-quantity");
const decrease_quantity = document.querySelector(".dec-quantity");
const total_quantity = document.querySelector(".total-quantity");

if (increase_quantity && decrease_quantity && total_quantity) {
    increase_quantity.addEventListener('click', () => {
        total_quantity.value++;
    });

    decrease_quantity.addEventListener('click', () => {
        if (total_quantity.value > 1) {
            total_quantity.value--;
        }
    });
}

// Navbar padding adjustment on load and resize
window.addEventListener('DOMContentLoaded', () => {
    const navbar = document.querySelector('.desktop-nav');
    const mainContent = document.querySelector('.main-content');

    if (navbar && mainContent) {
        function adjustMainContentPadding() {
            const navbarHeight = navbar.offsetHeight;
            mainContent.style.paddingTop = `${navbarHeight}px`;
        }

        adjustMainContentPadding();
        window.addEventListener('resize', adjustMainContentPadding);
    }
});

const imageDisplay = document.querySelector('.image-display');
const zoomImage = imageDisplay.querySelector('.zoom-image');

if (imageDisplay && zoomImage) {
    imageDisplay.addEventListener('mousemove', function(event) {
        const rect = imageDisplay.getBoundingClientRect();
        const x = event.clientX - rect.left;
        const y = event.clientY - rect.top;
        zoomImage.style.transformOrigin = `${x}px ${y}px`;
        zoomImage.style.transform = 'scale(2)';
    });

    imageDisplay.addEventListener('mouseleave', function() {
        zoomImage.style.transform = 'scale(1)';
        zoomImage.style.transformOrigin = 'center';
    });
}
