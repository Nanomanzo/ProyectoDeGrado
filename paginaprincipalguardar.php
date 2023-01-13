<?php 
    session_start();
    require "./conexion.php";
    if (!isset($_SESSION["user_id"])) {
      header('Location: /ProyectoDeGrado/');
    }

$id_usuario = $_SESSION["user_id"];
$titulo = $_POST["titulo"];
$id_categoria = $_POST["categoria"];
$post = $_POST["post"];

     if (isset($_POST["guardarPost"])) {
         if (!empty($titulo) && !empty($post)) {
            try {
            $stmt = $conn->prepare("INSERT INTO post (titulo, post, id_usuario, id_categoria) VALUES (:titulo, :post, :id_usuario, :id_categoria)");
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':post', $post);
            $stmt->bindParam(':id_usuario', $id_usuario);
            $stmt->bindParam(':id_categoria', $id_categoria);
            $stmt->execute(); 
        } catch (PDOException $e) {
            die('Coneccion fallida: ' . $e->getMessage());
        }
        } else {
            $_SESSION["message"] = "Introdusca todos los campos";
            $_SESSION["message_type"] = "warning";
        }

    } 

    header("Location: paginaPrincipal.php"); 
?>