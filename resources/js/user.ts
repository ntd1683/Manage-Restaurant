//region Lucide
// Recommended way, to include only the icons you need.
import {createIcons, Menu, User, Search, ShoppingBag, Play, Sun, Moon, ChevronUp,
    ChevronDown, Star, Clock3, ChevronRight, Quote, ShoppingCart, X, Phone, Globe,
    Instagram, Twitter, Heart, ArrowRight, LogOut, UserCheck, Home, XCircle} from 'lucide';

createIcons({
    icons: {
        Menu,
        Search,
        ShoppingBag,
        Play,
        User,
        Sun,
        Moon,
        ChevronUp,
        ChevronDown,
        Star,
        Clock3,
        ChevronRight,
        Quote,
        ShoppingCart,
        X,
        Phone,
        Globe,
        Instagram,
        Twitter,
        Heart,
        ArrowRight,
        LogOut,
        UserCheck,
        Home,
        XCircle,
    }
});
//endregion

//region Swiper
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
    loop: false, spaceBetween: 10, slidesPerView: 4, freeMode: true,
    watchSlidesProgress: true,
});

const swiper = new Swiper(".clients-testimonial", {
    modules: [Navigation, Pagination, Thumbs],
    loop: true, spaceBetween: 24,
    navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
    thumbs: { swiper: pagination },
});
//endregion


//region Navbar Sticky
window.addEventListener("scroll",  (e) => {
    e.preventDefault();
    const header_navbar = document.getElementById("navbar") as HTMLElement;
    (document.body.scrollTop >= 75 || document.documentElement.scrollTop >= 75
            ? header_navbar.classList.add("nav-sticky")
            : header_navbar.classList.remove("nav-sticky")
    );
})
//endregion
