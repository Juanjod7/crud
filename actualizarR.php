<?php
echo '<pre>';
var_dump($_POST); // Verifica todos los datos enviados en el formulario
echo '</pre>';
?>



<?php

include_once('conexion.php');
//actualizar registros

if($_SERVER["REQUEST_METHOD"]=="POST"){
$animeid = $_POST['animeid'];
$nombre = $_POST['nombre'];
$clasificacion = $_POST['clasificacion'];
$fecha = $_POST['fecha'];
$imagen = $_POST['imagen'];
}


$sql = "UPDATE datos SET nombre = ? , clasificacion = ? , fecha = ?, imagen = ? WHERE animeid = ?";

if ($stmt = $conexion->prepare($sql)) {
    // Vincular los parámetros a la consulta
    $stmt->bind_param("ssssi", $nombre, $clasificacion, $fecha, $imagen, $animeid);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Si se ejecuta correctamente, redirige a listar.php
        header('Location: listar.php');
        exit; // Detener el script después de la redirección
    } else {
        // Si hay un error, mostrar el mensaje de error
        echo "<div class='alert alert-danger'>Error al actualizar el registro: " . $stmt->error . "</div>";
    }

    // Cerrar la declaración
    $stmt->close();
} else {
    // Manejo de errores si no se puede preparar la consulta
    echo "<div class='alert alert-danger'>Error al preparar la consulta: " . $conexion->error . "</div>";
}

// Cerrar la conexión
$conexion->close();

?>