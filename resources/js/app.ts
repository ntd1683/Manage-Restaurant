import './lib/lucide.ts';
import './lib/swiper.ts';
import 'preline';
import '../css/app.css';

//region Preloader
window.onload = function () {
    setTimeout(() => {
        const preloader = document.getElementById("preloader") as HTMLElement;
        preloader.style.visibility = "hidden";
        preloader.style.opacity = "0";
    }, 500)
}
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

//region Back to top
const backToTop = document.querySelector('[data-toggle="back-to-top"]') as HTMLElement;
window.addEventListener("scroll", () => {
    if (window.pageYOffset > 72) {
        backToTop.classList.remove("opacity-0");
        backToTop.classList.add("h-8");
        backToTop.classList.remove("h-0");
        backToTop.classList.remove("translate-y-5");
    }
    else {
        backToTop.classList.add("opacity-0");
        backToTop.classList.remove("h-8");
        backToTop.classList.add("h-0");
        backToTop.classList.add("translate-y-5");
    }
});

backToTop.addEventListener("click", (e) => {
    e.preventDefault();
    window.scrollTo({ top: 0, behavior: "smooth" });
})
//endregion

//region Dark Mode
document.addEventListener("DOMContentLoaded", () => {
    const documentElement = document.documentElement;
    const theme = localStorage.getItem("theme");
    documentElement.classList.add(theme);

    const lightTheme = document.getElementById("light-theme") as HTMLElement;
    const darkTheme = document.getElementById("dark-theme") as HTMLElement;

    const toggleHidden = (element: HTMLElement, isHidden: boolean) => {
        let containHidden = element.classList.contains("hidden");
        if (isHidden && containHidden) {
            element.classList.remove("hidden");
        } else if (!isHidden && !containHidden ){
            element.classList.add("hidden");
        }
    };

    const darkModeToggleIcon = () => {
        if (!documentElement.classList.contains("dark")) {
            toggleHidden(lightTheme, true);
            toggleHidden(darkTheme, false);
        } else {
            toggleHidden(lightTheme, false);
            toggleHidden(darkTheme, true);
        }
    }

    darkModeToggleIcon();

    document.getElementById("change-theme")?.addEventListener("click", () => {
        documentElement.classList.toggle("dark");
        localStorage.setItem("theme", documentElement.classList.contains("dark") ? "dark" : "light");
        darkModeToggleIcon();
    });
});
//endregion
