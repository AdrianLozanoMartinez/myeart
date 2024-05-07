<?php
require 'bd.php'; 

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $nameRegister = $_POST['nameRegister'];
        $lastnameRegister = $_POST['lastnameRegister'];
        $emailRegister = $_POST['emailRegister'];
        $mobileRegister = $_POST['mobileRegister'];
        $countryRegister = $_POST['countryRegister'];
        $passRegister = $_POST['passRegister'];
        $verifyPass = $_POST['verifyPass'];

        if($passRegister == $verifyPass){

            $pass = password_hash($passRegister, PASSWORD_DEFAULT);
            $sql = "INSERT INTO user (nameUser, lastname, email, pass, mobile, country, rol) 
                    VALUES ('$nameRegister', '$lastnameRegister', '$emailRegister', '$pass', '$mobileRegister', '$countryRegister', '0')";
            $usuarios = $bd->query($sql);

            header('Location: index.php');
            exit;
        } else {
            echo "Registro fallido";
            print_r($bd->errorinfo());
        }
    }
} catch (PDOException $e) {
    echo 'Error con la base de datos: ' . $e->getMessage();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="shortcut icon" href="image/favicon-32x32.ico" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>
<body>
    <div class="containerRegister">
        <div id="login">
            <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="form-group separate">
                    <div class="form-group separate">
                        <a href="index.php" id="arrowLeft"><span><i class="fa-solid fa-arrow-left"></i></span></a>
                        <span id="nameIcon"><i class="fa-solid fa-user  fa-lg"></i></i></span>
                        <input name="nameRegister" type="text" class="form-control inputLogin" id="nameRegister" placeholder="Nombre" minlength="2">
                        <span id="lastnameIcon"><i class="fa-solid fa-user  fa-lg"></i></i></span>
                        <input name="lastnameRegister" type="text" class="form-control inputLogin" id="lastnameRegister" placeholder="Apellidos" minlength="2">
                        <span id="countryIcon"><i class="fa-solid fa-earth-americas  fa-lg"></i></i></span>
                        <input name="countryRegister" type="text" class="form-control inputLogin" id="countryRegister" placeholder="País" minlength="3">
                        <span id="emailIcon"><i class='fa-regular fa-envelope fa-lg'></i></span>
                        <input name="emailRegister" type="email" class="form-control inputLogin" id="emailRegister" placeholder="Email">
                        <span id="mobileIcon"><i class="fa-solid fa-mobile-screen-button  fa-lg"></i></span>
                        <input name="mobileRegister" type="number" class="form-control inputLogin" id="mobileRegister" placeholder="Móvil" minlength="9">
                        <span id="passwordIcon"><i class="fa-solid fa-key  fa-lg"></i></span>
                        <input name="passRegister" type="password" class="form-control inputLogin" id="passRegister" placeholder="Contraseña" minlength="6">
                        <span id="verifyPass"><i class="fa-solid fa-key  fa-lg"></i></span>
                        <input name="verifyPass" type="password" class="form-control inputLogin" id="verifyPass" placeholder="Verificar contraseña" minlength="6">
                    </div>
                </div>
                <div class="text-center"> 
                    <button type="submit" class="btn btn-dark buttonLogin">Registrarse</button>
                </div>
            </form>
        </div>
    </div>
    <!-- <a href="admin.php">Administrador (Solo para probar, luego se cambia)</a> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>