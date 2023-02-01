<?php 
    session_start();
    require "./conexion.php";
    if (!isset($_SESSION["user_id"])) {
      header('Location: /ProyectoDeGrado/');
    }
//Guardarlas variables necesarias
$id_usuario = $_SESSION["user_id"];
$titulo = $_POST["titulo"];
$id_categoria = $_POST["categoria"];
$post = $_POST["post"];

    //Comprobar si se presionó el botón "guardarPost"
     if (isset($_POST["guardarPost"])) {
        //Comprobar que ningún campo esté vacío
         if (!empty($titulo) && !empty($post)) {
            try {
            //Preparar la sentencia SQL para insertar los datos en la tabla "post"
            $stmt = $conn->prepare("INSERT INTO post (titulo, post, id_usuario, id_categoria) VALUES (:titulo, :post, :id_usuario, :id_categoria)");
            //Vincular los parámetros con los valores
            $stmt->bindParam(':titulo', $titulo);
            $stmt->bindParam(':post', $post);
            $stmt->bindParam(':id_usuario', $id_usuario);
            $stmt->bindParam(':id_categoria', $id_categoria);
            //Ejecutar la sentencia
            $stmt->execute(); 
        } catch (PDOException $e) {
            //Mostrar un mensaje de error en caso de falla en la conexión
            die('Coneccion fallida: ' . $e->getMessage());
        }
        } else {
            //Asignar un mensaje de error a la variable de sesión
            $_SESSION["message"] = "Introdusca todos los campos";
            $_SESSION["message_type"] = "warning";
        }

    } 
    //Redirigir a la página principal
    header("Location: paginaPrincipal.php"); 
?>