<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Contacto</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="wrap">
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
            <input  type="text" name="nombre" class="form-control" placeholder="Nombre:" id="nombre"
                    value="<?php if(!$enviado && isset($nombre)) echo $nombre; ?>">

            <input  type="text" name="correo" class="form-control" placeholder="Correo:" id="nombre"
                    value="<?php if(!$enviado && isset($correo)) echo $correo; ?>">

            <textarea name="mensaje" class="form-control" id="mensaje" placeholder="Mensaje:"><?php if(!$enviado && isset($mensaje)) echo trim($mensaje); ?></textarea>

            <?php if (!empty($errores)): ?>
                <div class="alert error">
                    <p><?= $errores; ?></p>
                </div>
            <?php elseif($enviado): ?>
                <div class="alert success">
                    <p>Enviado Correctamente</p>
                </div>
            <?php endif ?>

            <input type="submit" value="Enviar Correo" name="submit" class="btn btn-primary">
        </form>
    </div>
</body>
</html>