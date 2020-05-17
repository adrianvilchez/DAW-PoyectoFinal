<nav>
    <ul>
        <li <?php  if ($pActivo) echo 'class="activo"';?>><a href="./PrincipalV.php">Noticias</a></li>
        <?php

            if (isset($_SESSION['usuario'])) {
                echo "<li ";
                if ($gActivo) echo 'class="activo"';
                
                echo '><a href="./GruposV.php">Grupos</a></li>';

                echo '<li ';
                if ($mActivo) echo 'class="activo"';
                echo '><a href="./MusicosV.php">Músicos</a></li>';
                
            }
        
        ?>
    </ul>
</nav>