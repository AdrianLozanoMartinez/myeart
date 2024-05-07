<link rel="shortcut icon" href="image/favicon-32x32.ico" type="image/x-icon">
<div class="nav"><?php include 'navbar.php'; ?></div>
<?php

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

        $sql = "SELECT email FROM user";
        $users = $bd->query($sql);
        $user = $users->fetch(PDO::FETCH_ASSOC);

        if($passRegister == $verifyPass){

            if($user['email'] != $emailRegister){

                if(password_hash($passRegister, PASSWORD_DEFAULT)){

                    $pass = password_hash($passRegister, PASSWORD_DEFAULT);
                    $sql = "INSERT INTO user (nameUser, lastname, email, pass, mobile, country, rol) 
                            VALUES ('$nameRegister', '$lastnameRegister', '$emailRegister', '$pass', '$mobileRegister', '$countryRegister', '0')";
                    $usuarios = $bd->query($sql);

                    echo "<script> 
                                Swal.fire({
                                    icon: 'success',
                                    title: '<h1>Registro completo</h1>',
                                    showConfirmButton: false,  
                                    toast: true,
                                    timer: 1000,
                                });
                        </script>";

                    header('Refresh: 1; URL=index.php');
                    exit;
                } else {
                    echo "<script> 
                        Swal.fire({
                            icon: 'error',
                            title: '<h1>Registro fallido</h1>',
                            showConfirmButton: false,  
                            toast: true,
                            timer: 1500,
                        });
                    </script>";
                }
            } else{
                echo "<script> 
                        Swal.fire({
                            icon: 'error',
                            title: '<h1>El email ya existe</h1>',
                            showConfirmButton: false,  
                            toast: true,
                            timer: 1500,
                        });
                    </script>";
            }
        } else {
            echo "<script> 
                Swal.fire({
                    icon: 'error',
                    title: '<h1>La contraseña no coincide</h1>',
                    showConfirmButton: false,  
                    toast: true,
                    timer: 1500,
                });
            </script>";
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
        <div id="register">
            <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="form-group separate">
                    <div class="form-group separate">
                        <a href="index.php" id="arrowLeft"><span><i class="fa-solid fa-arrow-left"></i></span></a>
                        <br>
                        <span id="nameIcon"><i class="fa-solid fa-user  fa-lg"></i></i></span>
                        <input required name="nameRegister" type="text" class="form-control inputRegister" id="nameRegister" placeholder="Nombre" minlength="2">
                        <span id="lastnameIcon"><i class="fa-solid fa-user  fa-lg"></i></i></span>
                        <input required name="lastnameRegister" type="text" class="form-control inputRegister" id="lastnameRegister" placeholder="Apellidos" minlength="2">
                        <span id="countryIcon"><i class="fa-solid fa-earth-americas  fa-lg"></i></i></span>
                        <input required name="countryRegister" type="text" class="form-control inputRegister" id="countryRegister" placeholder="País" minlength="3">
                        <span id="emailIcon"><i class='fa-regular fa-envelope fa-lg'></i></span>
                        <input required name="emailRegister" type="email" class="form-control inputRegister" id="emailRegister" placeholder="Email">
                        <span id="mobileIcon"><i class="fa-solid fa-mobile-screen-button  fa-lg"></i></span>
                        <input name="mobileRegister" type="number" class="form-control inputRegister" id="mobileRegister" placeholder="Móvil" minlength="9">
                        <span id="passwordIcon"><i class="fa-solid fa-key fa-lg"></i></span>
                        <input required name="passRegister" type="password" class="form-control inputRegister" id="passRegister" placeholder="Contraseña" minlength="6">
                        <span id="verifyPass"><i class="fa-solid fa-key fa-lg"></i></span>
                        <input required name="verifyPass" type="password" class="form-control inputRegister" id="verifyPass" placeholder="Verificar contraseña" minlength="6">
                    </div>
                </div>
                <div class="text-center"> 
                    <button type="submit" class="btn btn-dark buttonRegister">Registrarse</button>
                </div>
            </form>
        </div>
    </div>
    <!-- <a href="admin.php">Administrador (Solo para probar, luego se cambia)</a> -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>