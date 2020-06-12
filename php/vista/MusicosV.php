<?php
    $obtenerMusicos = new MusicosModel();

?>

<div id="mainContainer">

    <h1>Músicos en activo</h1>

    <hr />

    <!-- Muestro todos los músicos y sus instrumentos aquí -->

    <?php

        $aux = $obtenerMusicos->obtenerMusicos();

        echo "<div class='musicos'>";

        foreach($aux as $auxMusico) {
            include (dirname(__FILE__).'./componentes/ImprimirMusicos.php');
        }
        echo "</div>";
    ?>

    <div class="posts">
    </div>
</div>

<div id="rightContainer">
    <h1>Filtrado</h1>

    <hr />

    <?php
        include (dirname(__FILE__).'./componentes/filtradoGrupos.php');
    ?>
</div>