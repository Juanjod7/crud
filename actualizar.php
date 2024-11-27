<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Anime</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php
    include_once('cabecera.php');
    include_once('conexion.php');

    $sql = "SELECT animeid, nombre, clasificacion, fecha, imagen FROM datos";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            echo "<form action='actualizarR.php' method='post' class='mb-3'>";

            
            echo "<div class='row mb-3'>";

            echo "<input type='hidden' name='animeid' value='" . $fila['animeid'] . "'>";

            echo "<div class='col-md-4'>
                    
                    <img id='imagePreview' src='" . $fila['imagen'] . "' alt='Vista previa' class='img-fluid' style='max-width: 100%; height: auto;'>
                  </div>";

           
            echo "<div class='col-md-8'>
                   
                    <div class='mb-3'>
                        <label for='nombre' class='form-label'>Nombre</label>
                        <input type='text' id='nombre' name='nombre' class='form-control' value='" . $fila['nombre'] . "'>
                    </div>

                    
                    <div class='mb-3'>
                        <label for='clasificacion' class='form-label'>Clasificación</label>
                        <input type='text' id='clasificacion' name='clasificacion' class='form-control' value='" . $fila['clasificacion'] . "'>
                    </div>

                   
                    <div class='mb-3'>
                        <label for='fecha' class='form-label'>Fecha</label>
                        <input type='date' id='fecha' name='fecha' class='form-control' value='" . $fila['fecha'] . "'>
                    </div>

                    
                    <div class='mb-3'>
                        <label for='imagen' class='form-label'>Imagen </label>
                        <input type='text' id='imagen' name='imagen' class='form-control' value='" . $fila['imagen'] . "' onchange='updateImagePreview()'>
                    </div>

                    
                    <button type='submit' class='btn btn-primary'>Editar</button>
                  </div>";

            echo "</div>"; 

            
            echo "</form><hr>";
        }
    } else {
        echo "<div class='alert alert-warning'>Sin registros encontrados en la base de datos</div>";
    }
    ?>

    <script>
        
        function updateImagePreview() {
            var imageUrl = document.getElementById('imagen').value;
            var imagePreview = document.getElementById('imagePreview');
            imagePreview.src = imageUrl;

            
        }
    </script>
</body>

</html>
