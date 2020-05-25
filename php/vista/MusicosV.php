<div id="mainContainer">

    <h1>Músicos en activo</h1>

    <hr />

    <!-- Muestro todos los músicos y sus instrumentos aquí -->
    <?php

        $obtenerMusicos = new MusicosModel();

        $aux = $obtenerMusicos->obtenerMusicos();

        foreach($aux as $auxMusico) {
            echo $auxMusico->getNombre();

            echo $auxMusico->getAvatar();

            echo "<br/  >";
        }
        
    ?>
    

    <input name="generar" type="button" value="Actualiza">

    <div class="posts">
    </div>
</div>