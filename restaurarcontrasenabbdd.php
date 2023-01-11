<?php
    require "./conexion.php";

    // recibir datos del formulario
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // verificar que las contraseñas coincidan
    if ($password != $confirm_password) {
        echo "Las contraseñas no coinciden";
        exit;
    }

    // verificar que el email existe en la base de datos
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = :email");
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    if ($stmt->rowCount() == 0) {
        echo "El email no se encuentra registrado";
        exit;
    }

    // encriptar la contraseña
    $password = password_hash($password, PASSWORD_BCRYPT);

    // actualizar la contraseña en la base de datos
    $stmt = $conn->prepare("UPDATE usuarios SET password = :password WHERE email = :email");
    $stmt->bindParam(":password", $password);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    // verificar si la actualización fue exitosa
    if ($stmt->rowCount() > 0) {
        $message = "La contraseña ha sido actualizada";
        $tipoMensaje = "alert-success";
        header("Location: index.php?message=" . $message . "&class=" . $tipoMensaje);
        } else {
        echo "Ocurrió un error al actualizar la contraseña";
    }
