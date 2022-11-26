<?php 
    require "./conexion.php";
    require "./includes/header.php";
    require "./registrarUsuario.php";
?>

<div class="contenedorPrincipal-formRegistrarse">
    <?php 
        if (!empty($message)):?>
            <p class="alert alert-danger mensaje"><?= $message?></p>
    <?php endif; ?>
    <h1>Registarte</h1>
    <span>O <a href="./index.php">inicia sesión</a></span>
    <form action="./formRegistarse.php" method="post">
        <input type="email" name="email" placeholder="Ingrese su email">
        <input type="password" id="password" name="password" placeholder="Ingrese su contraseña">
        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirme su contraseña">
        <input type="submit" id="enviar-formRegistrarse" value="Enviar">
    </form>
</div>

<?php
    require "./includes/foother.php"
?>