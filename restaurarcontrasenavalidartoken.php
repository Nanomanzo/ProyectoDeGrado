<?php
require "./conexion.php";
$email = $_POST['email'];
$token = $_POST['token'];
$codigo = $_POST['codigo'];

$sql = "SELECT * FROM restablecer_contraseña WHERE email = :email AND token = :token AND codigo = :codigo";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':token', $token);
$stmt->bindParam(':codigo', $codigo);
$stmt->execute();
$resultados = $stmt->fetchAll();

$correcto = false;
if (count($resultados) > 0) {
    $fila = $resultados[0];
    $fecha = $fila['fecha'];
    $fecha_actual = date("Y-m-d H:i:s");
    $seconds = strtotime($fecha_actual) - strtotime($fecha);
    $minutos = $seconds / 60;


    if($minutos > 10 ){
        $message = "Codigo vencido, vuelva a iniciar el proceso";
        header("Location: index.php?message=" . $message);
    } else  {
        $correcto = true;
    }

} else {
    $correcto = false;
    require "./includes/header.php";
    echo '<h1>Codigo incorrecto, vuelve a intentarlo</h1>';
    require "./includes/foother.php";
}
 ?>

<?php if($correcto){ ?>
<?php
    require "./includes/header.php";
?>





<div>
    <div>
        <?php if($correcto){ ?>
            <form class="needs-validation" action="restaurarcontrasenabbdd.php" method="post" novalidate>
                <h2>Restablecer Password</h2>
                <div>
                    <input type="password" id="password" name="password" pattern=".{6,}" placeholder="Ingrese su Nueva contraseña" required>
                    <div class="valid-feedback">¡Ok válido!</div>
                    <div class="invalid-feedback" id="error-required-pass">Campo requerido</div>
                    <div class="invalid-feedback" id="error-longitud">La contraseña debe tener minimo 6 caracteres</div>
                </div>
                <div>
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirme su Nueva contraseña" required>
                    <div class="valid-feedback">¡Ok válido!</div>
                    <div class="invalid-feedback" id="error-required-conf">Campo requerido</div>
                    <div class="invalid-feedback" id="error-igualdad">La contraseña deben ser iguales</div>
                    <input type="hidden" name="email" value="<?php echo $email?>">
                </div>
                
                <input type="submit" id="enviar-formRegistrarse" value="Enviar">
            </form>
        <?php }else{ ?>
            <div>Código incorrecto o vencido</div>
        <?php } ?>

    </div>
</div>







<?php
    require "./includes/foother.php"
?>

<?php }