<?php
    require "./iniciarSesion.php";
    require "./includes/header.php";
?>

<div class="contenedor-principal-index">
    <div class="contenedor-imagen-index">
        <img class="img-index" src="img/imagen index2.png" alt="">
    </div>
    <div class="contenedor-form-index">
        <h1>Inicia sesión</h1>
        <span >O <a href="./formRegistarse.php">Registrate</a></span>

        <?php if (!empty($message)): ?>
            <p><?= $message?></p>
        <?php endif ?>

    

        <form action="./index.php" method="post">
            <input type="email" name="email" placeholder="Ingrese su email">
            <input type="password" name="password" placeholder="Ingrese su contraseña">
            <input type="submit" value="Enviar">
        </form>
    </div>
</div>


<?php
    require "./includes/foother.php"
?>