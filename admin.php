<?php include 'navbar.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="containerPolicy">
        Admin - EN CONSTRUCCIÓN

        <h1>Verificación de llegada de email de support</h1>
        <?php 
        if ($supports->rowCount() > 0) {
            foreach ($supports as $key => $support) {
                echo $support['fullName']."<br>";
            }
        } else {
            echo "No se encontraron resultados.";
        }
        ?>
    </div>
    
    ?>
</body>
</html>
