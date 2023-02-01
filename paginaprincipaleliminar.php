<?php 
session_start();
//Incluir los archivos necesarios
require "./conexion.php";
require "./includes/header.php";
if (!isset($_SESSION["user_id"])) {
  header('Location: /ProyectoDeGrado/');
}
     //compropbar si el id exciste
    if (isset($_GET["id_post"])) {
        $id = $_GET["id_post"];
        //Preparar la consulta para eliminar el post con el ID proporcionado
        $query = "DELETE FROM post WHERE id_post = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id);
        // Ejecutar la consulta
        $stmt->execute();
        // Guardar un mensaje en la sesión indicando que el post ha sido eliminado
        $_SESSION["message"] = "Post eliminado satisfactoriamente";
        $_SESSION["message_type"] = "danger"; 
        // Redirigir al usuario a la página principal 
        header("Location: paginaPrincipal.php");
    }
    
require "./includes/foother.php";

?>