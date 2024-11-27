<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>



<body>

    <?php
    include_once('cabecera.php');
    ?>

    <pre>



    <form action="insertar.php" method="post">

        <label>Nombre</label>
        <input type="text" name='nombre'></input>

        <label>Clasificacion</label>
        <input type="text" name="clasificacion"></input>

        <label>Fecha</label>
        <input type="date" name='fecha'></input>

        <label>Imagen</label>
        <input type="url" name='imagen' placeholder=""></input>

        <button type="submit">Enviar</button>


    </form>

    </pre>
    <?php
    include_once('conexion.php');

    ?>

</body>

</html>