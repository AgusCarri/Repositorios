<?php
session_start();
include('header.php'); 
include('conexion.php');

if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
    exit();
}

// Consulta para obtener los relojes
$query = "SELECT * FROM relojes WHERE estado = 'Finalizado'";
$relojes = mysqli_query($conexion, $query);
?>

<section id="products">
    <div class="container">
        <h2>Tus relojes</h2>
        <div class="product-grid">
            <?php
            while ($key = mysqli_fetch_assoc($relojes)) {
                $estadoActual = $key['estado'] == 'pendiente' ? 'En proceso' : $key['estado'];
                //var_dump($estadoActual);//Var_dup te hace un "echo" del objeto completo. Osea es lo que trae adentro.
            ?>
                <div class="product-item">
                    <img src="uploads/<?php echo $key['imagen']; ?>" alt="Reloj">
                    <h3><?php echo $key['nombreReloj']; ?></h3>
                    <p><?php echo $key['comentario']; ?></p>
                    <p>Estado: <?php echo $estadoActual; ?></p>

                    <form action="actualizar_estado.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $key['id']; ?>">
                        <select name="estado">
                            <option value="En proceso" <?php echo ($estadoActual == 'En proceso' ? 'selected' : ''); ?>>En proceso</option>
                            <option value="Finalizado" <?php echo ($estadoActual == 'Finalizado' ? 'selected' : ''); ?>>Finalizado</option>
                        </select>
                        <input type="submit" value="Actualizar Estado">
                    </form>
                    
                    <form action="eliminarReloj.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $key['id']; ?>">
                        <button type="submit" name="cart" value="added">Eliminar</button>
                    </form>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <h1>Nos contactaremos contigo cuando tengamos una propuesta para tu reloj!!</h1>
</section>

<?php include_once 'footer.php'; ?>
