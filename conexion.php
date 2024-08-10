<?php
    /*
        LOCAL(desarrollo)
    

    $conexion = mysqli_connect("127.0.0.1", "root", "", "carrizo_agustin.sql")
    or exit ("No se pudo conectar a la base de datos");

  
        NUBE(servidor)
    */

    
    $conexion = mysqli_connect('192.168.0.63', 'agustin_carrizo', '3cICljdrAqK7', 'agustin_carrizo')
        or die("No se pudo conectar a la base de datos");
    
?>

