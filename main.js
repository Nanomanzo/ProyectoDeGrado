let menuHamburguesa = document.querySelector(".menu");
let mobileMenu = document.querySelector(".mobile-menu")
let password = document.querySelector("#password")
let confirmPassword = document.querySelector("#confirm_password")
let enviarformRegistrarse = document.querySelector("#enviar-formRegistrarse")



menuHamburguesa.addEventListener("click", toggleBurguerMenu);
enviarformRegistrarse.addEventListener("click", validarPassword);

function toggleBurguerMenu() {
    mobileMenu.classList.toggle("inactivo");
    console.log("hola")
}

function validarPassword(event) {
    if (confirmPassword.value != password.value) {
        event.preventDefault();
        alert("las contraseñas deben ser iguales");
      }

} 

