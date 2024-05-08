<?php
include 'bd.php';

try {
    $sql = "SELECT c.nameConstructions AS constructions, c.price AS price
        FROM constructions AS c";
//, u.nameUser AS user, i.nameImageConstructions AS imagen
// WHERE u.id > 0 ";

// JOIN image_constructions AS i ON i.id_constructions = c.id
// LEFT JOIN user AS u ON u.id = c.id_user
    /*if (isset($_POST["search"])) {
        $sql .= "AND (c.nameConstructions LIKE '%" . $_POST["search"] . "%' OR u.nameUser LIKE '%" . $_POST["search"] . "%')";
    }*/

    $sqlSearch = $bd->query($sql);
    $result = $sqlSearch->fetchAll(PDO::FETCH_ASSOC);
    $total_row = $sqlSearch->rowCount();
    $output = '';

    if ($total_row > 0) {
        $output .= '<table border="1">
                    <tr>
                        <th>Artista</th>
                        <th>Obra</th>
                        <th>Imagen</th>
                        <th>Precio</th>
                    </tr>';

        foreach ($result as $row) {
            $output .= '
                    <tr>
                       
                        <td>' . $row['constructions'] . '</td>
                     
                    </tr>';
        }

        $output .= '</table>';
    } else {
        $output = 'No Data Found';
    }
    echo $output;
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
 <!-- <td>' . $row['user'] . '</td> -->
   <!-- <td>' . $row['imagen'] . '</td>
                        <td>' . $row['price'] . '</td> -->