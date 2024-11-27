<?php
include_once('conexion.php');

$nombre = $_POST['nombre'];
$clasificacion = $_POST['clasificacion'];
$fecha = $_POST['fecha'];
$imagen = $_POST['imagen'];


$sql = "INSERT INTO datos (nombre,clasificacion,fecha,imagen)
VALUES ('$nombre','$clasificacion','$fecha','$imagen')";


if ($conexion->query($sql) === TRUE) {

    echo 'Registro Ingresado Correctamente';
} else {

    echo $conexion->error;
}


$conexion->close();

header('Location:listar.php');
