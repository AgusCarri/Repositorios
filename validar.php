<?php 
session_start();
include('header.php'); 

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

include('conexion.php');

$consulta = mysqli_query($conexion, "SELECT * FROM administradores WHERE usuario = 'admin' AND clave = 'admin123'");

if ($usuario == 'admin' && $clave == 'admin123') {
    $_SESSION['admin'] = $usuario; // Guarda el nombre de usuario en la sesión
    header('Location: nuevoReloj.php'); //porque asi lo escribiste el arreglo fue en validar, no en reloj ese.php aaaa
    exit(); 
} else {
    header('Location: index.php?error');
    exit(); 
}
?>
