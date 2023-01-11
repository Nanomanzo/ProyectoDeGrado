let menuHamburguesa = document.querySelector(".menu");
let mobileMenu = document.querySelector(".mobile-menu")
let password = document.querySelector("#password")
let confirmPassword = document.querySelector("#confirm_password")
let enviarformRegistrarse = document.querySelector("#enviar-formRegistrarse")




                                                         /*Menu desplegable para movil*/
menuHamburguesa.addEventListener("click", toggleBurguerMenu);
// ocultamos o mostramos el menu de movil segun sea conveniente
function toggleBurguerMenu() {
    mobileMenu.classList.toggle("inactivo");
    // eliminamos el scroll para que no le sea posible al usuario desplazarce si el menu crece mas de la cuenta
    document.body.style.overflow = (document.body.style.overflow === "hidden") ? "" : "hidden";
}





                                                         /*Validar el formulario de registro*/
if (location.pathname === '/ProyectoDeGrado/formRegistarse.php' || location.pathname === '/ProyectoDeGrado/restaurarcontrasenavalidartoken.php') {
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
}





                                                         /*Modo Oscuro*/
// Selecciona el botón que activa/desactiva el modo oscuro
let botonModoOscuro = document.querySelectorAll(".modoOscuro")
let enlacesMenuMovil = document.querySelectorAll('.mobile-menu ul a');

// Selecciona el elemento body para aplicar la clase de modo oscuro
let body = document.querySelector("body")

// Agrega un evento de clic al botón para activar/desactivar el modo oscuro
botonModoOscuro.forEach(function(boton) {
  boton.addEventListener("click", toggleModoOscuro);
});
// Función que activa/desactiva el modo oscuro
function toggleModoOscuro() {
  // Alterna la clase de modo oscuro en el elemento body
  body.classList.toggle("modoOscuro");
  mobileMenu.classList.toggle("modoOscuroMenu")

  // Agrega la clase "linkMobileMenuModoOscuro" a cada uno de los enlaces del menú móvil
  enlacesMenuMovil.forEach(function(enlace) {
    enlace.classList.toggle("linkMobileMenuModoOscuro");
    store(enlace.classList.contains("linkMobileMenuModoOscuro"))
  });

  // Almacena el estado del modo oscuro en el almacenamiento local del navegador
  store(body.classList.contains("modoOscuro"))
  store(mobileMenu.classList.contains("modoOscuroMenu"))
}

// Función que se ejecuta al cargar la página para aplicar el estado del modo oscuro almacenado en el almacenamiento local
function load() {
  // Obtiene el estado del modo oscuro almacenado en el almacenamiento local
  let modoOscuro = localStorage.getItem("modoOscuro")
  let modoOscuroMenu = localStorage.getItem("modoOscuroMenu")
  let modoOscuroMenuLinks = localStorage.getItem("linkMobileMenuModoOscuro")

  // Si el estado del modo oscuro no está almacenado, se almacena el valor predeterminado (false)
  if (modoOscuro === undefined && modoOscuroMenu === undefined && modoOscuroMenuLinks === undefined ) {
    store(false)
  }
  // Si el estado del modo oscuro está almacenado como "true", se agrega la clase de modo oscuro al elemento body
  else if (modoOscuro === "true"){
    body.classList.add("modoOscuro")
    mobileMenu.classList.add("modoOscuroMenu")
    enlacesMenuMovil.forEach(function(enlace) {
      enlace.classList.add("linkMobileMenuModoOscuro");
    });
  }
}

// Función que almacena el estado del modo oscuro en el almacenamiento local
function store(value) {
  localStorage.setItem("modoOscuro", value)
}

// Ejecuta la función de carga al cargar la página
load();
                                                         

