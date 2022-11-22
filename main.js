let menuHamburguesa = document.querySelector(".menu");
let mobileMenu = document.querySelector(".mobile-menu")

menuHamburguesa.addEventListener("click", toggleBurguerMenu);

function toggleBurguerMenu() {
    mobileMenu.classList.toggle("inactivo");
    console.log("hola")
}
