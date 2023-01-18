<?php
    require "./conexion.php";

    $message = "";

    setcookie("registrarUsuario","Registrar Usuario",time() + 1);

    if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['nickname']) && !empty($_POST['nombre']) && !empty($_POST['apellido'])) {
        $sql = "INSERT INTO usuarios (email, password, nickname, nombre, apellido) VALUES (:email, :password, :nickname, :nombre, :apellido)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":email", $_POST["email"]);
        $stmt->bindParam(":nickname", $_POST["nickname"]);
        $stmt->bindParam(":nombre", $_POST["nombre"]);
        $stmt->bindParam(":apellido", $_POST["apellido"]);
        $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
        $stmt->bindParam(":password", $password);
    
        try {
            if ($stmt->execute()) {
                //$message = "usuario creado satisfactoriamente";
                header("Location: index.php");
            } else{
                $message = "el usuario no ha sido crerado";
            }
        } catch (PDOException $e) {
            $message = $e;
        }


    }

?>