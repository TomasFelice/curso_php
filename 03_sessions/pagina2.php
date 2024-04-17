<?php

session_start();

if (isset($_SESSION['nombre'])) {
    $nombre = $_SESSION['nombre'];
    echo '<h1>Hola, ' . $nombre . '</h1>';
} else {
    echo 'No has iniciado sesión';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina 2</title>
</head>
<body>
    <a href="cerrar.php">Cerrar sesión</a>
</body>
</html>