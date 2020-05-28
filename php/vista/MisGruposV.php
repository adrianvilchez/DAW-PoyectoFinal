<?php
    include (dirname(__FILE__).'./../controller/GruposC.php');

    $controladorGrupo = new GruposController();
?>

<div id="mainContainer">

    <h1>Mis Grupos</h1>

    <hr />

    <?php

        $misGrupos = $controladorGrupo->obtenerMisGrupos($_SESSION['usuario']);

        if (count($misGrupos) <= 0) {
            echo "<h1>Aún no estás en ningún grupo.</h1>";
        } else {
            foreach ($misGrupos as $auxGrupo) {
                include (dirname(__FILE__).'./componentes/ImprimirGrupos.php');
            }
            echo "< br/>";
        }

    ?>
    

</div>

<div id="rightContainer">
    <h1>Filtrado</h1>

    <hr />

    <input type="button" value="Crear Grupo">


</div>