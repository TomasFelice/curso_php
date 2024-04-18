<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Paginacion</title>
</head>
<body>
    <div class="contenedor">
        <h1>Artículos</h1>
        <section class="articulos">
            <ul>
                <?php foreach($articulos as $articulo): ?>
                    <li><?php echo $articulo['id'] . ' - ' . $articulo['texto']; ?></li>
                <?php endforeach; ?>
            </ul>
        </section>
        <section class="paginacion">
        <ul>
            <!-- para la flecha hacia atras -->
            <?php if($pagina == 1): ?>
                <li class="disabled">&laquo;</li>
            <?php else: ?>
                <li><a href="?pagina=<?= $pagina - 1 ?>">&laquo;</a></li>
            <?php endif; ?>

            <!-- para todas las pagina que haya -->
            <?php for($i = 1; $i <= $numeroPaginas; $i++): ?>
                <?php if($pagina == $i): ?>
                    <li class="active"><a href="?pagina=<?= $i; ?>"><?= $i; ?></a></li>
                <?php else: ?>
                    <li><a href="?pagina=<?= $i; ?>"><?= $i; ?></a></li>
                <?php endif; ?>
            <?php endfor; ?>

            <!-- para la flecha hacia adelante -->
            <?php if($pagina == $numeroPaginas): ?>
                <li class="disabled">&raquo;</li>
            <?php else: ?>
                <li><a href="?pagina=<?= $pagina + 1 ?>">&raquo;</a></li>
            <?php endif; ?>


            <!-- <li class="disabled">&laquo;</a></li>
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">&raquo;</a></li> -->
        </ul>
        </section>
    </div>
</body>
</html>