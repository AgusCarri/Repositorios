<?php
session_start();
include('header.php'); 

if (!isset($_SESSION['admin'])) {
    ?>

    <section>
        <h1 class="titulo">Ingreso</h1>
        <div class="container_form">
            <form action="validar.php" class="form" method="POST">
                <label for="usuario">Usuario</label>
                <input type="text" name="usuario" id="usuario" required>
                <br><br>
                <label for="clave">Contraseña</label>
                <input type="password" name="clave" id="clave" required>
                <br><br>
                <input type="submit" value="Ingresar">
            </form>
        </div>

        <?php 
        // Mostrar mensaje de error si hay algún problema con los datos de inicio de sesión
        if (isset($_GET['error'])) {
            echo '<h3>Datos incorrectos</h3>';
        }
        ?>
    </section>

    <?php
} else {
    // Si el usuario ha iniciado sesión, mostrar el contenido protegido
    ?>

    <section class="contacto">
        <div class="container">
            <h2>Envíenos su foto así podremos cotizar su reloj al mejor precio</h2>
            <div>
                <?php
                if (isset($_GET['ok'])) {
                    echo '<h3>Mensaje enviado con éxito</h3>';
                }
                ?>
            <form action="enviar_reloj_nuevo.php" method="post" enctype="multipart/form-data">
                <label for="nombre">Reloj</label>
                <input type="text" name="nombre" id="nombre" required>

                <label for="file">Imagen del reloj</label>
                <input type="file" name="file" id="file" required>

                <label for="mensaje">Detalles</label>
                <textarea name="detalles" id="mensaje" required></textarea>
                
                <!-- Nuevo campo para seleccionar el estado -->
                <label for="estado">Estado</label>
                <select name="estado" id="estado" required>
                    <option value="En proceso">En proceso</option>
                    <option value="Finalizado">Finalizado</option>
                </select>

                <!-- CAPTCHA -->
                <div>
                    <img src="captcha.php" alt="CAPTCHA">
                    <label for="captcha">Ingrese el código CAPTCHA</label>
                    <input type="text" name="captcha" id="captcha" required>
                </div>
                
                <input type="submit" value="Enviar imagen">
            </form>



            <form action="salir.php" method="post">
                <input type="submit" value="Cerrar sesión" class="btn-cerrar-sesion">
            </form>

        </div>
    </section>

    <?php
    // Mostrar mensajes en caso de error o éxito
    if (isset($_GET['error_codigo'])) {
        echo "<h3>Código de verificación incorrecto</h3>";
    }

    if (isset($_GET['ok'])) {
        echo "<h3>Reloj cargado con éxito</h3>";
    }
}
?>
