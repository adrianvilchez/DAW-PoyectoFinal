<nav>
    <ul>

        <li <?php  if (isset($_GET['page']) && $_GET['page'] == 'News') echo 'class="activo"';?>>
            <a href="./index.php?page=News">Noticias</a>
        </li>
        <li <?php  if (isset($_GET['page']) && $_GET['page'] == 'Grupos') echo 'class="activo"';?>>
            <a href="./index.php?page=Grupos">Grupos</a>
        </li>
        <li <?php  if (isset($_GET['page']) && $_GET['page'] == 'Musicos') echo 'class="activo"';?>>
            <a href="./index.php?page=Musicos">Musicos</a>
        </li>
    </ul>
</nav>