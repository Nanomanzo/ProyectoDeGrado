<?php
$para  = $_POST['email'];
$título = 'Restablecer Contraseña';
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

$headers = 'MIME-Version: 1.0' . "\r\n";
$headers.= "Content-type: text/html; charset=utf-8 \r\n";
$headers.= "To: Sitio web <sigueaprendiendoilerna@gmail.com> \r\n";


$enviado = false;
if(mail($para, $título, $mensaje, $headers)){
    $enviado = true;
}

?>