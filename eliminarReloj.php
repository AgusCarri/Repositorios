    <?php
    include_once 'conexion.php';

    $id_reloj_a_eliminar = $_POST['id'];

    $query = "DELETE FROM relojes WHERE id = $id_reloj_a_eliminar";
    if (mysqli_query($conexion, $query)) {
        mysqli_close($conexion);
        header('Location: index.php?ok');
        exit;
    } else {
        echo 'Error al enviar el mensaje: ' . mysqli_error($conexion);
    }
    
    mysqli_close($conexion);
    ?>
