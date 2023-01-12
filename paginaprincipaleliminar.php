<?php 
session_start();
require "./conexion.php";
require "./includes/header.php";
if (!isset($_SESSION["user_id"])) {
  header('Location: /ProyectoDeGrado/');
}
     //compropbar si el id exciste
    if (isset($_GET["id_post"])) {
        $id = $_GET["id_post"];
        $query = "DELETE FROM post WHERE id_post = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $_SESSION["message"] = "Post eliminado satisfactoriamente";
        $_SESSION["message_type"] = "danger";  
        header("Location: paginaPrincipal.php");
    }
    
require "./includes/foother.php";

?>