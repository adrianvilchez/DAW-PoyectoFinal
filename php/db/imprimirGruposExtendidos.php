<?php 
    include (dirname(__FILE__).'./../controller/GruposC.php');
    include (dirname(__FILE__).'./../controller/IntegrantesC.php');
    include (dirname(__FILE__).'./../controller/UsuariosC.php');

    $controladorGrupo = new GruposController();
    $controladorIntegrante = new IntegrantesController();
    $controladorUsuario = new UsuariosController();

    $nombreGrupo = $_POST['nombreGrupo'];
    
    $grupo = $controladorGrupo->obtenerGrupoPorNombre($nombreGrupo);

    echo "
        <div class='nombreVG'>
            <h1>" . $grupo->getNombreGrupo() . "</h1>
            <div class='cruceta'>
                X 
            </div>
        </div>

        <div class='generoLocalidadVG'>
            <div class='generoVG'>
                <p class='selectorVG'>Genero</p>
                <p class='textoGrupo'>" . $grupo->getGeneroGrupo() . "</p>
            </div>

            <div class='localidadVG'>
                <p class='selectorVG'>Localidad</p>
                <p class='textoGrupo'>" . $grupo->getCp() . "</p>
            </div>
        </div>

        <div class='listaIntegrantesVG'>
            <div class='integrantesTituloVG'>
                <h3 class='selectorVG'>Integranes</h3>
            </div>
            
           
            <div class='integrantesVG'>
                <table>
                <tr>
                    <th>Nombre</th>
                    <th>Cp</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                   
                </tr>";

                $integrantes = $controladorUsuario->obtenerIntegrantes($nombreGrupo);
                //$integrantes2 = $controladorIntegrante->obtenerIntegrantes($nombreGrupo);

                session_start();

                foreach ($integrantes as $integrante) {

                    $aux = ($integrante->getNombre() == $_SESSION['usuario']) ? "Tú" : $integrante->getNombre();

                    echo "<div class='datosIntegranteVG'>
                    <tr>
                        <td class='nombreIntegranteVG'>" . $aux . "</td>
                        <td class='nombreIntegranteVG'>" . $integrante->getCp() . "</td>
                        <td class='nombreIntegranteVG'>" . $integrante->getEmail() . "</td>
                        <td class='nombreIntegranteVG'>" . $integrante->getTelefono() . "</td>
                        <td class='nombreIntegranteVG'>
                            <div class='verUsuarioVG'>
                                <p class='selectorVG'>Ver</p>
                            </div>
                        </td>
                    </tr>";
                }
            
            echo "</table>
            </div> 
        </div>

        <div class='estadoPetionVG'>
            <div class='estadoVG'>
                <p class='selector'>Estado</p>
                <p class='textoGrupo'>" . ($grupo->getEstaCompleto() == 1 ? 'Completo' : 'Incompleto') . "</p>
            </div>

            <div class='enviarPeticionVG' data-id-grupo='" . $grupo->getNombreGrupo() . "'>
                <p class='selector " . ($grupo->getEstaCompleto() == 1 ? 'enviarPeticionDesVG' : 'enviarPeticionHabVG') . "'>Enviar Petición</p>
            </div>
        </div>
    </div>";
?>