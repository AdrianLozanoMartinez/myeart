<?php
//Local
$conexion = 'mysql:dbname=myeart2;host=127.0.0.1';  
$user = 'root';
$pass = '';

//Web
/*$conexion = 'mysql:dbname=myeart2;host=127.0.0.1';  
$user = 'myeart';
$pass = '2Oz0_t&*tB';*/

try {
    $bd = new PDO($conexion, $user, $pass);
    $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} catch(PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}

$sqlSupport = 'SELECT * FROM support';
try {
    $supports = $bd->query($sqlSupport);
} catch(PDOException $e) {
    echo "Error al ejecutar la consulta: " . $e->getMessage();
}
?>
