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
                <form action="save_task.php" class="formulario-paginaPrincipal" method="POST">
                    <input type="text" name="title" class="mb-3" placeholder="Titulo" autocomplete="off" autofocus>
                    <div>
                        <span>Categoria</span>
                        <select class="elegirCategoria" name="categoria">
                            <option>Tecnologia</option>
                            <option>Hogar</option>
                            <option>Musica</option>
                            <option>Moda</option>
                            <option>Gastronomia</option>
                            <option>Idiomas</option>
                            <option>Alimentación</option>
                            <option>Arte</option>
                            <option>Casa y jardín</option>
                            <option>Ciencia</option>
                            <option>Comedia</option>
                            <option>Deporte</option>
                            <option>Educación</option>
                            <option>Medicina</option>
                            <option>Otro</option>
                        </select>
                    </div>
                    <textarea name="description" rows="2" placeholder="Descripcion" autocomplete="off"></textarea>
                    <input type="submit" name="save_task" value="Guardar tarea">
                        
                </form>
            </div>
        </div>
        <div class="col-md-12" id="2">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Descripcion</th>
                            <th class="coll-creacion">Categoria</th>
                            <th class="coll-creacion">Creracion</th>
                            <th>Acciones</th>
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
                                <td><?php echo $row["titulo"] ?></td> 
                                <td><?php echo $row["post"] ?></td> 
                                <td class="coll-creacion"><?php echo $row["nombre_categoria"] ?></td> 
                                <td class="coll-creacion"><?php echo $row["fecha_publicacion"] ?></td> 
                                <td>
                                    <a href="./paginaprincipaleditar.php?id=<?php echo $row["id_post"] ?>" class="btn btn-secondary">
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