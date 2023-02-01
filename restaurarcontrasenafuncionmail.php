<?php
//Almacenar el correo electrónico enviado desde el formulario en una variable
$para  = $_POST['email'];
//Asignar un título al correo electrónico
$título = 'Restablecer Contraseña';
//Generar un código aleatorio de 4 dígitos
$codigo = rand(1000,9999);


// mensaje
$mensaje = <<<HTML
    <h1>Sigue Aprendiendo</h1>
    <div style="text-align:center; background-color:#ccc">
        <p>Restablecer contraseña</p>
        <h3>$codigo</h3>
        <p> <a 
            href="http://localhost/ProyectoDeGrado/formrestaurarcontrasenacodigo.php?email=$email&token=$token"> 
            para restablecer da click aqui </a> </p>
        <p> <small>Si usted no envio este codigo favor de omitir</small> </p>
HTML;
//Cabezales del correo electronico
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers.= "Content-type: text/html; charset=utf-8 \r\n";
$headers.= "To: Sitio web <sigueaprendiendoilerna@gmail.com> \r\n";

//Inicializar una variable para controlar si el correo electrónico se ha enviado o no
$enviado = false;
//Enviar el correo electrónico con la función mail()
if(mail($para, $título, $mensaje, $headers)){
    //Si el correo electrónico se ha enviado correctamente, establecer $enviado como verdadero
    $enviado = true;
}

?>