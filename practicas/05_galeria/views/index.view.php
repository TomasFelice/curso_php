<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Slabo+27px&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Galería</title>
</head>
<body>
    <header>
        <div class="contenedor">
            <h1 class="titulo">Galería con PHP y MySQL</h1>
        </div>
    </header>

    <section class="fotos">
        <div class="contenedor">
            
            <?php foreach ($fotos as $foto): ?>
                <div class="thumb">
                    <a href="foto.php?id=<?= $foto['id']; ?>">
                        <img    src="<?= CARPETA_FOTOS . $foto['url']; ?>"
                                alt="<?= $foto['titulo'] ?>">
                    </a>
                </div>
            <?php endforeach; ?>

            <div class="paginacion">
                <?php if ($paginaActual > 1): ?>
                    <a href="index.php?p=<?= $paginaActual - 1; ?>" class="izquierda"><i class="fa fa-long-arrow-left"></i> Pagina anterior</a>
                <?php endif; ?>

                <?php if ($totalPaginas != $paginaActual): ?>
                    <a href="index.php?p=<?= $paginaActual + 1; ?>" class="derecha">Pagina siguiente <i class="fa fa-long-arrow-right"></i></a>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <footer>
        <p class="copyright">Galería creada por Tomás Felice en: Curso PHP 8 y MYSQL - Carlos Arturo - Udemy</p>
    </footer>


</body>
</html>