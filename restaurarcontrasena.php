<?php 
    include "./conexion.php";
    $email =$_POST['email'];
    $bytes = random_bytes(5);
    $token = bin2hex($bytes);

    include "./restaurarcontrasenafuncionmail.php";

    // verificar que el email existe en la base de datos
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = :email");
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    if ($stmt->rowCount() == 0) {
        $message = "El usuario no se encuentra registrado";
        header("Location: formRegistarse.php?message=" . $message);
        exit;
    }


    // Comprueba si se envió el correo correctamente
    if ($enviado) {
        // Si se envió correctamente, inserta los datos en la base de datos
        $conn->query("INSERT into restablecer_contraseña(email, token, codigo) values('$email','$token','$codigo') ");

        require "./includes/header.php";
        echo '<h1>Verifica tu email para restablecer tu cuenta</h1>';
        require "./includes/foother.php";
    } else {
        // Si no se envió correctamente, imprime un mensaje de error
        require "./includes/header.php";
        echo "<h1>Error al enviar el correo electrónico. Inténtelo de nuevo más tarde.</h1>";
        require "./includes/foother.php";
    }
?>