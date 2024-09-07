<?php
session_start();
include_once 'conexion.php';

// Verifica si el captcha es correcto
if (!isset($_POST['captcha']) || $_POST['captcha'] !== $_SESSION['codigo_captcha']) {
    header('Location: nuevoReloj.php?error_codigo');
    exit;
}

// Obtengo los datos del formulario
$nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
$detalles = mysqli_real_escape_string($conexion, $_POST['detalles']);
$file = $_FILES['file'];

// Especifico la ruta donde se guarda la imagen
$targetDir = "uploads/";
$targetFile = $targetDir . basename($file['name']);
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Verifica si hubo algún error al subir el archivo
switch ($file['error']) {
    case UPLOAD_ERR_OK:
        break;
    case UPLOAD_ERR_NO_FILE:
        die('No se ha subido ningún archivo.');
    case UPLOAD_ERR_INI_SIZE:
    case UPLOAD_ERR_FORM_SIZE:
        die('El archivo es demasiado grande.');
    default:
        die('Hubo un error desconocido al subir el archivo.');
}

// Verifica si es una imagen válida (opcional)
$check = getimagesize($file['tmp_name']);
if ($check === false) {
    die("El archivo no es una imagen válida.");
}

// Verifica si el tipo de archivo es permitido
$allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
if (!in_array($imageFileType, $allowedTypes)) {
    die("Solo se permiten archivos JPG, JPEG, PNG y GIF.");
}

// Mueve el archivo subido al directorio de destino
if (move_uploaded_file($file['tmp_name'], $targetFile)) {
    // Al cargar un nuevo reloj, se establece el estado como 'En proceso' por defecto
    $query = "INSERT INTO relojes (nombreReloj, imagen, comentario, estado, fechaAgregado)
              VALUES ('$nombre', '" . mysqli_real_escape_string($conexion, $file['name']) . "', '$detalles', 'En proceso', NOW())";

    if (mysqli_query($conexion, $query)) {
        mysqli_close($conexion);
        header('Location: nuevoReloj.php?ok');
        exit;
    } else {
        echo 'Error al guardar los datos: ' . mysqli_error($conexion);
    }
} else {
    echo "Hubo un error subiendo el archivo.";
}

mysqli_close($conexion);
?>
