<?php
    include (dirname(__FILE__).'./../controller/GruposC.php');

    $controladorGrupo = new GruposController();
?>

<div id="mainContainer">

    <h1>Grupos</h1>

    <hr />

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

    
    <?php
        include (dirname(__FILE__).'./componentes/filtradoGrupos.php');
    ?>

</div>