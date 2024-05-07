<?php
require 'navbar.php'; 

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $nameSupport = $_POST['nameSupport'];
        $emailSupport = $_POST['emailSupport'];
        $messageSupport = $_POST['messageSupport'];

        $sql = "INSERT INTO support(id, fullName, email, messages) 
                        values('$id', '$nameSupport', '$emailSupport', '$messageSupport');"; 
        $supports = $bd->query($sql);

        if ($supports->rowCount() > 0) {
            echo "<script> 
                Swal.fire({
                    icon: 'success',
                    title: '<h1>Mensaje enviado</h1>',
                    showConfirmButton: false,  
                    toast: true,
                    timer: 1000,
                });
            </script>";
            header('Refresh: 1.5; URL=index.php');
            exit;
        } else {
            echo "<script> 
                Swal.fire({
                    icon: 'error',
                    title: '<h1>¡Error! Mensaje no enviado</h1>',
                    showConfirmButton: false,  
                    toast: true,
                    timer: 1000,
                });
            </script>";
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
</head>
<body>
    <div class="containerSupport">
        <div id="support">
            <h2>¡Contáctanos!</h2>
            <p>Completa el siguiente formulario y nos pondremos en contacto contigo.</p>
            <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="form-group separate">
                    <label for="nameSupport">Nombre completo</label>
                    <input name="nameSupport" type="text" class="form-control inputSupport" id="nameSupport" placeholder="Nombre completo">
                </div>
                <div class="form-group separate">
                    <label for="emailSupport">Email</label>
                    <input name="emailSupport" type="email" class="form-control inputSupport" id="emailSupport" placeholder="Email">
                </div>
                <div class="form-group separate">
                    <label for="messageSupport">Mensaje</label>
                    <textarea name="messageSupport" class="form-control inputSupport" id="messageSupport" rows="3" placeholder="Escribe tu mensaje"></textarea>
                </div>
                <div class="text-center"> 
                    <button type="submit" class="btn btn-dark buttonSupport">Enviar</button>
                </div>
            </form>
        </div>
    </div>
    <?php include 'footer.html' ?>
</body>
</html>
