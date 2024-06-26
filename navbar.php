<?php include 'bd.php'; 

session_start();

if(isset($_SESSION['email'])) {
  $email = $_SESSION['email'];

  $sqlUser ="SELECT rol FROM user WHERE email = '$email'"; 
  $sqlRol = $bd->query($sqlUser);
  $rol = $sqlRol->fetch();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <link rel="shortcut icon" href="image/favicon-32x32.ico" type="image/x-icon">
</head>
<body>
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid text-center ms-5">
      <a class="navbar-brand ms-5 mt-3" href="index.php"><img class="logoNavbar" src="image/logo.svg"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse ms-5" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link fw-bold text-light ms-5" aria-current="page" href="constructions.php">OBRAS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-bold text-light ms-3" aria-current="page" href="artists.php">ARTISTAS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-bold text-light ms-3" aria-current="page" href="events.php">EVENTOS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-bold text-light ms-3" aria-current="page" href="myCommunity.php">MY COMUNIDAD</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-bold text-light ms-3" aria-current="page" href="collectives.php">COLECTIVOS</a>
          </li>
        </ul>
      </div>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item icon">
            <?php if(isset($rol['rol'])) { 
                   if($rol['rol'] == 1){ ?>
                      <a href="admin.php"><i class="fa-solid fa-user fa-2x"></i></a>
            <?php  }else{ ?>
                      <a href="profile.php"><i class="fa-solid fa-user fa-2x"></i></a>
                  <?php } ?>
                  <li class="nav-item">
                    <a href="logout.php" class="out"><button type="button" class="btn text-light loginButton me-1">Salir</button></a>
                  </li>
            <?php } else { ?>
          </li>
          <li class="nav-item">
            <a href="login.php"><button type="button" class="btn text-light loginButton me-1">LOGIN</button></a>
          </li>
          <li class="nav-item me-5">
            <a href="register.php"><button type="button" class="btn text-light loginButton me-5">REGISTRAR</button></a>
          </li>
          <?php } ?>
        </ul>
    </div>
  </nav>
</body>
</html>
