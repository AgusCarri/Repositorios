<?php
include("conexion.php");

// Obtiene el ID del reloj de la URL
$id_relojes = $_GET['id'];

// Verifica que el ID sea un número
if (is_numeric($id_relojes)) {
    // Actualiza el estado del reloj en la base de datos
    $query = "UPDATE relojes SET estado='Finalizado' WHERE id=$id_relojes";
    mysqli_query($conexion, $query);
    
    // Redirige a la página de relojes después de la actualización
    header("Location: verMisRelojes.php");
    exit();
} else {
    echo "ID inválido";
}
?>
