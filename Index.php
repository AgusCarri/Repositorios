<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Time Royal</title>
    <link rel="stylesheet" href="Estilos.css">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>

<body>
    <header>
        <nav>
            <div class="container">
                <div class="logo">
                    <h1>Time Royal</h1>
                </div>
                <ul class="nav-links">
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="#about">Sobre Nosotros</a></li>
                    <li><a href="#products">Productos</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <?php
    $MensajeBienvenida = "Bienvenidos a Time Royal";
    $ContactoEmail = "Timeroyal@gmail.com";
    $TelefonoContacto = "+123456789";
    $Localidad = "CABA";
    $RedesSociales ="Instagram:RelojeriaTimeRoyal";
    $contactoMensaje = "Contáctanos hoy mismo en $RedesSociales.";

    define("CURRENT_YEAR", date("Y")); //constante

    ?>

    <section id="home">
        <div class="container">
            <h2><?php echo $MensajeBienvenida; ?></h2>
            <p>Encuentra los mejores relojes para cada ocasión.</p>
        </div>
    </section>

    <section id="about">
        <div class="container">
            <h2>Sobre Nosotros</h2>
            <p>Time Royal es una empresa dedicada a ofrecer lo último en relojes modernos para todas las ocasiones.
                Nuestra colección incluye desde relojes tecnológicos y sofisticados hasta diseños vanguardistas y
                deportivos.
                Nuestro objetivo es brindar a nuestros clientes no solo un accesorio funcional, sino una declaración de
                estilo que refleje su personalidad y gusto refinado.
                Con una meticulosa atención al detalle y una selección cuidadosa de los mejores materiales y tecnologías.
                Únete a nosotros en nuestra búsqueda de la excelencia relojera y descubre el mundo emocionante de Time
                Royal.</p>
        </div>
    </section>

    <section id="products">
        <div class="container">
            <h2>Nuestros Productos</h2>
            <div class="product-grid">
                <div class="product-item">
                    <img src="img/SmartW.png" alt="Smart Band Mi Band 8 1.62">
                    <h3>Xiaomi</h3>
                    <p>Smart Band Mi Band 8 1.62 el estilo que va con vos.</p>
                </div>
                <div class="product-item">
                    <img src="img/SmartW2.png" alt="Smartwatch Y1">
                    <h3>Smartwatch Y1</h3>
                    <p>Blanco perfecto para cualquier actividad física.</p>
                </div>
                <div class="product-item">
                    <img src="img/SmartW3.png" alt="Reloj Elegante Minimalista">
                    <h3>Reloj  Minimalista</h3>
                    <p>Malla Acero 9185 Resistente Al Agua.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="contact">
        <div class="container">
            <h2>Contactanos para conocer y revender todos nuestros productos</h2>
            <p>Email: <?php echo $ContactoEmail; ?></p>
            <p>Teléfono: <?php echo $TelefonoContacto; ?></p>
            <p>Dirección: <?php echo $Localidad; ?></p>
            <p><?php echo $RedesSociales; ?></p>
            <p><?php echo $contactoMensaje; ?></p>

        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; <?php echo CURRENT_YEAR; ?> Time Royal. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>

</html>
