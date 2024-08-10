<?php
include_once 'header.php';
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

                <input type="submit" value="Enviar imagen">
            </form>
        </div>
    </div>
</section>


<?php include_once 'footer.php'; ?>

