
<?php
    require "./conexion.php";

    $message = "";

    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $sql = "INSERT INTO usuarios (email, password) VALUES (:email, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":email", $_POST["email"]);
        $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
        $stmt->bindParam(":password", $password);
    
        try {
            if ($stmt->execute()) {
                $message = "usuario creado satisfactoriamente";
                header("Location: formIniciarSesion.php");
            } else{
                $message = "el usuario no ha sido crerado";
            }
        } catch (PDOException $e) {
            $message = "usuario excistente";
        }


    }

?>





