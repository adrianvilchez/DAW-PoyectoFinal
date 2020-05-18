<?php

    include '../controller/GruposC.php';
    include '../model/Grupo.php';

    $controladorGrupo = new GruposController();

    $pActivo = false;
    $gActivo = true;
    $mActivo = false;

    if (isset($_SESSION['usuario']))
        echo  "    " . $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="en">
    
    <!-- Head -->
    <?php
        //$titulo = "Grupos";
        
        //include 'componentes/Head.php';
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../css/global.css" media="screen and (min-width: 769px)">
    <link rel="stylesheet" type="text/css" href="css/mobile.css" media="screen and (max-width: 768px)">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>
        <?php
            //echo $titulo;
        ?>
        Grupos
    </title>

    <script src="../../js/script.js"></script>
</head>
<body>
    
    <div class="contenedor">

        <!-- Header (include Nav) -->
        <?php
            include 'componentes/Header.php';
        ?>

        <main>
            <div id="mainContainer">

                <h1>Últimas peticiones</h1>
            
                <hr />
                
                <input name="generar" type="button" value="Actualiza">

                <div class="posts">

                    <!-- por cada uno de los grupos que obtengo del controlador obtenerGrupos muestro el grupo -->
                    <?php

                        //$grupo = new Grupo();

                        $crearGrupo = new GruposController();
                        $comprobarGrupo = new GruposController();
                        $obtenerGrupos = new GruposController();

                        $grupo = "Archero";

                        // Comprobamos y creamos grupos
                        if ($comprobarGrupo->comprobarGrupo($grupo)) {
                            echo "El grupo ya existe.";
                            
                        } else {
                            echo "El grupo no existe.";
                            echo "Creamos el grupo";
                            $controladorGrupo->crearGrupo(null, $grupo, 'Rock', 'sabdajsdgnahskjdmhasjodklashdjkashdsñjdashdjsk', 3, 46910, 1);
                        }

                        $aux = $controladorGrupo->obtenerGrupos();

                        /*echo "<div class='grupo'>";
                                        "<div class='nombreGrupo'>" +
                                            "<h3>" + datos[i].titulo + "</h3>" +
                                        "</div>" +
                    
                                        "<div class='descripcion'>" +
                                            "<p>" + datos[i].descripcion + "</p>" +
                                        "</div>" +
                    
                                        "<div class='fechaAutor'>" +

                                            "<img class='avatar' src='" + datos[i].avatar.replace(/\\/g, "") + "' alt='Avatar de usuario'>" +

                                            "<div class='autor'>" +
                                                "<p>" + datos[i].nombre + "</p>" +
                                            "</div>" +
                    
                                            "<div class='fecha'>" +
                                                "<p>" + datos[i].fecha + "</p>" +
                                            "</div>" +

                                            "<input class='invitar' type='button' value='Invitar'>" +
                                        "</div>" +
                                    "</div>";*/

                        foreach($aux as $auxGrupo) {
                            foreach($auxGrupo as $grupo){
                                foreach($grupo as $g){
                                    $contador = 2;

                                    $grupo = new Grupo();

                                    switch ($contador) {
                                        /*case 1:
                                            $grupo->setIdGrupo($g);
                                            echo "<div class='titulo'>";
                                            echo '<h3>idGrupo: ' . $grupo->getIdGrupo() . '</h3>';
                                            echo '</div>';
                                            $contador++;
                                            break;*/
                                        case 2:
                                            $grupo->setNombreGrupo($g);
                                            echo '<p>nombreGrupo: ' . $grupo->getNombreGrupo() . ' </p>';
                                            $contador++;
                                            break;
                                        case 3:
                                            $grupo->setNumeroIntegrantes($g);
                                            echo '<p>numeroIntegrantes: ' . $grupo->getNumeroIntegrantes() . ' </p>';
                                            $contador++;
                                            break;
                                        case 4:
                                            $grupo->setCp($g);
                                            echo '<p>cp: ' . $grupo->getCp() . ' </p>';
                                            $contador++;
                                            break;
                                        case 5:
                                            $grupo->setEstaCompleto($g);
                                            echo '<p>estaCompleto: ' . $grupo->getEstaCompleto() . ' </p>';
                                            $contador = 0;
                                            break;
                                        default:
                                            # code...
                                            break;
                                    } 
                                }
                            }
                            echo "<br>";
                        }
                    ?>
                </div>
            </div>

            <!-- RinghtContainer -->
            <?php
                //include 'componentes/RinghtContainer.php';
            ?>
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

                        <div class="rock genero">
                            <img class="iconosGenero" src="../../img/generos/Rock-icon.png" alt="">
                        </div>

                        <div class="indie genero">
                            <img class="iconosGenero" src="../../img/generos/Disco-icon.png" alt="">
                        </div>

                        <div class="heavy-metal genero">
                        <img class="iconosGenero" src="../../img/generos/Heavy-Metal-icon.png" alt="">
                        </div>

                        <div class="pop genero">
                        <img class="iconosGenero" src="../../img/generos/Pop-icon.png" alt="">
                        </div>

                        <div class="tecno genero">
                        <img class="iconosGenero" src="../../img/generos/Techno-icon.png" alt="">
                        </div>

                        <div class="dance genero">
                        <img class="iconosGenero" src="../../img/generos/Dance-icon.png" alt="">
                        </div>

                        <div class="punk-rock genero">
                        <img class="iconosGenero" src="../../img/generos/Punk-Rock-icon.png" alt="">
                        </div>

                        <div class="acustico genero">
                        <img class="iconosGenero" src="../../img/generos/Acoustic-icon.png" alt="">
                        </div>   
                    </div>
                </div>

            </div>
        </main>

        <!-- Footer -->
        <?php
            include 'componentes/Footer.php';
        ?>
    </div>
</body>
</html>