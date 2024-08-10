<?php
include_once 'conexion.php';

// Obtengo los datos del formulario
$nombre = $_POST['nombre'];
$detalles = $_POST['detalles'];
$file = $_FILES['file']; // Cambio de $_FILE a $_FILES
print_r($file);
// Especifico la ruta donde se guarda la imagen
$targetDir = "uploads/"; // me aseguro de que este directorio exista y tenga permisos de escritura
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

// mueve el archivo subido al directorio de destino
if (move_uploaded_file($file['tmp_name'], $targetFile)) {
    // Guardo los datos en la base de datos
    $query = "INSERT INTO `relojes`(
        `id`,
        `nombreReloj`,
        `imagen`,
        `comentario`,
        `fechaAgregado`
    ) VALUES (
        NULL,
        '$nombre',
        '$file[name]',
        '$detalles',
        NOW()
    );";

    if (mysqli_query($conexion, $query)) {
        mysqli_close($conexion);
        header('Location: index.php?ok');
        exit;
    } else {
        echo 'Error al enviar el mensaje: ' . mysqli_error($conexion);
    }
} else {
    echo "Hubo un error subiendo el archivo.";
}

mysqli_close($conexion);
?>
