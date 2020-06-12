<?php
    include (dirname(__FILE__).'./../../controller/GenerosC.php');

    $controladorGenero = new GenerosController();
?>

<div class="filtradoGrupos">
    <div class="contenedorInput">

        <input placeholder="Buscar..." type="search" name="busqueda" class="input-busqueda">
    </div>

    <div class="range-slider">
        <input name="slider"class="range-slider__range" type="range" value="0" min="0" max="5">
        <span class="range-slider__value">0</span>
    </div>

    <div class="generos">

    <?php

        // Obtenemos todos los géneros para cargarlos en el HTML
        $generos = $controladorGenero->obtenerGeneros();

        /*foreach ($generos as $genero) {
            
            echo '<div class="' . $genero->getGenero() . ' genero">
                <img class="iconosGenero" src="' . $genero->getImagen() . '" alt="">
            </div>';

        }*/

        foreach ($generos as $genero) {
            
            echo '<div class="' . $genero->getGenero() . ' genero">
                <input type="checkbox" name="' . $genero->getGenero() . '" id="' . $genero->getGenero() . '" value="' . $genero->getGenero() . '" />
                <label for="' . $genero->getGenero() . '">
                <img class="iconosGenero" src="' . $genero->getImagen() . '" alt="">
            </div>';

            

        }



    ?>
    </div>
</div>