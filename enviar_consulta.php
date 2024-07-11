<?php
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$mensaje = $_POST['mensaje'];

$conexion = mysqli_connect('localhost', 'root', '', 'php_inicial_487')
    or die("No se pudo conectar a la base de datos");

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
