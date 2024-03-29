<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/6464fe6cde.js" crossorigin="anonymous"></script>
    <title>Registrate</title>
</head>
<body>

<nav>
    <img src="img/twitter_header_photo_1.png" alt="logo" class="logo">
    <div class="navbar-left">
      <ul>
        <li>
          <a href="index.php">Home</a>
        </li>
        <li>
          <a class="sobreNosotros" href="sobreNosotros.php">Sobre nosotros</a>
        </li>
        <li>
          <a href="contactanos.php">Contactanos</a>
        </li>
            
        <?php 
            if (isset($_SESSION["user_id"])):?>
                <li>
                  <a href="./cerrarsesion.php">Sign out</a>
                </li>
        <?php endif; ?>
        <li>
          <button class="modoOscuro"><img class="imgModoOscuro" src="img/modo-oscuro.png" alt=""></button>
        </li>
      </ul>
    </div>

      <div class="mobile-menu inactivo">
        <ul>
          <li>
            <a href="index.php">Home</a>
          </li>
          <li>
            <a href="sobreNosotros.php">Sobre nosotros</a>
          </li>
          <li>
            <a href="contactanos.php">Contactanos</a>
          </li>
          <li>
            <button class="modoOscuro"><img class="imgModoOscuro" src="img/modo-oscuro.png" alt=""></button>
          </li>

          <?php 
            if (isset($_SESSION["user_id"])):?>
                <li>
                  <a href="./cerrarsesion.php" >Sign out</a>
                </li>

        <?php endif; ?>
        </ul>
      </div> 

    



      
      <img src="img/icon_menu.svg" alt="menu" class="menu">
  </nav>

</body>


