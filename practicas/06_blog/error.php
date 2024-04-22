<?php
require 'admin/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Conexion a google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Fuentes a usar -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <!-- Conexion a fontawesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="<?= BASE_URL; ?>css/style.css">
    
    <title>DevBlog</title>
</head>
<body>
    
    <?php require('views/header.view.php'); ?>

    <div class="contenedor">
        <div class="post">
            <article>
                <h2 class="titulo">Error</h2>
                <br>
                <p class="extracto">Error de conexión</p>
            </article>
        </div>
    </div>

    <?php require('views/footer.view.php'); ?>

</body>
</html>