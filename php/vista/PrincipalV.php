<?php

    $pActivo = true;
    $gActivo = false;
    $mActivo = false;
    // if(isset($_COOKIE['usuario'])) { 
    //     // Caduca en un año 
    //     setcookie('usuario', $_COOKIE['usuario'] + 1, time() + 365 * 24 * 60 * 60); 
    //     $mensaje = 'Bienvenido: ' . $_COOKIE['usuario']; 
    // }

    // echo $mensaje;

    if (isset($_SESSION['usuario']))
        echo  "    " . $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="en">

    <!-- Head -->
    <?php
        $titulo = "Noticias";

        include 'componentes/Head.php';
    ?>

    <body>
        
        <div class="contenedor">

            <!-- Header (include Nav) -->
            <?php
                include 'componentes/Header.php';
            ?>

            <!-- <input type="checkbox" class="openSidebarMenu" id="openSidebarMenu" hidden>
            <label for="openSidebarMenu" class="sidebarIconToggle">
                <div class="spinner diagonal part-1"></div>
                <div class="spinner horizontal"></div>
                <div class="spinner diagonal part-2"></div>
            </label> -->

            <main>
                <div id="mainContainer">

                    <section>
                        <h1>
                            <?php 
                            
                                if (isset($_SESSION['usuario'])) echo "Bienvenido " . $usuario->getNombre();
                            
                            ?></h1>
                    </section>

                    <h1>Últimas peticiones</h1>
                
                    <hr />

                    <input name="generar" type="button" value="Actualiza">

                    <div class="posts">
                    </div>
                </div>

                <!-- RinghtContainer -->
                <?php
                    include 'componentes/RightContainer.php';
                ?>
            </main>

            <!-- Footer -->
            <?php
                include 'componentes/Footer.php';
            ?>
        </div>
    </body>
</html>