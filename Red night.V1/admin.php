<?php
    session_start();
    // Only Allow Admin
    if (!(isset($_SESSION['loggedinanimeheaven']) && $_SESSION['loggedinanimeheaven'] == true && $_SESSION['uid'] == 1)) {
        header("Location: ./homepage.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RedNight</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="./media/images/ah_logo.png"/>
    <!-- Stylesheets -->
    <link rel="stylesheet" href="./css/global.css">
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
</head>
<body>
    <!-- Header Start -->
    <header class="site-header">
      <div class="wrapper site-header__wrapper">
        <div class="site-header__start">
          <a href="./homepage.php" class="brand"><img src="./media/images/ah_logo.png" alt="Logo"></a>
        </div>
        <div class="site-header__middle">
          <nav class="nav">
            <button class="nav__toggle" aria-expanded="false" type="button">
              <i class="fas fa-bars"></i>
            </button>
            <ul class="nav__wrapper">
              <li class="nav__item"><a href="./homepage.php">Inicio</a></li>
              <li class="nav__item"><a href="./search.php">Explorar</a></li>
              <li class="nav__item"><a href="./account.php">Cuenta</a></li>
              <?php
              if (isset($_SESSION['uid'])) {
                if ($_SESSION['uid'] == 1) {
                  echo '<li class="nav__item"><a href="./admin.php">Admin</a></li>';
                }
              }
              ?>
            </ul>
          </nav>
        </div>
        <div class="site-header__end">
          <a class="button" href="./handlers/logoutHandler.php">Cerrar sesión</a>
        </div>
      </div>
    </header>
    <!-- Header End -->
    <!-- Content Starts -->
    <div class="admin-box">
      <form action="./handlers/adminHandler.php" method="POST" class="admin-box-form" enctype="multipart/form-data">
        <h3 class="admin-box-title">Añadir película</h3>
        <div class="form-group">
          <label htmlFor="movie_name">Nombre de la película</label>
          <input type="text" name="movie_name" id="movie_name" placeholder="Ingrese el nombre" value="" required />
        </div>
        <div class="form-group">
          <label htmlFor="movie_genre">Género</label>
          <input type="text" name="movie_genre" id="movie_genre" placeholder="Ingrese el género al que pertenece" value="" required />
        </div>
        <div class="form-group">
          <label htmlFor="movie_cover">Portada</label>
          <input type="file" name="movie_cover" id="movie_cover" required/>
        </div>
        <div class="form-group">
          <label htmlFor="movie_file">Archivo de la película</label>
          <input type="file" name="movie_file" id="movie_file" required/>
        </div>
        <button type="submit" class="btn btn-primary" name="admin_form" value="Submit">Publicar</button>
      </form>
    </div>
    <!-- Content Ends -->
    <!-- Footer Start -->
      <footer>
      
        <h3> &copy; Programadores encargados <a  target="_blank">Brando Antonio Cel Sanchez</a> y <a href="#" target="_blank">Martinez Lopez Gael</a></h3>
      </footer>
    </div>
    <!-- Footer End -->
    <!-- JS Scripts -->
    <script src="./scripts/script.js"></script>
</body>
</html>