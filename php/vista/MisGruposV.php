<?php
    include (dirname(__FILE__).'./../controller/GruposC.php');

    $controladorGrupo = new GruposController();
?>

<div id="mainContainer">

    <div class="cabeceraGrupos">
        <h1>Grupos</h1>
    </div>

    <?php

        $misGrupos = $controladorGrupo->obtenerMisGrupos($_SESSION['usuario']);

        echo "<div class='crearGrupo'></div>";
        if (count($misGrupos) <= 0) {
            echo "<h1>Aún no estás en ningún grupo.</h1>";
        } else {
            echo "<div class='grupos'>";
            foreach ($misGrupos as $auxGrupo) {
                include (dirname(__FILE__).'./componentes/ImprimirGrupos.php');
            }
            echo "</div>";
        }

    ?>
    

</div>

<div id="rightContainer">
    <h1>Filtrado</h1>

    <hr />

    <?php
        include (dirname(__FILE__).'./componentes/filtradoGrupos.php');
    ?>

    <input type="button" name="crearGrupo" value="Nuevo Grupo">
</div>