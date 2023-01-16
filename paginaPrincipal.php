<?php
    session_start();
    require "./conexion.php";
    require "./includes/header.php";
    if (!isset($_SESSION["user_id"])) {
      header('Location: /ProyectoDeGrado/');
    } 

?>

<div class="contenedorprincipal-paginaprincipal">
    <div class="row" >
        <div class="col-md-12 contenedorFormulario-paginaPrincipal" id="1">

            <?php if (isset($_SESSION["message"])) {?>
                <div class="alert alert-<?=$_SESSION["message_type"] ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION["message"] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php unset($_SESSION["message"]); }?>



            <div>
                <form action="paginaprincipalguardar.php" class="formulario-paginaPrincipal" method="POST">
                    <input type="text" name="titulo" class="mb-3" placeholder="Titulo" autocomplete="off" autofocus>
                    <div>
                        <span>Categoria</span>
                        <?php
                            $stmt = $conn->prepare("SELECT id_categorias, nombre_categoria FROM categorias");
                            $stmt->execute();
                            $categorias = $stmt->fetchAll();
                            echo "<select class='elegirCategoria' name='categoria'>";
                            foreach ($categorias as $categoria) {
                                echo "<option value='" . $categoria["id_categorias"] . "'>" . $categoria["nombre_categoria"] . "</option>";
                            }
                            echo "</select>";
                        ?>
                    </div>
                    <textarea name="post" rows="2" placeholder="Descripcion" autocomplete="off"></textarea>
                    <input type="submit" name="guardarPost" value="Guardar tarea">
                        
                </form>
            </div>
        </div>
        <div class="col-md-12" id="2">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="coll-titulo">Titulo</th>
                            <th>Descripcion</th>
                            <th class="coll-creacion">Categoria</th>
                            <th class="coll-creacion">Creracion</th>
                            <th class="coll-acciones">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 


                            $user_id = $_SESSION["user_id"];
                            $sql = "SELECT post.id_post, post.titulo, post.post, categorias.nombre_categoria as nombre_categoria, post.fecha_publicacion 
                                    FROM post JOIN categorias 
                                    ON post.id_categoria = categorias.id_categorias 
                                    WHERE post.id_usuario = $user_id";

                            $stmt = $conn->prepare($sql);
                            $stmt->execute();

                            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>

                            <tr>
                                <td class="coll-titulo"><?php echo $row["titulo"] ?></td> 
                                <td><?php echo $row["post"] ?></td> 
                                <td class="coll-creacion"><?php echo $row["nombre_categoria"] ?></td> 
                                <td class="coll-creacion"><?php echo date("d/m/Y", strtotime($row["fecha_publicacion"])) ?></td> 
                                <td>
                                    <a href="./paginaprincipaleditar.php?id=<?php echo $row["id_post"] ?>" class="editar btn btn-secondary">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                    <a href="./paginaprincipaleliminar.php?id_post=<?php echo $row["id_post"] ?>" class="btn btn-danger">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                    
                                </td>
                            </tr>
                        
                         <?php }?>
                    </tbody>
                </table>
        </div>
    </div>
</div>












<?php
    require "./includes/foother.php";
?>