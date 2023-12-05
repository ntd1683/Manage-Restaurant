//region Preloader
window.onload = function () {
    setTimeout(() => {
        const preloader = document.getElementById("preloader") as HTMLElement;
        preloader.style.visibility = "hidden";
        preloader.style.opacity = "0";
    }, 500)
}
//endregion
