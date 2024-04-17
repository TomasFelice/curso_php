<?php

/*
    Siempre es recomendable agregar la mayor cantidad de validaciones
    Tanto en JS como en PHP
*/

// reemplaza la función deprecada
function filter_string_polyfill(string $string): string {
    $str = preg_replace('/\x00|<[^>]*>?/', '', $string);
    return str_replace(["'", '"'], ['&#39;', '&#34;'], $str);
}

$errores = '';

if (isset($_POST['submit'])) {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];

    if (!empty($nombre)) {
        // // elmino los espacios de nombre
        // $nombre = trim($nombre);
        // // elimino las etiquetas de html
        // $nombre = htmlspecialchars($nombre);
        // // elimino las barras invertidas
        // $nombre = stripslashes($nombre);

        // OJO!! esta función está deprecada
        // $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);

        $nombre = filter_string_polyfill($nombre);

        echo 'Tu nombre es: ' . $nombre . '<br>';
    } else {
        $errores .= 'Por favor agrega un nombre.<br>';
    }

    if (!empty($correo)) {
        $correo = filter_var($correo, FILTER_SANITIZE_EMAIL);

        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $errores .= 'Por favor ingresa un correo válido.<br>';
        } else {
            echo 'Tu correo es: ' . $correo . '<br>';
        }
    } else {
        $errores .= 'Por favor agrega un correo.<br>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <input type="text" name="nombre" id="" placeholder="Nombre">
        <input type="text" name="correo" id="" placeholder="Correo">

        <?php if (!empty($errores)) : ?>
            <div class="error">
                <?php echo $errores; ?>
            </div>
        <?php endif; ?>
        <input type="submit" name="submit" value="Enviar Consulta">
    </form>
</body>
</html>