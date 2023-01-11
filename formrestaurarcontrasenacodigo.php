<?php
    require "./includes/header.php";


    if( isset($_GET['email'])  && isset($_GET['token']) ){
        $email=$_GET['email'];
        $token=$_GET['token'];
    }else{
        header("Location: ./index.php");
    }



?>

<form action="restaurarcontrasenavalidartoken.php" method="post">
    <h1>Restablecer la contraseña</h1>
    <div>
        <input type="text" pattern="\d{4}" name="codigo" placeholder="Ingrese el codigo">
        <input type="hidden" name="email" value="<?php echo $email;?>">
        <input type="hidden" name="token" value="<?php echo $token;?>">
        <input type="submit" value="Enviar">
    </div>
</form>


<?php
    require "./includes/foother.php"
?>