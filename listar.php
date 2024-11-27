<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <?php
    include_once('conexion.php');
    include_once('cabecera.php');
   
    echo '<pre class="d-flex flex-wrap justify-content-center">';
    $sql = "SELECT animeid,nombre,clasificacion,fecha,imagen FROM datos";
    $resultado = $conexion->query($sql);

    
    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
          
            echo '<div class="card m-2" style = "width: 18rem;">';
          
            echo '<img src="' . htmlspecialchars($fila['imagen']) . '" class="card-img-top" alt="' . htmlspecialchars($fila['nombre']) . '">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . htmlspecialchars($fila['nombre']) . '</h5>';
            echo '<p class="card-text">Clasificación:</strong> ' . htmlspecialchars($fila['clasificacion']) . '</p>';
            echo '<p class="card-date">Fecha:</strong> ' . htmlspecialchars($fila['fecha']) . '</p>';
            echo '</div>';
            echo '</div><hr>';
    
    
        
       
        }
    } else {
        echo "Sin registros encontrados en la base de datos";
    }

    ?>

    </pre>



</body>

</html>