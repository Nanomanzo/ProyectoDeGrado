
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/style.css">
    <title>Document</title>
</head>
<body>
    

<?php 
    require "./conexion.php";
    require "./registrarUsuario.php";
    if (!empty($message)):?>
        <p><?= $message?></p>
<?php endif; ?>

<h1>Registarte</h1>
    <span>O <a href="./formIniciarSesion.php">inicia sesión</a></span>
    <form action="./index.php" method="post">
        <input type="email" name="email" placeholder="Ingrese su email">
        <input type="password" name="password" placeholder="Ingrese su contraseña">
        <input type="password" name="confirm_password" placeholder="Confirme su contraseña">
        <input type="submit" value="Enviar">
    </form>


</body>
</html>