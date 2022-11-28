<?php
    require "./iniciarSesion.php";
    require "./includes/header.php";
?>

<div class="contenedor-principal-index">
    <div class="contenedor-imagen-index">
        <img class="img-index" src="img/imagen index2.png" alt="">
    </div>
    <div class="contenedor-form-index">
        <?php if(isset($_COOKIE["registrarUsuario"])) :?>
            <p class="alert alert-success mensaje"><?= $message = "usuario creado satisfactoriamente"?></p>
        <?php endif ?>
        
        <h1>Iniciar sesión</h1>

        <form action="./index.php" method="post">
            <input type="email" name="email" placeholder="Ingrese su email">
            <input type="password" name="password" placeholder="Ingrese su contraseña">
            <input type="submit" value="Enviar">
        </form>
        <div class="contenedor-registro-olvidoContraseña">
            <a href="./formRegistarse.php">¿Has olvidado la contraseña?</a>
            <a href="./formRegistarse.php">Registrate en Sigue Aprendiendo</a>
        </div>

    </div>
</div>


<?php
    require "./includes/foother.php"
?>