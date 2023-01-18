<?php
    session_start();
    require "./conexion.php";
    require "./includes/header.php";
    if (!isset($_SESSION["user_id"])) {
      header('Location: /ProyectoDeGrado/');
    } 


    if (isset($_GET["id_post"])) {
        $id_post = $_GET["id_post"];
        $query = "SELECT * FROM post WHERE  id_post = :id_post";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id_post', $id_post);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $titulo = $row["titulo"];
            $post = $row["post"];
        }
    }

    if (isset($_POST["update"])) {
        $id_post = $_GET["id_post"];
        $titulo = $_POST["titulo"];
        $post = $_POST["post"];



        $query = "UPDATE post set titulo = :titulo, post = :post WHERE id_post=:id_post";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':post', $post);
        $stmt->bindParam(':id_post', $id_post);
        $stmt->execute();

        $_SESSION["message"] = "Tarea actualizada";
        $_SESSION["message_type"] = "success"; 
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