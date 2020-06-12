<?php
    include (dirname(__FILE__).'./../controller/GruposC.php');

    $controladorGrupo = new GruposController();

    if (!empty($_POST['busqueda'])) $busqueda = $_POST['busqueda']; else $busqueda = '';
    if (!empty($_POST['integrantes'])) $integrantes = $_POST['integrantes']; else $integrantes = 0;

    if (!empty($_POST['Rock'])) $rock = $_POST['Rock']; else $rock = null;
    if (!empty($_POST['Indie'])) $indie = $_POST['Indie']; else $indie = null;
    if (!empty($_POST['Pop'])) $pop = $_POST['Pop']; else $pop = null;
    if (!empty($_POST['Heavy Metal'])) $heavy = $_POST['Heavy Metal']; else $heavy = null;
    if (!empty($_POST['Techno'])) $techno = $_POST['Techno']; else $techno = null;
    if (!empty($_POST['Dance'])) $dance = $_POST['Dance']; else $dance = null;

    $grupos = $controladorGrupo->obtenerGruposFiltrados($busqueda, $integrantes, $rock, $indie, $dance, $techno, $pop, $heavy);


    if (count($grupos) <= 0) {
        echo "<h1>No hay resultados para ésta búsqueda.</h1>";
    } else {
        echo "<div class='cabeceraGrupos'>
                <h1>Grupos</h1>
            </div>
        <div class='grupos'>";
    
        foreach ($grupos as $auxGrupo) {
            include (dirname(__FILE__).'./../vista/componentes/ImprimirGrupos.php');
        }
    
        echo "</div>";
    }

?>