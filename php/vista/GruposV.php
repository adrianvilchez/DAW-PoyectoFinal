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

            //error_log(get_class($auxGrupo));
            //echo $auxGrupo->getNombreGrupo();

            echo "<div class='grupo'>
                    <div class='nombreGrupo'>
                        <h3>" . $auxGrupo->getNombreGrupo() . "</h3>
                    </div>";

                    echo "<div class='avatarComentarios'>
                            <div class='avatarGrupo'>";
                                echo "<img class='avatarGrupo' src='". $auxGrupo->getAvatarGrupo() . "' alt=''>
                            </div>";

                    if ($auxGrupo->getDescripcion() == null) {
                        echo "<div class='descripcionGrupo'>
                                <p>Este grupo no dispone de descripción.</p>
                            </div>";
                    } else {
                        echo "<div class='descripcionGrupo'>
                                <p>" . $auxGrupo->getDescripcion() . ".</p>
                            </div>";
                    } 
                        
                    echo "</div><div class='datosGrupo'>
                            <div class='generoGrupo'>
                                <p class='selector'>Género </p>
                                <p class='textoGrupo'>" . $auxGrupo->getGeneroGrupo() . "</p>
                            </div>
                            <div class='numeroIntegrantes'>
                                <p class='selector'>Integrantes </p>
                                <p>" . $auxGrupo->getNumeroIntegrantes() . "</p>
                            </div>
        
                            <div class='cpGrupo'>
                                <p class='selector'>Localidad </p>
                                <p>" . $auxGrupo->getCp() . "</p>
                            </div>";
                            
                    if ($auxGrupo->getEstaCompleto() == 1) {
                        echo "<div class='grupoCompleto'>
                                <p class='selector'>Estado </p>
                                <p>Completo</p>
                            </div>";
                    } else {
                        echo "<div class='grupoCompleto'>
                                <p class='selector'>Estado </p>
                                <p>Incompleto</p>
                            </div>";
                    }
                    echo "</div>
                    </div>";
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