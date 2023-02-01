<?php
    require "./conexion.php";

    $message = "";

    setcookie("registrarUsuario","Registrar Usuario",time() + 1);

     //Verifica si todos los campos están llenos
    if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['nickname']) && !empty($_POST['nombre']) && !empty($_POST['apellido'])) {
        //Prepara la consulta SQL para insertar los datos del usuario en la base de datos
        $sql = "INSERT INTO usuarios (email, password, nickname, nombre, apellido) VALUES (:email, :password, :nickname, :nombre, :apellido)";
        $stmt = $conn->prepare($sql);
        //Vincula los valores recibidos por POST con los parámetros de la consulta
        $stmt->bindParam(":email", $_POST["email"]);
        $stmt->bindParam(":nickname", $_POST["nickname"]);
        $stmt->bindParam(":nombre", $_POST["nombre"]);
        $stmt->bindParam(":apellido", $_POST["apellido"]);
        //Encripta la contraseña antes de guardarla en la base de datos
        $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
        $stmt->bindParam(":password", $password);

        // Ejecuta la consulta
        try {
            if ($stmt->execute()) {
                //Si la consulta se ejecutó correctamente, redirige al usuario a la página de inicio
                header("Location: index.php");
            } else{
                //Si la consulta no se ejecutó correctamente, muestra un mensaje de error
                $message = "el usuario no ha sido crerado";
            }
        } catch (PDOException $e) {
            //Si ocurrió un error en la conexión a la base de datos, muestra un mensaje de error
            $message = $e;
        }


    }

?>