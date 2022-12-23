let menuHamburguesa = document.querySelector(".menu");
let mobileMenu = document.querySelector(".mobile-menu")
let password = document.querySelector("#password")
let confirmPassword = document.querySelector("#confirm_password")
let enviarformRegistrarse = document.querySelector("#enviar-formRegistrarse")



menuHamburguesa.addEventListener("click", toggleBurguerMenu);
// ocultamos o mostramos el menu de movil segun sea conveniente
function toggleBurguerMenu() {
    mobileMenu.classList.toggle("inactivo");
}



                                                         /*Validar el formulario de registro*/
// Seleccionamos el formularios
var forms = document.getElementsByClassName('needs-validation');
// Recorremos el formulario
for (var i = 0; i < forms.length; i++) {
  // Agregamos un evento submit al formulario
  forms[i].addEventListener('submit', function(event) {
    // Si el formulario no es válido, previene que se envíe
    if (this.checkValidity() === false) {
      event.preventDefault();
      event.stopPropagation();
    }
    // Marca el formulario como ya revisado
    this.classList.add('was-validated');
  }, false);
}

// Agregamos un evento input al elemento input
password.addEventListener('input', function() {
  // Seleccionamos los elementos div con los mensajes de error
  var errorRequired = document.querySelector('#error-required-pass');
  var errorlongitud = document.querySelector('#error-longitud');
  
  // Si el valor del input es vacío, mostramos el mensaje de error "Campo requerido"
  if (this.value.trim() === '') {
    errorRequired.style.display = 'block';
    errorlongitud.style.display = 'none';
  }
  // Si el valor del input cumple con la expresión regular, ocultamos ambos mensajes de error
  else if (this.checkValidity()) {
    errorRequired.style.display = 'none';
    errorlongitud.style.display = 'none';
  }
  // En cualquier otro caso, mostramos el mensaje de error "La contraseña debe ser mínimo de 6 caracteres"
  else {
    errorRequired.style.display = 'none';
    errorlongitud.style.display = 'block';
  }
});

// Seleccionamos el elemento div con el mensaje de error
var errorIgualdad = document.querySelector('#error-igualdad');

confirmPassword.addEventListener('input', function() {


  
  // Verificamos que el valor del input de contraseña y confirmación sea igual
  if (password.value !== confirmPassword.value) {
    // Mostramos el mensaje de error
    errorIgualdad.style.display = 'block';
  } else {
    // Ocultamos el mensaje de error
    errorIgualdad.style.display = 'none';
  }
});


// verificamos una vez mas que las contraseñas sean iguañes antes de enviar el formulario
enviarformRegistrarse.addEventListener("click", validarPassword);

function validarPassword(event) {
    if (confirmPassword.value != password.value) {
        event.preventDefault();
        errorIgualdad.style.display = 'block';
      }
} 