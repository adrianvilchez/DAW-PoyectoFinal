<?php
    include (dirname(__FILE__).'./../controller/GruposC.php');

    $controladorGrupo = new GruposController();
?>

<div id="mainContainer">

    <div class="cabeceraGrupos">
        <h1>Grupos</h1>
    </div>

    <!-- por cada uno de los grupos que obtengo del controlador obtenerGrupos muestro el grupo -->
    <?php

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