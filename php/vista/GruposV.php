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
        $titulo = "Grupos";
        
        include 'componentes/Head.php';
    ?>
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

                <!-- por cada uno de los grupos que obtengo del controlador obtenerGrupos muestro el grupo -->
                <?php

                    //$grupo = new Grupo();

                    $crearGrupo = new GruposController();
                    $comprobarGrupo = new GruposController();
                    $obtenerGrupos = new GruposController();

                    $grupo = "Pacman";

                    // Comprobamos y creamos grupos
                    if ($comprobarGrupo->comprobarGrupo($grupo)) {
                        echo "El grupo ya existe.";
                        
                    } else {
                        echo "El grupo no existe.";
                        echo "Creamos el grupo";
                        $controladorGrupo->crearGrupo(null, $grupo, 5, 46910, 0);
                    }

                    $aux = $controladorGrupo->obtenerGrupos();

                    //$bla = get_object_vars($aux[0]);
            
                    //var_dump($aux);


                    $myArray = json_decode(json_encode($aux), true);

                    

                    foreach($myArray as $auxGrupo)
                    {
                        foreach($auxGrupo as $grupo)
                            {
                                //print_r($grupo);

                                foreach($grupo as $g)
                                {
                                    $contador = 1;

                                    $grupo = new Grupo();


                                    switch ($contador) {
                                        case 1:
                                            $grupo->setIdGrupo($g);
                                            echo '<p>idGrupo: ' . $grupo->getIdGrupo() . ' </p>';
                                            $contador++;
                                            break;
                                        case 2:
                                            $grupo->setNombreGrupo($g);
                                            echo '<p>idGrupo: ' . $grupo->getNombreGrupo() . ' </p>';
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
                

                <input name="generar" type="button" value="Actualiza">

                <div class="posts">
                </div>
            </div>

            <!-- RinghtContainer -->
            <?php
                include 'componentes/RinghtContainer.php';
            ?>
        </main>

        <!-- Footer -->
        <?php
            include 'componentes/Footer.php';
        ?>
    </div>
</body>
</html>