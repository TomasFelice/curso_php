<header>
    <div class="contenedor">
        <div class="logo izquierda">
            <p><a href="<?= BASE_URL; ?>">DevBlog</a></p>
        </div>

        <div class="derecha">
            <form 
                name="busqueda"
                class="buscar"
                action="<?= BASE_URL; ?>/buscar.php"
                method="get">
                <input type="text" name="busqueda" id="" placeholder="Buscar">
                <button type="submit" class="icono fa fa-search"></button>
            </form>

            <nav class="menu">
                <ul>
                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-github" aria-hidden="true"></i></a></li>
                    <li><a href="#">Contacto <i class="icono fa fa-envelope" aria-hidden="true"></i></a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>