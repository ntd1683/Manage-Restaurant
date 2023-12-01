import Swiper from 'swiper';

import { Navigation, Pagination, Thumbs } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import 'swiper/css/thumbs';

new Swiper(".menu-swiper", {
    modules: [Navigation, Pagination],
    spaceBetween: 12, freeMode: !0, loop: !0,
    pagination: { el: ".swiper-pagination", clickable: !0 },
    navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
    breakpoints: { 320: { slidesPerView: 1 }, 768: { slidesPerView: 2 }, 1300: { slidesPerView: 3, spaceBetween: 30 } }
});

const pagination = new Swiper(".clients-testimonial-pagination", {
    loop: true, spaceBetween: 10, slidesPerView: 4, freeMode: true,
    watchSlidesProgress: true,
});

const swiper = new Swiper(".clients-testimonial", {
    modules: [Navigation, Pagination, Thumbs],
    loop: !0, spaceBetween: 24,
    navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
    thumbs: { swiper: pagination },
});
