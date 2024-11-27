<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANIMEWIKI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php

    include_once('cabecera.php');
    include_once('conexion.php');
?>
   

    <div class="container mt-4">
    <div class="row">
<?php
    $sql = "SELECT animeid,nombre,clasificacion,fecha,imagen FROM datos";
    $resultado = $conexion->query($sql);


    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {

            echo '<div class="col-md-4 mb-4">';
            echo '<div class="card" style="width: 18rem;">';
            
            //mostrar imagen

            echo '<img src="' . htmlspecialchars($fila['imagen']) . '" class="card-img-top" alt="' . htmlspecialchars($fila['nombre']) . '">';
     
            //mostrar info
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . htmlspecialchars($fila['nombre']) . '</h5>';
            echo '<p class="card-text">Clasificación: ' . htmlspecialchars($fila['clasificacion']) . '</p>';
            echo '<p class="card-text">Fecha: ' . htmlspecialchars($fila['fecha']) . '</p>';
            //eliminar
            echo "<form action='eliminarR.php' method='post' onsubmit='return confirm(\"¿Estás seguro de que deseas eliminar este anime?\")'>";
            echo "<input type='hidden' name='animeid' value='" . htmlspecialchars($fila['animeid']) . "'>";
            echo "<button type='submit' class='btn btn-danger'>Eliminar</button>";
            echo "</form>";

            echo '</div>'; // Cierre de card-body
            echo '</div>'; // Cierre de card
            echo '</div>'; // Cierre de col-md-4

            
            
           



            /*    echo $fila['id'] . " " . $fila['nombre'] . " " . $fila['apellido'] . "<hr>";   */
        }
    } else {
        echo "Sin registros encontrados en la base de datos";
    }

    




    ?>


</div>
</body>

</html>