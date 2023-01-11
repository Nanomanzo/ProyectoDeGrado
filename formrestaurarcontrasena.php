<?php
    require "./includes/header.php";
?>


<form action="restaurarcontrasena.php" method="POST">
    <h1>Restablecer la contraseña</h1>
    <div>
        <input type="email" name="email" placeholder="Ingrese su email" required>
        <input type="submit" value="Enviar">
    </div>
</form>


<?php
    require "./includes/foother.php"
?>