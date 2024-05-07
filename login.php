<link rel="shortcut icon" href="image/favicon-32x32.ico" type="image/x-icon">
<div class="nav"><?php include 'navbar.php'; ?></div>
<?php

    $email = "";

    try {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $email = $_POST['email'];
            $pass = $_POST['pass'];

            $sql = "SELECT email, pass FROM user WHERE email = '$email'";
            $users = $bd->query($sql);
            $user = $users->fetch(PDO::FETCH_ASSOC);
                
            if($user == true){  

                if (password_verify($pass, $user['pass'])) {  
            
                    $_SESSION['email'] = $email;
                    header("Location: index.php");
                    exit;
                } else {
                    echo "<script> 
                            Swal.fire({
                                icon: 'error',
                                title: '<h1>Contraseña incorrecta</h1>',
                                showConfirmButton: false,  
                                toast: true,
                                timer: 1000,
                            });
                        </script>";
                }
            }else {
                echo "<script> 
                            Swal.fire({
                                icon: 'error',
                                title: '<h1>Email incorrecto</h1>',
                                showConfirmButton: false,  
                                toast: true,
                                timer: 1000,
                            });
                        </script>";
            }
            
        }
    }catch(Exception $e){
        echo "Error $e";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>
<body>
    <div class="containerLogin">
        <div id="login">
            <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="form-group separate">
                    <div class="form-group separate">
                        <a href="index.php" id="arrowLeft"><span><i class="fa-solid fa-arrow-left"></i></span></a>
                        <span id="emailIcon"><i class='fa-regular fa-envelope fa-lg'></i></span>
                        <input name="email" type="email" class="form-control inputLogin" id="emailLogin" placeholder="Email"  autocomplete="new-password">
                        <span id="passwordIcon"><i class="fa-solid fa-key"></i></span>
                        <input name="pass" type="password" class="form-control inputLogin" id="passLogin" placeholder="Contraseña" minlength="6" autocomplete="new-password">
                    </div>
                </div>
                <div class="text-center"> 
                    <button type="submit" class="btn btn-dark buttonLogin">Iniciar sesión</button>
                </div>
                <?php if(isset($_GET["noLogin"])){      
                    echo "<p>Haga login para continuar</p>";
                }?>
                <?php if(isset($err) and $err == true){   
                    echo "<p>Usuario o contraseña incorrecta</p>";
                }?>
            </form>
            <a href="#" id="forget">¿Has olvidado la contraseña?</a>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>