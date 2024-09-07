<?php
session_start();
include('conexion.php');

$id = $_POST['id'];
$estado = $_POST['estado'];

$query = "UPDATE relojes SET estado = '$estado' WHERE id = $id";
if (mysqli_query($conexion, $query)) {
    header('Location: verMisRelojes.php?ok');
} else {
    header('Location: verMisRelojes.php?error');
}
?>
