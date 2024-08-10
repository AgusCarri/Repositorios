<?php
include_once'conexion.php';

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$mensaje = $_POST['mensaje'];

$query = "INSERT INTO consultas (id, nombre, email, mensaje) VALUES (DEFAULT, '$nombre', '$email', '$mensaje')";

if (mysqli_query($conexion, $query)) {
    mysqli_close($conexion);
    header('Location: index.php?ok');
    exit;
} else {
    echo 'Error al enviar el mensaje: ' . mysqli_error($conexion);
}

mysqli_close($conexion);
?>

