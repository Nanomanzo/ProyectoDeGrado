<?php
    session_start();
    require "./includes/header.php";
?>

    <h1 class="contenedorPrincipal-contactanos">
        <main>
            <form method="post" action="contactanosFuncionMail.php">
                <h2>Datos del mensaje</h2>
                <div>
                    <input type="text" name="nombre" autocomplete="off" placeholder="Nombre" />
                </div>
                <div>
                    <input type="text" name="apellido" autocomplete="off" placeholder="Apellido"/>
                </div>

                <div>
                    <input type="email" name="email" autocomplete="off" placeholder="Email"/>
                </div>
                <div>
                    <span>Asunto del mensaje</span>
                    <select name="asunto">
                        <option>Comentario</option>
                        <option>Sugerencia</option>
                        <option>Reclamo</option>
                    </select>
                </div>
                <div>
                    <textarea name="mensaje" rows="6" cols="80">
                    </textarea>
                </div>
                <div>
                    <input type="submit" value="Enviar mensaje">
                </div>
            </form>
        </main>
    </h1>









<?php
    require "./includes/foother.php"
?>