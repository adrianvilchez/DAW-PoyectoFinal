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

                    //var_dump($aux[1]);
                    $bla = get_object_vars($aux[0]);

                    //var_dump($bla);
            
                    echo var_dump($bla);
                    
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