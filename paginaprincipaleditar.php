<?php
    session_start();
    //Traer los archivos necesarios
    require "./conexion.php";
    require "./includes/header.php";
    if (!isset($_SESSION["user_id"])) {
      header('Location: /ProyectoDeGrado/');
    } 

    //Verificar si se ha recibido una ID de post
    if (isset($_GET["id_post"])) {
        //Almacenar la ID de post en una variable
        $id_post = $_GET["id_post"];
        //Preparar la consulta para obtener los datos del post
        $query = "SELECT * FROM post WHERE  id_post = :id_post";
        //Almacenar los datos del post en variables
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id_post', $id_post);
        $stmt->execute();

        //Verificar si se ha encontrado un post con esa ID
        if ($stmt->rowCount() == 1) {
            //Almacenar los datos del post en variables
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $titulo = $row["titulo"];
            $post = $row["post"];
        }
    }

    // Verificar si se ha recibido una solicitud de actualización de post
    if (isset($_POST["update"])) {
        //Almacenar los datos en variables
        $id_post = $_GET["id_post"];
        $titulo = $_POST["titulo"];
        $post = $_POST["post"];


        //Preparar la consulta para actualizar los datos del post
        $query = "UPDATE post set titulo = :titulo, post = :post WHERE id_post=:id_post";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':post', $post);
        $stmt->bindParam(':id_post', $id_post);
        $stmt->execute();

        // Almacenar un mensaje de éxito en la sesión
        $_SESSION["message"] = "Post actualizado";
        $_SESSION["message_type"] = "success"; 
        // Redirigir a la página principal
        header("Location: paginaPrincipal.php");

        

    }

?>
    <div>
        <form action="paginaprincipaleditar.php?id_post=<?php echo $_GET["id_post"]?>" method="POST">
                <div class="form-group">
                <input type="text" name="titulo" value="<?php echo $titulo;?>" class="mb-3" placeholder="Actualiza el titulo">
            </div>
            <div class="form-group"> 
                <textarea name="post" rows="10"  placeholder="Actualiza la descripcion"><?php echo $post; ?></textarea>
            </div>
            <input type="submit" name="update" value="Actualizar">
        </form>
    </div>
        
<?php
    require "./includes/foother.php";
?>