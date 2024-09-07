<?php 
session_start();
// Establece el tipo de contenido como imagen JPEG
header("Content-type: image/jpeg");

// Crea una imagen
$imagen_captcha = imagecreate(70, 30);

// Define los colores
$fondo = imagecolorallocate($imagen_captcha, 239, 192, 240);
$texto = imagecolorallocate($imagen_captcha, 82, 4, 34);

// Genera un código CAPTCHA
$nro1 = rand(0, 9);
$nro2 = rand(0, 9);
$nro3 = rand(0, 9);
$letra = array('a', 'h', 'g', 'l', 'd', 'm', 'k');
$simbolo = array('%', '$', '/', '@', '#');
$mezcla_letra = rand(0, 6);
$mezcla_simbolo = rand(0, 4);

$_SESSION['codigo_captcha'] = $nro1 . $letra[$mezcla_letra] . $nro2 . $simbolo[$mezcla_simbolo] . $nro3;

// Agrega el texto del CAPTCHA a la imagen
imagestring($imagen_captcha, 5, 15, 5, $_SESSION['codigo_captcha'], $texto);

// Envía la imagen al navegador
imagejpeg($imagen_captcha);

// Libera la memoria
imagedestroy($imagen_captcha);
?>
