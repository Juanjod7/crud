<?php

include_once('conexion.php');



$animeid = $_POST['animeid'];
$nombre = $_POST['nombre'];
$apellido = $_POST['clasificacion'];
$fecha = $_POST['fecha'];
$imagen = $_POST['imagen'];



$sql = "DELETE FROM datos WHERE animeid = '$animeid'";


if (
    $conexion->query($sql) === TRUE
) {
    echo "Registro eliminado correctamente";
} else {

    $conexion->error;
};

$conexion->close();

header('Location:listar.php');
