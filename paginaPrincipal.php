<?php
    session_start();
    require "./includes/header.php";
    if (!isset($_SESSION["user_id"])) {
      header('Location: /PROYECTODEGRADO/');
    } 

?>

    <a href="./cerrarsesion.php">cerrar sesion</a>

    <h1><?=$_SESSION["user_id"] ?></h1>


<?php
    require "./includes/foother.php"
?>