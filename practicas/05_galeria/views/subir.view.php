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
    <title>Galería - Subir Foto</title>
</head>
<body>
    <header>
        <div class="contenedor">
            <h1 class="titulo">Subir Foto</h1>
        </div>
    </header>

    <div class="contenedor">
        <form
            class="formulario"
            action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>"
            method="post"
            enctype="multipart/form-data" > <!-- el utlimo atr sirve para poder subir fotos -->

            <label for="foto">Selecciona tu foto</label>
            <input type="file" name="foto" id="foto">
            
            <label for="titulo">Titulo de la foto</label>
            <input type="text" name="titulo" id="titulo">

            <label for="texto">Descripción:</label>
            <textarea name="texto" id="texto"  placeholder="Ingresa una descripción"></textarea>

            <?php if(isset($error)): ?>
                <p class="error"><?=$error;?></p>
            <?php endif; ?>

            <input type="submit" value="Subir Foto" class="submit">
        </form>
    </div>

    <footer>
        <p class="copyright">Galería creada por Tomás Felice en: Curso PHP 8 y MYSQL - Carlos Arturo - Udemy</p>
    </footer>

</body>
</html>