<?php 
    require "./conexion.php";
    require "./includes/header.php";
    require "./registrarUsuario.php";
    if (!empty($message)):?>
        <p><?= $message?></p>
<?php endif; ?>

<h1>Registarte</h1>
    <span>O <a href="./index.php">inicia sesión</a></span>
    <form action="./formRegistarse.php" method="post">
        <input type="email" name="email" placeholder="Ingrese su email">
        <input type="password" name="password" placeholder="Ingrese su contraseña">
        <input type="password" name="confirm_password" placeholder="Confirme su contraseña">
        <input type="submit" value="Enviar">
    </form>

<?php
    require "./includes/foother.php"
?>