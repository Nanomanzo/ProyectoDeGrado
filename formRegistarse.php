<?php 
    require "./conexion.php";
    require "./includes/header.php";
    require "./registrarUsuario.php";

    if (isset($_GET["message"])) {
        $message = $_GET["message"];
    } else {
        $message = "";
    }
?>

<div class="contenedorPrincipal-formRegistrarse">
    <?php 
        if (!empty($message)):?>
            <p class="alert alert-danger mensaje"><?= $message?></p>
    <?php endif; ?>
    <h1>Registarte</h1>
    <span>o <a href="./index.php">Inicia Sesión</a></span>
    <form class="formRegistrarse needs-validation" action="./formRegistarse.php" method="post" novalidate>
        <div>
            <input type="text" name="nombre" placeholder="Ingrese su nombre" autocomplete="off" required>
            <div class="valid-feedback">¡Ok válido!</div>
            <div class="invalid-feedback">Campo requerido.</div>
        </div>

        <div>
            <input type="text" name="apellido" placeholder="Ingrese su apellido" autocomplete="off" required>
            <div class="valid-feedback">¡Ok válido!</div>
            <div class="invalid-feedback">Campo requerido.</div>
        </div>

        <div>
            <input type="text" name="nickname" placeholder="Ingrese su nickname" autocomplete="off" required>
            <div class="valid-feedback">¡Ok válido!</div>
            <div class="invalid-feedback">Campo requerido.</div>
        </div>

        <div>
            <input type="email" name="email" placeholder="Ingrese su email" autocomplete="off" required>
            <div class="valid-feedback">¡Ok válido!</div>
            <div class="invalid-feedback">Campo requerido.</div>
        </div>

        <div>
            <input type="password" id="password" name="password" pattern=".{6,}" placeholder="Ingrese su contraseña" autocomplete="off" required>
            <div class="valid-feedback">¡Ok válido!</div>
            <div class="invalid-feedback" id="error-required-pass">Campo requerido</div>
            <div class="invalid-feedback" id="error-longitud">La contraseña debe tener minimo 6 caracteres</div>
        </div>

        <div>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirme su contraseña" autocomplete="off" required>
            <div class="valid-feedback">¡Ok válido!</div>
            <div class="invalid-feedback" id="error-required-conf">Campo requerido</div>
            <div class="invalid-feedback" id="error-igualdad">La contraseña deben ser iguales</div>
        </div>
        <input type="submit" id="enviar-formRegistrarse" value="Enviar">
    </form>
</div>

<?php
    require "./includes/foother.php"
?>