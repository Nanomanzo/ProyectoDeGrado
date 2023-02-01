<?php
// Verificamos si la petición no es de tipo POST
if($_SERVER['REQUEST_METHOD'] != 'POST' ){
    // Si no es POST, redirigimos al usuario al formulario de contacto
    header("Location: index.html" );
}

// Obtenemos los datos del formulario de contacto
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];

// Verificamos si el nombre está vacío, y si esta vacio, le asignameos el valor "anonimo"
if( empty(trim($nombre)) ) $nombre = 'anonimo';
// Verificamos si el apellido está vacío, y si esta vacio, le asignameos el valor vacio
if( empty(trim($apellido)) ) $apellido = '';

// Creamos el cuerpo del mensaje en formato HTML
$body = <<<HTML
    <h1>Contacto desde la web</h1>
    <p>De: $nombre $apellido / $email</p>
    <h2>Mensaje</h2>
    $mensaje
HTML;

// Definimos los encabezados para el correo electrónico
$headers = "MIME-Version: 1.0 \r\n";
$headers.= "Content-type: text/html; charset=utf-8 \r\n";
$headers.= "From: $nombre $apellido <$email> \r\n";
$headers.= "To: Sitio web <sigueaprendiendoilerna@gmail.com> \r\n";

var_dump($nombre);
// Enviamos el correo electrónico
$rta = mail("sigueaprendiendoilerna@gmail.com", "Mensaje: $asunto", $body, $headers);


var_dump($rta);
// Definimos una cookie con la clave "contactanos" y un valor "contactanos"
// que expirará en 1 segundo
setcookie("contactanos","contactanos",time() + 1);
// Redirigimos al usuario a la página principal
header("Location: index.php" );

?>
