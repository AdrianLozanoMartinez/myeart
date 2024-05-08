<?php
include 'bd.php';

try {
    $sql = "SELECT c.nameConstructions AS constructions, c.price AS price, u.nameUSer AS user, i.nameImageConstructions As imagen,
            c.weight AS weights, c.height AS height, c.width AS width 
            FROM constructions AS c
            LEFT JOIN user AS u ON u.id = c.id_user 
            JOIN image_constructions AS i ON i.id_constructions = c.id
            WHERE c.id > 0 ";    

    if (isset($_POST["search"])) {
        $sql .= "AND (c.nameConstructions LIKE '%" . $_POST["search"] . "%' OR u.nameUser LIKE '%" . $_POST["search"] . "%')"; 
    }

    $sqlSearch = $bd->query($sql);
    $result = $sqlSearch->fetchAll(PDO::FETCH_ASSOC);
    $total_row = $sqlSearch->rowCount();
    $output = '<br>';

    if ($total_row > 0) {
        foreach ($result as $row) {
            $output .= '<div class="card" style="width: 18rem;">
                            <img src="image/constructions/' . $row['imagen'] . '" class="card-img-top" alt="' . $row['imagen'] . '">
                            <div class="card-body">
                                <h5 class="card-title">' . $row['constructions'] . '</h5>
                                <p class="card-text">' . $row['width'] . ' x ' . $row['height'] . 'cm</p>
                                <p class="card-text">' . $row['weights'] . 'g</p>
                                <p class="card-text">' . $row['price'] . '€ - ' . $row['weights'] . 'g</p>
                                <h5 class="card-title">' . $row['user'] . '</h5>
                                <a href="#" class="btn btn-outline-dark">Comprar</a>
                                <a href="#" class="btn btn-outline-dark">Seguir artista</a>
                            </div>
                        </div>';
        }
    } else {
        $output = 'No Data Found';
    }
    echo $output;
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>