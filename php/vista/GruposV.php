<?php
    include (dirname(__FILE__).'./../controller/GruposC.php');
    include (dirname(__FILE__).'./../controller/GenerosC.php');

    $controladorGrupo = new GruposController();
    $controladorGenero = new GenerosController();
?>

<div id="mainContainer">

    <h1>Últimas peticiones</h1>

    <hr />
    
    <input name="generar" type="button" value="Actualiza">

    <!-- por cada uno de los grupos que obtengo del controlador obtenerGrupos muestro el grupo -->
    <?php
        $grupo = "Archero";

        // Comprobamos y creamos grupos
        /*if ($controladorGrupo->comprobarGrupo($grupo)) {
            echo "El grupo ya existe.";
            
        } else {
            echo "El grupo no existe.";
            echo "Creamos el grupo";
            $controladorGrupo->crearGrupo(null, $grupo, 'Rock', 'sabdajsdgnahskjdmhasjodklashdjkashdsñjdashdjsk', 3, 46910, null, 1);
        }*/

        $aux = $controladorGrupo->obtenerGrupos();

        echo "<div class='grupos'>";

        foreach($aux as $auxGrupo) {
            include (dirname(__FILE__).'./componentes/ImprimirGrupos.php');
        }
        echo "</div>";
    ?>
</div>

<div id="rightContainer">
    <h1>Filtrado</h1>

    <hr />

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

            foreach ($generos as $genero) {
                
                echo '<div class="' . $genero->getGenero() . ' genero">
                    <img class="iconosGenero" src="' . $genero->getImagen() . '" alt="">
                </div>';

            }

        ?>
        </div>
    </div>

</div>