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

    if (isset($_SESSION['usuario'])) echo "Bienvenido " . $usuario->getNombre();
?>

<!DOCTYPE html>
<html lang="en">

    <!-- Head -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="stylesheet" type="text/css" href="../../css/global.css" media="screen and (min-width: 769px)">
        
        <link rel="stylesheet" type="text/css" href="css/mobile.css" media="screen and (max-width: 768px)">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <title>

            <h1>Noticias</h1>
        </title>

        <style>
            @import url("../../css/carousel.css");
        </style>

        <script src="../../js/script.js"></script>
    </head>

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
                            
                                //if (isset($_SESSION['usuario'])) echo "Bienvenido " . $usuario->getNombre();
                            
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
                    //include 'componentes/RightContainer.php';
                ?>
            </main>

            <!-- Footer -->
            <?php
                include 'componentes/Footer.php';
            ?>
        </div>
    </body>
</html>