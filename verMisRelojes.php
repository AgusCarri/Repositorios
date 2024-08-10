<?php
  
    include_once'header.php';

    $query = "SELECT * FROM relojes";

    $relojes = mysqli_query($conexion, $query);
        
    
    
    ?>
   

    <section id="products">
        <div class="container">
            <h2>Tus relojes</h2>
            <div class="product-grid">
                <?php
                foreach ($relojes as $key){
                    //print_r($key);
                    echo '
                      <div class="product-item">
                        <img src="uploads/'.$key['imagen'].'" alt="Smart Band Mi Band 8 1.62">
                        <h3>'.$key['nombreReloj'].'</h3>
                        <p>'.$key['comentario'].'</p>
                        <form action="eliminarReloj.php" method="POST">
                            <input type="hidden" name="id" value="'.$key['id'].'">
                            <button type="submit" name="cart" value="added">Eliminar</button>
                        </form>
                    </div>
                    ';
                } 
                ?>
            </div>
        </div>
        <h1>Nos contactaremos contigo cuando tengamos una propuesta para tu reloj!!</h1>

    </section>


    <?php include_once 'footer.php'?>